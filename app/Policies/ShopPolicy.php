<?php

namespace App\Policies;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return ($user->role->name != 'user');
    }

    public function view(User $user, Shop $phone){
        //
    }

    public function create(User $user){
        //
    }


    public function update(User $user, Shop $phone){
        //
    }


    public function delete(User $user, Shop $phone){

    }

    public function restore(User $user, Shop $phone){
        //
    }

    public function forceDelete(User $user, Shop $phone){
        //
    }
}
