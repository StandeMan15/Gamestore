<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\UserOrder;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class CheckoutController extends Controller
{
    public function confirm($id)
    {
        return view('checkout.index', [
            'orders' => UserOrder::where('order_number', $id)->get(),
            'users' => Order::all()
        ]);
    }

    public function preparePayment()
    {
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "10.00" // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Order #12345",
            "redirectUrl" => route('order.success'),
            "webhookUrl" => route('webhooks.mollie'),
            "metadata" => [
                "order_id" => "12345",
            ],
        ]);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function handleWebhookNotification(Request $request)
    {
        $paymentId = $request->input('id');
        $payment = Mollie::api()->payments->get($paymentId);

        if ($payment->isPaid()) {
            echo 'Payment received.';
            // Do your thing ...
        }
    }
}
