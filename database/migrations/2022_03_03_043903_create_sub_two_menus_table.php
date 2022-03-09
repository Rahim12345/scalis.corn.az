<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTwoMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_two_menus', function (Blueprint $table) {
            $table->id('sub_two_menu_id');
            $table->unsignedBigInteger('sub_one_menu_id');
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('slug_az');
            $table->string('slug_en');
            $table->string('slug_ru');
            $table->timestamps();

            $table->foreign('sub_one_menu_id')
                ->references('sub_one_menu_id')
                ->on('sub_one_menus')
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
        Schema::dropIfExists('sub_two_menus');
    }
}
