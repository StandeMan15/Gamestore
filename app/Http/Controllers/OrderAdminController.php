<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
    public function show()
    {
        return view('admin/orders.index', [
            'orders' => Order::paginate(10),
            'users' =>User::all()
        ]);
    }

    public function read($id)
    {
        return view('admin/orders.read', [
            'orders' => orde::where('order_id', '=', $id),
            'users' => User::all()
        ]);
    }
}
