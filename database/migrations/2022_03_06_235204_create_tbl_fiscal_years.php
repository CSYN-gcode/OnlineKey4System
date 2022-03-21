<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblFiscalYears extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_fiscal_years', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fiscal_year');
            $table->bigInteger('logdel')->nullable()->default(0)->comment = '0-Current FY, 1-Past FY';
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
        Schema::dropIfExists('tbl_fiscal_years');
    }
}
