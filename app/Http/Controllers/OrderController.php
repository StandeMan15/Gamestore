<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show()
    {
        return view('admin/orders.index', [
            'orders' => Orders::all()
        ]);

    }
}
