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
            'country' => 'string|max:255',
            'code' => 'string|max:255',
        ]);
        Manufacturer::create($validated);
        return redirect()->route('adm.manufacturer.index')->with('message', 'Added a new manufacturer');
    }

    public function edit(Manufacturer $manufacturer){
        return view('adm.manufacturer.edit', ['manufacturer' => $manufacturer]);
    }

    public function update(Request $request, Manufacturer $manufacturer){
        $manufacturer->update([
            'country' => $request->input('country'),
            'code' => $request->input('code'),

        ]);
        return redirect()->route('adm.manufacturer.index')->with('message', 'Updated Successfully');
    }

    public function destroy(Manufacturer $manufacturer){
        $manufacturer->delete();
        return redirect()->route('adm.manufacturer.index')->withErrors('Destroyed successfully');
    }

    public function show(){
    }

}
