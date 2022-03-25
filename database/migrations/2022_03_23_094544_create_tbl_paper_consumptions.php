<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPaperConsumptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_paper_consumptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fiscal_year_id');
            $table->bigInteger('target');
            $table->bigInteger('actual');
            $table->bigInteger('department');
            $table->bigInteger('month');
            $table->bigInteger('logdel')->default(0)->nullable()->comment="0-active, 1-inactive";
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
        Schema::dropIfExists('tbl_paper_consumptions');
    }
}
