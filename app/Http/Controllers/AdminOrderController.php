<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminOrderFormRequest;
use App\Http\Requests\OrderFormRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use App\Models\UserOrder;
use App\Models\User;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function show()
    {
        if (!auth()->check()) {
            abort(403);
        }

        return view('admin/orders.index', [
            'orders' => Order::paginate(10),
            'orderdetails' => UserOrder::all(),
            'statuses' => Status::all()
        ]);
    }

    public function read($id)
    {
        if (!auth()->check()) {
            abort(403);
        }

        return view('admin/orders.read', [
            'orderdetails' => UserOrder::where('order_number', $id)->get()
        ]);
    }

    public function edit($id)
    {
        if (!auth()->check()) {
            abort(403);
        }

        return view('admin/orders.edit', [
            'order' => Order::where('order_number', $id)->firstorfail(),
            'orderdetails' => UserOrder::where('order_number', $id)->get(),
            'statuses' => Status::all(),
            'order_number' => $id
        ]);
    }

    public function update(Request $request, $id)
    {

        Order::where('order_number', $id)
            ->update([
                'status_id' => $request['status_id'],
            ]);
            
        return redirect('/admin/orders')
        ->with('success',  __('messages.order.success'));
    }

    public function create()
    {
        if (!auth()->check()) {
            abort(403);
        }

        return view('admin/orders.create', [
            'orders' => Order::all(),
            'statuses' => Status::all(),
            'orderdetails' => UserOrder::all(),
            'latestorder' => Order::orderBy('order_number', 'DESC')->first(),
            'products' => Product::select('*')->limit(10)->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ordernmr' => 'required',
            'product_name' => 'required|array',
            'quantity' => 'required|array',
        ]);     

        $ordernmr = $validatedData['ordernmr'];
        $productNames = $validatedData['product_name'];

        $quantity = $validatedData['quantity'];
        
        $order = new Order;

        for ($i = 1; $i < count($productNames); $i++) {
            $name = $productNames[$i];
        }

        $product = Product::where('title', $name)->firstorfail();

        $order->user_id = auth()->id();
        $order->order_number = $ordernmr;
        $order->save();

        foreach ($productNames as $name) {


            $orderItem = new UserOrder();
            $orderItem->order_number = $ordernmr;

            $orderItem->name = $name;

            for($i = 1;$i < count($quantity);$i++) {
                $orderItem->quantity = $quantity[$i];
            }

            $orderItem->price = $product->price * $orderItem->quantity;
            $orderItem->save();
        }

        return redirect()->back()->with('success', __('messages.admin.order.create'));
    }
}