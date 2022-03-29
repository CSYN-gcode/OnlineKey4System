<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\MonthlyTargetPaperConsumption;
use App\MonthlyActualPaperConsumption;
use App\FiscalYear;
use App\PaperConsumption;

use DataTables;
use Carbon\Carbon;

class PaperConsumptionController extends Controller
{
    public function get_current_paper_data(Request $request) {

    if($request->fiscal_year == null) {
    $current_fy = FiscalYear::where('logdel', 0)
    ->get();

    $current_fy_id = $current_fy[0]->id;
    $current_fy_year = $current_fy[0]->fiscal_year;

    //============== APRIL =======================
    //====== TARGET =============================
    $paper_target_april = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'April')
    ->get();

    $target_april = array();
    for($i = 0; $i < count($paper_target_april); $i++) {
        $target_april[] = $paper_target_april[$i]->data_monthly_target;
    }
    $target_april = array_sum($target_april);

    $target_april_ream = $target_april / 500;
    $target_april_ream = number_format((float)$target_april_ream, 2, '.', '');
   
   
    //====== ACTUAL =============================
    $paper_actual_april = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'April')
    ->get();

    $actual_april = array();
    for($j = 0; $j < count($paper_actual_april); $j++) {
        $actual_april[] = $paper_actual_april[$j]->quantity;
    }

    $actual_april = array_sum($actual_april);

    $actual_april_ream = $actual_april / 500;
    $actual_april_ream = number_format((float)$actual_april_ream, 2, '.', '');

    $icon_april = '';
    
    if($target_april_ream > $actual_april_ream) {
        $icon_april .= '<i class="fas fa-arrow-down text-green"></i>';
    } elseif($target_april_ream == $actual_april_ream) {
        $icon_april .= '<i class="fa fa-minus text-blue"></i>';
    } elseif($target_april_ream < $actual_april_ream) {
        $icon_april .= '<i class="fas fa-arrow-up text-red"></i>';
    }
    //============== APRIL =======================



    //============== MAY =======================
    //====== TARGET =============================
    $paper_target_may = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'May')
    ->get();

    $target_may = array();
    for($i = 0; $i < count($paper_target_may); $i++) {
        $target_may[] = $paper_target_may[$i]->data_monthly_target;
    }
    $target_may = array_sum($target_may);

    $target_may_ream = $target_may / 500;
    $target_may_ream = number_format((float)$target_may_ream, 2, '.', '');


    //====== ACTUAL =============================
    $paper_actual_may = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'May')
    ->get();

    $actual_may = array();
    for($j = 0; $j < count($paper_actual_may); $j++) {
        $actual_may[] = $paper_actual_may[$j]->quantity;
    }

    $actual_may = array_sum($actual_may);

    $actual_may_ream = $actual_may / 500;
    $actual_may_ream = number_format((float)$actual_may_ream, 2, '.', '');

    $icon_may = '';
    
    if($target_may_ream > $actual_may_ream) {
        $icon_may .= '<i class="fas fa-arrow-down text-green"></i>';
    } elseif($target_may_ream == $actual_may_ream) {
        $icon_may .= '<i class="fa fa-minus text-blue"></i>';
    } elseif($target_may_ream < $actual_may_ream) {
        $icon_may .= '<i class="fas fa-arrow-up text-red"></i>';
    }
    //============== MAY =======================



    //============== JUNE =======================
    //======= TARGET ================
    $paper_target_june = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'June')
    ->get();

    $target_june = array();
    for($i = 0; $i < count($paper_target_june); $i++) {
        $target_june[] = $paper_target_june[$i]->data_monthly_target;
    }
    $target_june = array_sum($target_june);

    $target_june_ream = $target_june / 500;
    $target_june_ream = number_format((float)$target_june_ream, 2, '.', '');

    //====== ACTUAL =============================
    $paper_actual_june = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'June')
    ->get();

    $actual_june = array();
    for($j = 0; $j < count($paper_actual_june); $j++) {
        $actual_june[] = $paper_actual_june[$j]->quantity;
    }

    $actual_june = array_sum($actual_june);

    $actual_june_ream = $actual_june / 500;
    $actual_june_ream = number_format((float)$actual_june_ream, 2, '.', '');

    $icon_june = '';
    
    if($target_june_ream > $actual_june_ream) {
        $icon_june .= '<i class="fas fa-arrow-down text-green"></i>';
    } elseif($target_june_ream == $actual_june_ream) {
        $icon_june .= '<i class="fa fa-minus text-blue"></i>';
    } elseif($target_june_ream < $actual_june_ream) {
        $icon_june .= '<i class="fas fa-arrow-up text-red"></i>';
    }
    //============== JUNE =======================



    //============== JULY =======================
    //======= TARGET =================
    $paper_target_july = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'July')
    ->get();

    $target_july = array();
    for($i = 0; $i < count($paper_target_july); $i++) {
        $target_july[] = $paper_target_july[$i]->data_monthly_target;
    }
    $target_july = array_sum($target_july);

    $target_july_ream = $target_july / 500;
    $target_july_ream = number_format((float)$target_july_ream, 2, '.', '');

    //====== ACTUAL =============================
    $paper_actual_july = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'July')
    ->get();

    $actual_july = array();
    for($j = 0; $j < count($paper_actual_july); $j++) {
        $actual_july[] = $paper_actual_july[$j]->quantity;
    }

    $actual_july = array_sum($actual_july);

    $actual_july_ream = $actual_july / 500;
    $actual_july_ream = number_format((float)$actual_july_ream, 2, '.', '');

    $icon_july = '';
    
    if($target_july_ream > $actual_july_ream) {
        $icon_july .= '<i class="fas fa-arrow-down text-green"></i>';
    } elseif($target_july_ream == $actual_july_ream) {
        $icon_july .= '<i class="fa fa-minus text-blue"></i>';
    } elseif($target_july_ream < $actual_july_ream) {
        $icon_july .= '<i class="fas fa-arrow-up text-red"></i>';
    }
    //============== JULY =======================



    //============== AUGUST =======================
    //======= TARGET ========================
    $paper_target_august = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'August')
    ->get();

    $target_august = array();
    for($i = 0; $i < count($paper_target_august); $i++) {
        $target_august[] = $paper_target_august[$i]->data_monthly_target;
    }
    $target_august = array_sum($target_august);

    $target_august_ream = $target_august / 500;
    $target_august_ream = number_format((float)$target_august_ream, 2, '.', '');

    //====== ACTUAL =============================
    $paper_actual_august = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'August')
    ->get();

    $actual_august = array();
    for($j = 0; $j < count($paper_actual_august); $j++) {
        $actual_august[] = $paper_actual_august[$j]->quantity;
    }

    $actual_august = array_sum($actual_august);

    $actual_august_ream = $actual_august / 500;
    $actual_august_ream = number_format((float)$actual_august_ream, 2, '.', '');

    $icon_august = '';
    
    if($target_august_ream > $actual_august_ream) {
        $icon_august .= '<i class="fas fa-arrow-down text-green"></i>';
    } elseif($target_august_ream == $actual_august_ream) {
        $icon_august .= '<i class="fa fa-minus text-blue"></i>';
    } elseif($target_august_ream < $actual_august_ream) {
        $icon_august .= '<i class="fas fa-arrow-up text-red"></i>';
    }
    //============== AUGUST =======================



    //============== SEPTEMBER =======================
    //======= TARGET =============================
    $paper_target_september = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'September')
    ->get();

    $target_september = array();
    for($i = 0; $i < count($paper_target_september); $i++) {
        $target_september[] = $paper_target_september[$i]->data_monthly_target;
    }
    $target_september = array_sum($target_september);

    $target_september_ream = $target_september / 500;
    $target_september_ream = number_format((float)$target_september_ream, 2, '.', '');

    //====== ACTUAL =============================
    $paper_actual_september = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'September')
    ->get();

    $actual_september = array();
    for($j = 0; $j < count($paper_actual_september); $j++) {
        $actual_september[] = $paper_actual_september[$j]->quantity;
    }

    $actual_september = array_sum($actual_september);

    $actual_september_ream = $actual_september / 500;
    $actual_september_ream = number_format((float)$actual_september_ream, 2, '.', '');

    $icon_september = '';
    
    if($target_september_ream > $actual_september_ream) {
        $icon_september .= '<i class="fas fa-arrow-down text-green"></i>';
    } elseif($target_september_ream == $actual_september_ream) {
        $icon_september .= '<i class="fa fa-minus text-blue"></i>';
    } elseif($target_september_ream < $actual_september_ream) {
        $icon_september .= '<i class="fas fa-arrow-up text-red"></i>';
    }
    //============== SEPTEMBER =======================



    //============== OCTOBER =======================
    //======= TARGET ==============
    $paper_target_october = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'October')
    ->get();

    $target_october = array();
    for($i = 0; $i < count($paper_target_october); $i++) {
        $target_october[] = $paper_target_october[$i]->data_monthly_target;
    }
    $target_october = array_sum($target_october);

    $target_october_ream = $target_october / 500;
    $target_october_ream = number_format((float)$target_october_ream, 2, '.', '');

     //====== ACTUAL =============================
     $paper_actual_october = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
     ->where('month', 'October')
     ->get();
 
     $actual_october = array();
     for($j = 0; $j < count($paper_actual_october); $j++) {
         $actual_october[] = $paper_actual_october[$j]->quantity;
     }
 
     $actual_october = array_sum($actual_october);
 
     $actual_october_ream = $actual_october / 500;
     $actual_october_ream = number_format((float)$actual_october_ream, 2, '.', '');
 
     $icon_october = '';
     
     if($target_october_ream > $actual_october_ream) {
         $icon_october .= '<i class="fas fa-arrow-down text-green"></i>';
     } elseif($target_october_ream == $actual_october_ream) {
         $icon_october .= '<i class="fa fa-minus text-blue"></i>';
     } elseif($target_october_ream < $actual_october_ream) {
         $icon_october .= '<i class="fas fa-arrow-up text-red"></i>';
     }
    //============== OCTOBER =======================



    //============== NOVEMBER =======================
    //====== TARGET ============
    $paper_target_november = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'November')
    ->get();

    $target_november = array();
    for($i = 0; $i < count($paper_target_november); $i++) {
        $target_november[] = $paper_target_november[$i]->data_monthly_target;
    }
    $target_november = array_sum($target_november);

    $target_november_ream = $target_november / 500;
    $target_november_ream = number_format((float)$target_november_ream, 2, '.', '');


     //====== ACTUAL =============================
     $paper_actual_november = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
     ->where('month', 'November')
     ->get();
 
     $actual_november = array();
     for($j = 0; $j < count($paper_actual_november); $j++) {
         $actual_november[] = $paper_actual_november[$j]->quantity;
     }
 
     $actual_november = array_sum($actual_november);
 
     $actual_november_ream = $actual_november / 500;
     $actual_november_ream = number_format((float)$actual_november_ream, 2, '.', '');
 
     $icon_november = '';
     
     if($target_november_ream > $actual_november_ream) {
         $icon_november .= '<i class="fas fa-arrow-down text-green"></i>';
     } elseif($target_november_ream == $actual_november_ream) {
         $icon_november .= '<i class="fa fa-minus text-blue"></i>';
     } elseif($target_november_ream < $actual_november_ream) {
         $icon_november .= '<i class="fas fa-arrow-up text-red"></i>';
     }
    //============== NOVEMBER =======================



    //============== DECEMBER =======================
    //====== TARGET =============
    $paper_target_december = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'December')
    ->get();

    $target_december = array();
    for($i = 0; $i < count($paper_target_december); $i++) {
        $target_december[] = $paper_target_december[$i]->data_monthly_target;
    }
    $target_december = array_sum($target_december);

    $target_december_ream = $target_december / 500;
    $target_december_ream = number_format((float)$target_december_ream, 2, '.', '');

     //====== ACTUAL =============================
     $paper_actual_december = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
     ->where('month', 'December')
     ->get();
 
     $actual_december = array();
     for($j = 0; $j < count($paper_actual_december); $j++) {
         $actual_december[] = $paper_actual_december[$j]->quantity;
     }
 
     $actual_december = array_sum($actual_december);
 
     $actual_december_ream = $actual_december / 500;
     $actual_december_ream = number_format((float)$actual_december_ream, 2, '.', '');
 
     $icon_december = '';
     
     if($target_december_ream > $actual_december_ream) {
         $icon_december .= '<i class="fas fa-arrow-down text-green"></i>';
     } elseif($target_december_ream == $actual_december_ream) {
         $icon_december .= '<i class="fa fa-minus text-blue"></i>';
     } elseif($target_december_ream < $actual_december_ream) {
         $icon_december .= '<i class="fas fa-arrow-up text-red"></i>';
     }
    //============== DECEMBER =======================



    //============== JANUARY =======================
    //======= TARGET =============
    $paper_target_january = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'January')
    ->get();

    $target_january = array();
    for($i = 0; $i < count($paper_target_january); $i++) {
        $target_january[] = $paper_target_january[$i]->data_monthly_target;
    }
    $target_january = array_sum($target_january);

    $target_january_ream = $target_january / 500;
    $target_january_ream = number_format((float)$target_january_ream, 2, '.', '');

     //====== ACTUAL =============================
     $paper_actual_january = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
     ->where('month', 'January')
     ->get();
 
     $actual_january = array();
     for($j = 0; $j < count($paper_actual_january); $j++) {
         $actual_january[] = $paper_actual_january[$j]->quantity;
     }
 
     $actual_january = array_sum($actual_january);
 
     $actual_january_ream = $actual_january / 500;
     $actual_january_ream = number_format((float)$actual_january_ream, 2, '.', '');
 
     $icon_january = '';
     
     if($target_january_ream > $actual_january_ream) {
         $icon_january .= '<i class="fas fa-arrow-down text-green"></i>';
     } elseif($target_january_ream == $actual_january_ream) {
         $icon_january .= '<i class="fa fa-minus text-blue"></i>';
     } elseif($target_january_ream < $actual_january_ream) {
         $icon_january .= '<i class="fas fa-arrow-up text-red"></i>';
     }
    //============== JANUARY =======================



    //============== FEBRUARY =======================
    //======== TARGET =============
    $paper_target_february = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'February')
    ->get();

    $target_february = array();
    for($i = 0; $i < count($paper_target_february); $i++) {
        $target_february[] = $paper_target_february[$i]->data_monthly_target;
    }
    $target_february = array_sum($target_february);

    $target_february_ream = $target_february / 500;
    $target_february_ream = number_format((float)$target_february_ream, 2, '.', '');

     //====== ACTUAL =============================
     $paper_actual_february = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
     ->where('month', 'February')
     ->get();
 
     $actual_february = array();
     for($j = 0; $j < count($paper_actual_february); $j++) {
         $actual_february[] = $paper_actual_february[$j]->quantity;
     }
 
     $actual_february = array_sum($actual_february);
 
     $actual_february_ream = $actual_february / 500;
     $actual_february_ream = number_format((float)$actual_february_ream, 2, '.', '');
 
     $icon_february = '';
     
     if($target_february_ream > $actual_february_ream) {
         $icon_february .= '<i class="fas fa-arrow-down text-green"></i>';
     } elseif($target_february_ream == $actual_february_ream) {
         $icon_february .= '<i class="fa fa-minus text-blue"></i>';
     } elseif($target_february_ream < $actual_february_ream) {
         $icon_february .= '<i class="fas fa-arrow-up text-red"></i>';
     }
    //============== FEBRUARY =======================



    //============== MARCH =======================
    //======= TARGET ===========
    $paper_target_march = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'March')
    ->get();

    $target_march = array();
    for($i = 0; $i < count($paper_target_march); $i++) {
        $target_march[] = $paper_target_march[$i]->data_monthly_target;
    }
    $target_march = array_sum($target_march);

    $target_march_ream = $target_march / 500;
    $target_march_ream = number_format((float)$target_march_ream, 2, '.', '');

     //====== ACTUAL =============================
     $paper_actual_march = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
     ->where('month', 'March')
     ->get();
 
     $actual_march = array();
     for($j = 0; $j < count($paper_actual_march); $j++) {
         $actual_march[] = $paper_actual_march[$j]->quantity;
     }
 
     $actual_march = array_sum($actual_march);
 
     $actual_march_ream = $actual_march / 500;
     $actual_march_ream = number_format((float)$actual_march_ream, 2, '.', '');
 
     $icon_march = '';
     
     if($target_march_ream > $actual_march_ream) {
         $icon_march .= '<i class="fas fa-arrow-down text-green"></i>';
     } elseif($target_march_ream == $actual_march_ream) {
         $icon_march .= '<i class="fa fa-minus text-blue"></i>';
     } elseif($target_march_ream < $actual_march_ream) {
         $icon_march .= '<i class="fas fa-arrow-up text-red"></i>';
     }
    //============== MARCH =======================

    } else {
    $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
    ->first();

    $current_fy_id = $current_fy->id;
    $current_fy_year = $current_fy->fiscal_year;

    //============== APRIL =======================
    //====== TARGET =============================
    $paper_target_april = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'April')
    ->get();

    $target_april = array();
    for($i = 0; $i < count($paper_target_april); $i++) {
        $target_april[] = $paper_target_april[$i]->data_monthly_target;
    }
    $target_april = array_sum($target_april);

    $target_april_ream = $target_april / 500;
    $target_april_ream = number_format((float)$target_april_ream, 2, '.', '');
   
   
    //====== ACTUAL =============================
    $paper_actual_april = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'April')
    ->get();

    $actual_april = array();
    for($j = 0; $j < count($paper_actual_april); $j++) {
        $actual_april[] = $paper_actual_april[$j]->quantity;
    }

    $actual_april = array_sum($actual_april);

    $actual_april_ream = $actual_april / 500;
    $actual_april_ream = number_format((float)$actual_april_ream, 2, '.', '');

    $icon_april = '';
    
    if($target_april_ream > $actual_april_ream) {
        $icon_april .= '<i class="fas fa-arrow-down text-green"></i>';
    } elseif($target_april_ream == $actual_april_ream) {
        $icon_april .= '<i class="fa fa-minus text-blue"></i>';
    } elseif($target_april_ream < $actual_april_ream) {
        $icon_april .= '<i class="fas fa-arrow-up text-red"></i>';
    }
    //============== APRIL =======================



    //============== MAY =======================
    //====== TARGET =============================
    $paper_target_may = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'May')
    ->get();

    $target_may = array();
    for($i = 0; $i < count($paper_target_may); $i++) {
        $target_may[] = $paper_target_may[$i]->data_monthly_target;
    }
    $target_may = array_sum($target_may);

    $target_may_ream = $target_may / 500;
    $target_may_ream = number_format((float)$target_may_ream, 2, '.', '');


    //====== ACTUAL =============================
    $paper_actual_may = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'May')
    ->get();

    $actual_may = array();
    for($j = 0; $j < count($paper_actual_may); $j++) {
        $actual_may[] = $paper_actual_may[$j]->quantity;
    }

    $actual_may = array_sum($actual_may);

    $actual_may_ream = $actual_may / 500;
    $actual_may_ream = number_format((float)$actual_may_ream, 2, '.', '');

    $icon_may = '';
    
    if($target_may_ream > $actual_may_ream) {
        $icon_may .= '<i class="fas fa-arrow-down text-green"></i>';
    } elseif($target_may_ream == $actual_may_ream) {
        $icon_may .= '<i class="fa fa-minus text-blue"></i>';
    } elseif($target_may_ream < $actual_may_ream) {
        $icon_may .= '<i class="fas fa-arrow-up text-red"></i>';
    }
    //============== MAY =======================



    //============== JUNE =======================
    //======= TARGET ================
    $paper_target_june = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'June')
    ->get();

    $target_june = array();
    for($i = 0; $i < count($paper_target_june); $i++) {
        $target_june[] = $paper_target_june[$i]->data_monthly_target;
    }
    $target_june = array_sum($target_june);

    $target_june_ream = $target_june / 500;
    $target_june_ream = number_format((float)$target_june_ream, 2, '.', '');

    //====== ACTUAL =============================
    $paper_actual_june = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'June')
    ->get();

    $actual_june = array();
    for($j = 0; $j < count($paper_actual_june); $j++) {
        $actual_june[] = $paper_actual_june[$j]->quantity;
    }

    $actual_june = array_sum($actual_june);

    $actual_june_ream = $actual_june / 500;
    $actual_june_ream = number_format((float)$actual_june_ream, 2, '.', '');

    $icon_june = '';
    
    if($target_june_ream > $actual_june_ream) {
        $icon_june .= '<i class="fas fa-arrow-down text-green"></i>';
    } elseif($target_june_ream == $actual_june_ream) {
        $icon_june .= '<i class="fa fa-minus text-blue"></i>';
    } elseif($target_june_ream < $actual_june_ream) {
        $icon_june .= '<i class="fas fa-arrow-up text-red"></i>';
    }
    //============== JUNE =======================



    //============== JULY =======================
    //======= TARGET =================
    $paper_target_july = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'July')
    ->get();

    $target_july = array();
    for($i = 0; $i < count($paper_target_july); $i++) {
        $target_july[] = $paper_target_july[$i]->data_monthly_target;
    }
    $target_july = array_sum($target_july);

    $target_july_ream = $target_july / 500;
    $target_july_ream = number_format((float)$target_july_ream, 2, '.', '');

    //====== ACTUAL =============================
    $paper_actual_july = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'July')
    ->get();

    $actual_july = array();
    for($j = 0; $j < count($paper_actual_july); $j++) {
        $actual_july[] = $paper_actual_july[$j]->quantity;
    }

    $actual_july = array_sum($actual_july);

    $actual_july_ream = $actual_july / 500;
    $actual_july_ream = number_format((float)$actual_july_ream, 2, '.', '');

    $icon_july = '';
    
    if($target_july_ream > $actual_july_ream) {
        $icon_july .= '<i class="fas fa-arrow-down text-green"></i>';
    } elseif($target_july_ream == $actual_july_ream) {
        $icon_july .= '<i class="fa fa-minus text-blue"></i>';
    } elseif($target_july_ream < $actual_july_ream) {
        $icon_july .= '<i class="fas fa-arrow-up text-red"></i>';
    }
    //============== JULY =======================



    //============== AUGUST =======================
    //======= TARGET ========================
    $paper_target_august = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'August')
    ->get();

    $target_august = array();
    for($i = 0; $i < count($paper_target_august); $i++) {
        $target_august[] = $paper_target_august[$i]->data_monthly_target;
    }
    $target_august = array_sum($target_august);

    $target_august_ream = $target_august / 500;
    $target_august_ream = number_format((float)$target_august_ream, 2, '.', '');

    //====== ACTUAL =============================
    $paper_actual_august = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'August')
    ->get();

    $actual_august = array();
    for($j = 0; $j < count($paper_actual_august); $j++) {
        $actual_august[] = $paper_actual_august[$j]->quantity;
    }

    $actual_august = array_sum($actual_august);

    $actual_august_ream = $actual_august / 500;
    $actual_august_ream = number_format((float)$actual_august_ream, 2, '.', '');

    $icon_august = '';
    
    if($target_august_ream > $actual_august_ream) {
        $icon_august .= '<i class="fas fa-arrow-down text-green"></i>';
    } elseif($target_august_ream == $actual_august_ream) {
        $icon_august .= '<i class="fa fa-minus text-blue"></i>';
    } elseif($target_august_ream < $actual_august_ream) {
        $icon_august .= '<i class="fas fa-arrow-up text-red"></i>';
    }
    //============== AUGUST =======================



    //============== SEPTEMBER =======================
    //======= TARGET =============================
    $paper_target_september = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'September')
    ->get();

    $target_september = array();
    for($i = 0; $i < count($paper_target_september); $i++) {
        $target_september[] = $paper_target_september[$i]->data_monthly_target;
    }
    $target_september = array_sum($target_september);

    $target_september_ream = $target_september / 500;
    $target_september_ream = number_format((float)$target_september_ream, 2, '.', '');

    //====== ACTUAL =============================
    $paper_actual_september = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'September')
    ->get();

    $actual_september = array();
    for($j = 0; $j < count($paper_actual_september); $j++) {
        $actual_september[] = $paper_actual_september[$j]->quantity;
    }

    $actual_september = array_sum($actual_september);

    $actual_september_ream = $actual_september / 500;
    $actual_september_ream = number_format((float)$actual_september_ream, 2, '.', '');

    $icon_september = '';
    
    if($target_september_ream > $actual_september_ream) {
        $icon_september .= '<i class="fas fa-arrow-down text-green"></i>';
    } elseif($target_september_ream == $actual_september_ream) {
        $icon_september .= '<i class="fa fa-minus text-blue"></i>';
    } elseif($target_september_ream < $actual_september_ream) {
        $icon_september .= '<i class="fas fa-arrow-up text-red"></i>';
    }
    //============== SEPTEMBER =======================



    //============== OCTOBER =======================
    //======= TARGET ==============
    $paper_target_october = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'October')
    ->get();

    $target_october = array();
    for($i = 0; $i < count($paper_target_october); $i++) {
        $target_october[] = $paper_target_october[$i]->data_monthly_target;
    }
    $target_october = array_sum($target_october);

    $target_october_ream = $target_october / 500;
    $target_october_ream = number_format((float)$target_october_ream, 2, '.', '');

     //====== ACTUAL =============================
     $paper_actual_october = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
     ->where('month', 'October')
     ->get();
 
     $actual_october = array();
     for($j = 0; $j < count($paper_actual_october); $j++) {
         $actual_october[] = $paper_actual_october[$j]->quantity;
     }
 
     $actual_october = array_sum($actual_october);
 
     $actual_october_ream = $actual_october / 500;
     $actual_october_ream = number_format((float)$actual_october_ream, 2, '.', '');
 
     $icon_october = '';
     
     if($target_october_ream > $actual_october_ream) {
         $icon_october .= '<i class="fas fa-arrow-down text-green"></i>';
     } elseif($target_october_ream == $actual_october_ream) {
         $icon_october .= '<i class="fa fa-minus text-blue"></i>';
     } elseif($target_october_ream < $actual_october_ream) {
         $icon_october .= '<i class="fas fa-arrow-up text-red"></i>';
     }
    //============== OCTOBER =======================



    //============== NOVEMBER =======================
    //====== TARGET ============
    $paper_target_november = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'November')
    ->get();

    $target_november = array();
    for($i = 0; $i < count($paper_target_november); $i++) {
        $target_november[] = $paper_target_november[$i]->data_monthly_target;
    }
    $target_november = array_sum($target_november);

    $target_november_ream = $target_november / 500;
    $target_november_ream = number_format((float)$target_november_ream, 2, '.', '');


     //====== ACTUAL =============================
     $paper_actual_november = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
     ->where('month', 'November')
     ->get();
 
     $actual_november = array();
     for($j = 0; $j < count($paper_actual_november); $j++) {
         $actual_november[] = $paper_actual_november[$j]->quantity;
     }
 
     $actual_november = array_sum($actual_november);
 
     $actual_november_ream = $actual_november / 500;
     $actual_november_ream = number_format((float)$actual_november_ream, 2, '.', '');
 
     $icon_november = '';
     
     if($target_november_ream > $actual_november_ream) {
         $icon_november .= '<i class="fas fa-arrow-down text-green"></i>';
     } elseif($target_november_ream == $actual_november_ream) {
         $icon_november .= '<i class="fa fa-minus text-blue"></i>';
     } elseif($target_november_ream < $actual_november_ream) {
         $icon_november .= '<i class="fas fa-arrow-up text-red"></i>';
     }
    //============== NOVEMBER =======================



    //============== DECEMBER =======================
    //====== TARGET =============
    $paper_target_december = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'December')
    ->get();

    $target_december = array();
    for($i = 0; $i < count($paper_target_december); $i++) {
        $target_december[] = $paper_target_december[$i]->data_monthly_target;
    }
    $target_december = array_sum($target_december);

    $target_december_ream = $target_december / 500;
    $target_december_ream = number_format((float)$target_december_ream, 2, '.', '');

     //====== ACTUAL =============================
     $paper_actual_december = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
     ->where('month', 'December')
     ->get();
 
     $actual_december = array();
     for($j = 0; $j < count($paper_actual_december); $j++) {
         $actual_december[] = $paper_actual_december[$j]->quantity;
     }
 
     $actual_december = array_sum($actual_december);
 
     $actual_december_ream = $actual_december / 500;
     $actual_december_ream = number_format((float)$actual_december_ream, 2, '.', '');
 
     $icon_december = '';
     
     if($target_december_ream > $actual_december_ream) {
         $icon_december .= '<i class="fas fa-arrow-down text-green"></i>';
     } elseif($target_december_ream == $actual_december_ream) {
         $icon_december .= '<i class="fa fa-minus text-blue"></i>';
     } elseif($target_december_ream < $actual_december_ream) {
         $icon_december .= '<i class="fas fa-arrow-up text-red"></i>';
     }
    //============== DECEMBER =======================



    //============== JANUARY =======================
    //======= TARGET =============
    $paper_target_january = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'January')
    ->get();

    $target_january = array();
    for($i = 0; $i < count($paper_target_january); $i++) {
        $target_january[] = $paper_target_january[$i]->data_monthly_target;
    }
    $target_january = array_sum($target_january);

    $target_january_ream = $target_january / 500;
    $target_january_ream = number_format((float)$target_january_ream, 2, '.', '');

     //====== ACTUAL =============================
     $paper_actual_january = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
     ->where('month', 'January')
     ->get();
 
     $actual_january = array();
     for($j = 0; $j < count($paper_actual_january); $j++) {
         $actual_january[] = $paper_actual_january[$j]->quantity;
     }
 
     $actual_january = array_sum($actual_january);
 
     $actual_january_ream = $actual_january / 500;
     $actual_january_ream = number_format((float)$actual_january_ream, 2, '.', '');
 
     $icon_january = '';
     
     if($target_january_ream > $actual_january_ream) {
         $icon_january .= '<i class="fas fa-arrow-down text-green"></i>';
     } elseif($target_january_ream == $actual_january_ream) {
         $icon_january .= '<i class="fa fa-minus text-blue"></i>';
     } elseif($target_january_ream < $actual_january_ream) {
         $icon_january .= '<i class="fas fa-arrow-up text-red"></i>';
     }
    //============== JANUARY =======================



    //============== FEBRUARY =======================
    //======== TARGET =============
    $paper_target_february = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'February')
    ->get();

    $target_february = array();
    for($i = 0; $i < count($paper_target_february); $i++) {
        $target_february[] = $paper_target_february[$i]->data_monthly_target;
    }
    $target_february = array_sum($target_february);

    $target_february_ream = $target_february / 500;
    $target_february_ream = number_format((float)$target_february_ream, 2, '.', '');

     //====== ACTUAL =============================
     $paper_actual_february = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
     ->where('month', 'February')
     ->get();
 
     $actual_february = array();
     for($j = 0; $j < count($paper_actual_february); $j++) {
         $actual_february[] = $paper_actual_february[$j]->quantity;
     }
 
     $actual_february = array_sum($actual_february);
 
     $actual_february_ream = $actual_february / 500;
     $actual_february_ream = number_format((float)$actual_february_ream, 2, '.', '');
 
     $icon_february = '';
     
     if($target_february_ream > $actual_february_ream) {
         $icon_february .= '<i class="fas fa-arrow-down text-green"></i>';
     } elseif($target_february_ream == $actual_february_ream) {
         $icon_february .= '<i class="fa fa-minus text-blue"></i>';
     } elseif($target_february_ream < $actual_february_ream) {
         $icon_february .= '<i class="fas fa-arrow-up text-red"></i>';
     }
    //============== FEBRUARY =======================



    //============== MARCH =======================
    //======= TARGET ===========
    $paper_target_march = MonthlyTargetPaperConsumption::where('fiscal_year_id', $current_fy_id)
    ->where('month', 'March')
    ->get();

    $target_march = array();
    for($i = 0; $i < count($paper_target_march); $i++) {
        $target_march[] = $paper_target_march[$i]->data_monthly_target;
    }
    $target_march = array_sum($target_march);

    $target_march_ream = $target_march / 500;
    $target_march_ream = number_format((float)$target_march_ream, 2, '.', '');

     //====== ACTUAL =============================
     $paper_actual_march = MonthlyActualPaperConsumption::where('fiscal_year_id', $current_fy_id)
     ->where('month', 'March')
     ->get();
 
     $actual_march = array();
     for($j = 0; $j < count($paper_actual_march); $j++) {
         $actual_march[] = $paper_actual_march[$j]->quantity;
     }
 
     $actual_march = array_sum($actual_march);
 
     $actual_march_ream = $actual_march / 500;
     $actual_march_ream = number_format((float)$actual_march_ream, 2, '.', '');
 
     $icon_march = '';
     
     if($target_march_ream > $actual_march_ream) {
         $icon_march .= '<i class="fas fa-arrow-down text-green"></i>';
     } elseif($target_march_ream == $actual_march_ream) {
         $icon_march .= '<i class="fa fa-minus text-blue"></i>';
     } elseif($target_march_ream < $actual_march_ream) {
         $icon_march .= '<i class="fas fa-arrow-up text-red"></i>';
     }
    //============== MARCH =======================
    }
    

    return response()->json([
        'currentYear' => $current_fy_year,
        'iconApril' => $icon_april,
        'iconMay' => $icon_may,
        'iconJune' => $icon_june,
        'iconJuly' => $icon_july,
        'iconAugust' => $icon_august,
        'iconSeptember' => $icon_september,
        'iconOctober' => $icon_october,
        'iconNovember' => $icon_november,
        'iconDecember' => $icon_december,
        'iconJanuary' => $icon_january,
        'iconFebruary' => $icon_february,
        'iconMarch' => $icon_march,
        'paperTargetApril' => $target_april_ream,        
        'paperActualApril' => $actual_april_ream,
        'paperTargetMay' => $target_may_ream,        
        'paperActualMay' => $actual_may_ream,
        'paperTargetJune' => $target_june_ream,        
        'paperActualJune' => $actual_june_ream,
        'paperTargetJuly' => $target_july_ream,        
        'paperActualJuly' => $actual_july_ream,
        'paperTargetAugust' => $target_august_ream,        
        'paperActualAugust' => $actual_august_ream,
        'paperTargetSeptember' => $target_september_ream,        
        'paperActualSeptember' => $actual_september_ream,    
        'paperTargetOctober' => $target_october_ream,        
        'paperActualOctober' => $actual_october_ream,     
        'paperTargetNovember' => $target_november_ream,        
        'paperActualNovember' => $actual_november_ream,
        'paperTargetDecember' => $target_december_ream,        
        'paperActualDecember' => $actual_december_ream,
        'paperTargetJanuary' => $target_january_ream,        
        'paperActualJanuary' => $actual_january_ream,
        'paperTargetFebruary' => $target_february_ream,        
        'paperActualFebruary' => $actual_february_ream,
        'paperTargetMarch' => $target_march_ream,        
        'paperActualMarch' => $actual_march_ream
    ]);
    }

    public function insert_paper_target(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        if (!isset($request->paper_id)) {
            $rules = [
                'department' => 'required',
                'month' => 'required',
                'paper_target' => 'required'
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                if (PaperConsumption::where('fiscal_year_id', $request->fiscal_year)->where('month', $request->month)->where('department', $request->department)->exists()) {
                    return response()->json(['result' => "2"]);
                } else {
                    $insert_paper_target = [
                        'month' => $request->month,
                        'target' => $request->paper_target,
                        'fiscal_year_id' => $request->fiscal_year,
                        'department' => $request->department,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'created_at' => date('Y-m-d H:i:s'),
                    ];

                    PaperConsumption::insert(
                        $insert_paper_target
                    );
                    return response()->json(['result' => "1"]);
                }
            } else {
                return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
            }
        } else {
            $rules = [
                'department' => 'required',
                'month' => 'required',
                'paper_target' => 'required'
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                $update_paper_target = [
                    'month' => $request->month,
                    'target' => $request->paper_target,
                    'fiscal_year_id' => $request->fiscal_year,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                if (isset($request->paper_id)) {
                    PaperConsumption::where('id', $request->paper_id)->update(
                        $update_paper_target
                    );
                }
                return response()->json(['result' => "1"]);
            } else {
                return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
            }
        }
    }

    public function view_paper_consumption() {
        $paper_consumptions = PaperConsumption::with(['fiscal_year_id'])->get();

        return DataTables::of($paper_consumptions)
            ->addColumn('month', function ($paper_consumption) {
                $result = '';

                if ($paper_consumption->month == 1) {
                    $result .= '<tr value="10">January<input class="month_name" type="hidden" style="width:0%;" value="10"> </tr>';
                } elseif ($paper_consumption->month == 2) {
                    $result .= '<tr value="11">February<input class="month_name" type="hidden" style="width:0%;" value="11"> </tr>';
                } elseif ($paper_consumption->month == 3) {
                    $result .= '<tr value="12">March<input class="month_name" type="hidden" style="width:0%;" value="12"> </tr>';
                } elseif ($paper_consumption->month == 4) {
                    $result .= '<tr value="1">April<input class="month_name" type="hidden" style="width:0%;" value="1"> </tr>';
                } elseif ($paper_consumption->month == 5) {
                    $result .= '<tr value="2">May<input class="month_name" type="hidden" style="width:0%;" value="2"> </tr>';
                } elseif ($paper_consumption->month == 6) {
                    $result .= '<tr value="3">June<input class="month_name" type="hidden" style="width:0%;" value="3"> </tr>';
                } elseif ($paper_consumption->month == 7) {
                    $result .= '<tr value="4">July<input class="month_name" type="hidden" style="width:0%;" value="4"> </tr>';
                } elseif ($paper_consumption->month == 8) {
                    $result .= '<tr value="5">August<input class="month_name" type="hidden" style="width:0%;" value="5"> </tr>';
                } elseif ($paper_consumption->month == 9) {
                    $result .= '<tr value="6">September<input class="month_name" type="hidden" style="width:0%;" value="6"> </tr>';
                } elseif ($paper_consumption->month == 10) {
                    $result .= '<tr value="7">October<input class="month_name" type="hidden" style="width:0%;" value="7"> </tr>';
                } elseif ($paper_consumption->month == 11) {
                    $result .= '<tr value="8">November<input class="month_name" type="hidden" style="width:0%;" value="8"> </tr>';
                } elseif ($paper_consumption->month == 12) {
                    $result .= '<tr value="9">December<input class="month_name" type="hidden" style="width:0%;" value="9"> </tr>';
                }

                return $result;
            })
            ->addColumn('year', function ($paper_consumption) {
                $result = Carbon::parse($paper_consumption->created_at)->year;

                return $result;
            })
            ->addColumn('action', function ($paper_consumption) {
                $result = '';

                $result = '<center><div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Action">
                    <i class="fas fa-cog"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdownCustom">'; // dropdown-menu start
                $result .= '<button class="dropdown-item text-center actionEditPaperConsumptionTarget" type="button" paper-id="' . $paper_consumption->id . '" data-toggle="modal" data-target="#modalPaperTarget" data-keyboard="false">Edit Target</button>';
                    if ($paper_consumption->actual == null) {
                      
                        $result .= '<button class="dropdown-item text-center actionAddPaperConsumption" type="button" paper-id="' . $paper_consumption->id . '"  data-toggle="modal" data-target="#modalPaperConsumption" data-keyboard="false">Add Actual</button>';

                    } else {
                        $result .= '<button class="dropdown-item text-center actionEditPaperConsumption" type="button" paper-id="' . $paper_consumption->id . '" data-toggle="modal" data-target="#modalPaperConsumption" data-keyboard="false">Edit Actual</button>';
                    }
                    $result .= '</div>'; // dropdown-menu end
                    $result .= '</div>'; // div end
                    
                    '</center>';
                return $result;
            })
            ->addColumn('status', function ($paper_consumption) {
                $result = '';
                $paper_target = $paper_consumption->target;
                $paper_actual = $paper_consumption->actual;


                if ($paper_actual == NULL) {
                    $result .= '<center><span class="badge badge-pill badge-secondary">No Actual Consumption Data</span></center>';

                } elseif($paper_actual > $paper_target) {
                    $result .= '<center><span class="badge badge-pill badge-danger">Off Target</span></center>';
                 
                } else if ($paper_actual == $paper_target) {
                    $result .= '<center><span class="badge badge-pill badge-primary">On Target</span></center>';

                } else if ($paper_actual < $paper_target) {
                    $result .= '<center><span class="badge badge-pill badge-success">Under</span></center>';

                } 

                return $result;
            })
            ->rawColumns(['month', 'year', 'action', 'status']) // to format the added columns(status & action) as html format
            ->make(true);
    }

    public function get_paper_target_by_id(Request $request) {
        $paper_target_details = PaperConsumption::where('id', $request->targetId)->get();
        return response()->json(['result' => $paper_target_details]);
    }

    public function insert_paper_actual(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

            $rules = [
                'paper_consumption' => 'required'
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                $update_paper_actual = [
                    'actual' => $request->paper_consumption,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                    PaperConsumption::where('id', $request->paper_id)->update(
                        $update_paper_actual
                    );
            
                return response()->json(['result' => "1"]);
            } else {
                return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
            }
    }

    public function get_current_paper_data_ts(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();
        
            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 3 (TS) ======//
            $paper_consumption_ts = PaperConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '3')
            ->get();

           return response()->json(['result' => $paper_consumption_ts, 'currentYear' => $current_fy_year]);


        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();
        
            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $paper_consumption_ts = PaperConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '3')
            ->get();

           return response()->json(['result' => $paper_consumption_ts, 'currentYear' => $current_fy_year]);
        }
    }

    public function get_current_paper_data_cn(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();
        
            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 1 (CN) ======//
            $paper_consumption_cn = PaperConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '1')
            ->get();

           return response()->json(['result' => $paper_consumption_cn, 'currentYear' => $current_fy_year]);


        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();
        
            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $paper_consumption_cn = PaperConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '1')
            ->get();

           return response()->json(['result' => $paper_consumption_cn, 'currentYear' => $current_fy_year]);
        }
    }

    public function get_current_paper_data_yf(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();
        
            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 4 (YF) ======//
            $paper_consumption_yf = PaperConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '4')
            ->get();

           return response()->json(['result' => $paper_consumption_yf, 'currentYear' => $current_fy_year]);


        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();
        
            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $paper_consumption_yf = PaperConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '4')
            ->get();

           return response()->json(['result' => $paper_consumption_yf, 'currentYear' => $current_fy_year]);
        }
    }

    public function get_current_paper_data_pps(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();
        
            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 2 (PPS) ======//
            $paper_consumption_pps = PaperConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '2')
            ->get();

           return response()->json(['result' => $paper_consumption_pps, 'currentYear' => $current_fy_year]);


        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();
        
            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $paper_consumption_pps = PaperConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '2')
            ->get();

           return response()->json(['result' => $paper_consumption_pps, 'currentYear' => $current_fy_year]);
        }
    }

}
