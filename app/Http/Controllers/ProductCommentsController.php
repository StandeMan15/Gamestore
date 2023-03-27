<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
class ProductCommentsController extends Controller
{
    public function store(Product $product)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $product->comments()->create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'body' => request('body')
        ]);

        return back();
    }
}
