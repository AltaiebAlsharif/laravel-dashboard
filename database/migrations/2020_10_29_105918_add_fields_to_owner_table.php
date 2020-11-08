<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToOwnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('owners', function (Blueprint $table) {
            //

            $table->string('phone_2');
            $table->string('city');
            $table->string('address');
            $table->string('nationalaty');
            $table->string('vat_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('owners', function (Blueprint $table) {
            //
        });
    }
}
