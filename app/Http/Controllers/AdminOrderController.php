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

    public function update(OrderFormRequest $request, $id)
    {
        //$validatedData = $request->validated();

        dd('Hello');

        // Order::where('order_number', $id)
        //     ->update([
        //         'status_id' => $validatedData['status_id'],
        //     ]);

        // return redirect('/admin/orders')
        // ->with('success', 'Bestelling succesvol aangepast');
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
}