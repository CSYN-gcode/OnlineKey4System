<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\FiscalYear;

class AutoMailer extends Model
{
    protected $table = 'users';
    protected $connection = 'rapidx';
    
        // public function fiscal_year_id(){
        //     return $this->hasOne(FiscalYear::class, 'id', 'fiscal_year_id');
        // }
}
