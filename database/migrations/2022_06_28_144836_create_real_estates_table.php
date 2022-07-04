<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('salesTypeId')->references('id')->on('sales_types');
            $table->foreignUuid('buildingTypeId')->references('id')->on('building_types');
            $table->bigInteger('price');
            $table->string('location');
            $table->foreignUuid('statusId')->references('id')->on('status_real_estates')->default('Open');
            $table->string('image');
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
        Schema::dropIfExists('real_estates');
    }
}
