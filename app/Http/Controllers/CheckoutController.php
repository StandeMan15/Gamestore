<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\UserOrder;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class CheckoutController extends Controller
{
    public function confirm(Request $request)
    {
        if (empty(session('checkout.order_number'))) {
            $latestOrder = Order::orderBy('created_at', 'DESC')->first();
            if ($latestOrder == null) {
                $latestOrder = (object) ['order_number' => 0];
            }
            $order = new Order;
            $order->user_id = auth()->id();
            $order->status_id = 1; // afwachting
            $order->order_number = str_pad($latestOrder->order_number + 1, STR_PAD_LEFT);
            $order->save();
            session()->put('checkout.order_number', $order->order_number);
        }
        
        return view('checkout.index', [
            'orders' => UserOrder::where('order_number', session('checkout.order_number'))->get(),
            'users' => Order::all(),
            'id' =>  session('checkout.order_number')
        ]);
        
    }

    public function preparePayment()
    {
        $total = session('cart.price') + (session('cart.price') * config('config.BTW'));
        $total = strval($total);
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $total, // You must send 2 decimals, thus we enforce the use of strings
            ],
            "description" => "Order " . session('checkout.order_number'),
            "redirectUrl" => route('payment.success'),
            //"webhookUrl" => route('webhooks.mollie'),
            "metadata" => [
                "order_id" => session('checkout.order_number'),
                "order_price" => session('cart.price'),
            ],
        ]);
        $payment = Mollie::api()->payments->get($payment->id);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function handleWebhookNotification()
    {
        $orderNumber = session('checkout.order_number');
        $payedStatus = 3; // status "betaald"
        Order::where('order_number', $orderNumber)->update(['status_id' => $payedStatus]);

        session()->forget(['cart']);
        session()->forget(['checkout']);
        // return redirect()->route('view.orders')->with('success', __('messages.order.download', ['orderNumber' => $orderNumber]));
        return redirect()->route('send.mail');
    }
}
