<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show()
    {
        return view('orders.index', [
            'orders' => Orders::all()
        ]);

    }

    public function create()
    {
    }
}
