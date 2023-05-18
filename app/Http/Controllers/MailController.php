<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use App\Models\Order;
use App\Models\UserOrder;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        $order = Order::where('user_id', auth()->user()->id)->orderByDesc('order_number')->first();
        $userorder = UserOrder::where('order_number', $order->order_number)->get();
        //dd($orderdetails);
        if ($order) {
            Mail::to($order->user->email)->send(new OrderShipped($order, $userorder));

            return redirect()->route('view.orders')->with('success', __('messages.mail.success'));
        } else {
            return redirect()->route('view.orders')->with('error', __('messages.error.mail_err'));
        }       
    }
}
