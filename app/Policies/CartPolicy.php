<?php

namespace App\Policies;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CartPolicy
{
    use HandlesAuthorization;


//    public function view(){
//        return Auth::user()->postswithStatus('in_cart') == null;
//    }
}
