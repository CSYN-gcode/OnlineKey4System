<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FiscalYear;

class EnergyConsumption extends Model
{
    protected $table = 'tbl_energy_consumptions';

    public function fiscal_year_id()
    {
        return $this->hasOne(FiscalYear::class, 'id', 'fiscal_year_id');
    }
}
