<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_rating')->unsigned();
            $table->text('customer_complaint');
            $table->boolean('is_need_call')->default(0);
            $table->boolean('is_urgent')->default(0);
            $table->integer('customer_id')->unsigned();
            $table->uuid('master_service_id');
            $table->integer('service_category_id')->unsigned();
            $table->uuid('tenant_id');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('master_service_id')->references('id')->on('master_services')->onDelete('cascade');
            $table->foreign('service_category_id')->references('id')->on('service_categories')->onDelete('cascade');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaint_services');
    }
}
