<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User2Controller extends Controller
{
    public function index(){
        return view('users.index');
    }

    public function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user){
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        return redirect()->route('users.index', ['user' => $user])->with('message', 'Updated Successfully');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')->withErrors('Destroyed successfully');
    }
}
