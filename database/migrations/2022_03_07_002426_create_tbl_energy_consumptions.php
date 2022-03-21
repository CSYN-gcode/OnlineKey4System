<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblEnergyConsumptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_energy_consumptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('month');
            $table->bigInteger('target');
            $table->bigInteger('actual')->nullable();
            $table->bigInteger('logdel')->nullable()->default(0)->comment = "0-active, 1-inactive";
            $table->unsignedBigInteger('fiscal_year_id');
            $table->timestamps();

            $table->foreign('fiscal_year_id')->references('id')->on('tbl_fiscal_years');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_energy_consumptions');
    }
}
