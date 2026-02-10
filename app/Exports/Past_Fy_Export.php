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

class Past_Fy_Export implements WithMultipleSheets
{
    public function __construct(
        // //current fiscal year
        // $CurrentFY,
        // //test
        // $Energy,
        // // energy target
        $YearlyTarget,
        $Energy_PastFyActual_ave,
        $Energy_CurrentFyActual_ave,
        $Water_PastFyActual_ave,
        $Water_CurrentFyActual_ave,
        $Energy_jan, 
        $Energy_feb, 
        $Energy_mar, 
        $Energy_april, 
        $Energy_may, 
        $Energy_june, 
        $Energy_july, 
        $Energy_aug, 
        $Energy_sep, 
        $Energy_oct, 
        $Energy_nov, 
        $Energy_dec
    )
    {   
        // $this->current_fy = $CurrentFY;
        // $this->energy_test = $Energy;
        $this->Yearly_Target = $YearlyTarget;
        $this->energy_pastFyActual_ave = $Energy_PastFyActual_ave;
        $this->energy_currentFyActual_ave = $Energy_CurrentFyActual_ave;
        $this->water_pastFyActual_ave = $Water_PastFyActual_ave;
        $this->water_currentFyActual_ave = $Water_CurrentFyActual_ave;
        $this->energy_jan = $Energy_jan;
        $this->energy_feb = $Energy_feb;
        $this->energy_mar = $Energy_mar;
        $this->energy_april = $Energy_april;
        $this->energy_may = $Energy_may;
        $this->energy_june = $Energy_june;
        $this->energy_july = $Energy_july;
        $this->energy_aug = $Energy_aug;
        $this->energy_sep = $Energy_sep;
        $this->energy_oct = $Energy_oct;
        $this->energy_nov = $Energy_nov;
        $this->energy_dec = $Energy_dec;
    }

    public function sheets(): array
    {
        $sheets = [];

            //  FOR MONITORING SHEET
        $sheets[] = new export_monitoring(
            // $this->energy_test,
            $this->Yearly_Target,
            $this->energy_pastFyActual_ave,
            $this->energy_currentFyActual_ave,
            $this->water_pastFyActual_ave,
            $this->water_currentFyActual_ave,
            $this->energy_jan,
            $this->energy_feb,
            $this->energy_mar,
            $this->energy_april,
            $this->energy_may,
            $this->energy_june, 
            $this->energy_july,
            $this->energy_aug,
            $this->energy_sep,
            $this->energy_oct,
            $this->energy_nov,
            $this->energy_dec
            );

            //  FOR TS SHEET
        $sheets[] = new export_ts(
            $this->energy_jan,
            $this->energy_feb,
            $this->energy_mar,
            $this->energy_april,
            $this->energy_may,
            $this->energy_june, 
            $this->energy_july,
            $this->energy_aug,
            $this->energy_sep,
            $this->energy_oct,
            $this->energy_nov,
            $this->energy_dec
            );

            //  FOR CN SHEET
        $sheets[] = new export_cn(
            $this->energy_jan,
            $this->energy_feb,
            $this->energy_mar,
            $this->energy_april,
            $this->energy_may,
            $this->energy_june, 
            $this->energy_july,
            $this->energy_aug,
            $this->energy_sep,
            $this->energy_oct,
            $this->energy_nov,
            $this->energy_dec
            );

            //  FOR YF SHEET
        $sheets[] = new export_yf(
            $this->energy_jan,
            $this->energy_feb,
            $this->energy_mar,
            $this->energy_april,
            $this->energy_may,
            $this->energy_june, 
            $this->energy_july,
            $this->energy_aug,
            $this->energy_sep,
            $this->energy_oct,
            $this->energy_nov,
            $this->energy_dec
            );

            //  FOR PPS SHEET
        $sheets[] = new export_pps(
            $this->energy_jan,
            $this->energy_feb,
            $this->energy_mar,
            $this->energy_april,
            $this->energy_may,
            $this->energy_june, 
            $this->energy_july,
            $this->energy_aug,
            $this->energy_sep,
            $this->energy_oct,
            $this->energy_nov,
            $this->energy_dec
            );

            //  FOR SG SHEET
        $sheets[] = new export_sg(
            $this->energy_jan,
            $this->energy_feb,
            $this->energy_mar,
            $this->energy_april,
            $this->energy_may,
            $this->energy_june, 
            $this->energy_july,
            $this->energy_aug,
            $this->energy_sep,
            $this->energy_oct,
            $this->energy_nov,
            $this->energy_dec
            );
        // $sheets[] = new fy_summary($this->date, $this->plc_module_sa,$this->assessment_status_array_dic,$this->yec_date_arr,$this->first_half_affected_status_arr,$this->second_assessment_status_array_rf,$this->fu_affected_internal_control_arr,$this->second_assessment_status_array_fu);
        // $sheets[] = new firsthalf($this->date,$this->plc_module_sa_concerned_dept);
        // $sheets[] = new rollforward($this->date,$this->plc_module_rf_details);

        return $sheets;
    }
}