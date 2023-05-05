<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Image;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'images' => Image::all(),
            'products' => Product::where('active', 1)->latest()->paginate(7)
        ]);
    }

    public function show($category, Product $product)
    {
        return view('products.show', [
            'category' => $category,
            'product' => $product,
            'images' => Image::all()
        ]);
    }

    public function showProduct(Product $product)
    {
        return view('products.show', [
            'category' => Category::all(),
            'product' => Product::where('slug', $product)->get(),
            'images' => Image::all()
        ]);
    }

    public function read($id)
    {
        if (!auth()->check()) {
            abort(403);
        }
        
        return view('admin/products.read', [

            'product' => Product::find($id),
            'images' => Image::all()
        ]);
    }

    public function activity($product)
    {
        $product = Product::find($product);

        if($product->active == 1) {
            $product->active = 0;
        }elseif($product->active == 0) {
            $product->active = 1;
        }

        $product->save();

        return redirect()->back()
            ->with('success', __('messages.admin.status.edit'));
    }

    public function edit($id)
    {
        if (!auth()->check()) {
            abort(403);
        }

        return view('admin/products.edit', [
            'categories' => Category::all(),
            'product' => Product::find($id),
            'images' => Image::all()
        ]);
    }

    public function update(ProductFormRequest $request, $id)
    {
        $validatedData = $request->validated();
        
        $category = Category::find($validatedData['category_id']);
        $product = Product::find($id);

        if ((isset($validatedData['discount_price'])) && ($validatedData['price'] > $validatedData['discount_price'])) {
            $validatedData['discount_price'] = $validatedData['discount_price'];
        } else {
            $validatedData['discount_price'] = NULL;
        }
        $product = $category->products()
            ->update([
                'title' => $validatedData['title'],
                'price' => $validatedData['price'],
                'discount_price' => $validatedData['discount_price'],
                'category_id' => $validatedData['category_id'],
                'release_date' => $validatedData['release_date'],
                'excerpt' => $validatedData['excerpt'],
                'body' => $validatedData['body'],
                'minimum_age' => $validatedData['minimum_age'],
                'preorder_date' => $validatedData['preorder_date']
            ]);

            if($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';

                $i = 1;
                foreach($request->file('image') as $imageFile) {
                    //dd($imageFile);
                    $extention = $imageFile->extension();
                    $filename = time() . $i++ . "." . $extention;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath . $filename;

                    $product->images()->update([
                        'product_id' => $id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }

        return redirect('/admin')->with('success', __('messages.admin.product.edit'));
    }

    public function create()
    {
        if (!auth()->check()) {
            abort(403);
        }
        
        return view('admin.products.create',[
            'categories' => Category::all(),
            'users' => User::all()
        ]);
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::find($validatedData['category_id']);

        $product = $category->products()->create([
            'user_id' => auth()->user()->id,
            'category_id' => $validatedData['category_id'],
            'title' => $validatedData['title'],
            'slug' => Str::slug($validatedData['title'], '-'),
            'excerpt' => $validatedData['excerpt'],
            'body' => $validatedData['body'],
            'price' => $validatedData['price'],
            'minimum_age' => $validatedData['minimum_age'],
            'release_date' => $validatedData['release_date'],
            'preorder_date' => $validatedData['preorder_date'],
            'active' => 0
        ]);

        if($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';

            $i = 1;
            foreach($request->file('image') as $imageFile) {
                $extention = $imageFile->extension();
                $filename = time() . $i++ . "." . $extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath . $filename;

                $product->images()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }



        return redirect('/admin')
            ->with('success', 'Product aangemaakt!');
    }

    public function filterActive()
    {
        return view('admin.home', [
            'products' => Product::where('active', 1)->paginate(10)
        ]);
    }

    public function filterInactive()
    {
        return view('admin.home', [
            'products' => Product::where('active', 0)->paginate(10)
        ]);
    }
}