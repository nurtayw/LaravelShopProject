<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile(){
        $profile = Auth()->user();
        return view('profile.profile', ['categories' => Category::all(), 'profile' => $profile]);
    }

    public function edit(User $profile){
        return view('profile.edit', ['profile' => $profile]);
    }

    public function update(Request $request, $id){

        $avatar = User::find($id);
        $avatar->name = $request->input('name');
        $avatar->email = $request->input('email');

        if($request->hasFile('image')){
          $file = $request->file('image');
          $ex = $file->getClientOriginalExtension();
          $fillname = time() . '.' .$ex;
          $file->move('storage/avatars', $fillname);
          $avatar->image = $fillname;
        }

        $avatar->update();
        return redirect()->route('profile', ['profile' => $avatar])->with('message', __('validation.update_profile'));
    }

    public function destroy(User $profile){
        $profile->delete();
        return redirect()->route('shops.index');
    }
}
