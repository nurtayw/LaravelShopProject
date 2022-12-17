<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
       Schema::create('rating', function (Blueprint $table){
          $table->id();
          $table->foreignId('user_id')->constrained();
          $table->foreignId('shop_id')->constrained();
          $table->tinyInteger('rating');
          $table->timestamps();
       });
    }

    public function down()
    {
        Schema::dropIfExists('rating');
    }
};
