<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Order;
use App\Models\UserOrder;
use App\Models\Product;
use Illuminate\Http\Request;

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
        return redirect('/')->with('success', $product->title . 'toegevoegd aan winkelwagen!');
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
            session()->flash('success', 'Cart updated successfully');
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
            session()->flash('success', 'Product removed successfully');
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

            $checkout = [
                'order_number' => $order->order_number,
                'order_price' => $totalprice
            ];
            
            session()->put('checkout', $checkout);

            
        } else {
            return redirect('')->with('success', 'Er zijn nog geen producten in uw mand, dus u kunt nog niet afrekenen');
        }
        
        return redirect()->route('orderconfirm', $orderdetails->order_number)->with('success', 'Bestelling succesvol geplaatst!');

    }
}
