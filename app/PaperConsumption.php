<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\FiscalYear;

class PaperConsumption extends Model
{
    protected $table = 'tbl_paper_consumptions';

    public function fiscal_year_id(){
        return $this->hasOne(FiscalYear::class, 'id', 'fiscal_year_id');
    }
}
