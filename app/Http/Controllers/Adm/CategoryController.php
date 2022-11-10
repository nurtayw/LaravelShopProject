<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $allCategory = Category::all();
        return view('adm.category.index',['categories'=>$allCategory]);
    }

    public function create(){
        return view('adm.category.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'string|max:255',
        ]);
        Category::create($validated);
        return redirect()->route('adm.category.index')->with('message', 'Added a new category');
    }

    public function show(){
        return back();
    }

    public function edit(Category $category){
        return view('adm.category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category){
        $category->update([
            'name' => $request->input('name'),

        ]);
        return redirect()->route('adm.category')->with('message', 'Updated Successfully');
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('adm.category.index')->withErrors('Destroyed successfully');
    }

}
