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
            'name_kz' => 'string|max:255',
            'name_ru' => 'string|max:255',
            'name_en' => 'string|max:255',
            'name_ita' => 'string|max:255',
        ]);
        Category::create($validated);
        return redirect()->route('adm.category.index')->with('message', __('validation.category_save'));
    }

    public function show(){}

    public function edit(Category $category){
        return view('adm.category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category){
        $category->update([
            'name' => $request->input('name'),
            'name_kz' => $request->input('name_kz'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'name_ita' => $request->input('name_ita'),

        ]);
        return redirect()->route('adm.category.index')->with('message', __('validation.category_update'));
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('adm.category.index')->with('error',__('validation.category_delete'));
    }
}
