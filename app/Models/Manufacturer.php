<?php

namespace App\Models;

use App\Http\Controllers\ShopController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = ['brand','brand_kz','brand_ru','brand_en','brand_ita'];

    public function shops(){
        return $this->hasMany(Shop::class);
    }
}
