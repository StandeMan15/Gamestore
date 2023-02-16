<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
class PostCommentsController extends Controller
{
    public function store(Product $product)
    {
        request()->validate([
            'body' => 'required'
        ]);


        // dd([
        //     'user_id' => auth()->user()->id,
        //     'post_id' => $product->id
        // ]);


        $product->comments()->create([
            'user_id' => auth()->id(),
            'post_id' => $product->id,
            'body' => request('body')
        ]);

        return back();
    }
}
