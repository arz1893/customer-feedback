<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->text('address');
            $table->string('phone');
            $table->string('city');
            $table->text('description')->nullable();
            $table->string('country');
            $table->string('province');
            $table->text('image_path')->nullable();
            $table->text('logo_path')->nullable();
            $table->text('memo')->nullable();
            $table->integer('category_id')->unsigned();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('tenant_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
