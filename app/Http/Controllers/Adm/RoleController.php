<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $all = Role::all();
        return view('adm.roles.index',['roles'=>$all]);
    }

    public function create(){
        return view('adm.roles.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'string|max:255',
        ]);
        Role::create($validated);
        return redirect()->route('adm.roles.index')->with('message', 'Added a new role');
    }

    public function edit(Role $role){
        return view('adm.roles.edit', ['roles' => $role]);
    }

    public function update(Request $request, Role $role){
        $role->update([
            'name' => $request->input('name'),

        ]);
        return redirect()->route('adm.roles.index')->with('message', 'Updated Successfully');
    }

    public function destroy(Role $role){
        $role->delete();
        return redirect()->route('adm.roles.index')->with('error','Destroyed');
    }

    public function show(){
    }
}
