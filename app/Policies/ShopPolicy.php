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
        return ($user->role->name == 'admin');
    }

    public function viewAny1(User $user)
    {
        return ($user->role->name == 'moderator') || ($user->role->name == 'admin');
    }
}
