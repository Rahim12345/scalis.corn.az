<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubOneMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_one_menus', function (Blueprint $table) {
            $table->id('sub_one_menu_id');
            $table->unsignedBigInteger('main_menu_id');
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('slug_az');
            $table->string('slug_en');
            $table->string('slug_ru');
            $table->timestamps();

            $table->foreign('main_menu_id')
                ->references('main_menu_id')
                ->on('main_menus')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_one_menus');
    }
}
