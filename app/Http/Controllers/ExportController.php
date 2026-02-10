<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


use DataTables;
use App\Exports\Export;
use App\Exports\Past_Fy_Export;
use App\ActionPlan;
use App\EnergyConsumption;
use App\WaterConsumption;
use App\InkConsumption;
use App\PaperConsumption;
use App\FiscalYear;
use App\YearlyTarget;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\MonthlyTargetPaperConsumption;
use App\MonthlyActualPaperConsumption;

class ExportController extends Controller
{
    // public function get_past_fy(Request $request){

    //   $pastfy = FiscalYear::where('logdel', '!=', 0)->get();
    //   return response()->json(['past_fiscal_year' => $pastfy]);
    // }

    public function excel(Request $month)
    {
      $data = $month->all();
      // GET CURRENT FY
      $Month = $month->month;
      // return $data;

      $CurrentFY = FiscalYear::where('logdel' , 0)->value('id');
      $count = '-1';
      $pastFy = $CurrentFY + $count;

      //1 GET ENERGY PAST FY ACTUAL ALL ==================
      $Energy_PastFyActual = EnergyConsumption::where('fiscal_year_id', $pastFy)->avg('actual');
      // $Energy_PastFyActual_ave = $Energy_PastFyActual->avg('actual');
      $Energy_PastFyActual_Average = number_format((float)$Energy_PastFyActual, 2, '.', '');
      
      //2 + 2.1 GET ENERGY CURRENT FY TARGET ALL ==================
      $Energy_Total = EnergyConsumption::where('fiscal_year_id', $CurrentFY)->get();
      $Energy_Target_Average = $Energy_Total->avg('target');
      $Energy_Target_Average = number_format((float)$Energy_Target_Average, 2, '.', '');

      //2.1
      $Energy_Actual_Average = $Energy_Total->avg('actual');
      $Energy_Actual_Average = number_format((float)$Energy_Actual_Average, 2, '.', '');

      //3 - 4 CURRENT FY -> ENERGY MONTHLY DATA
      for($i = 1; $i <= 12 ; $i++) {
        // $Energy_Months[$i] = EnergyConsumption::where('fiscal_year_id', $CurrentFY)->where('month', $i)->get();
        $Energy_Target_Months[$i] = EnergyConsumption::where('fiscal_year_id', $CurrentFY)->where('month', $i)->value('target');
        $Energy_Actual_Months[$i] = EnergyConsumption::where('fiscal_year_id', $CurrentFY)->where('month', $i)->value('actual');
        }
        
      //5 GET WATER PAST FY ACTUAL ALL ==================
      $Water_PastFyActual = WaterConsumption::with('fiscal_year')->whereHas('fiscal_year', function($query) use ($pastFy){ $query->where('id', $pastFy); })->get();
      $Water_Months_Count =  $Water_PastFyActual->count('month'); //Past FY Count of Months with data
      $Water_MP_Count = $Water_PastFyActual->count('factory_1_manpower') + $Water_PastFyActual->count('factory_2_manpower'); //Past FY Count of Manpower
      $Water_MP_Sum = $Water_PastFyActual->sum('factory_1_manpower') + $Water_PastFyActual->sum('factory_2_manpower'); //Past FY Sum of Manpower
      $Water_pastfyactual_count = $Water_PastFyActual->count('factory_1_actual') + $Water_PastFyActual->count('factory_2_actual'); //Past FY Count of Actual Consumption
      $Water_PastFyActual_sum = $Water_PastFyActual->sum('factory_1_actual') + $Water_PastFyActual->sum('factory_2_actual'); //Past FY Sum of Actual Consumption
      
        if($Water_PastFyActual_sum == null || $Water_MP_Count == 0 || $Water_pastfyactual_count == 0 || $Water_Months_Count == 0){
          $Water_PastFyActual_Average = 0;
        }
        else{
          // $Water_MPCount[$i] = $Water_MPCount_fac1[$i] + $Water_MPCount_fac2[$i];
          $Water_PastFyActual_mp_ave = $Water_MP_Sum / $Water_MP_Count; // Average of Manpower
          $Water_PastFyActual_actual_ave = $Water_PastFyActual_sum / $Water_pastfyactual_count; // Average of Actual Consumption
          $Water_PastFyActual_actualpermp_ave = $Water_PastFyActual_actual_ave / $Water_PastFyActual_mp_ave; // Average of Actual Consumption per Manpower
          $Water_PastFyActual_ave = $Water_PastFyActual_actualpermp_ave / $Water_Months_Count; // Total/FY Average of Actual Consumption per Manpower
          $Water_PastFyActual_Average = number_format((float)$Water_PastFyActual_ave, 2, '.', ''); 
          // return $Water_PastFyActual_ave;
        }
      
      //6 - 6.a GET WATER CURRENT FY TARGET ALL ==================
      $Water_Target_Total = WaterConsumption::where('fiscal_year_id', $CurrentFY)->get();
      $Water_Target_Average = $Water_Target_Total->avg('target');
      $Water_Target_Average = number_format((float)$Water_Target_Average, 2, '.', '');
      $Water_Target_Sum = $Water_Target_Total->sum('target');
      $Water_Target_Sum = number_format((float)$Water_Target_Sum, 2, '.', '');
      

      //6.1, 6.2, 6.3, GET WATER CURRENT FY ACTUAL ALL
      $Water_Actual_Total = WaterConsumption::where('fiscal_year_id', $CurrentFY)->get();
      $Water_Months_Count =  $Water_Actual_Total->count('month'); //Past FY Count of Months with data
      $Water_MP_Count = $Water_Actual_Total->count('factory_1_manpower') + $Water_Actual_Total->count('factory_2_manpower'); //Past FY Count of Manpower
      $Water_MP_Sum = $Water_Actual_Total->sum('factory_1_manpower') + $Water_Actual_Total->sum('factory_2_manpower'); //Past FY Sum of Manpower
      $Water_Actual_count = $Water_Actual_Total->count('factory_1_actual') + $Water_Actual_Total->count('factory_2_actual'); //Past FY Count of Actual Consumption
      $Water_Actual_sum = $Water_Actual_Total->sum('factory_1_actual') + $Water_Actual_Total->sum('factory_2_actual'); //Past FY Sum of Actual Consumption
      
      if($Water_MP_Sum === null && $Water_Actual_sum === null){
        $Water_Actual_mp_ave =  ''; 
        $Water_Actual_consumption_ave = '';
        $Water_Actual_Average = '';
      }
      elseif($Water_MP_Sum === 0 && $Water_Actual_sum === 0){
        $Water_Actual_mp_ave = 0;
        $Water_Actual_consumption_ave = 0; 
        $Water_Actual_Average = 0;
      }
      elseif($Water_MP_Count == null || $Water_Actual_count == null || $Water_Months_Count == null){
        $Water_Actual_mp_ave = 0;
        $Water_Actual_consumption_ave = 0; 
        $Water_Actual_Average = 0;
      }
      else{
        // $Water_MPCount[$i] = $Water_MPCount_fac1[$i] + $Water_MPCount_fac2[$i];
        $Water_Actual_mp_ave = $Water_MP_Sum / $Water_MP_Count; // Average of Manpower  ////ettto
        $Water_Actual_consumption_ave = $Water_Actual_sum / $Water_Actual_count; // Average of Actual Consumption   ///eettto
        $Water_Actual_actualpermp_ave = $Water_Actual_consumption_ave / $Water_Actual_mp_ave; // Average of Actual Consumption per Manpower
        $Water_Actual_ave = $Water_Actual_actualpermp_ave / $Water_Months_Count; // Total/FY Average of Actual Consumption per Manpower
        $Water_Actual_Average = number_format((float)$Water_Actual_ave, 2, '.', ''); 
      }
        // if($Water_MP_Sum == null || $Water_Actual_sum == null){
        //   $Water_Actual_Average = '';
        // }
        // else

      // $Water_Target_Total_count = WaterConsumption::where('fiscal_year_id', $CurrentFY)->count('target');
      // if($Water_Target_Average = null){
      //   $Water_Target_Average = 0;
      // }
      // else{
      //   // $Water_Target_Average =  $Water_Target_Total_sum / $Water_Target_Total_count;
      //   $Water_Target_Average = number_format((float)$Water_Target_Average, 2, '.', '');
      // }
      // $Water_Target_Average = $Water_Target_Total->sum('target') / $Water_Target_Total->count('target');
      // return $Water_Target_Average;

      //7 - 11 CURRENT FY -> WATER MONTHLY DATA
      for($i = 1; $i <= 12 ; $i++) {
        // $Water_Months[$i] = WaterConsumption::where('fiscal_year_id', $CurrentFY)->where('month', $i)->get();
        $Water_Target_Months[$i] = WaterConsumption::where('fiscal_year_id', $CurrentFY)->where('month', $i)->value('target');
        $Water_Fac1_Actual_Months[$i] = WaterConsumption::where('fiscal_year_id', $CurrentFY)->where('month', $i)->value('factory_1_actual'); 
        $Water_Fac2_Actual_Months[$i] = WaterConsumption::where('fiscal_year_id', $CurrentFY)->where('month', $i)->value('factory_2_actual');
        $Water_Fac1_MPCount_Months[$i] = WaterConsumption::where('fiscal_year_id', $CurrentFY)->where('month', $i)->value('factory_1_manpower');
        $Water_Fac2_MPCount_Months[$i] = WaterConsumption::where('fiscal_year_id', $CurrentFY)->where('month', $i)->value('factory_2_manpower');
        
        //water actualconsumtion per month ====
        if($Water_Fac1_Actual_Months[$i] === null && $Water_Fac2_Actual_Months[$i] === null){
          $Water_Actual_Months[$i] = '';
        }
        elseif($Water_Fac1_Actual_Months[$i] === 0 && $Water_Fac2_Actual_Months[$i] === 0){
          $Water_Actual_Months[$i] = '0';
        }
        else{
          $Water_Actual_Months[$i] = $Water_Fac1_Actual_Months[$i] + $Water_Fac2_Actual_Months[$i];
        }

        //water actualmp per month =====
        if($Water_Fac1_MPCount_Months[$i] === null && $Water_Fac2_MPCount_Months[$i] === null){
          $Water_MPCount_Months[$i] = '';
        }
        elseif($Water_Fac1_MPCount_Months[$i] === 0 && $Water_Fac2_MPCount_Months[$i] === 0){
          $Water_MPCount_Months[$i] = '0';
        }
        else{
          $Water_MPCount_Months[$i] = $Water_Fac1_MPCount_Months[$i] + $Water_Fac2_MPCount_Months[$i];
        }

        //water actualpermanpower per month =====
        if($Water_Actual_Months[$i] == null && $Water_MPCount_Months[$i] == null){
          $Water_Actualpermp_Months[$i] = '';
        }
        elseif($Water_MPCount_Months[$i] == 0){
          $Water_Actualpermp_Months[$i] = '0';
        }
        elseif($Water_MPCount_Months[$i] === 0 && $Water_Actual_Months[$i] === 0){
          $Water_Actualpermp_Months[$i] = '0';
        }
        // elseif($Water_Actual_Months[$i] == 0 && $Water_MPCount_Months[$i] == 0){
        //   $Water_Actualpermp_Months[$i] = '0';
          
        // }
        // elseif($Water_Actual_Months[$i] === '' && $Water_MPCount_Months[$i] === ''){
        //   $Water_Actualpermp_Months[$i] = '';
        // }
        else{
          $Water_Actualpermp_Months[$i] = $Water_Actual_Months[$i] / $Water_MPCount_Months[$i];
        }
      }
      // return $Water_Fac1_MPCount_Months[4];

      //12 GET PAPER PAST FY ACTUAL FOR PRODUCTION
      for($i = 1; $i <= 4 ; $i++) {
        $Paper_PastFyActual_Prod_Ream[$i] = PaperConsumption::where('fiscal_year_id', $pastFy)->where('department', $i)->sum('actual');
        // $Paper_PastFyActual_Prod_Ream[$i] = $Paper_PastFyActual_Prod[$i] / 500;
        // $Paper_PastFyActual_Prod_Ream[$i] = number_format((float)$Paper_PastFyActual_Prod[$i], 2, '.', '');
      }

      // return $Paper_PastFyActual_Prod_Ream[4];
     
      //13 GET PAPER PAST FY ACTUAL FOR SG
      $Paper_PastActual_SG = MonthlyActualPaperConsumption::where('fiscal_year_id', $pastFy)->sum('quantity');
      $Paper_PastActual_SG_Ream = $Paper_PastActual_SG / 500;
      // $Paper_PastActual_SG_Ream = number_format((float)$Paper_PastActual_SG_Ream, 2, '.', '');   
      // return $Paper_PastActual_SG_Ream;

      //14 PAST FY TOTAL ACTUAL 
      $TotalPaper_Past_FY_Actual =  $Paper_PastActual_SG_Ream + $Paper_PastFyActual_Prod_Ream[1] + $Paper_PastFyActual_Prod_Ream[2] + $Paper_PastFyActual_Prod_Ream[3] + $Paper_PastFyActual_Prod_Ream[4];

      //15 GET PAPER CURRENT FY TARGET FOR PRODUCTION 
      for($i = 1; $i <= 4 ; $i++) {
        $Paper_Target_Prod_Ream[$i] = PaperConsumption::where('fiscal_year_id', $CurrentFY)->where('department', $i)->sum('target');
        // $Paper_Target_Prod_Ream[$i] = $Paper_Target_Prod[$i] / 500;
        // $Paper_Target_Prod_Ream[$i] = number_format((float)$Paper_Target_Prod[$i], 2, '.', '');
      } 
      // return $Paper_Target_Prod_Ream[4];

      //16 GET PAPER CURRENT FY TARGET FOR SG    
      $Paper_Target_SG = MonthlyTargetPaperConsumption::where('fiscal_year_id', $CurrentFY)->sum('data_monthly_target');
      $Paper_Target_SG_Ream = $Paper_Target_SG / 500;
      // $Paper_Target_SG_Ream = number_format((float)$Paper_Target_SG_Ream, 2, '.', '');
      // return $Paper_Target_SG_Ream;
      
      //17 CURRENT FY TOTAL TARGET 
      $TotalPaper_Current_FY_Target =  $Paper_Target_SG_Ream + $Paper_Target_Prod_Ream[1] + $Paper_Target_Prod_Ream[2] + $Paper_Target_Prod_Ream[3] + $Paper_Target_Prod_Ream[4];
      // return $Total_PaperTarget;

      //18 CURRENT FY -> PAPER MONTHLY TARGET FOR PRODUCTION
      $Paper_Target_Months_Prod_Ream = array();
      for($i = 1; $i <= 4 ; $i++){
        // $months = array(1, 2, 3, 4);
        // $Paper_Target_Months_Prod_Ream[$i] = PaperConsumption::where('fiscal_year_id', $CurrentFY)->where('department', $months[$i])->where('month', 1)->get();
          for($j = 1; $j <= 12 ; $j++){
            $Paper_Target_Months[$j] = PaperConsumption::where('fiscal_year_id', $CurrentFY)->where('department', $i)->where('month',$j)->value('target');
            array_push($Paper_Target_Months_Prod_Ream, $Paper_Target_Months[$j]);
          }
          
        // $Paper_Target_Months_Prod_Reams[$i] = $Paper_Target_Months_Prod[$i] / 500;
        // $Paper_Target_Months_Prod_Ream[$i] = number_format((float)$Paper_Target_Months_Prod_Reams[$i], 2, '.', '');
      } 
      // return $Paper_Target_Months_Prod_Ream;

      //19 CURRENT FY -> PAPER MONTHLY TARGET FOR SG
        $months = array('January','February','March','April','May','June','July','August','September','October','November','December');
      for($i = 0; $i < 12 ; $i++){     
        $Paper_Target_Months_SG[$i] = MonthlyTargetPaperConsumption::where('fiscal_year_id', $CurrentFY)->where('month', $months[$i])->sum('data_monthly_target');
        $Paper_Target_Months_SG_Ream[$i] = $Paper_Target_Months_SG[$i] / 500;
        // $Paper_Actual_Months_Prod_Ream[$i] = number_format((float)$Paper_Actual_Months_Prod_Reams[$i], 2, '.', '');
      }
      // return $Paper_Target_Months_SG_Ream;
  
      //20 CURRENT FY -> PAPER MONTHLY ACTUAL FOR PROD
      $Paper_Actual_Months_Prod_Ream = array();
      for($i = 1; $i <= 4 ; $i++){
        // $months = array(1, 2, 3, 4);
        // $Paper_Target_Months_Prod_Ream[$i] = PaperConsumption::where('fiscal_year_id', $CurrentFY)->where('department', $months[$i])->where('month', 1)->get();
          for($j = 1; $j <= 12 ; $j++){
            $Paper_Actual_Months[$j] = PaperConsumption::where('fiscal_year_id', $CurrentFY)->where('department', $i)->where('month',$j)->value('actual');
            array_push($Paper_Actual_Months_Prod_Ream, $Paper_Actual_Months[$j]);
          }
        // $Paper_Target_Months_Prod_Reams[$i] = $Paper_Target_Months_Prod[$i] / 500;
        // $Paper_Target_Months_Prod_Ream[$i] = number_format((float)$Paper_Target_Months_Prod_Reams[$i], 2, '.', '');
      } 

      // return $Paper_Actual_Months_Prod_Ream;

      // for($i = 1; $i <= 4 ; $i++) {
      //   $months = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
      //   $Paper_Actual_Months_Prod_Ream[$i] = PaperConsumption::where('fiscal_year_id', $CurrentFY)->where('department', $i)->where('month', $months[$i])->get();
      //   // for($j = 1; $j <= 12 ; $j++){
      //   //   $Paper_Actual_Months_Prod[$j] = PaperConsumption::where('fiscal_year_id', $CurrentFY)->where('department', $Paper_Actual_Dep_Prod[$i])->where('month' ,$j)->pluck('actual');
      //   // }
      // }

        // // $Paper_Target_SG_Months_Reams[$i] = $Paper_Target_SG[$i] / 500;
        // $Paper_Target_SG_Months_Ream[$i] = number_format((float)$Paper_Target_SG_Months_Reams[$i], 2, '.', '');

      //21 CURRENT FY -> PAPER MONTHLY ACTUAL FOR SG
      $months = array('January','February','March','April','May','June','July','August','September','October','November','December');
      for($i = 0; $i < 12 ; $i++){     
        $Paper_Actual_Months_SG[$i] = MonthlyActualPaperConsumption::where('fiscal_year_id', $CurrentFY)->where('month', $months[$i])->sum('quantity');
        $Paper_Actual_Months_SG_Ream[$i] = $Paper_Actual_Months_SG[$i] / 500;
        // $Paper_Actual_Months_Prod_Ream[$i] = number_format((float)$Paper_Actual_Months_Prod_Reams[$i], 2, '.', '');
      }
      // for($i = 1; $i <= 12 ; $i++)  {
      //   $Paper_Actual_Months_SG_Ream[$i] = MonthlyActualPaperConsumption::where('fiscal_year_id', $CurrentFY)->where('month', $i)->pluck('quantity');
      //   // $Paper_Actual_SG_Months_Reams[$i] = $Paper_Actual_SG[$i] / 500;
      //   // $Paper_Actual_SG_Months_Ream[$i] = number_format((float)$Paper_Actual_SG_Months_Reams[$i], 2, '.', '');
      // }
      

      //22 GET INK PAST FY ACTUAL FOR PRODUCTION
      for($i = 1; $i <= 14 ; $i++) {
        $Ink_Past_Actual[$i] = InkConsumption::where('fiscal_year_id', $pastFy)->where('department', $i)->sum('actual');
      }
      // return $Ink_Target[1];

      //23 GET INK FY CURRENT TARGET FOR PRODUCTION
      for($i = 1; $i <= 14 ; $i++) {
        $Ink_Current_Target[$i] = InkConsumption::where('fiscal_year_id', $CurrentFY)->where('department', $i)->sum('target');
      }
      // return $Ink_Target[4];

      // //24 - 25 CURRENT FY -> INK MONTHLY DATA
      // for($i = 1; $i <= 12 ; $i++)  {
      // $Ink_Target_Months[$i] = InkConsumption::where('fiscal_year_id', $CurrentFY)->where('month', $i)->pluck('target');
      // $Ink_Actual_Months[$i] = InkConsumption::where('fiscal_year_id', $CurrentFY)->where('month', $i)->pluck('actual');
      // }

      //24 CURRENT FY -> INK MONTHLY TARGET
      $Ink_Target_Months = array();
      for($i = 1; $i <= 14 ; $i++){
        $Ink_Target_Months_drafts = array();
        // $months = array(1, 2, 3, 4);
        // $Paper_Target_Months_Prod_Ream[$i] = PaperConsumption::where('fiscal_year_id', $CurrentFY)->where('department', $months[$i])->where('month', 1)->get();
          for($j = 1; $j <= 12 ; $j++){
            $Ink_Target[$j] = InkConsumption::where('fiscal_year_id', $CurrentFY)->where('department', $i)->where('month',$j)->value('target');
            array_push($Ink_Target_Months_drafts, $Ink_Target[$j]);
          }
          array_push($Ink_Target_Months, $Ink_Target_Months_drafts);
        // $Paper_Target_Months_Prod_Reams[$i] = $Paper_Target_Months_Prod[$i] / 500;
        // $Paper_Target_Months_Prod_Ream[$i] = number_format((float)$Paper_Target_Months_Prod_Reams[$i], 2, '.', '');
      }
      // return $Ink_Target_Months;

      //25 CURRENT FY -> INK MONTHLY ACTUAL
      $Ink_Actual_Months = array();
      for($i = 1; $i <= 14 ; $i++){
        // $months = array(1, 2, 3, 4);
        $Ink_Actual_Months_drafts = array();
        // $Paper_Target_Months_Prod_Ream[$i] = PaperConsumption::where('fiscal_year_id', $CurrentFY)->where('department', $months[$i])->where('month', 1)->get();
          for($j = 1; $j <= 12 ; $j++){
            $Ink_Actual[$j] = InkConsumption::where('fiscal_year_id', $CurrentFY)->where('department', $i)->where('month',$j)->value('actual');
            array_push($Ink_Actual_Months_drafts, $Ink_Actual[$j]);
          }
          // $Ink_Actual_Months[] = $Ink_Actual_Months_drafts;
          array_push($Ink_Actual_Months, $Ink_Actual_Months_drafts);
        // $Paper_Target_Months_Prod_Reams[$i] = $Paper_Target_Months_Prod[$i] / 500;
        // $Paper_Target_Months_Prod_Ream[$i] = number_format((float)$Paper_Target_Months_Prod_Reams[$i], 2, '.', '');
      }
      // return $Ink_Actual_Months;

      // GET CURRENT FY
      $CurrentFY_year = FiscalYear::where('logdel' , 0)->value('fiscal_year');
      $count_year = '-1';
      $pastFy_year = $CurrentFY_year + $count_year;

      //12 GET PAPER PAST FY TARGET FOR PRODUCTION
      for($i = 1; $i <= 4 ; $i++) {
        $Paper_PastFyTarget_Prod_Ream[$i] = PaperConsumption::where('fiscal_year_id', $pastFy)->where('department', $i)->sum('actual');
        // $Paper_PastFyActual_Prod_Ream[$i] = $Paper_PastFyActual_Prod[$i] / 500;
        // $Paper_PastFyActual_Prod_Ream[$i] = number_format((float)$Paper_PastFyActual_Prod[$i], 2, '.', '');
      }

      //16.123 GET PAPER PAST FY TARGET FOR SG    
      $Paper_PastFyTarget_SG = MonthlyTargetPaperConsumption::where('fiscal_year_id', $CurrentFY)->sum('data_monthly_target');
      $Paper_PastFyTarget_SG_Ream = $Paper_PastFyTarget_SG / 500;

      //1.123 GET ENERGY PAST FY TARGET ALL ==================
      $Energy_PastFyTarget = EnergyConsumption::where('fiscal_year_id', $pastFy)->avg('target');
      // $Energy_PastFyActual_ave = $Energy_PastFyActual->avg('actual');
      $Energy_PastFyTarget_Average = number_format((float)$Energy_PastFyTarget, 2, '.', '');

      //6 - 6.a GET WATER PAST FY TARGET ALL ==================
      $Water_PastFyTarget_Total = WaterConsumption::where('fiscal_year_id', $pastFy)->get();
      $Water_PastFyTarget_Average = $Water_PastFyTarget_Total->avg('target');
      $Water_PastFyTarget_Average = number_format((float)$Water_PastFyTarget_Average, 2, '.', '');

      $ActionPlan_array = array();
      for($i = 0; $i < count(ActionPlan::where('fiscal_year_id', $CurrentFY)->get()) ; $i++) {
      $ActionPlan[$i] = ActionPlan::where('fiscal_year_id', $CurrentFY)->where('logdel', 0)->get();
      $ActionPlan_array = $ActionPlan[$i];

      // return $ActionPlan_array;
      }
      return Excel::download(new Export(

          // GET CURRENT FY
          $Month,
          $Energy_PastFyActual_Average,
          $Energy_Target_Average,
          $Energy_Actual_Average, //2.1
          $Energy_Target_Months,
          $Energy_Actual_Months,
          $Water_PastFyActual_Average,
          $Water_Target_Average,
          $Water_Target_Sum,
          $Water_Actual_mp_ave, //6.1
          $Water_Actual_consumption_ave, //6.2
          $Water_Actual_Average, //6.3
          $Water_Target_Months,
          $Water_Actual_Months,
          $Water_MPCount_Months,
          $Water_Actualpermp_Months,
          // $Water_Fac1_Actual_Months,
          // $Water_Fac2_Actual_Months,
          // $Water_Fac1_MPCount_Months,
          // $Water_Fac2_MPCount_Months,
          $Paper_PastFyActual_Prod_Ream,
          $Paper_PastActual_SG_Ream,
          $TotalPaper_Past_FY_Actual,
          $Paper_Target_Prod_Ream,
          $Paper_Target_SG_Ream,
          $TotalPaper_Current_FY_Target,
          $Paper_Target_Months_Prod_Ream,
          $Paper_Target_Months_SG_Ream,
          $Paper_Actual_Months_Prod_Ream,
          $Paper_Actual_Months_SG_Ream,
          $Ink_Past_Actual,
          $Ink_Current_Target,
          $Ink_Target_Months,
          $Ink_Actual_Months,
          $CurrentFY_year,
          $pastFy_year,
          $Paper_PastFyTarget_Prod_Ream,
          $Paper_PastFyTarget_SG_Ream,
          $Energy_PastFyTarget_Average,
          $Water_PastFyTarget_Average,
          $ActionPlan_array
          // $Paper_Target_Prod,
          // $Paper_PastFyActual_Prod,
          // $Paper_Target_SG,
          // $Paper_PastActual_SG,
          
          // $Paper_Target_Months_Prod_Ream,
          // $Paper_Actual_Months_Prod_Ream,
          // $Paper_Target_SG_Months_Ream,
          // $Paper_Actual_SG_Months_Ream,
          
          ),
          'Key-4 Report.xlsx');
    }

  public function past_fy_excel(Request $fy_id){

      // $CurrentFY = FiscalYear::where('logdel' , 0)->value('id');
      // $count = '-1';
      // $pastFy = $CurrentFY + $count;

      // $Water_PastFyActual_average = EnergyConsumption::with('fiscal_year')->whereHas('fiscal_year', function($query) use ($pastFy){ $query->where('id', $pastFy); })->get();
      // $Water_PastFyActual_ave1 = $Water_PastFyActual_average->avg('actual');
      // $Water_PastFyActual_ave = round($Water_PastFyActual_ave1, 2);
      
      $fy_id1 = $fy_id;

      return $fy_id1;

      // return Excel::download(new Past_Fy_Export(

      //     $Energy_PastFyActual_ave,
      //     $Water_PastFyActual_ave,
        
      //     ),
      //     'Key-4 Report.xlsx');
    // }

  }

  public function insert_action_plan(Request $request) {
    date_default_timezone_set('Asia/Manila');
    session_start();

    $data = $request->all();

    if (!isset($request->actionplan_id)) {
        $rules = [
            'action' => 'required',
            'person' => 'required',
            'month' => 'required',
            'remarks' => 'required'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            // if (ActionPlan::where('fiscal_year_id', $request->fiscal_year)->where('month', $request->month)->where('logdel', 0)->exists()) {
            //     return response()->json(['result' => "2"]);
            // } else {
                $insert_action_plan = [
                    'action' => $request->action,
                    'person' => $request->person,
                    'month' => $request->month,
                    'remarks' => $request->remarks,
                    'fiscal_year_id' => $request->fiscal_year,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                ];

                ActionPlan::insert(
                    $insert_action_plan
                );
                return response()->json(['result' => "1"]);
            // }
        } else {
            return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
        }
    } else {
      $rules = [
        'action' => 'required',
        'person' => 'required',
        'month' => 'required',
        'remarks' => 'required'
      ];

        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            $update_action_plan = [
              'action' => $request->action,
              'person' => $request->person,
              'month' => $request->month,
              'remarks' => $request->remarks,
              'fiscal_year_id' => $request->fiscal_year,
              'updated_at' => date('Y-m-d H:i:s'),
            ];

            $picked_data = ActionPlan::where('id', $request->actionplan_id)->get();
            $picked_month = $picked_data[0]->month;

            // if (isset($request->actionplan_id)) {
                // if (ActionPlan::where('fiscal_year_id', $request->fiscal_year)->where('month', $request->month)->exists() && $request->month != $picked_month) {
                    // return response()->json(['result' => 0]);
                // }else{
                    ActionPlan::where('id', $request->actionplan_id)->update($update_action_plan);
                    return response()->json(['result' => "1"]);
                // }
            // }
        } else {
            return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
        }
    }
  } 

  public function get_action_plan_by_id(Request $request) {
    $action_plan_details = ActionPlan::where('id', $request->ActionPlanId)->get();
    return response()->json(['result' => $action_plan_details]);
  }

  public function view_action_plan() {
    $action_plans = ActionPlan::with(['fiscal_year_id'])->where('logdel', 0)->get();

    return DataTables::of($action_plans)
        ->addColumn('action', function ($action_plan) {
          $result = '';

          $result = $action_plan->action;

          return $result;
        })
        ->addColumn('person', function ($action_plan) {
          $result = '';

          $result = $action_plan->person;

          return $result;
        })
        ->addColumn('month', function ($action_plan) {
            $result = '';

            if ($action_plan->month == 1) {
                $result .= '<tr value="10">January<input class="month_name" type="hidden" style="width:0%;" value="10"> </tr>';
            } elseif ($action_plan->month == 2) {
                $result .= '<tr value="11">February<input class="month_name" type="hidden" style="width:0%;" value="11"> </tr>';
            } elseif ($action_plan->month == 3) {
                $result .= '<tr value="12">March<input class="month_name" type="hidden" style="width:0%;" value="12"> </tr>';
            } elseif ($action_plan->month == 4) {
                $result .= '<tr value="1">April<input class="month_name" type="hidden" style="width:0%;" value="1"> </tr>';
            } elseif ($action_plan->month == 5) {
                $result .= '<tr value="2">May<input class="month_name" type="hidden" style="width:0%;" value="2"> </tr>';
            } elseif ($action_plan->month == 6) {
                $result .= '<tr value="3">June<input class="month_name" type="hidden" style="width:0%;" value="3"> </tr>';
            } elseif ($action_plan->month == 7) {
                $result .= '<tr value="4">July<input class="month_name" type="hidden" style="width:0%;" value="4"> </tr>';
            } elseif ($action_plan->month == 8) {
                $result .= '<tr value="5">August<input class="month_name" type="hidden" style="width:0%;" value="5"> </tr>';
            } elseif ($action_plan->month == 9) {
                $result .= '<tr value="6">September<input class="month_name" type="hidden" style="width:0%;" value="6"> </tr>';
            } elseif ($action_plan->month == 10) {
                $result .= '<tr value="7">October<input class="month_name" type="hidden" style="width:0%;" value="7"> </tr>';
            } elseif ($action_plan->month == 11) {
                $result .= '<tr value="8">November<input class="month_name" type="hidden" style="width:0%;" value="8"> </tr>';
            } elseif ($action_plan->month == 12) {
                $result .= '<tr value="9">December<input class="month_name" type="hidden" style="width:0%;" value="9"> </tr>';
            }
            return $result;
        })
        ->addColumn('remarks', function ($action_plan) {
          $result = '';

          $result = $action_plan->remarks;

          return $result;
        })
        ->addColumn('action_btn', function ($action_plan) {
            $result = '';

            $result = '<center><div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Action">
                <i class="fas fa-cog"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdownCustom">'; // dropdown-menu start
            $result .= '<button class="dropdown-item text-center EditActionPlan" type="button" actionplan-id="' . $action_plan->id . '" get_fiscal_year_id="'.$action_plan->fiscal_year_id.'" data-toggle="modal" data-target="#modalActionPlan" data-keyboard="false">Edit Action Plan</button>';
                // if ($action_plan->actual == null) {
                  
                    // $result .= '<button class="dropdown-item text-center actionAddEnergyConsumption" type="button" energy-id="' . $action_plan->id . '"  data-toggle="modal" data-target="#modalEnergyConsumption" data-keyboard="false">Add Actual</button>';

                // } else {
                    // $result .= '<button class="dropdown-item text-center actionEditEnergyConsumption" type="button" energy-id="' . $action_plan->id . '" data-toggle="modal" data-target="#modalEnergyConsumption" data-keyboard="false">Edit Actual</button>';
                // }
                $result .= '</div>'; // dropdown-menu end
                $result .= '</div>'; // div end
                
                '</center>';
            return $result;
        })
        ->rawColumns(['action', 'person', 'month','remarks', 'action_btn']) // to format the added columns(status & action) as html format
        ->make(true);
}

}
