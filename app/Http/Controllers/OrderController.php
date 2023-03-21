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
}
