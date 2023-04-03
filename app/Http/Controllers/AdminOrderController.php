<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
            'users' => User::all()
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
            'orderdetails' => UserOrder::where('order_number', $id)->get(),
            'statuses' => Status::all()
        ]);
    }
}
