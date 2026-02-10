<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use App\Exports\Sheets\export_monitoring;
use App\Exports\Sheets\export_ts;
use App\Exports\Sheets\export_cn;
use App\Exports\Sheets\export_yf;
use App\Exports\Sheets\export_pps;
use App\Exports\Sheets\export_sg;

class Export implements WithMultipleSheets
{
    public function __construct(
        $Energy_Target_Average,
        $Energy_PastFyActual_Average,
        $Water_Target_Average,
        $Water_PastFyActual_Average,
        $Paper_Target_Prod_Ream,
        $Paper_PastFyActual_Prod_Ream,
        $Paper_Target_SG_Ream,
        $Paper_PastActual_SG_Ream,
        $TotalPaper_Past_FY_Actual,
        $TotalPaper_Current_FY_Target,
        $Ink_Current_Target,
        $Ink_Past_Actual,
        $Energy_Target_Months,
        $Energy_Actual_Months,
        $Water_Fac1_Actual_Months,
        $Water_Fac2_Actual_Months,
        $Water_Fac1_MPCount_Months,
        $Water_Fac2_MPCount_Months,
        $Paper_Target_Months_Prod_Ream,
        $Paper_Actual_Months_Prod_Ream,
        $Paper_Target_SG_Months_Ream,
        $Paper_Actual_SG_Months_Ream,
        $Ink_Target_Months,
        $Ink_Actual_Months
    )
    {   
       $this->energy_target_ave = $Energy_Target_Average;
       $this->energy_pastfyactual_ave = $Energy_PastFyActual_Average;
       $this->water_target_ave = $Water_Target_Average;
       $this->water_pasftyactual_ave = $Water_PastFyActual_Average;
       $this->paper_target_prod = $Paper_Target_Prod_Ream;
       $this->paper_pastfyactual_prod = $Paper_PastFyActual_Prod_Ream;
       $this->paper_target_sg = $Paper_Target_SG_Ream;
       $this->paper_pastfyactual_sg = $Paper_PastActual_SG_Ream;
       $this->total_paper_pastfyactual = $TotalPaper_Past_FY_Actual;
       $this->total_paper_currentfytarget = $TotalPaper_Current_FY_Target;
       $this->ink_current_target = $Ink_Current_Target;
       $this->ink_past_actual = $Ink_Past_Actual;
       $this->energy_target_months = $Energy_Target_Months;
       $this->energy_actual_months = $Energy_Actual_Months;
       $this->water_fac1_actual_months = $Water_Fac1_Actual_Months;
       $this->water_fac2_actual_months = $Water_Fac2_Actual_Months;
       $this->water_fac1_mpcount_months = $Water_Fac1_MPCount_Months;
       $this->water_fac2_mpcount_months = $Water_Fac2_MPCount_Months;
       $this->paper_target_months_prod = $Paper_Target_Months_Prod_Ream;
       $this->paper_actual_months_prod = $Paper_Actual_Months_Prod_Ream;
       $this->paper_target_sg = $Paper_Target_SG_Months_Ream;
       $this->paper_actual_sg = $Paper_Actual_SG_Months_Ream;
       $this->ink_target_months = $Ink_Target_Months;
       $this->ink_actual_months = $Ink_Actual_Months;
    }

    public function sheets(): array
    {
        $sheets = [];

            //  FOR MONITORING SHEET
        $sheets[] = new export_monitoring(
            // $this->energy_test,
            $this->energy_target_ave,
            $this->energy_pastfyactual_ave,
            $this->water_target_ave,
            $this->water_pasftyactual_ave,
            $this->paper_target_prod,
            $this->paper_pastfyactual_prod,
            $this->paper_target_sg,
            $this->paper_pastfyactual_sg,
            $this->total_paper_pastfyactual,
            $this->total_paper_currentfytarget,
            $this->ink_current_target,
            $this->ink_past_actual,
            $this->energy_target_months,
            $this->energy_actual_months,
            $this->water_fac1_actual_months,
            $this->water_fac2_actual_months,
            $this->water_fac1_mpcount_months,
            $this->water_fac2_mpcount_months,
            $this->paper_target_months_prod,
            $this->paper_actual_months_prod,
            $this->paper_target_sg,
            $this->paper_actual_sg,
            $this->ink_target_months,
            $this->ink_actual_months
            );

            //  FOR TS SHEET
        // $sheets[] = new export_ts(
        //     // $this->energy_jan,
        //     // $this->energy_feb,
        //     // $this->energy_mar,
        //     // $this->energy_april,
        //     // $this->energy_may,
        //     // $this->energy_june, 
        //     // $this->energy_july,
        //     // $this->energy_aug,
        //     // $this->energy_sep,
        //     // $this->energy_oct,
        //     // $this->energy_nov,
        //     // $this->energy_dec
        //     );

        //     //  FOR CN SHEET
        // $sheets[] = new export_cn(
        //     // $this->energy_jan,
        //     // $this->energy_feb,
        //     // $this->energy_mar,
        //     // $this->energy_april,
        //     // $this->energy_may,
        //     // $this->energy_june, 
        //     // $this->energy_july,
        //     // $this->energy_aug,
        //     // $this->energy_sep,
        //     // $this->energy_oct,
        //     // $this->energy_nov,
        //     // $this->energy_dec
        //     );

        //     //  FOR YF SHEET
        // $sheets[] = new export_yf(
        //     // $this->energy_jan,
        //     // $this->energy_feb,
        //     // $this->energy_mar,
        //     // $this->energy_april,
        //     // $this->energy_may,
        //     // $this->energy_june, 
        //     // $this->energy_july,
        //     // $this->energy_aug,
        //     // $this->energy_sep,
        //     // $this->energy_oct,
        //     // $this->energy_nov,
        //     // $this->energy_dec
        //     );

        //     //  FOR PPS SHEET
        // $sheets[] = new export_pps(
        //     // $this->energy_jan,
        //     // $this->energy_feb,
        //     // $this->energy_mar,
        //     // $this->energy_april,
        //     // $this->energy_may,
        //     // $this->energy_june, 
        //     // $this->energy_july,
        //     // $this->energy_aug,
        //     // $this->energy_sep,
        //     // $this->energy_oct,
        //     // $this->energy_nov,
        //     // $this->energy_dec
        //     );

        //     //  FOR SG SHEET
        // $sheets[] = new export_sg(
        //     // $this->energy_jan,
        //     // $this->energy_feb,
        //     // $this->energy_mar,
        //     // $this->energy_april,
        //     // $this->energy_may,
        //     // $this->energy_june, 
        //     // $this->energy_july,
        //     // $this->energy_aug,
        //     // $this->energy_sep,
        //     // $this->energy_oct,
        //     // $this->energy_nov,
        //     // $this->energy_dec
        //     );
        // $sheets[] = new fy_summary($this->date, $this->plc_module_sa,$this->assessment_status_array_dic,$this->yec_date_arr,$this->first_half_affected_status_arr,$this->second_assessment_status_array_rf,$this->fu_affected_internal_control_arr,$this->second_assessment_status_array_fu);
        // $sheets[] = new firsthalf($this->date,$this->plc_module_sa_concerned_dept);
        // $sheets[] = new rollforward($this->date,$this->plc_module_rf_details);

        return $sheets;
    }
}