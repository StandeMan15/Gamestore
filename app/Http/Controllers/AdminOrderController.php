<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function show()
    {
        return view('admin/orders.index', [
            'orders' => Order::paginate(10),
            'orderdetails' => OrderDetails::all(),
            'users' => User::all()
        ]);
    }
}
