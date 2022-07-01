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
            $table->foreignUuid('salesTypeId')->references('id')->on('sales_types')->constrained();
            $table->foreignUuid('buildingTypeId')->references('id')->on('building_types')->constrained();
            $table->integer('price');
            $table->string('location');
            $table->foreignUuid('statusId')->references('id')->on('status_real_estates')->constrained()->default('Open');
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
