<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_two_menu_id');
            $table->string('capri')->nullable();
            $table->string('agt')->nullable();
            $table->string('brend')->nullable();
            $table->string('seth')->nullable();
            $table->string('reng')->nullable();
            $table->string('en')->nullable();
            $table->string('boy')->nullable();
            $table->string('qalinliq')->nullable();
            $table->string('palet')->nullable();
            $table->string('center_image')->nullable();
            $table->string('right_side_image_1')->nullable();
            $table->string('right_side_image_2')->nullable();
            $table->string('right_side_video')->nullable();
            $table->boolean('draft')->default(0)->comment('0-draft, 1-published');
            $table->timestamps();

            $table->foreign('sub_two_menu_id')
                ->references('sub_two_menu_id')
                ->on('sub_two_menus')
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
        Schema::dropIfExists('products');
    }
}
