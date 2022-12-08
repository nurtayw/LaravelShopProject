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
            $table->string('name_kz')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_ita')->nullable();

            $table->string('description_kz')->nullable();
            $table->string('description_en')->nullable();
            $table->string('description_ru')->nullable();
            $table->string('description_ita')->nullable();
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
