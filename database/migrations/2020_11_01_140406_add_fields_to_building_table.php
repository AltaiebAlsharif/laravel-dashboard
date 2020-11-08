<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buildings', function (Blueprint $table) {
            //
            
            $table->string('transaction_type')->nullable();
            $table->string('lat')->nullable();
            $table->string('lang')->nullable();
            $table->integer('postal_code')->nullable();
            $table->string('streets')->nullable();
            $table->string('realstate_owner')->nullable();
            $table->date('establishing_date')->nullable();
            $table->string('unit_no')->nullable();
            $table->decimal('price_per_m2')->nullable();
            $table->decimal('land_area')->nullable();
            $table->decimal('sale_rent_value')->nullable();
            $table->string('electricity_meter_no')->nullable();
            $table->string('water_meter_no')->nullable();
            $table->date('year_construction')->nullable();
            $table->string('Type_construction')->nullable();
            $table->integer('floors_no')->nullable();
            $table->string('attachment_1')->nullable();
            $table->string('attachment_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buildings', function (Blueprint $table) {
            //
        });
    }
}
