<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_rating');
            $table->text('customer_complaint');
            $table->boolean('is_need_call')->default(0);
            $table->boolean('is_urgent')->default(0);
            $table->uuid('tenant_id')->index();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->uuid('master_product_id');
            $table->integer('sub_master_product_id')->unsigned();
            $table->timestamps();

            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
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
        Schema::dropIfExists('complaint_products');
    }
}
