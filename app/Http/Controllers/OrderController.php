<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Order;
use App\Models\UserOrder;
use App\Models\Product;
use App\Models\ShippingDetails;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show()
    {
        return view('orders.index', [
            'orders' => Order::all()
        ]);

    }

    public function addToCart($id)
    {
        
        $product = Product::findOrFail($id);
        $image = Image::firstWhere('product_id', '=', $product->id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "user_id" => auth()->id(),
                "id" => $product->id,
                "category_id" => $product->category->id,
                "slug" => $product->slug,
                "name" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "discount_price" => $product->discount_price,
                "image" => $image
            ];
        }

        session()->put('cart', $cart);
        return redirect('/')->with('success', __('messages.cart.added', ['attribute' => $product->title]));
    }

    public function cart()
    {
        return view('orders.cart', [
            'category' => Category::all()
        ]);
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', __('messages.cart.update'));
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', __('messages.cart.removed'));
        }
    }

    public function store()
    {
        if (count(session('cart')) > 0) {
            //dont forget to validate
            $latestOrder = Order::orderBy('created_at', 'DESC')->first();
            if ($latestOrder == null) {
                $latestOrder = (object) ['order_number' => 0];
            }

            $order = new Order;
            $order->user_id = auth()->id();
            $order->status_id = 1;
            $order->order_number = str_pad($latestOrder->order_number + 1, STR_PAD_LEFT);
            
            $totalprice = 0;
            foreach (session('cart') as $id => $items) {              
                $orderdetails = new UserOrder();

                $orderdetails->order_number = $order->order_number;
                $orderdetails->name = $items['name'];
                $orderdetails->quantity = $items['quantity'];

                if (isset($items['discount_price'])) {
                    $items['price'] = $items['discount_price'];
                }
                $orderdetails->price = $items['price'] * $items['quantity'];
                $totalprice += $orderdetails->price;
                
                $order->save();
                $orderdetails->save();
            }
            
            if(!str_contains($totalprice, '.')) {

                $totalprice = $totalprice . ".00";
            }
            $totalprice = strval($totalprice);

            $checkout = [
                'order_number' => $order->order_number,
                'order_price' => $totalprice
            ];
            
            session()->put('checkout', $checkout);

            
        } else {
            return redirect('')->with('success', __('messages.error.cart_empty'));
        }
        
        return redirect()->route('orderconfirm', $orderdetails->order_number)->with('success', __('messages.order.success'));

    }

    public function deny()
    {
        if (!auth()->check()) {
            return redirect('')->with('success', __('messages.error.logged_out'));
        } else {
            return redirect('')->with('success', __('messages.error.cart_empty'));
        }
        
    }

    public function viewall() {
        return view('user.order', [
            'orders' => Order::where('user_id', Auth()->user()->id)->get()
        ]);

    }

    public function createPDF($id)
    {
        $data = Order::where('user_id', Auth()->user()->id)->get();
        foreach ($data as $order) {
            $userID = $order->user->id;
        }

        if (Auth()->user()->id == $userID) {
            $orderdetails = UserOrder::where('order_number', $id)->get();
            $orderbase = Order::where('order_number', $id)->firstorfail();
            $shippingdetails = ShippingDetails::where('order_nmr', $id)->firstorfail();

            foreach ($orderdetails as $order) {
                $ordernum = $order->order_number;
            }
            $pdf = Pdf::loadView('pdf.user-order', compact('orderdetails', 'orderbase', 'shippingdetails'));
            return $pdf->download('Order#' . $ordernum . '.pdf');
        } else {
            abort(403);
        }
    }
}
