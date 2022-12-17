<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manufacturer;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name','name_kz','name_ru','name_en','name_ita', 'price', 'size', 'description','description_kz','description_ru','description_en','description_ita', 'image', 'manufacturer_id', 'category_id', 'user_id'];


    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userCart(){
        return $this->belongsToMany(User::class)
            ->withPivot('quantity')
            ->withTimestamps();
    }


    public function BoughtUsers(){
        return $this->belongsToMany(User::class)
            ->withPivot('quantity', 'color', 'status')
            ->withTimestamps();
    }

    public function wallets(){
        return $this->hasMany(Wallet::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function usersRated(){
        return $this->belongsToMany(User::class, 'rating')
            ->withPivot('rating')
            ->withTimestamps();
    }
}
