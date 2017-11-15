<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubMasterProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_master_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('string');
            $table->integer('parent')->unsigned()->nullable();
            $table->integer('child')->unsigned()->nullable();
            $table->uuid('master_product_id')->nullable();
            $table->timestamps();

            $table->foreign('master_product_id')->references('id')->on('master_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_master_products');
    }
}
