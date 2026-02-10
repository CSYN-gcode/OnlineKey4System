<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FiscalYear;
use Carbon\Carbon;

class FiscalYearController extends Controller
{
    public function get_fiscal_year()
    {
        $fiscal_year = FiscalYear::where('logdel', 0)
            ->get();

        $current_fiscal_year = $fiscal_year[0]->id;
        
        return response()->json(['fiscal_year' => $current_fiscal_year]);
    }

    public function transition_fy() {
        $fiscal_year = FiscalYear::where('logdel', 0)
            ->get();

        $current_fiscal_year_id = $fiscal_year[0]->id;
        $current_fiscal_year = $fiscal_year[0]->fiscal_year;

        FiscalYear::insert([
            'fiscal_year' => $current_fiscal_year + 1,
            'logdel' => 0 
        ]);

        FiscalYear::where('id', $current_fiscal_year_id)
        ->update([
            'logdel' => 1
        ]);
    
        return response()->json(['fiscal_year' => $current_fiscal_year]);
    }

    public function get_current_fy() {
        $fiscal_year = FiscalYear::where('logdel', 0)
        ->get();

        $current_fiscal_year_id = $fiscal_year[0]->id;
        $current_fiscal_year = $fiscal_year[0]->fiscal_year; 

        $month_now = Carbon::now()->format('F');

        return response()->json(['fiscal_year' => $current_fiscal_year, 'current_month' => $month_now]);

    }
}
