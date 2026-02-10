<?php

namespace App\Exports\Sheets;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

use PhpOffice\PhpSpreadsheet\Style\Alignment;

class export_action_plan implements FromView, WithEvents, WithTitle, WithColumnFormatting
{
    public function __construct(

        $Month,
        $Energy_PastFyActual_Average,
        $Energy_Target_Average,
        $Energy_Target_Months,
        $Energy_Actual_Months,

        $Water_PastFyActual_Average,
        $Water_Target_Average,
        $Water_Target_Months,
        $Water_Actualpermp_Months,

        $Paper_PastActual_SG_Ream,
        $Paper_Target_SG_Ream,
        $Paper_Target_Months_SG_Ream,
        $Paper_Actual_Months_SG_Ream,
        
        $CurrentFY_year,
        $pastFy_year,
        $Paper_PastFyTarget_SG_Ream,
        $Energy_PastFyTarget_Average,
        $Water_PastFyTarget_Average,
        $ActionPlan_array
    )
    {   
       $this->selected_month = $Month;
       $this->energy_pastfyactual_ave = $Energy_PastFyActual_Average; 
       $this->energy_target_ave = $Energy_Target_Average;
       $this->energy_target_months = $Energy_Target_Months;
       $this->energy_actual_months = $Energy_Actual_Months;

       $this->water_pasftyactual_ave = $Water_PastFyActual_Average;
       $this->water_target_ave = $Water_Target_Average;
       $this->water_target_months = $Water_Target_Months;
       $this->water_actualpermp_months = $Water_Actualpermp_Months;

       $this->paper_pastfyactual_sg = $Paper_PastActual_SG_Ream;
       $this->paper_target_sg = $Paper_Target_SG_Ream;
       $this->paper_target_months_sg = $Paper_Target_Months_SG_Ream;
       $this->paper_actual_months_sg = $Paper_Actual_Months_SG_Ream;
       
       $this->current_fy_year = $CurrentFY_year;
       $this->past_fy_year = $pastFy_year;
       $this->paper_pastfytarget_sg = $Paper_PastFyTarget_SG_Ream;
       $this->energy_pastfytarget_ave = $Energy_PastFyTarget_Average;
       $this->water_pastfytarget_ave = $Water_PastFyTarget_Average;
       $this->action_plan = $ActionPlan_array;
    }

    public function registerEvents(): array
    {
        $energy_pastfyactual = $this->energy_pastfyactual_ave;
        $energy_target =  $this->energy_target_ave;
        $energy_target_months = $this->energy_target_months;
        $energy_actual_months = $this->energy_actual_months;

        $water_pastfyactual = $this->water_pasftyactual_ave;
        $water_target = $this->water_target_ave;
        $water_target_months = $this->water_target_months;
        $water_actual_months = $this->water_actualpermp_months;

        $paper_pastfyactual = $this->paper_pastfyactual_sg;
        $paper_target = $this->paper_target_sg;
        $paper_target_months = $this->paper_target_months_sg;
        $paper_actual_months = $this->paper_actual_months_sg;
        $ActionPlan = $this->action_plan;

        $styleHeader = [
            'font' => [
                'bold' => true
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                    'color' => ['rgb' => '#000000']
                ],
            ]
        ];

        $stylecell = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                    'color' => ['rgb' => '#000000']
                ],
            ]
        ];

        $style_center = array(
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        );

        $style_center_right = array(
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_RIGHT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        );

        return [
           
            AfterSheet::class => function(AfterSheet $event) use ($styleHeader,$stylecell,$style_center,$style_center_right,
                                                                $energy_pastfyactual,$energy_target,$energy_target_months,$energy_actual_months,
                                                                $water_pastfyactual,$water_target,$water_target_months,$water_actual_months,
                                                                $paper_pastfyactual,$paper_target,$paper_target_months,$paper_actual_months,$ActionPlan){

                $event->sheet->getColumnDimension('AC')->setWidth(60);
                $event->sheet->getColumnDimension('AD')->setWidth(10);
                $event->sheet->getColumnDimension('AE')->setWidth(25);
                $event->sheet->getColumnDimension('AF')->setWidth(12);
                $event->sheet->getColumnDimension('AG')->setWidth(12);
                $event->sheet->getColumnDimension('AH')->setWidth(12);
                $event->sheet->getColumnDimension('AI')->setWidth(12);
                $event->sheet->getColumnDimension('AJ')->setWidth(12);
                $event->sheet->getColumnDimension('AK')->setWidth(12);
                $event->sheet->getColumnDimension('AL')->setWidth(12);
                $event->sheet->getColumnDimension('AM')->setWidth(12);
                $event->sheet->getColumnDimension('AN')->setWidth(12);
                $event->sheet->getColumnDimension('AO')->setWidth(12);
                $event->sheet->getColumnDimension('AP')->setWidth(12);
                $event->sheet->getColumnDimension('AQ')->setWidth(12);
                $event->sheet->getColumnDimension('AR')->setWidth(12);
                $event->sheet->getColumnDimension('AS')->setWidth(12);
                $event->sheet->getColumnDimension('A')->setWidth(20);
                $event->sheet->getColumnDimension('B')->setWidth(5);
                $event->sheet->getColumnDimension('C')->setWidth(20);
                $event->sheet->getColumnDimension('D')->setWidth(60);
                $event->sheet->getColumnDimension('E')->setWidth(25);
                $event->sheet->getColumnDimension('R')->setWidth(45);
                $event->sheet->getColumnDimension('S')->setWidth(30);
                $event->sheet->getColumnDimension('T')->setWidth(25);
                $event->sheet->getColumnDimension('U')->setWidth(25);
                $event->sheet->getColumnDimension('V')->setWidth(25);
                $event->sheet->getColumnDimension('W')->setWidth(25);

                $event->sheet->getRowDimension('1')->setRowHeight(25);
                $event->sheet->getRowDimension('2')->setRowHeight(25);
                $event->sheet->getRowDimension('3')->setRowHeight(60);
                $event->sheet->getRowDimension('4')->setRowHeight(25);
                $event->sheet->getRowDimension('5')->setRowHeight(20);
                $event->sheet->getRowDimension('6')->setRowHeight(25);
                $event->sheet->getRowDimension('7')->setRowHeight(25);
                $event->sheet->getRowDimension('8')->setRowHeight(25);
                $event->sheet->getRowDimension('9')->setRowHeight(25);
                $event->sheet->getRowDimension('10')->setRowHeight(25);
                $event->sheet->getRowDimension('11')->setRowHeight(25);
                $event->sheet->getRowDimension('12')->setRowHeight(60);
                $event->sheet->getRowDimension('13')->setRowHeight(50);
                $event->sheet->getRowDimension('14')->setRowHeight(50);
                $event->sheet->getRowDimension('15')->setRowHeight(50);
                $event->sheet->getRowDimension('16')->setRowHeight(50);
                $event->sheet->getRowDimension('17')->setRowHeight(50);
                $event->sheet->getRowDimension('18')->setRowHeight(50);
                $event->sheet->getRowDimension('19')->setRowHeight(50);
                $event->sheet->getRowDimension('20')->setRowHeight(50);
                $event->sheet->getRowDimension('21')->setRowHeight(50);
                $event->sheet->getRowDimension('22')->setRowHeight(50);

                $event->sheet->getDelegate()->getStyle('A4:A11')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('B5:D11')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('E5:H11')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('I5:Q11')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('R13:R22')->getAlignment()->setWrapText(true);
                
                $event->sheet->getStyle("A4:A11")->getAlignment()->setTextRotation(-90);
                $event->sheet->getStyle("F12:F12")->getAlignment()->setTextRotation(-90);
                $event->sheet->getStyle("G12:G12")->getAlignment()->setTextRotation(-90);
                $event->sheet->getStyle("H12:H12")->getAlignment()->setTextRotation(-90);
                $event->sheet->getStyle("I12:I12")->getAlignment()->setTextRotation(-90);
                $event->sheet->getStyle("J12:J12")->getAlignment()->setTextRotation(-90);
                $event->sheet->getStyle("K12:K12")->getAlignment()->setTextRotation(-90);
                $event->sheet->getStyle("L12:L12")->getAlignment()->setTextRotation(-90);
                $event->sheet->getStyle("M12:M12")->getAlignment()->setTextRotation(-90);
                $event->sheet->getStyle("N12:N12")->getAlignment()->setTextRotation(-90);
                $event->sheet->getStyle("O12:O12")->getAlignment()->setTextRotation(-90);
                $event->sheet->getStyle("P12:P12")->getAlignment()->setTextRotation(-90);
                $event->sheet->getStyle("Q12:Q12")->getAlignment()->setTextRotation(-90);
                // $event->sheet->getStyle("A2:A3")->applyFromArray($stylecell);
                // $event->sheet->getStyle("A4:A11")->applyFromArray($stylecell);
                // $event->sheet->getStyle("A12:A12")->applyFromArray($stylecell);
                // $event->sheet->getStyle("C1:D1")->applyFromArray($stylecell);
                // $event->sheet->getStyle("B2:D2")->applyFromArray($stylecell);
                // $event->sheet->getStyle("B3:D3")->applyFromArray($stylecell);
                // $event->sheet->getStyle("B4:D4")->applyFromArray($stylecell);
                // $event->sheet->getStyle("B5:D11")->applyFromArray($stylecell);
                // $event->sheet->getStyle("B12:D12")->applyFromArray($stylecell);
                // $event->sheet->getStyle("E1:H1")->applyFromArray($stylecell);
                // $event->sheet->getStyle("E2:H2")->applyFromArray($stylecell);
                // $event->sheet->getStyle("E3:H3")->applyFromArray($stylecell);
                // $event->sheet->getStyle("E4:H4")->applyFromArray($stylecell);
                // $event->sheet->getStyle("E5:H11")->applyFromArray($stylecell);
                // $event->sheet->getStyle("E12:E12")->applyFromArray($stylecell);
                // $event->sheet->getStyle("I1:Q1")->applyFromArray($stylecell);
                // $event->sheet->getStyle("I2:Q2")->applyFromArray($stylecell);
                // $event->sheet->getStyle("I3:Q3")->applyFromArray($stylecell);
                // $event->sheet->getStyle("I4:Q4")->applyFromArray($stylecell);
                // $event->sheet->getStyle("I5:Q11")->applyFromArray($stylecell);
                // $event->sheet->getStyle("R1:R1")->applyFromArray($stylecell);
                // $event->sheet->getStyle("R2:R2")->applyFromArray($stylecell);
                // $event->sheet->getStyle("R3:R3")->applyFromArray($stylecell);
                // $event->sheet->getStyle("R4:W4")->applyFromArray($stylecell);
                // $event->sheet->getStyle("S1:T1")->applyFromArray($stylecell);
                // $event->sheet->getStyle("U1:W1")->applyFromArray($stylecell);

                $event->sheet->getStyle("A1:W22")->applyFromArray($stylecell);
                $event->sheet->getStyle("A1:W22")->applyFromArray($style_center);
                $event->sheet->getStyle("A1:H1")->applyFromArray($styleHeader);
                $event->sheet->getStyle("R1:R1")->applyFromArray($styleHeader);
                $event->sheet->getStyle("R1:W1")->applyFromArray($styleHeader);
                $event->sheet->getStyle("A2:A3")->applyFromArray($styleHeader);
                $event->sheet->getStyle("B2:R2")->applyFromArray($styleHeader);
                $event->sheet->getStyle("R3:R3")->applyFromArray($styleHeader);
                $event->sheet->getStyle("R6:R6")->applyFromArray($styleHeader);
                $event->sheet->getStyle("R7:R7")->applyFromArray($styleHeader);
                $event->sheet->getStyle("R8:R8")->applyFromArray($styleHeader);
                $event->sheet->getStyle("R9:R9")->applyFromArray($styleHeader);
                $event->sheet->getStyle("R10:R10")->applyFromArray($styleHeader);
                $event->sheet->getStyle("R11:R11")->applyFromArray($styleHeader);
                $event->sheet->getStyle("A4:W4")->applyFromArray($styleHeader);
                $event->sheet->getStyle("A12:W12")->applyFromArray($styleHeader);
                
                //PAPER CONSUMPTION
                $event->sheet->getDelegate()->getStyle('AF27:AR27')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('D9E1F2');

                $event->sheet->getDelegate()->getStyle('AC32:AE34')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('CCCCFF');

                $event->sheet->getDelegate()->getStyle('AG32:AR32')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFFCC');

                $event->sheet->getDelegate()->getStyle('AF28:AF32')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFF00');

                // PAPER
                $fy_diff = ($paper_pastfyactual - $paper_target) * 0.5;
                $pastfy_reduction = $paper_pastfyactual - $fy_diff;
                $reduction = ($pastfy_reduction - $paper_pastfyactual)/12;

                $data = array();
                $a = $reduction;
                $b = $paper_pastfyactual;
                $c = $b + $a;
                array_push($data, $c);

                $paper_pastfy_tricolor_data = array();
                $pastfy_tricolor_ab = $data[0] - $paper_pastfyactual;
                        if ($pastfy_tricolor_ab == 0) {
                            $pastfy_tricolor_percentage = 0;
                            array_push($paper_pastfy_tricolor_data, $pastfy_tricolor_percentage);

                            $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FA0505');
                        }
                        else {
                            $pastfy_tricolor = ($data[0] - $paper_pastfyactual)/$pastfy_tricolor_ab;
                            $pastfy_tricolor_percentage = $pastfy_tricolor * 100;
                            $pastfy_tricolor_percentage_round = round($pastfy_tricolor_percentage, 0);
                            array_push($paper_pastfy_tricolor_data, $pastfy_tricolor_percentage);

                            if($pastfy_tricolor_percentage_round >= 80){
                                $event->sheet->getDelegate()->getStyle('AF33')
                                ->getFill()
                                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                ->getStartColor()
                                ->setARGB('00FF00');//GREEN
                            }
                            elseif($pastfy_tricolor_percentage_round >= 60 && $pastfy_tricolor_percentage_round <= 79){
                                $event->sheet->getDelegate()->getStyle('AF33')
                                ->getFill()
                                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                ->getStartColor()
                                ->setARGB('FAE605');//YELLOW
                            }
                            elseif($pastfy_tricolor_percentage_round <= 59)
                            {
                                $event->sheet->getDelegate()->getStyle('AF33')
                                ->getFill()
                                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                ->getStartColor()
                                ->setARGB('FA0505');//RED
                            }
                        }

                $b_reduction = ($paper_target - $paper_pastfyactual)/12;

                    $b_data = array();
                    $a_2 = $b_reduction;
                    $b_2 = $paper_pastfyactual;
                    $c_2 = $b_2 + $a_2;
                    array_push($b_data, $c_2);

                for($i = 0; $i < 11; $i++){
                    $b_next[$i] = $b_data[$i] + $a_2;
                    array_push($b_data, $b_next[$i]);
                    $b_data_round[$i] = round($b_data[$i], 1);
                }
                        
                $sg_paper_target = array();
                $sg_paper_actual = array();
                for ($i= 0; $i < 12; $i++) { 
                    array_push($sg_paper_target , $paper_target_months[$i]);
                    array_push($sg_paper_actual , $paper_actual_months[$i]);
                }
                $a_paper_target = $paper_target;//$a
                $array_sg_paper_target = array();//$bb
                $array_sg_paper_actual = array();//$bb

                $tricolor_array = array();//FOR TRICOLOR PERCENTAGE
                for($i= 3; $i <= 11; $i++){
                    array_push($array_sg_paper_target, $sg_paper_target[$i]);
                    array_push($array_sg_paper_actual, $sg_paper_actual[$i]);
                    $d = ($a_paper_target - array_sum($array_sg_paper_target)) + array_sum($array_sg_paper_actual);
                    array_push($tricolor_array,$d);//for tricolor percentage
                }
                for($i= 0; $i <= 2; $i++){
                    array_push($array_sg_paper_target, $sg_paper_target[$i]);
                    array_push($array_sg_paper_actual, $sg_paper_actual[$i]);
                    $d = ($a_paper_target - array_sum($array_sg_paper_target)) + array_sum($array_sg_paper_actual);
                    array_push($tricolor_array,$d);//for tricolor percentage
                }

                $paper_tricolor_data = array();
                $tricolor_a = $data[0]; //static
                for ($i=0; $i <= 11; $i++) { 
                    $cell_no = array('AG33','AH33','AI33','AJ33','AK33','AL33','AM33','AN33','AO33','AP33','AQ33','AR33');
                    $tricolor_b = $b_data[$i]; //with interation
                    $tricolor_c = $tricolor_array[$i];
                    $tricolor_ab = $tricolor_a - $tricolor_b;
                    if ($tricolor_ab == 0) {
                        $tricolor_percentage = 0;
                        $event->sheet->getDelegate()->getStyle($cell_no[$i])
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FA0505');
                        array_push($paper_tricolor_data, $tricolor_percentage);
                    }
                    else {
                        $tricolor_d = ($tricolor_a - $tricolor_c)/$tricolor_ab; //with interation
                        $tricolor_percentage = $tricolor_d * 100;
                        $tricolor_percentage_round = round($tricolor_percentage, 0);
                        array_push($paper_tricolor_data, $tricolor_percentage);

                        if($tricolor_percentage_round >= 80){
                            $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('00FF00');//GREEN
                            
                        }
                        elseif($tricolor_percentage_round >= 60 && $tricolor_percentage_round <= 79){
                            $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FAE605');//YELLOW
                        }
                        elseif($tricolor_percentage_round <= 59)
                        {
                            $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FA0505');//RED
                        }
                    }
                }
                // PAPER END

                //ENERGY
                $fy_diff = ($energy_pastfyactual - $energy_target) * 0.5;
                $pastfy_reduction = $energy_pastfyactual - $fy_diff;
                $reduction = ($pastfy_reduction - $energy_pastfyactual)/12;

                $data = array();
                $a = $reduction;
                $b = $energy_pastfyactual;
                $c = $b + $a;
                array_push($data, $c);

                $energy_pastfy_tricolor_data = array();
                $pastfy_tricolor_ab = $data[0] - $energy_pastfyactual;
                if ($pastfy_tricolor_ab == 0) {
                    $tricolor_percentage = 0;
                    array_push($energy_pastfy_tricolor_data, $pastfy_tricolor_percentage);

                    $event->sheet->getDelegate()->getStyle('AF33')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FA0505');//RED
                }
                else {
                    $pastfy_tricolor = ($data[0] - $energy_pastfyactual)/$pastfy_tricolor_ab;
                    $pastfy_tricolor_percentage = $pastfy_tricolor * 100;
                    $pastfy_tricolor_percentage_round = round($pastfy_tricolor_percentage, 0);
                    array_push($energy_pastfy_tricolor_data, $pastfy_tricolor_percentage);
                    
                    if($pastfy_tricolor_percentage_round >= 80){
                        $event->sheet->getDelegate()->getStyle('AF43')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('00FF00');//GREEN
                    }
                    elseif($pastfy_tricolor_percentage_round >= 60 && $pastfy_tricolor_percentage_round <= 79){
                        $event->sheet->getDelegate()->getStyle('AF43')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FAE605');//YELLOW
                    }
                    elseif($pastfy_tricolor_percentage_round <= 59)
                    {
                        $event->sheet->getDelegate()->getStyle('AF43')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FA0505');//RED
                    }
                }

                $b_reduction = ($energy_target - $energy_pastfyactual)/12;

                $b_data = array();
                $a_2 = $b_reduction;
                $b_2 = $energy_pastfyactual;
                $c_2 = $b_2 + $a_2;
                // $c_round = round($c, 2);
                array_push($b_data, $c_2);

                for ($i = 0; $i < 11; $i++){
                    $b_next[$i] = $b_data[$i] + $a_2;
                    // $next_round[$i] = round($next[$i], 2);
                    array_push($b_data, $b_next[$i]);
                    $b_data_round[$i] = round($b_data[$i], 1);
                }

                $sg_energy_target = array();
                $sg_energy_actual = array();
                //  energy_target_months(array) dep_id=sg(3) is from "24-35"
                for ($i= 1; $i <= 12; $i++) { 
                    array_push($sg_energy_target , $energy_target_months[$i]);
                    array_push($sg_energy_actual , $energy_actual_months[$i]);
                }
                $a_energy_target = $energy_target;//$a
                $array_sg_energy_target = array();//$bb
                $array_sg_energy_actual = array();//$bb

                $tricolor_array = array();//FOR TRICOLOR PERCENTAGE

                for($i= 3; $i <= 11; $i++){
                    array_push($array_sg_energy_target, $sg_energy_target[$i]);
                    array_push($array_sg_energy_actual, $sg_energy_actual[$i]);
                    $d = ($a_energy_target - array_sum($array_sg_energy_target)) + array_sum($array_sg_energy_actual);
                    array_push($tricolor_array,$d);//for tricolor percentage
                }
                for($i= 0; $i <= 2; $i++){
                    array_push($array_sg_energy_target, $sg_energy_target[$i]);
                    array_push($array_sg_energy_actual, $sg_energy_actual[$i]);
                    $d = ($a_energy_target - array_sum($array_sg_energy_target)) + array_sum($array_sg_energy_actual);
                    array_push($tricolor_array,$d);//for tricolor percentage
                }

                $energy_tricolor_data = array();
                $tricolor_a = $data[0]; //static
                for ($i=0; $i <= 11; $i++) { 
                    $cell_no = array('AG43','AH43','AI43','AJ43','AK43','AL43','AM43','AN43','AO43','AP43','AQ43','AR43');
                    $tricolor_b = $b_data[$i]; //with interation
                    $tricolor_c = $tricolor_array[$i];
                    $tricolor_ab = $tricolor_a - $tricolor_b;
                    if ($tricolor_ab == 0) {
                        $tricolor_percentage = 0;
                        array_push($energy_tricolor_data, $tricolor_percentage);

                        $event->sheet->getDelegate()->getStyle($cell_no[$i])
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FA0505');//RED
                    }
                    else {
                        $tricolor_d = ($tricolor_a - $tricolor_c)/$tricolor_ab; //with interation
                        $tricolor_percentage = $tricolor_d * 100;
                        $tricolor_percentage_round = round($tricolor_percentage, 0);
                        array_push($energy_tricolor_data, $tricolor_percentage);

                        if($tricolor_percentage_round >= 80){
                            $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('00FF00');//GREEN
                        }
                        elseif($tricolor_percentage_round >= 60 && $tricolor_percentage_round <= 79){
                            $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FAE605');//YELLOW
                        }
                        elseif($tricolor_percentage_round <= 59)
                        {
                            $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FA0505');//RED
                        }
                    }
                    
                }
                //ENERGY END

                //WATER
                $fy_diff = ($water_pastfyactual - $water_target) * 0.5;
                $pastfy_reduction = $water_pastfyactual - $fy_diff;
                $reduction = ($pastfy_reduction - $water_pastfyactual)/12;

                $data = array();
                $a = $reduction;
                $b = $water_pastfyactual;
                $c = $b + $a;
                array_push($data, $c);

                $water_pastfy_tricolor_data = array();
                $pastfy_tricolor_ab = $data[0] - $water_pastfyactual;
                        if ($pastfy_tricolor_ab == 0) {
                            $pastfy_tricolor_percentage = 0;
                            array_push($water_pastfy_tricolor_data, $pastfy_tricolor_percentage);

                            $event->sheet->getDelegate()->getStyle('AF53')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FA0505');//RED
                        }
                        else {
                            $pastfy_tricolor = ($data[0] - $water_pastfyactual)/$pastfy_tricolor_ab;
                            $pastfy_tricolor_percentage = $pastfy_tricolor * 100;
                            $pastfy_tricolor_percentage_round = round($pastfy_tricolor_percentage, 0);
                            array_push($water_pastfy_tricolor_data, $pastfy_tricolor_percentage);
                            if($pastfy_tricolor_percentage_round >= 80){
                                $event->sheet->getDelegate()->getStyle('AF53')
                                ->getFill()
                                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                ->getStartColor()
                                ->setARGB('00FF00');//GREEN
                            }
                            elseif($pastfy_tricolor_percentage_round >= 60 && $pastfy_tricolor_percentage_round <= 79){
                                $event->sheet->getDelegate()->getStyle('AF53')
                                ->getFill()
                                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                ->getStartColor()
                                ->setARGB('FAE605');//YELLOW
                            }
                            elseif($pastfy_tricolor_percentage_round <= 59)
                            {
                                $event->sheet->getDelegate()->getStyle('AF53')
                                ->getFill()
                                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                ->getStartColor()
                                ->setARGB('FA0505');//RED
                            }
                        }

                $b_reduction = ($water_target - $water_pastfyactual)/12;

                $b_data = array();
                $a_2 = $b_reduction;
                $b_2 = $water_pastfyactual;
                $c_2 = $b_2 + $a_2;
                array_push($b_data, $c_2);

                for ($i = 0; $i < 11; $i++){
                    $b_next[$i] = $b_data[$i] + $a_2;
                    array_push($b_data, $b_next[$i]);
                    $b_data_round[$i] = round($b_data[$i], 1);
                }
               
                $sg_water_target = array();
                $sg_water_actual = array();
                for ($i=1; $i <= 12; $i++) { 
                    array_push($sg_water_target , $water_target_months[$i]);
                    array_push($sg_water_actual , $water_actual_months[$i]);
                }
                $a_water_target = $water_target;//$a
                $array_sg_water_target = array();//$bb
                $array_sg_water_actual = array();//$bb    
                
                $tricolor_array = array();//FOR TRICOLOR PERCENTAGE

                for($i= 3; $i <= 11; $i++){
                array_push($array_sg_water_target, $sg_water_target[$i]);
                array_push($array_sg_water_actual, $sg_water_actual[$i]);
                $d = ($a_water_target - array_sum($array_sg_water_target)) + array_sum($array_sg_water_actual);
                array_push($tricolor_array,$d);//for tricolor percentage
                }
                for($i= 0; $i <= 2; $i++){
                    array_push($array_sg_water_target, $sg_water_target[$i]);
                    array_push($array_sg_water_actual, $sg_water_actual[$i]);
                    $d = ($a_water_target - array_sum($array_sg_water_target)) + array_sum($array_sg_water_actual);
                    array_push($tricolor_array,$d);//for tricolor percentage
                }

                $water_tricolor_data = array();
                $tricolor_a = $data[0]; //static
                for ($i=0; $i <= 11; $i++) { 
                    $cell_no = array('AG53','AH53','AI53','AJ53','AK53','AL53','AM53','AN53','AO53','AP53','AQ53','AR53');
                    $tricolor_b = $b_data[$i]; //with interation
                    $tricolor_c = $tricolor_array[$i];
                    $tricolor_ab = $tricolor_a - $tricolor_b;
                    if ($tricolor_ab == 0) {
                        $tricolor_percentage = 0;
                        array_push($water_tricolor_data, $tricolor_percentage);

                        $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FA0505');//RED
                    }
                    else {
                        $tricolor_d = ($tricolor_a - $tricolor_c)/$tricolor_ab; //with interation
                        $tricolor_percentage = $tricolor_d * 100;
                        $tricolor_percentage_round = round($tricolor_percentage, 0);
                        array_push($water_tricolor_data, $tricolor_percentage);

                        if($tricolor_percentage_round >= 80){
                            $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('00FF00');//GREEN
                        }
                        elseif($tricolor_percentage_round >= 60 && $tricolor_percentage_round <= 79){
                            $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FAE605');//YELLOW
                        }
                        elseif($tricolor_percentage_round <= 59)
                        {
                            $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FA0505');//RED
                        }
                    }
                }
                //WATER END

                //OVERALL

                //PAST FY
                    $array_paper_pastfy_tricolor_data = array();
                    $array_energy_pastfy_tricolor_data = array();
                    $array_water_pastfy_tricolor_data = array();

                            if ($paper_pastfy_tricolor_data[0] >= 100){
                                $paper_pastfy_tricolor_data[0] = 100;
                                array_push($array_paper_pastfy_tricolor_data, $paper_pastfy_tricolor_data[0]);
                            }else{
                                array_push($array_paper_pastfy_tricolor_data, $paper_pastfy_tricolor_data[0]);
                            }

                            if ($energy_pastfy_tricolor_data[0] >= 100){
                                $energy_pastfy_tricolor_data[0] = 100;
                                array_push($array_energy_pastfy_tricolor_data, $energy_pastfy_tricolor_data[0]);
                            }else{
                                array_push($array_energy_pastfy_tricolor_data, $energy_pastfy_tricolor_data[0]);
                            }
                            
                            if ($water_pastfy_tricolor_data[0] >= 100){
                                $water_pastfy_tricolor_data[0] = 100;
                                array_push($array_water_pastfy_tricolor_data, $water_pastfy_tricolor_data[0]);
                            }else{
                                array_push($array_water_pastfy_tricolor_data, $water_pastfy_tricolor_data[0]);
                            }
                        
                    $past_overall_average = ($array_paper_pastfy_tricolor_data[0] + $array_energy_pastfy_tricolor_data[0] + $array_water_pastfy_tricolor_data[0]) / 3;
                    $past_overall_average_round = round($past_overall_average, 0);

                    if($past_overall_average_round >= 80){
                        $event->sheet->getDelegate()->getStyle('AF56')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('00FF00');//GREEN
                    }
                    elseif($past_overall_average_round >= 60 && $past_overall_average_round <= 79){
                        $event->sheet->getDelegate()->getStyle('AF56')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FAE605');//YELLOW
                    }
                    elseif($past_overall_average_round <= 59)
                    {
                        $event->sheet->getDelegate()->getStyle('AF56')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FA0505');//RED
                    }
                

                    //CURRENT FY
                    $array_paper_tricolor_data = array();
                    $array_energy_tricolor_data = array();
                    $array_water_tricolor_data = array();

                        for($j=0; $j <= 11; $j++){
                            if ($paper_tricolor_data[$j] >= 100){
                                $paper_tricolor_data[$j] = 100;
                                array_push($array_paper_tricolor_data, $paper_tricolor_data[$j]);
                            }else{
                                array_push($array_paper_tricolor_data, $paper_tricolor_data[$j]);
                            }

                            if ($energy_tricolor_data[$j] >= 100){
                                $energy_tricolor_data[$j] = 100;
                                array_push($array_energy_tricolor_data, $energy_tricolor_data[$j]);
                            }else{
                                array_push($array_energy_tricolor_data, $energy_tricolor_data[$j]);
                            }
                            
                            if ($water_tricolor_data[$j] >= 100){
                                $water_tricolor_data[$j] = 100;
                                array_push($array_water_tricolor_data, $water_tricolor_data[$j]);
                            }else{
                                array_push($array_water_tricolor_data, $water_tricolor_data[$j]);
                            }
                        }

                for($i=0; $i <= 11; $i++){
                    $cell_no = array('AG56','AH56','AI56','AJ56','AK56','AL56','AM56','AN56','AO56','AP56','AQ56','AR56');
                
                        $overall_average = ($array_paper_tricolor_data[$i] + $array_energy_tricolor_data[$i] + $array_water_tricolor_data[$i]) / 3;
                        $overall_average_round = round($overall_average, 0);
                    
                        if($overall_average_round >= 80){
                            $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('00FF00');//GREEN
                        }
                        elseif($overall_average_round >= 60 && $overall_average_round <= 79){
                            $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FAE605');//YELLOW
                        }
                        elseif($overall_average_round <= 56)
                        {
                            $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FA0505');//RED
                        }
                }
                //OVERALL END

                $event->sheet->getDelegate()->getStyle('AF34:AR34')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('CCCCFF');

                $event->sheet->getDelegate()->getStyle('AE29')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FF0000');

                $event->sheet->getDelegate()->getStyle('AE30')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFF00');

                $event->sheet->getDelegate()->getStyle('AE31')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('00FF00');
                    
                $event->sheet->getDelegate()->getStyle('AR31')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FF00FF');

                    $event->sheet->getStyle("AC26")->applyFromArray($styleHeader);
                    $event->sheet->getStyle("AF27:AR27")->applyFromArray($styleHeader);
                    $event->sheet->getStyle("AC26:AR34")->applyFromArray($stylecell);
                    $event->sheet->getDelegate()->getStyle("AF27:AR27")->applyFromArray($style_center);
                    $event->sheet->getDelegate()->getStyle("AD28:AD32")->applyFromArray($style_center_right);
                    $event->sheet->getDelegate()->getStyle("AF28:AR34")->applyFromArray($style_center_right);
                
                //ENERGY CONSUMPTION
                $event->sheet->getDelegate()->getStyle('AF37:AR37')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('D9E1F2');

                $event->sheet->getDelegate()->getStyle('AC42:AE44')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('CCCCFF');

                $event->sheet->getDelegate()->getStyle('AG42:AR42')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFFCC');

                $event->sheet->getDelegate()->getStyle('AE38:AF42')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFF00');

                $event->sheet->getDelegate()->getStyle('AF44:AR44')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('CCCCFF');

                $event->sheet->getDelegate()->getStyle('AE39')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FF0000');

                $event->sheet->getDelegate()->getStyle('AE40')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFF00');

                $event->sheet->getDelegate()->getStyle('AE41')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('00FF00');
                    
                $event->sheet->getDelegate()->getStyle('AR41')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FF00FF');

                    $event->sheet->getStyle("AC36")->applyFromArray($styleHeader);
                    $event->sheet->getStyle("AF37:AR37")->applyFromArray($styleHeader);
                    $event->sheet->getStyle("AC36:AR44")->applyFromArray($stylecell);
                    $event->sheet->getDelegate()->getStyle("AF37:AR37")->applyFromArray($style_center);
                    $event->sheet->getDelegate()->getStyle("AD38:AD42")->applyFromArray($style_center_right);
                    $event->sheet->getDelegate()->getStyle("AF38:AR44")->applyFromArray($style_center_right);

                   //WATER CONSUMPTION
                   $event->sheet->getDelegate()->getStyle('AF47:AP47')
                   ->getFill()
                   ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                   ->getStartColor()
                   ->setARGB('D9E2F2');

                   $event->sheet->getDelegate()->getStyle('AC52:AE54')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('CCCCFF');

                   $event->sheet->getDelegate()->getStyle('AG52:AR52')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('FFFFCC');

                   $event->sheet->getDelegate()->getStyle('AF48:AF52')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('FFFF00');

                   $event->sheet->getDelegate()->getStyle('AF54:AR54')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('CCCCFF');

                   $event->sheet->getDelegate()->getStyle('AE49')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('FF0000');

                   $event->sheet->getDelegate()->getStyle('AE50')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('FFFF00');

                   $event->sheet->getDelegate()->getStyle('AE51')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('00FF00');
                       
                   $event->sheet->getDelegate()->getStyle('AR51')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('FF00FF');

                       $event->sheet->getStyle("AC46")->applyFromArray($styleHeader);
                       $event->sheet->getStyle("AF47:AP47")->applyFromArray($styleHeader);
                       $event->sheet->getStyle("AC46:AR54")->applyFromArray($stylecell);
                       $event->sheet->getDelegate()->getStyle("AF47:AP47")->applyFromArray($style_center);
                       $event->sheet->getDelegate()->getStyle("AD48:AD52")->applyFromArray($style_center_right);
                       $event->sheet->getDelegate()->getStyle("AF48:AR54")->applyFromArray($style_center_right);
                       
                    //OVERALL PERFORMANCE
                    $event->sheet->getDelegate()->getStyle('AC56:AE56')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('FFFF00');

                    $event->sheet->getStyle("AC56")->applyFromArray($styleHeader);
                    $event->sheet->getDelegate()->getStyle("AC56")->applyFromArray($style_center_right);
                    $event->sheet->getStyle("AC56:AR56")->applyFromArray($stylecell);
                    $event->sheet->getDelegate()->getStyle("AF56:AR56")->applyFromArray($style_center_right);

                    //TRICOLORS - PAPER CONSUMPTION
                        $event->sheet->getDelegate()->getStyle('AF58')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('00FF00');

                        $event->sheet->getDelegate()->getStyle('AS58:AS62')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FFFF00');

                        $event->sheet->getDelegate()->getStyle('AC59:AR62')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('00B0F0');

                        $event->sheet->getDelegate()->getStyle('AG58:AR58')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FFFFCC');

                        $event->sheet->getStyle("AC58")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AC62")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AE59:AE60")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AF58:AS58")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AE58")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AC58:AS62")->applyFromArray($stylecell);
                        $event->sheet->getDelegate()->getStyle("AF58:AS58")->applyFromArray($style_center);
                        $event->sheet->getDelegate()->getStyle("AF60:AS62")->applyFromArray($style_center_right);

                    //TRICOLORS - ENERGY CONSUMPTION
                        $event->sheet->getDelegate()->getStyle('AF64')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('00FF00');

                        $event->sheet->getDelegate()->getStyle('AS64:AS68')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FFFF00');

                        $event->sheet->getDelegate()->getStyle('AC65:AR68')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('00B0F0');

                        $event->sheet->getDelegate()->getStyle('AG64:AR64')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FFFFCC');

                        $event->sheet->getStyle("AC64")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AC68")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AE29:AE29")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AF64:AS64")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AE64")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AC64:AS68")->applyFromArray($stylecell);
                        $event->sheet->getDelegate()->getStyle("AF64:AS64")->applyFromArray($style_center);
                        $event->sheet->getDelegate()->getStyle("AF66:AS68")->applyFromArray($style_center_right);

                    //TRICOLORS - WATER CONSUMPTION
                        $event->sheet->getDelegate()->getStyle('AF70')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('00FF00');

                        $event->sheet->getDelegate()->getStyle('AS70:AS74')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FFFF00');

                        $event->sheet->getDelegate()->getStyle('AC71:AR74')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('00B0F0');

                        $event->sheet->getDelegate()->getStyle('AG70:AR70')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FFFFCC');

                        $event->sheet->getStyle("AC70")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AC74")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AE29:AE29")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AF70:AS70")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AE29")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("AC70:AS74")->applyFromArray($stylecell);
                        $event->sheet->getDelegate()->getStyle("AF70:AS70")->applyFromArray($style_center);
                        $event->sheet->getDelegate()->getStyle("AF72:AS74")->applyFromArray($style_center_right);
                        $event->sheet->getDelegate()->mergeCells('A1:B1');
                        $event->sheet->getDelegate()->mergeCells('A2:A3');
                        $event->sheet->getDelegate()->mergeCells('A4:A11');
                        $event->sheet->getDelegate()->mergeCells('C1:D1');
                        $event->sheet->getDelegate()->mergeCells('B2:D2');
                        $event->sheet->getDelegate()->mergeCells('B3:D3');
                        $event->sheet->getDelegate()->mergeCells('B4:D4');
                        $event->sheet->getDelegate()->mergeCells('B5:D11');
                        $event->sheet->getDelegate()->mergeCells('B12:D12');
                        $event->sheet->getDelegate()->mergeCells('B13:D13');
                        $event->sheet->getDelegate()->mergeCells('B14:D14');
                        $event->sheet->getDelegate()->mergeCells('B15:D15');
                        $event->sheet->getDelegate()->mergeCells('B16:D16');
                        $event->sheet->getDelegate()->mergeCells('B17:D17');
                        $event->sheet->getDelegate()->mergeCells('B18:D18');
                        $event->sheet->getDelegate()->mergeCells('B19:D19');
                        $event->sheet->getDelegate()->mergeCells('B20:D20');
                        $event->sheet->getDelegate()->mergeCells('B21:D21');
                        $event->sheet->getDelegate()->mergeCells('B22:D22');
                        $event->sheet->getDelegate()->mergeCells('E1:H1');
                        $event->sheet->getDelegate()->mergeCells('E2:H2');
                        $event->sheet->getDelegate()->mergeCells('E3:H3');
                        $event->sheet->getDelegate()->mergeCells('E4:H4');
                        $event->sheet->getDelegate()->mergeCells('E5:H11');
                        $event->sheet->getDelegate()->mergeCells('I1:Q1');
                        $event->sheet->getDelegate()->mergeCells('I2:Q2');
                        $event->sheet->getDelegate()->mergeCells('I3:Q3');
                        $event->sheet->getDelegate()->mergeCells('I4:Q4');
                        $event->sheet->getDelegate()->mergeCells('I5:Q11');
                        $event->sheet->getDelegate()->mergeCells('S1:T1');
                        $event->sheet->getDelegate()->mergeCells('S2:T2');
                        $event->sheet->getDelegate()->mergeCells('S3:T3');
                        $event->sheet->getDelegate()->mergeCells('S5:T5');
                        $event->sheet->getDelegate()->mergeCells('S6:T6');
                        $event->sheet->getDelegate()->mergeCells('S7:T7');
                        $event->sheet->getDelegate()->mergeCells('S8:T8');
                        $event->sheet->getDelegate()->mergeCells('S9:T9');
                        $event->sheet->getDelegate()->mergeCells('S10:T10');
                        $event->sheet->getDelegate()->mergeCells('S11:T11');
                        $event->sheet->getDelegate()->mergeCells('S12:T12');
                        $event->sheet->getDelegate()->mergeCells('S13:T13');
                        $event->sheet->getDelegate()->mergeCells('S14:T14');
                        $event->sheet->getDelegate()->mergeCells('S15:T15');
                        $event->sheet->getDelegate()->mergeCells('S16:T16');
                        $event->sheet->getDelegate()->mergeCells('S17:T17');
                        $event->sheet->getDelegate()->mergeCells('S18:T18');
                        $event->sheet->getDelegate()->mergeCells('S19:T19');
                        $event->sheet->getDelegate()->mergeCells('S20:T20');
                        $event->sheet->getDelegate()->mergeCells('S21:T21');
                        $event->sheet->getDelegate()->mergeCells('S22:T22');
                        $event->sheet->getDelegate()->mergeCells('U1:W1');
                        $event->sheet->getDelegate()->mergeCells('U2:W3');
                        $event->sheet->getDelegate()->mergeCells('R4:W4');
                        $event->sheet->getDelegate()->mergeCells('U5:W5');
                        $event->sheet->getDelegate()->mergeCells('U6:W6');
                        $event->sheet->getDelegate()->mergeCells('U7:W7');
                        $event->sheet->getDelegate()->mergeCells('U8:W8');
                        $event->sheet->getDelegate()->mergeCells('U9:W9');
                        $event->sheet->getDelegate()->mergeCells('U10:W10');
                        $event->sheet->getDelegate()->mergeCells('U11:W11');
                        $event->sheet->getDelegate()->mergeCells('U12:W12');
                        $event->sheet->getDelegate()->mergeCells('V13:W13');
                        $event->sheet->getDelegate()->mergeCells('V14:W14');
                        $event->sheet->getDelegate()->mergeCells('V15:W15');
                        $event->sheet->getDelegate()->mergeCells('V16:W16');
                        $event->sheet->getDelegate()->mergeCells('V17:W17');
                        $event->sheet->getDelegate()->mergeCells('V18:W18');
                        $event->sheet->getDelegate()->mergeCells('V19:W19');
                        $event->sheet->getDelegate()->mergeCells('V20:W20');
                        $event->sheet->getDelegate()->mergeCells('V21:W21');
                        $event->sheet->getDelegate()->mergeCells('V22:W22');
                        // $event->sheet->mergeCells('A1:E1');

                        $row_selector = 2;
                        $cell_col = array('F','G','H','I','J','K','L','M','N','O','P','Q');
                        $cell_row = array('0','0','13','14','15','16','17','18','19','20','21','22');
                        foreach($ActionPlan as $AP){
                        $i = 0;
                                if ($AP->month == 4) {
            
                                    $event->sheet->getDelegate()->getStyle($cell_col[$i].$cell_row[$row_selector])
                                        ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                        ->getStartColor()
                                        ->setARGB('D60092');//RED
                                }
                                elseif ($AP->month == 5) {
            
                                    $event->sheet->getDelegate()->getStyle($cell_col[$i+1].$cell_row[$row_selector])
                                        ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                        ->getStartColor()
                                        ->setARGB('D60092');//RED
                                }
                                elseif ($AP->month == 6) {
                                    $tricolor_percentage = 0;
                                    array_push($water_tricolor_data, $tricolor_percentage);
            
                                    $event->sheet->getDelegate()->getStyle($cell_col[$i+2].$cell_row[$row_selector])
                                        ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                        ->getStartColor()
                                        ->setARGB('D60092');//RED
                                }
                                elseif ($AP->month == 7) {
            
                                    $event->sheet->getDelegate()->getStyle($cell_col[$i+3].$cell_row[$row_selector])
                                        ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                        ->getStartColor()
                                        ->setARGB('D60092');//RED
                                }
                                elseif ($AP->month == 8) {
            
                                    $event->sheet->getDelegate()->getStyle($cell_col[$i+4].$cell_row[$row_selector])
                                        ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                        ->getStartColor()
                                        ->setARGB('D60092');//RED
                                }
                                elseif ($AP->month == 9) {
            
                                    $event->sheet->getDelegate()->getStyle($cell_col[$i+5].$cell_row[$row_selector])
                                        ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                        ->getStartColor()
                                        ->setARGB('D60092');//RED
                                }
                                elseif ($AP->month == 10) {
            
                                    $event->sheet->getDelegate()->getStyle($cell_col[$i+6].$cell_row[$row_selector])
                                        ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                        ->getStartColor()
                                        ->setARGB('D60092');//RED
                                }
                                elseif ($AP->month == 11) {

                                    $event->sheet->getDelegate()->getStyle($cell_col[$i+7].$cell_row[$row_selector])
                                        ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                        ->getStartColor()
                                        ->setARGB('D60092');//RED
                                }
                                elseif ($AP->month == 12) {
            
                                    $event->sheet->getDelegate()->getStyle($cell_col[$i+8].$cell_row[$row_selector])
                                        ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                        ->getStartColor()
                                        ->setARGB('D60092');//RED
                                }
                                elseif ($AP->month == 1) {
            
                                    $event->sheet->getDelegate()->getStyle($cell_col[$i+9].$cell_row[$row_selector])
                                        ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                        ->getStartColor()
                                        ->setARGB('D60092');//RED
                                }
                                elseif ($AP->month == 2) {
            
                                    $event->sheet->getDelegate()->getStyle($cell_col[$i+10].$cell_row[$row_selector])
                                        ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                        ->getStartColor()
                                        ->setARGB('D60092');//RED
                                }
                                elseif ($AP->month == 3) {
            
                                    $event->sheet->getDelegate()->getStyle($cell_col[$i+11].$cell_row[$row_selector])
                                        ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                        ->getStartColor()
                                        ->setARGB('D60092');//RED
                                }
                            $row_selector++;
                        }
                           
            }
        ];
    }

    public function title(): string
        {
            return 'Action Plan';
        }

    public function columnFormats(): array
    {
        return [
            'AD' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AE' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AF' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AG' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AH' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AI' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AJ' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AK' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AL' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AM' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AN' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AO' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AP' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AQ' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AR' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }

    public function view(): View
    {
        return view('exports/export_action_plan',[

            
            'selected_month'=> $this->selected_month,
            'energy_pastfyactual'=> $this->energy_pastfyactual_ave,
            'energy_target'=>  $this->energy_target_ave,
            'energy_target_months'=> $this->energy_target_months,
            'energy_actual_months'=> $this->energy_actual_months,

            'water_pastfyactual'=> $this->water_pasftyactual_ave,
            'water_target'=> $this->water_target_ave,
            'water_target_months'=> $this->water_target_months,
            'water_actual_months'=> $this->water_actualpermp_months,

            'paper_pastfyactual'=> $this->paper_pastfyactual_sg,
            'paper_target'=> $this->paper_target_sg,
            'paper_target_months'=> $this->paper_target_months_sg,
            'paper_actual_months'=> $this->paper_actual_months_sg,
            
            'currentfy'=> $this->current_fy_year,
            'pastfy'=> $this->past_fy_year,
            'paper_pastfytarget'=> $this->paper_pastfytarget_sg,
            'energy_pastfytarget'=> $this->energy_pastfytarget_ave,
            'water_pastfytarget'=> $this->water_pastfytarget_ave,
            'action_plan'=>$this->action_plan
        ]);
    }

}