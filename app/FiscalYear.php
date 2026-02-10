<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EnergyConsumption;

class FiscalYear extends Model
{
    protected $table = 'tbl_fiscal_years';

    // public function fiscal_year_ids()
    // {
    //     return $this->belongsTo(EnergyConsumption::class, 'id', 'fiscal_year_id');
    // }

    // public function month_details()
    // {
    //     return $this->hasMany(EnergyConsumption::class, 'fiscal_year_id', 'month');
    // }
}

