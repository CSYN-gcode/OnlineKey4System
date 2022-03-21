<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FiscalYear;
use App\EnergyConsumption;

class FiscalYearController extends Controller
{
    public function get_fiscal_year()
    {
        $fiscal_year = FiscalYear::where('logdel', 0)
            ->get();

        $current_fiscal_year = $fiscal_year[0]->id;

        return response()->json(['fiscal_year' => $current_fiscal_year]);
    }
}
