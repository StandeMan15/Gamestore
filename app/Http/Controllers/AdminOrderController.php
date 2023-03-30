<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
}
