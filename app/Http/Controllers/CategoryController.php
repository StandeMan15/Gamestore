<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function showAdmin()
    {
        return view('admin/categories.index', [
            'category' => Category::paginate(10)
        ]);
    }

    public function show(Request $request)
    {
        $url = explode('/', $request->url());

        return view('categories.index', [
            'products' => Product::all(),
            'slug' => $url[4],
            'images' => Image::all()
        ]);
    }

    public function activity($categories)
    {
        $category = Category::find($categories);

        if($category->is_active == 1) {
            $category->is_active = 0;
        }elseif($category->is_active == 0) {
            $category->is_active = 1;
        }

        $category->save();

        return redirect()->back()
            ->with('success','Status gewijzigd');
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin/categories.edit', compact('categories'));
    }

    public function update(CategoryFormRequest $request, $id)
    {
        $validatedData = $request->validated();
        //dd($validatedData);
        Category::where('id', $id)
            ->update([
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['name'], '-'),
                'is_active' => 0
            ]);

        return redirect('admin/categories')->with('message','Category succesvol aangepast');
    }

    public function read($id)
    {
        return view('admin/categories.read', [
            'categorie' => Category::find($id)
        ]);
    }

    public function create()
    {
        return view('admin/categories.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();

        Category::create([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name'], '-'),
            'is_active' => 0
        ]);

        return redirect('/admin/categories')
            ->with('success', 'Categorie aangemaakt!');
    }
}