<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('proid');
            $table->string('proname',70)->unique();
            $table->double('price')->unsigned();
            $table->longText('description');
            $table->integer('image_id');
            $table->integer('quanlity');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('userid')->on('users')->onDelete('cascade');
            $table->integer('cate_id')->unsigned();
            $table->foreign('cate_id')->references('cateid')->on('categories')->onDelete('cascade');
            $table->integer('made_id')->unsigned();
            $table->foreign('made_id')->references('madeid')->on('mades')->onDelete('cascade');
            $table->timestamps();
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
