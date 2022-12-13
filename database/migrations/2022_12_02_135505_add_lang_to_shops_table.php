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
        Schema::table('shops', function (Blueprint $table) {
            $table->string('name_kz');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('name_ita');

            $table->string('description_kz');
            $table->string('description_en');
            $table->string('description_ru');
            $table->string('description_ita');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->dropColumn('name_kz');
            $table->dropColumn('name_en');
            $table->dropColumn('name_ru');
            $table->dropColumn('name_ita');

            $table->dropColumn('description_kz');
            $table->dropColumn('description_en');
            $table->dropColumn('description_ru');
            $table->dropColumn('description_ita');
        });
    }
};
