<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use App\Models\Role;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index(){
        $all = Manufacturer::all();
        return view('adm.manufacturer.index',['manufacturer'=>$all]);
    }

    public function create(){
        return view('adm.manufacturer.create', Role::all());
    }

    public function store(Request $request){
        $validated = $request->validate([
            'brand' => 'string|max:255',
            'brand_kz' => 'string|max:255',
            'brand_ru' => 'string|max:255',
            'brand_en' => 'string|max:255',
            'brand_ita' => 'string|max:255',
        ]);
        Manufacturer::create($validated);
        return redirect()->route('adm.manufacturer.index')->with('message', __('validation.brand_save'));
    }

    public function edit(Manufacturer $manufacturer){
        return view('adm.manufacturer.edit', ['manufacturer' => $manufacturer]);
    }

    public function update(Request $request, Manufacturer $manufacturer){
        $manufacturer->update([
            'brand' => $request->input('brand'),
            'brand_kz' => $request->input('brand_kz'),
            'brand_ru' => $request->input('brand_ru'),
            'brand_en' => $request->input('brand_en'),
            'brand_ita' => $request->input('brand_ita'),

        ]);
        return redirect()->route('adm.manufacturer.index')->with('message', __('validation.brand_update'));
    }

    public function destroy(Manufacturer $manufacturer){
        $manufacturer->delete();
        return redirect()->route('adm.manufacturer.index')->with('error',__('validation.brand_delete'));
    }

    public function show(){}
}
