<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('manufacturers', function (Blueprint $table) {
            $table->string('brand_kz');
            $table->string('brand_en');
            $table->string('brand_ru');
            $table->string('brand_ita') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manufacturers', function (Blueprint $table) {
            $table->dropColumn('brand_kz');
            $table->dropColumn('brand_en');
            $table->dropColumn('brand_ru');
            $table->dropColumn('brand_ita');
        });
    }
};
