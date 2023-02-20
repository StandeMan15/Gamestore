<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString()
        ]);
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function readAdmin($id)
    {
        return view('admin/products.read', [
            'product' => Product::find($id)
        ]);
    }

    public function activity($product)
    {
        $product = Product::find($product);

        if($product->is_active == 1) {
            $product->is_active = 0;
        }elseif($product->is_active == 0) {
            $product->is_active = 1;
        }

        $product->save();

        return redirect()->back()
            ->with('message','Status gewijzigd');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin/products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {

        // $this->validate($request, [
        //     'name' => 'required',
        //     'slug' => 'required'
        // ]);

        $product = Product::find($id);
        // $product->name = $request->name;
        // $product->slug = $request->slug;

        $product->save();
        return redirect()->back()->with('message','Product succesvol aangepast');
    }

    public function create()
    {
        return view('admin.products.create',[
            'categories' => Category::all(),
            'users' => User::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'price' => 'required',
            'minimum_age' => '',
            'release_date' => 'date',
            'preorder_date' => 'date',
            'thumbnail' => 'image'

        ]);

        Product::create($request->all());

        return redirect()->route('admin')
        ->with('success', 'Product aangemaakt!');
    }
}