<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_units', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('building_id')->nullable();
            $table->integer('number_apartments')->nullable();
            $table->integer('Number_offices')->nullable();
            $table->integer('number_stores')->nullable();
            $table->integer('number_warehouses')->nullable();
            $table->integer('number_show')->nullable();
            $table->integer('number_suites')->nullable();
            $table->integer('number_workshops')->nullable();
            $table->integer('number_restaurants')->nullable();
            $table->integer('number_villas')->nullable();
            $table->integer('number_petroleum_services')->nullable();
            $table->integer('number_parkings')->nullable();
            $table->integer('number_booths')->nullable();
            $table->integer('number_space')->nullable();
            $table->integer('number_club')->nullable();
            $table->integer('number_refrigerator')->nullable();
            $table->integer('number_atm')->nullable();
            $table->integer('number_commercial_floors')->nullable();
            $table->integer('number_floors')->nullable();
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
        Schema::dropIfExists('building_unit');
    }
}
