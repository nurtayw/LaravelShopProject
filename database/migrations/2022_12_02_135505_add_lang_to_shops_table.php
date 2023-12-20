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
            $table->text('name_kz');
            $table->text('name_en');
            $table->text('name_ru');
            $table->text('name_ita');

            $table->text('description_kz');
            $table->text('description_en');
            $table->text('description_ru');
            $table->text('description_ita');

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
