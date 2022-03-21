<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FiscalYear;

class MonthlyTargetPaperConsumption extends Model
{
    protected $table = 'monthly_targets';
    protected $connection = 'db_paper_consumption';
    
    public function fiscal_year_id(){
        return $this->hasOne(FiscalYear::class, 'id', 'fiscal_year_id');
    }
}
