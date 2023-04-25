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
        ->with('success', 'Bestelling succesvol aangepast');
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
        // This function isnt done yet
        $validatedData = $request->validate([
            'ordernmr' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|numeric|min:1',
        ]);

        dd($validatedData);

        $ordernmr = $validatedData['ordernmr'];
        $productIds = $validatedData['product_id'];
        $quantities = $validatedData['quantity'];

        $order = new Order;
        $order->user_id = auth()->id();
        $order->order_number = $ordernmr;

        foreach ($productIds as $index => $productId) {
            $quantity = $quantities[$index];

            $orderItem = new UserOrder();
            $orderItem->order_number = $ordernmr;
            $orderItem->product_id = $productId;
            $orderItem->quantity = $quantity;
            $orderItem->save();
        }

        //return redirect()->back()->with('success', 'Admin Order submitted successfully!');
    }
}