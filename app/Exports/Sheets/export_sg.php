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

class export_sg implements FromView, WithEvents, WithTitle, WithColumnFormatting
{
    public function __construct(
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
        $Water_PastFyTarget_Average
    )
    {   
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

        $style2 = array(
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        );

        $style4 = array(
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_RIGHT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        );

        return [
           
            AfterSheet::class => function(AfterSheet $event) use ($styleHeader,$stylecell,$style2,$style4,
                                                                $energy_pastfyactual,$energy_target,$energy_target_months,$energy_actual_months,
                                                                $water_pastfyactual,$water_target,$water_target_months,$water_actual_months,
                                                                $paper_pastfyactual,$paper_target,$paper_target_months,$paper_actual_months){

                $event->sheet->getColumnDimension('A')->setWidth(60);
                $event->sheet->getColumnDimension('B')->setWidth(10);
                $event->sheet->getColumnDimension('C')->setWidth(25);
                $event->sheet->getColumnDimension('D')->setWidth(12);
                $event->sheet->getColumnDimension('E')->setWidth(12);
                $event->sheet->getColumnDimension('F')->setWidth(12);
                $event->sheet->getColumnDimension('G')->setWidth(12);
                $event->sheet->getColumnDimension('H')->setWidth(12);
                $event->sheet->getColumnDimension('I')->setWidth(12);
                $event->sheet->getColumnDimension('J')->setWidth(12);
                $event->sheet->getColumnDimension('K')->setWidth(12);
                $event->sheet->getColumnDimension('L')->setWidth(12);
                $event->sheet->getColumnDimension('M')->setWidth(12);
                $event->sheet->getColumnDimension('N')->setWidth(12);
                $event->sheet->getColumnDimension('O')->setWidth(12);
                $event->sheet->getColumnDimension('P')->setWidth(12);
                $event->sheet->getColumnDimension('Q')->setWidth(12);

                //PAPER CONSUMPTION
                $event->sheet->getDelegate()->getStyle('D2:P2')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('D9E1F2');

                $event->sheet->getDelegate()->getStyle('A7:C9')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('CCCCFF');

                $event->sheet->getDelegate()->getStyle('E7:P7')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFFCC');

                $event->sheet->getDelegate()->getStyle('D3:D7')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFF00');

                    $event->sheet->getDelegate()->getStyle('D9:P9')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('CCCCFF');

                $event->sheet->getDelegate()->getStyle('C4')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FF0000');

                $event->sheet->getDelegate()->getStyle('C5')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFF00');

                $event->sheet->getDelegate()->getStyle('C6')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('00FF00');
                    
                $event->sheet->getDelegate()->getStyle('P6')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FF00FF');

                $event->sheet->getStyle("A1")->applyFromArray($styleHeader);
                $event->sheet->getStyle("D2:P2")->applyFromArray($styleHeader);
                $event->sheet->getStyle("A1:P9")->applyFromArray($stylecell);
                $event->sheet->getDelegate()->getStyle("D2:P2")->applyFromArray($style2);
                $event->sheet->getDelegate()->getStyle("B3:B7")->applyFromArray($style4);
                $event->sheet->getDelegate()->getStyle("D3:P9")->applyFromArray($style4);
                
                //ENERGY CONSUMPTION
                $event->sheet->getDelegate()->getStyle('D12:P12')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('D9E1F2');

                $event->sheet->getDelegate()->getStyle('A17:C19')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('CCCCFF');

                $event->sheet->getDelegate()->getStyle('E17:P17')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFFCC');

                $event->sheet->getDelegate()->getStyle('D13:D17')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFF00');

                $event->sheet->getDelegate()->getStyle('D19:P19')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('CCCCFF');

                $event->sheet->getDelegate()->getStyle('C14')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FF0000');

                $event->sheet->getDelegate()->getStyle('C15')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFF00');

                $event->sheet->getDelegate()->getStyle('C16')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('00FF00');
                    
                $event->sheet->getDelegate()->getStyle('P16')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FF00FF');

                    $event->sheet->getStyle("A11")->applyFromArray($styleHeader);
                    $event->sheet->getStyle("D12:P12")->applyFromArray($styleHeader);
                    $event->sheet->getStyle("A11:P19")->applyFromArray($stylecell);
                    $event->sheet->getDelegate()->getStyle("D12:P12")->applyFromArray($style2);
                    $event->sheet->getDelegate()->getStyle("B13:B17")->applyFromArray($style4);
                    $event->sheet->getDelegate()->getStyle("D13:P19")->applyFromArray($style4);

                   //WATER CONSUMPTION
                   $event->sheet->getDelegate()->getStyle('D22:P22')
                   ->getFill()
                   ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                   ->getStartColor()
                   ->setARGB('D9E2F2');

                   $event->sheet->getDelegate()->getStyle('A27:C29')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('CCCCFF');

                   $event->sheet->getDelegate()->getStyle('E27:P27')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('FFFFCC');

                   $event->sheet->getDelegate()->getStyle('D23:D27')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('FFFF00');

                   $event->sheet->getDelegate()->getStyle('D29:P29')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('CCCCFF');

                   $event->sheet->getDelegate()->getStyle('C24')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('FF0000');

                   $event->sheet->getDelegate()->getStyle('C25')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('FFFF00');

                   $event->sheet->getDelegate()->getStyle('C26')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('00FF00');
                       
                   $event->sheet->getDelegate()->getStyle('P26')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('FF00FF');

                       $event->sheet->getStyle("A21")->applyFromArray($styleHeader);
                       $event->sheet->getStyle("D22:P22")->applyFromArray($styleHeader);
                       $event->sheet->getStyle("A21:P29")->applyFromArray($stylecell);
                       $event->sheet->getDelegate()->getStyle("D22:P22")->applyFromArray($style2);
                       $event->sheet->getDelegate()->getStyle("B23:B27")->applyFromArray($style4);
                       $event->sheet->getDelegate()->getStyle("D23:P29")->applyFromArray($style4);
                       
                    //OVERALL PERFORMANCE
                    $event->sheet->getDelegate()->getStyle('A31:C31')
                       ->getFill()
                       ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setARGB('FFFF00');

                    $event->sheet->getStyle("A31")->applyFromArray($styleHeader);
                    $event->sheet->getDelegate()->getStyle("A31")->applyFromArray($style4);
                    $event->sheet->getStyle("A31:P31")->applyFromArray($stylecell);
                    $event->sheet->getDelegate()->getStyle("D31:P31")->applyFromArray($style4);

                    //TRICOLORS - PAPER CONSUMPTION
                        $event->sheet->getDelegate()->getStyle('D33')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('00FF00');

                        $event->sheet->getDelegate()->getStyle('Q33:Q37')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FFFF00');

                        $event->sheet->getDelegate()->getStyle('A34:P37')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('00B0F0');

                        $event->sheet->getDelegate()->getStyle('E33:P33')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FFFFCC');

                        $event->sheet->getStyle("A33")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("A37")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("C34:C35")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("D33:Q33")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("C33")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("A33:Q37")->applyFromArray($stylecell);
                        $event->sheet->getDelegate()->getStyle("D33:Q33")->applyFromArray($style2);
                        $event->sheet->getDelegate()->getStyle("D35:Q37")->applyFromArray($style4);

                    //TRICOLORS - ENERGY CONSUMPTION
                        $event->sheet->getDelegate()->getStyle('D39')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('00FF00');

                        $event->sheet->getDelegate()->getStyle('Q39:Q43')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FFFF00');

                        $event->sheet->getDelegate()->getStyle('A40:P43')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('00B0F0');

                        $event->sheet->getDelegate()->getStyle('E39:P39')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FFFFCC');

                        $event->sheet->getStyle("A39")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("A43")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("C40:C41")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("D39:Q39")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("C39")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("A39:Q43")->applyFromArray($stylecell);
                        $event->sheet->getDelegate()->getStyle("D39:Q39")->applyFromArray($style2);
                        $event->sheet->getDelegate()->getStyle("D41:Q43")->applyFromArray($style4);

                    //TRICOLORS - WATER CONSUMPTION
                        $event->sheet->getDelegate()->getStyle('D45')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('00FF00');

                        $event->sheet->getDelegate()->getStyle('Q45:Q49')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FFFF00');

                        $event->sheet->getDelegate()->getStyle('A46:P49')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('00B0F0');

                        $event->sheet->getDelegate()->getStyle('E45:P45')
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FFFFCC');

                        $event->sheet->getStyle("A45")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("A49")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("C46:C47")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("D45:Q45")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("C45")->applyFromArray($styleHeader);
                        $event->sheet->getStyle("A45:Q49")->applyFromArray($stylecell);
                        $event->sheet->getDelegate()->getStyle("D45:Q45")->applyFromArray($style2);
                        $event->sheet->getDelegate()->getStyle("D47:Q49")->applyFromArray($style4);  

                // // PAPER
                // $fy_diff = ($paper_pastfyactual - $paper_target) * 0.5;
                // $pastfy_reduction = $paper_pastfyactual - $fy_diff;
                // $reduction = ($pastfy_reduction - $paper_pastfyactual)/12;

                // $data = array();
                // $a = $reduction;
                // $b = $paper_pastfyactual;
                // $c = $b + $a;
                // array_push($data, $c);

                // $paper_pastfy_tricolor_data = array();
                // $pastfy_tricolor_ab = $data[0] - $paper_pastfyactual;
                //         if ($pastfy_tricolor_ab == 0) {
                //             $pastfy_tricolor_percentage = 0;
                //             array_push($paper_pastfy_tricolor_data, $pastfy_tricolor_percentage);

                //             $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('FA0505');
                //         }
                //         else {
                //             $pastfy_tricolor = ($data[0] - $paper_pastfyactual)/$pastfy_tricolor_ab;
                //             $pastfy_tricolor_percentage = $pastfy_tricolor * 100;
                //             $pastfy_tricolor_percentage_round = round($pastfy_tricolor_percentage, 0);
                //             array_push($paper_pastfy_tricolor_data, $pastfy_tricolor_percentage);

                //             if($pastfy_tricolor_percentage_round >= 80){
                //                 $event->sheet->getDelegate()->getStyle('D8')
                //                 ->getFill()
                //                 ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //                 ->getStartColor()
                //                 ->setARGB('00FF00');//GREEN
                //             }
                //             elseif($pastfy_tricolor_percentage_round >= 60 && $pastfy_tricolor_percentage_round <= 79){
                //                 $event->sheet->getDelegate()->getStyle('D8')
                //                 ->getFill()
                //                 ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //                 ->getStartColor()
                //                 ->setARGB('FAE605');//YELLOW
                //             }
                //             elseif($pastfy_tricolor_percentage_round <= 59)
                //             {
                //                 $event->sheet->getDelegate()->getStyle('D8')
                //                 ->getFill()
                //                 ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //                 ->getStartColor()
                //                 ->setARGB('FA0505');//RED
                //             }
                //         }

                // $b_reduction = ($paper_target - $paper_pastfyactual)/12;

                //     $b_data = array();
                //     $a_2 = $b_reduction;
                //     $b_2 = $paper_pastfyactual;
                //     $c_2 = $b_2 + $a_2;
                //     array_push($b_data, $c_2);

                // for($i = 0; $i < 11; $i++){
                //     $b_next[$i] = $b_data[$i] + $a_2;
                //     array_push($b_data, $b_next[$i]);
                //     $b_data_round[$i] = round($b_data[$i], 1);
                // }
                        
                // $sg_paper_target = array();
                // $sg_paper_actual = array();
                // for ($i= 0; $i < 12; $i++) { 
                //     array_push($sg_paper_target , $paper_target_months[$i]);
                //     array_push($sg_paper_actual , $paper_actual_months[$i]);
                // }
                // $a_paper_target = $paper_target;//$a
                // $array_sg_paper_target = array();//$bb
                // $array_sg_paper_actual = array();//$bb

                // $tricolor_array = array();//FOR TRICOLOR PERCENTAGE
                // for($i= 3; $i <= 11; $i++){
                //     array_push($array_sg_paper_target, $sg_paper_target[$i]);
                //     array_push($array_sg_paper_actual, $sg_paper_actual[$i]);
                //     $d = ($a_paper_target - array_sum($array_sg_paper_target)) + array_sum($array_sg_paper_actual);
                //     array_push($tricolor_array,$d);//for tricolor percentage
                // }
                // for($i= 0; $i <= 2; $i++){
                //     array_push($array_sg_paper_target, $sg_paper_target[$i]);
                //     array_push($array_sg_paper_actual, $sg_paper_actual[$i]);
                //     $d = ($a_paper_target - array_sum($array_sg_paper_target)) + array_sum($array_sg_paper_actual);
                //     array_push($tricolor_array,$d);//for tricolor percentage
                // }

                // $paper_tricolor_data = array();
                // $tricolor_a = $data[0]; //static
                // for ($i=0; $i <= 11; $i++) { 
                //     $cell_no = array('E8','F8','G8','H8','I8','J8','K8','L8','M8','N8','O8','P8');
                //     $tricolor_b = $b_data[$i]; //with interation
                //     $tricolor_c = $tricolor_array[$i];
                //     $tricolor_ab = $tricolor_a - $tricolor_b;
                //     if ($tricolor_ab == 0) {
                //         $tricolor_percentage = 0;
                //         $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //         ->getFill()
                //         ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //         ->getStartColor()
                //         ->setARGB('FA0505');
                //         array_push($paper_tricolor_data, $tricolor_percentage);
                //     }
                //     else {
                //         $tricolor_d = ($tricolor_a - $tricolor_c)/$tricolor_ab; //with interation
                //         $tricolor_percentage = $tricolor_d * 100;
                //         $tricolor_percentage_round = round($tricolor_percentage, 0);
                //         array_push($paper_tricolor_data, $tricolor_percentage);

                //         if($tricolor_percentage_round >= 80){
                //             $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('00FF00');//GREEN
                            
                //         }
                //         elseif($tricolor_percentage_round >= 60 && $tricolor_percentage_round <= 79){
                //             $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('FAE605');//YELLOW
                //         }
                //         elseif($tricolor_percentage_round <= 59)
                //         {
                //             $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('FA0505');//RED
                //         }
                //     }
                // }
                // // PAPER END

                // //ENERGY
                // $fy_diff = ($energy_pastfyactual - $energy_target) * 0.5;
                // $pastfy_reduction = $energy_pastfyactual - $fy_diff;
                // $reduction = ($pastfy_reduction - $energy_pastfyactual)/12;

                // $data = array();
                // $a = $reduction;
                // $b = $energy_pastfyactual;
                // $c = $b + $a;
                // array_push($data, $c);

                // $energy_pastfy_tricolor_data = array();
                // $pastfy_tricolor_ab = $data[0] - $energy_pastfyactual;
                // if ($pastfy_tricolor_ab == 0) {
                //     $tricolor_percentage = 0;
                //     array_push($energy_pastfy_tricolor_data, $pastfy_tricolor_percentage);

                //     $event->sheet->getDelegate()->getStyle('D8')
                //     ->getFill()
                //     ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //     ->getStartColor()
                //     ->setARGB('FA0505');//RED
                // }
                // else {
                //     $pastfy_tricolor = ($data[0] - $energy_pastfyactual)/$pastfy_tricolor_ab;
                //     $pastfy_tricolor_percentage = $pastfy_tricolor * 100;
                //     $pastfy_tricolor_percentage_round = round($pastfy_tricolor_percentage, 0);
                //     array_push($energy_pastfy_tricolor_data, $pastfy_tricolor_percentage);
                    
                //     if($pastfy_tricolor_percentage_round >= 80){
                //         $event->sheet->getDelegate()->getStyle('D18')
                //         ->getFill()
                //         ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //         ->getStartColor()
                //         ->setARGB('00FF00');//GREEN
                //     }
                //     elseif($pastfy_tricolor_percentage_round >= 60 && $pastfy_tricolor_percentage_round <= 79){
                //         $event->sheet->getDelegate()->getStyle('D18')
                //         ->getFill()
                //         ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //         ->getStartColor()
                //         ->setARGB('FAE605');//YELLOW
                //     }
                //     elseif($pastfy_tricolor_percentage_round <= 59)
                //     {
                //         $event->sheet->getDelegate()->getStyle('D18')
                //         ->getFill()
                //         ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //         ->getStartColor()
                //         ->setARGB('FA0505');//RED
                //     }
                // }

                // $b_reduction = ($energy_target - $energy_pastfyactual)/12;

                // $b_data = array();
                // $a_2 = $b_reduction;
                // $b_2 = $energy_pastfyactual;
                // $c_2 = $b_2 + $a_2;
                // // $c_round = round($c, 2);
                // array_push($b_data, $c_2);

                // for ($i = 0; $i < 11; $i++){
                //     $b_next[$i] = $b_data[$i] + $a_2;
                //     // $next_round[$i] = round($next[$i], 2);
                //     array_push($b_data, $b_next[$i]);
                //     $b_data_round[$i] = round($b_data[$i], 1);
                // }

                // $sg_energy_target = array();
                // $sg_energy_actual = array();
                // //  energy_target_months(array) dep_id=sg(3) is from "24-35"
                // for ($i= 1; $i <= 12; $i++) { 
                //     array_push($sg_energy_target , $energy_target_months[$i]);
                //     array_push($sg_energy_actual , $energy_actual_months[$i]);
                // }
                // $a_energy_target = $energy_target;//$a
                // $array_sg_energy_target = array();//$bb
                // $array_sg_energy_actual = array();//$bb

                // $tricolor_array = array();//FOR TRICOLOR PERCENTAGE

                // for($i= 3; $i <= 11; $i++){
                //     array_push($array_sg_energy_target, $sg_energy_target[$i]);
                //     array_push($array_sg_energy_actual, $sg_energy_actual[$i]);
                //     $d = ($a_energy_target - array_sum($array_sg_energy_target)) + array_sum($array_sg_energy_actual);
                //     array_push($tricolor_array,$d);//for tricolor percentage
                // }
                // for($i= 0; $i <= 2; $i++){
                //     array_push($array_sg_energy_target, $sg_energy_target[$i]);
                //     array_push($array_sg_energy_actual, $sg_energy_actual[$i]);
                //     $d = ($a_energy_target - array_sum($array_sg_energy_target)) + array_sum($array_sg_energy_actual);
                //     array_push($tricolor_array,$d);//for tricolor percentage
                // }

                // $energy_tricolor_data = array();
                // $tricolor_a = $data[0]; //static
                // for ($i=0; $i <= 11; $i++) { 
                //     $cell_no = array('E18','F18','G18','H18','I18','J18','K18','L18','M18','N18','O18','P18');
                //     $tricolor_b = $b_data[$i]; //with interation
                //     $tricolor_c = $tricolor_array[$i];
                //     $tricolor_ab = $tricolor_a - $tricolor_b;
                //     if ($tricolor_ab == 0) {
                //         $tricolor_percentage = 0;
                //         array_push($energy_tricolor_data, $tricolor_percentage);

                //         $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //         ->getFill()
                //         ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //         ->getStartColor()
                //         ->setARGB('FA0505');//RED
                //     }
                //     else {
                //         $tricolor_d = ($tricolor_a - $tricolor_c)/$tricolor_ab; //with interation
                //         $tricolor_percentage = $tricolor_d * 100;
                //         $tricolor_percentage_round = round($tricolor_percentage, 0);
                //         array_push($energy_tricolor_data, $tricolor_percentage);

                //         if($tricolor_percentage_round >= 80){
                //             $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('00FF00');//GREEN
                //         }
                //         elseif($tricolor_percentage_round >= 60 && $tricolor_percentage_round <= 79){
                //             $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('FAE605');//YELLOW
                //         }
                //         elseif($tricolor_percentage_round <= 59)
                //         {
                //             $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('FA0505');//RED
                //         }
                //     }
                    
                // }
                // //ENERGY END

                // //WATER
                // $fy_diff = ($water_pastfyactual - $water_target) * 0.5;
                // $pastfy_reduction = $water_pastfyactual - $fy_diff;
                // $reduction = ($pastfy_reduction - $water_pastfyactual)/12;

                // $data = array();
                // $a = $reduction;
                // $b = $water_pastfyactual;
                // $c = $b + $a;
                // array_push($data, $c);

                // $water_pastfy_tricolor_data = array();
                // $pastfy_tricolor_ab = $data[0] - $water_pastfyactual;
                //         if ($pastfy_tricolor_ab == 0) {
                //             $pastfy_tricolor_percentage = 0;
                //             array_push($water_pastfy_tricolor_data, $pastfy_tricolor_percentage);

                //             $event->sheet->getDelegate()->getStyle('D28')
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('FA0505');//RED
                //         }
                //         else {
                //             $pastfy_tricolor = ($data[0] - $water_pastfyactual)/$pastfy_tricolor_ab;
                //             $pastfy_tricolor_percentage = $pastfy_tricolor * 100;
                //             $pastfy_tricolor_percentage_round = round($pastfy_tricolor_percentage, 0);
                //             array_push($water_pastfy_tricolor_data, $pastfy_tricolor_percentage);
                //             if($pastfy_tricolor_percentage_round >= 80){
                //                 $event->sheet->getDelegate()->getStyle('D28')
                //                 ->getFill()
                //                 ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //                 ->getStartColor()
                //                 ->setARGB('00FF00');//GREEN
                //             }
                //             elseif($pastfy_tricolor_percentage_round >= 60 && $pastfy_tricolor_percentage_round <= 79){
                //                 $event->sheet->getDelegate()->getStyle('D28')
                //                 ->getFill()
                //                 ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //                 ->getStartColor()
                //                 ->setARGB('FAE605');//YELLOW
                //             }
                //             elseif($pastfy_tricolor_percentage_round <= 59)
                //             {
                //                 $event->sheet->getDelegate()->getStyle('D28')
                //                 ->getFill()
                //                 ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //                 ->getStartColor()
                //                 ->setARGB('FA0505');//RED
                //             }
                //         }

                // $b_reduction = ($water_target - $water_pastfyactual)/12;

                // $b_data = array();
                // $a_2 = $b_reduction;
                // $b_2 = $water_pastfyactual;
                // $c_2 = $b_2 + $a_2;
                // array_push($b_data, $c_2);

                // for ($i = 0; $i < 11; $i++){
                //     $b_next[$i] = $b_data[$i] + $a_2;
                //     array_push($b_data, $b_next[$i]);
                //     $b_data_round[$i] = round($b_data[$i], 1);
                // }
               
                // $sg_water_target = array();
                // $sg_water_actual = array();
                // for ($i=1; $i <= 12; $i++) { 
                //     array_push($sg_water_target , $water_target_months[$i]);
                //     array_push($sg_water_actual , $water_actual_months[$i]);
                // }
                // $a_water_target = $water_target;//$a
                // $array_sg_water_target = array();//$bb
                // $array_sg_water_actual = array();//$bb    
                
                // $tricolor_array = array();//FOR TRICOLOR PERCENTAGE

                // for($i= 3; $i <= 11; $i++){
                // array_push($array_sg_water_target, $sg_water_target[$i]);
                // array_push($array_sg_water_actual, $sg_water_actual[$i]);
                // $d = ($a_water_target - array_sum($array_sg_water_target)) + array_sum($array_sg_water_actual);
                // array_push($tricolor_array,$d);//for tricolor percentage
                // }
                // for($i= 0; $i <= 2; $i++){
                //     array_push($array_sg_water_target, $sg_water_target[$i]);
                //     array_push($array_sg_water_actual, $sg_water_actual[$i]);
                //     $d = ($a_water_target - array_sum($array_sg_water_target)) + array_sum($array_sg_water_actual);
                //     array_push($tricolor_array,$d);//for tricolor percentage
                // }

                // $water_tricolor_data = array();
                // $tricolor_a = $data[0]; //static
                // for ($i=0; $i <= 11; $i++) { 
                //     $cell_no = array('E28','F28','G28','H28','I28','J28','K28','L28','M28','N28','O28','P28');
                //     $tricolor_b = $b_data[$i]; //with interation
                //     $tricolor_c = $tricolor_array[$i];
                //     $tricolor_ab = $tricolor_a - $tricolor_b;
                //     if ($tricolor_ab == 0) {
                //         $tricolor_percentage = 0;
                //         array_push($water_tricolor_data, $tricolor_percentage);

                //         $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('FA0505');//RED
                //     }
                //     else {
                //         $tricolor_d = ($tricolor_a - $tricolor_c)/$tricolor_ab; //with interation
                //         $tricolor_percentage = $tricolor_d * 100;
                //         $tricolor_percentage_round = round($tricolor_percentage, 0);
                //         array_push($water_tricolor_data, $tricolor_percentage);

                //         if($tricolor_percentage_round >= 80){
                //             $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('00FF00');//GREEN
                //         }
                //         elseif($tricolor_percentage_round >= 60 && $tricolor_percentage_round <= 79){
                //             $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('FAE605');//YELLOW
                //         }
                //         elseif($tricolor_percentage_round <= 59)
                //         {
                //             $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('FA0505');//RED
                //         }
                //     }
                // }
                // //WATER END

                // //OVERALL

                // //PAST FY
                //     $array_paper_pastfy_tricolor_data = array();
                //     $array_energy_pastfy_tricolor_data = array();
                //     $array_water_pastfy_tricolor_data = array();

                //             if ($paper_pastfy_tricolor_data[0] >= 100){
                //                 $paper_pastfy_tricolor_data[0] = 100;
                //                 array_push($array_paper_pastfy_tricolor_data, $paper_pastfy_tricolor_data[0]);
                //             }else{
                //                 array_push($array_paper_pastfy_tricolor_data, $paper_pastfy_tricolor_data[0]);
                //             }

                //             if ($energy_pastfy_tricolor_data[0] >= 100){
                //                 $energy_pastfy_tricolor_data[0] = 100;
                //                 array_push($array_energy_pastfy_tricolor_data, $energy_pastfy_tricolor_data[0]);
                //             }else{
                //                 array_push($array_energy_pastfy_tricolor_data, $energy_pastfy_tricolor_data[0]);
                //             }
                            
                //             if ($water_pastfy_tricolor_data[0] >= 100){
                //                 $water_pastfy_tricolor_data[0] = 100;
                //                 array_push($array_water_pastfy_tricolor_data, $water_pastfy_tricolor_data[0]);
                //             }else{
                //                 array_push($array_water_pastfy_tricolor_data, $water_pastfy_tricolor_data[0]);
                //             }
                        
                //     $past_overall_average = ($array_paper_pastfy_tricolor_data[0] + $array_energy_pastfy_tricolor_data[0] + $array_water_pastfy_tricolor_data[0]) / 3;
                //     $past_overall_average_round = round($past_overall_average, 0);

                //     if($past_overall_average_round >= 80){
                //         $event->sheet->getDelegate()->getStyle('D31')
                //         ->getFill()
                //         ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //         ->getStartColor()
                //         ->setARGB('00FF00');//GREEN
                //     }
                //     elseif($past_overall_average_round >= 60 && $past_overall_average_round <= 79){
                //         $event->sheet->getDelegate()->getStyle('D31')
                //         ->getFill()
                //         ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //         ->getStartColor()
                //         ->setARGB('FAE605');//YELLOW
                //     }
                //     elseif($past_overall_average_round <= 59)
                //     {
                //         $event->sheet->getDelegate()->getStyle('D31')
                //         ->getFill()
                //         ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //         ->getStartColor()
                //         ->setARGB('FA0505');//RED
                //     }
                

                //     //CURRENT FY
                //     $array_paper_tricolor_data = array();
                //     $array_energy_tricolor_data = array();
                //     $array_water_tricolor_data = array();

                //         for($j=0; $j <= 11; $j++){
                //             if ($paper_tricolor_data[$j] >= 100){
                //                 $paper_tricolor_data[$j] = 100;
                //                 array_push($array_paper_tricolor_data, $paper_tricolor_data[$j]);
                //             }else{
                //                 array_push($array_paper_tricolor_data, $paper_tricolor_data[$j]);
                //             }

                //             if ($energy_tricolor_data[$j] >= 100){
                //                 $energy_tricolor_data[$j] = 100;
                //                 array_push($array_energy_tricolor_data, $energy_tricolor_data[$j]);
                //             }else{
                //                 array_push($array_energy_tricolor_data, $energy_tricolor_data[$j]);
                //             }
                            
                //             if ($water_tricolor_data[$j] >= 100){
                //                 $water_tricolor_data[$j] = 100;
                //                 array_push($array_water_tricolor_data, $water_tricolor_data[$j]);
                //             }else{
                //                 array_push($array_water_tricolor_data, $water_tricolor_data[$j]);
                //             }
                //         }

                // for($i=0; $i <= 11; $i++){
                //     $cell_no = array('E31','F31','G31','H31','I31','J31','K31','L31','M31','N31','O31','P31');
                
                //         $overall_average = ($array_paper_tricolor_data[$i] + $array_energy_tricolor_data[$i] + $array_water_tricolor_data[$i]) / 3;
                //         $overall_average_round = round($overall_average, 0);
                    
                //         if($overall_average_round >= 80){
                //             $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('00FF00');//GREEN
                //         }
                //         elseif($overall_average_round >= 60 && $overall_average_round <= 79){
                //             $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('FAE605');//YELLOW
                //         }
                //         elseif($overall_average_round <= 59)
                //         {
                //             $event->sheet->getDelegate()->getStyle($cell_no[$i])
                //             ->getFill()
                //             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                //             ->getStartColor()
                //             ->setARGB('FA0505');//RED
                //         }
                // }
                // //OVERALL END

                        // new clark
                        $event->sheet->getStyle('D8:P9')->getNumberFormat()->setFormatCode('0%');
                        $event->sheet->getStyle('D18:P19')->getNumberFormat()->setFormatCode('0%');
                        $event->sheet->getStyle('D28:P29')->getNumberFormat()->setFormatCode('0%');
                        $event->sheet->getStyle('D31:P31')->getNumberFormat()->setFormatCode('0%');

                        // Conditional Formatting -> Start

                            // RED
							$tri_color_red_highlights = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
							$tri_color_red_highlights->setConditionType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CELLIS);
							$tri_color_red_highlights->setOperatorType(\PhpOffice\PhpSpreadsheet\Style\Conditional::OPERATOR_LESSTHANOREQUAL);
							$tri_color_red_highlights->addCondition(0.49);
							$tri_color_red_highlights->getStyle()->getFont()->getColor()->setARGB('000000');
							$tri_color_red_highlights->getStyle()->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getEndColor()->setARGB('FF0000');
							
                            //YELLOW
                            $tri_color_yellow_greaterthanorequal_highlights = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
							$tri_color_yellow_greaterthanorequal_highlights->setConditionType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CELLIS);
							$tri_color_yellow_greaterthanorequal_highlights->setOperatorType(\PhpOffice\PhpSpreadsheet\Style\Conditional::OPERATOR_GREATERTHAN);
							$tri_color_yellow_greaterthanorequal_highlights->addCondition(0.5);
							$tri_color_yellow_greaterthanorequal_highlights->getStyle()->getFont()->getColor()->setARGB('000000');
							$tri_color_yellow_greaterthanorequal_highlights->getStyle()->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getEndColor()->setARGB('FFFF00');

                            $tri_color_yellow_lessthanorequal_highlights = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
							$tri_color_yellow_lessthanorequal_highlights->setConditionType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CELLIS);
							$tri_color_yellow_lessthanorequal_highlights->setOperatorType(\PhpOffice\PhpSpreadsheet\Style\Conditional::OPERATOR_LESSTHAN);
							$tri_color_yellow_lessthanorequal_highlights->addCondition(0.79);
							$tri_color_yellow_lessthanorequal_highlights->getStyle()->getFont()->getColor()->setARGB('000000');
							$tri_color_yellow_lessthanorequal_highlights->getStyle()->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getEndColor()->setARGB('FFFF00');

                            // $wizardFactory = new \PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting\Wizard('D8:P8');
                            // $tri_color_yellow_highlights = $wizardFactory->newRule(\PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting\Wizard::CELL_VALUE);
                            // $tri_color_yellow_highlights->between(0.5)->and(0.79);
                            // $tri_color_yellow_highlights->getStyle()->getFont()->getColor()->setARGB('000000');
							// $tri_color_yellow_highlights->getStyle()->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getEndColor()->setARGB('FFFF00');

                            // $conditionalStyles[] = $tri_color_yellow_highlights->getConditional();
                            // $event->sheet->getStyle($cellWizard->getCellRange())->setConditionalStyles($conditionalStyles);

                            //GREEN
                            $tri_color_green_highlights = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
							$tri_color_green_highlights->setConditionType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CELLIS);
							$tri_color_green_highlights->setOperatorType(\PhpOffice\PhpSpreadsheet\Style\Conditional::OPERATOR_GREATERTHANOREQUAL);
							$tri_color_green_highlights->addCondition(0.8);
							$tri_color_green_highlights->getStyle()->getFont()->getColor()->setARGB('000000');
							$tri_color_green_highlights->getStyle()->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getEndColor()->setARGB('00FF00');
							
							$tri_color_highlights_array = $event->sheet->getStyle('D8:P8')->getConditionalStyles();
							$tri_color_highlights_array = $event->sheet->getStyle('D18:P18')->getConditionalStyles();
							$tri_color_highlights_array = $event->sheet->getStyle('D28:P28')->getConditionalStyles();
							$tri_color_highlights_array = $event->sheet->getStyle('D31:P31')->getConditionalStyles();

                            $tri_color_highlights_array[] = $tri_color_green_highlights;
							$tri_color_highlights_array[] = $tri_color_red_highlights;
                            $tri_color_highlights_array[] = $tri_color_yellow_greaterthanorequal_highlights;
                            $tri_color_highlights_array[] = $tri_color_yellow_lessthanorequal_highlights;

							$event->sheet->getStyle(('D8:P8'))->setConditionalStyles($tri_color_highlights_array);
							$event->sheet->getStyle(('D18:P18'))->setConditionalStyles($tri_color_highlights_array);
							$event->sheet->getStyle(('D28:P28'))->setConditionalStyles($tri_color_highlights_array);
							$event->sheet->getStyle(('D31:P31'))->setConditionalStyles($tri_color_highlights_array);

                        // Conditional Formatting -> End
            }
            
        ];
    }

    public function title(): string
        {
            return 'SG';
        }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'D' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'E' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'F' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'H' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'I' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'J' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'K' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'L' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'M' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'N' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'O' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'P' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'Q' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }

    public function view(): View
    {
        return view('exports/export_sg',[

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
            'water_pastfytarget'=> $this->water_pastfytarget_ave
        ]);
    }

}