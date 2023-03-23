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
        $image = Image::firstWhere('product_id', '=', $product->id);
        if($image == null) {
            $image = 'https://via.placeholder.com/400x300';
        }
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "discount_price" => $product->discount_price,
                "image" => $image
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

    public function store()
    {
        $order = Orders::all();
        //dd(session('cart'));
        foreach (session('cart') as $id => $items) {
            
            if(isset($items['discount_price'])) {
                $items['price'] = $items['discount_price'];
            }

            $order->create([
                'id' => $items['id'],
                'name' => $items['name'],
                'quantity' => $items['quantity'],
                'price' => $items['price'],
            ]);
        }
    }
}
