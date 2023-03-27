<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function show()
    {
        return view('orders.index', [
            'orders' => Orders::all()
        ]);

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        
        $product = Product::findOrFail($id);
        //dd($product->id);
        $image = Image::firstWhere('product_id', '=', $product->id);
        //dd($image);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "discount_price" => $product->discount_price,
                "image" => $image->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', $product->title . 'toegevoegd aan winkelwagen!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('orders.cart');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
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
<<<<<<< Updated upstream
=======

    public function store()
    {
        //dd(session('cart'));
        if (count(session('cart')) > 0) {
            //dont forget to validate
            $latestOrder = Order::orderBy('created_at', 'DESC')->first();

            

            if ($latestOrder == null) {
                $latestOrder = (object) array('id' => 0);
            }
            
            foreach (session('cart') as $id => $items) {
                $order = new Order;

                $order->user_id = auth()->id();
                $order->order_id = '#' . str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT);
                $order->name = $items['name'];
                $order->quantity = $items['quantity'];

                if (isset($items['discount_price'])) {
                    $items['price'] = $items['discount_price'];
                }
                $order->price = $items['price'] * $items['quantity'];

                $order->save();
                
            }
        }
        session()->forget(['cart']);
        return redirect('')->with('success', 'Bestelling succesvol geplaatst!');

    }
>>>>>>> Stashed changes
}
