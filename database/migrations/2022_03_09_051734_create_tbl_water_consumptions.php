<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblWaterConsumptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_water_consumptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('month');
            $table->bigInteger('factory_1_actual')->nullable();
            $table->bigInteger('factory_1_manpower')->nullable();
            // $table->bigInteger('factory_1_target')->nullable();
            
            // $table->bigInteger('factory_2_target')->nullable();
            $table->bigInteger('factory_2_actual')->nullable();
            $table->bigInteger('factory_2_manpower')->nullable();
        
            $table->decimal('target', 5,2);
            // $table->decimal('actual', 5,2)->nullable();
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
        Schema::dropIfExists('tbl_water_consumptions');
    }
}
