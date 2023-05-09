<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\UserOrder;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class CheckoutController extends Controller
{
    public function confirm(Request $request, $id)
    {
        return view('checkout.index', [
            'orders' => UserOrder::where('order_number', $id)->get(),
            'users' => Order::all(),
            'id' => $id
        ]);
    }

    public function preparePayment()
    {
        //dd(array_values(session('checkout')));
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => session('checkout.order_price') // You must send 2 decimals, thus we enforce the use of strings
            ],
            "description" => "Order " . session('checkout.order_number'),
            "redirectUrl" => route('payment.success'),
            // "webhookUrl" => route('webhooks.mollie'),
            "metadata" => [
                "order_id" => session('checkout.order_number'),
                "order_price" => session('checkout.order_price')
            ],
        ]);
        $payment = Mollie::api()->payments->get($payment->id);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function handleWebhookNotification()
    {
        // set orders status to 3 (betaald)
        $orderNumber = session('checkout.order_number');
        $payedStatus = 3;
        Order::where('order_number', $orderNumber)->update(['status_id' => $payedStatus]);

        return redirect('')->with('success', __('messages.checkout.payment_succes'));
        session()->forget(['cart']);
        session()->forget(['checkout']);
        session()->flush();
    }
}
