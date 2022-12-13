<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->id();
            $table->string('brand');

            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('manufacturers');
    }
};
