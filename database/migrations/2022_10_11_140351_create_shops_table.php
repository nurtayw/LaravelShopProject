<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->integer('price');
            $table->string('size');
            $table->text('description');
            $table->string('image');

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shops');
    }
};
