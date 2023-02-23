<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    public function show()
    {
        return view('admin/categories.index', [
            'category' => Category::paginate(10)
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
        dd($validatedData);
        Category::where('id', $id)
            ->update([
                'name' => $validatedData['name'],
                'slug' => $validatedData['slug']
            ]);

        return redirect()->back()->with('message','Category succesvol aangepast');
    }

    public function read($id)
    {
        return view('admin/categories.read', [
            'categorie' => Category::find($id)
        ]);
    }
}