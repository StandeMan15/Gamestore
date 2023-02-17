<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show()
    {
        return view('admin/categories.index', [
            'category' => Category::all()
        ]);
    }

    public function activity($categories)
    {
        if($categories->id == 1) {
            $categories->is_active = 0;
        }

        if($categories->id == 0) {
            $categories->is_active = 1;
        }
        $categories->save();

        return redirect()->back()
            ->with('message','Status gewijzigd');
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.categories.update', compact('categories'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required'
        ]);

        $categories = Category::find($id);
        $categories->name = $request->name;

        $categories->save();
        return redirect()->back()->with('message','Categorie succesvol gewijzigd');
    }
}