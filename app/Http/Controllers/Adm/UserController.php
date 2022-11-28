<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){
        if ($request->search){
            $users = User::where('name', 'LIKE', '%' .$request->search. '%')
                ->orWhere('email', 'LIKE', '%' .$request->search. '%')
                ->with('role')->get();
        }else{
            $users = User::with('role')->get();
        }
        return view('adm.users', ['users' => $users, 'user'=>User::all()]);
    }


    public function ban(User $user){
            $user->update([
                'is_active' => false,
            ]);
        return back()->with('message','User banned');
    }

    public function unban(User $user){
        $user->update([
            'is_active' => true,
        ]);
        return back()->with('message','User unbanned');
    }

    public function edit(User $user){
        return view('adm.edit', ['user' => $user, 'roles' => Role::all()]);
    }

    public function update(Request $request, User $user){
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
        ]);
        return redirect()->route('adm.users')->with('message', 'Updated successfully');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('adm.users')->with('error','You deleted your account!!!!');
    }



}
