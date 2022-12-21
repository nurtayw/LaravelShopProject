<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Shop;
use App\Models\User;

class Cart extends Pivot
{
    use HasFactory;

    protected $table = 'shop_user';
    protected $fillable = ['user_id', 'shop_id', 'quantity', 'color', 'status'];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }


}
