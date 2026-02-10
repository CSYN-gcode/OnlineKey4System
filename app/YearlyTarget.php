<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FiscalYear;

class YearlyTarget extends Model
{
    protected $table = 'tbl_yearly_target';

    public function fiscal_year_id()
    {
        return $this->hasOne(FiscalYear::class, 'id', 'fiscal_year_id');
    }

    // public function fiscal_year()
    // {
    //     return $this->belongsTo(FiscalYear::class);
    // }
}
