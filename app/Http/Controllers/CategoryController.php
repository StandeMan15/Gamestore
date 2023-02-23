<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        return view('admin/categories.index', [
            'category' => Category::all()
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

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required'
        ]);

        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->slug = $request->slug;

        $categories->save();
        return redirect()->back()->with('success','Categorie succesvol gewijzigd');
    }
}