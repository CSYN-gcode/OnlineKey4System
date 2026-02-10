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

class export_yf implements FromView, WithEvents, WithTitle, WithColumnFormatting
{
    public function __construct(
        
        $Paper_PastFyActual_Prod_Ream,
        $Paper_Target_Prod_Ream,
        $Paper_Target_Months_Prod_Ream,
        $Paper_Actual_Months_Prod_Ream,
        $CurrentFY_year,
        $pastFy_year,
        $Paper_PastFyTarget_Prod_Ream
    )
    {   
       $this->paper_pastfyactual_prod = $Paper_PastFyActual_Prod_Ream;
       $this->paper_target_prod = $Paper_Target_Prod_Ream;
       $this->paper_target_months_prod = $Paper_Target_Months_Prod_Ream;
       $this->paper_actual_months_prod = $Paper_Actual_Months_Prod_Ream;
       $this->current_fy_year = $CurrentFY_year;
       $this->past_fy_year = $pastFy_year;
       $this->paper_pastfytarget_prod = $Paper_PastFyTarget_Prod_Ream;
    }

    public function registerEvents(): array
    {

        $paper_pastfyactual_prod = $this->paper_pastfyactual_prod;
        $paper_target_prod = $this->paper_target_prod;
        $target_months =  $this->paper_target_months_prod;
        $actual_months = $this->paper_actual_months_prod;
        
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
           
            AfterSheet::class => function(AfterSheet $event) use ($styleHeader,$stylecell,$style2,$style4,$paper_pastfyactual_prod,$paper_target_prod,$target_months,$actual_months){

                    //BORDER ALL
                    
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

                    // test
                //COMPUTED TRICOLOR RATE PAST MARCH
                $pastfyactual = $paper_pastfyactual_prod;
                $target = $paper_target_prod;

                $fy_diff = ($pastfyactual[4] - $target[4]) * 0.5;
                $pastfy_reduction = $pastfyactual[4] - $fy_diff;
                $reduction = ($pastfy_reduction - $pastfyactual[4])/12;

                    $data = array();
                    $a = $reduction;
                    $b = $pastfyactual[4];
                    $c = $b + $a;
                    array_push($data, $c);

                    $pastfy_tricolor_ab = $data[0] - $pastfyactual[4];
                if ($pastfy_tricolor_ab == 0) {

                    $event->sheet->getDelegate()->getStyle('D8')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FA0505');
                }
                else {
                    $pastfy_tricolor = ($data[0] - $pastfyactual[4])/$pastfy_tricolor_ab;
                    $pastfy_tricolor_percentage = $pastfy_tricolor * 100;
                    $pastfy_tricolor_percentage_round = round($pastfy_tricolor_percentage, 0);
                    if($pastfy_tricolor_percentage_round >= 80){
                        $event->sheet->getDelegate()->getStyle('D8')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('00FF00');//GREEN
                    }
                    elseif($pastfy_tricolor_percentage_round >= 60 && $pastfy_tricolor_percentage_round <= 79){
                        $event->sheet->getDelegate()->getStyle('D8')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FAE605');//YELLOW
                    }
                    elseif($pastfy_tricolor_percentage_round <= 59)
                    {
                        $event->sheet->getDelegate()->getStyle('D8')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('FA0505');//RED
                    }
                }

                    //COMPUTED TRICOLOR RATE CURRENT APRIL-MAR 
                    $b_reduction = ($target[4] - $pastfyactual[4])/12;
                    $b_data = array();
                    $a_2 = $b_reduction;
                    $b_2 = $pastfyactual[4];
                    $c_2 = $b_2 + $a_2;
                    array_push($b_data, $c_2);

                    for ($i = 0; $i < 11; $i++){
                        $b_next[$i] = $b_data[$i] + $a_2;
                        array_push($b_data, $b_next[$i]);
                    }

                    $yf_target = array();
                    $yf_actual = array();
                    //  target_months(array) dep_id=TS(3) is from "24-35"
                    for ($i=36; $i <= 47; $i++) { 
                        array_push($yf_target , $target_months[$i]);
                        array_push($yf_actual , $actual_months[$i]);
                    }

                    $a_target = $target[4];//$a
                    $array_yf_target = array();//$bb
                    $array_yf_actual = array();//$bb
                    $tricolor_array = array();//FOR TRICOLOR PERCENTAGE

                    for($i= 3; $i <= 11; $i++){
                    array_push($array_yf_target, $yf_target[$i]);
                    array_push($array_yf_actual, $yf_actual[$i]);
                    $d = ($a_target - array_sum($array_yf_target)) + array_sum($array_yf_actual);
                    array_push($tricolor_array,$d);//for tricolor percentage
                    }
                    for($i= 0; $i <= 2; $i++){
                    array_push($array_yf_target, $yf_target[$i]);
                    array_push($array_yf_actual, $yf_actual[$i]);
                    $d = ($a_target - array_sum($array_yf_target)) + array_sum($array_yf_actual);
                    array_push($tricolor_array,$d);//for tricolor percentage
                    }

                    $tricolor_a = $data[0]; //static
                    for ($i= 0; $i <= 11; $i++) 
                    { 
                        $cell_no = array('E8','F8','G8','H8','I8','J8','K8','L8','M8','N8','O8','P8');
                        $tricolor_b = $b_data[$i]; //with interation
                        $tricolor_c = $tricolor_array[$i];
                        $tricolor_ab = $tricolor_a - $tricolor_b;
                        if ($tricolor_ab == 0) {
                            $event->sheet->getDelegate()->getStyle($cell_no[$i])
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FA0505');
                        }
                        else {
                            $tricolor_d = ($tricolor_a - $tricolor_c)/$tricolor_ab; //with interation
                            $tricolor_percentage = $tricolor_d * 100;
                            $tricolor_percentage_round = round($tricolor_percentage, 0);

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
                        // test_end

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

                $event->sheet->getDelegate()->getStyle('D11')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('00FF00');

                $event->sheet->getDelegate()->getStyle('P6')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FF00FF');

                $event->sheet->getDelegate()->getStyle('Q11:Q15')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFF00');

                $event->sheet->getDelegate()->getStyle('A12:P15')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('00B0F0');

                $event->sheet->getDelegate()->getStyle('D2:P2')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('D9E1F2');

                $event->sheet->getDelegate()->getStyle('E11:P11')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFFCC');

                // $event->sheet->getDelegate()->getStyle('E8:P8')
                //     ->getNumberFormat()
                //     ->applyFromArray( 
                //         array( 
                //             'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE_00
                //         )
                //     );
                    // $event->sheet->getDelegate()->getStyle('E8:P8')
                    // ->getNumberFormat()->applyFromArray( 
                    //     array( 
                    //         'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE_00
                    //     )
                    // );
                // $event->sheet->setColumnFormat(array('E8:P8' => '0%'));

                $event->sheet->getColumnDimension('A')->setWidth(25);
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

                                $event->sheet->getStyle("A1")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("A11")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("A15")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C12:C13")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("D11:Q11")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("D2:P2")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C11")->applyFromArray($styleHeader);
                                // $event->sheet->getStyle("C23")->applyFromArray($styleHeader);
                                // $event->sheet->getStyle("C53")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("A1:P9")->applyFromArray($stylecell);
                                $event->sheet->getStyle("A11:Q15")->applyFromArray($stylecell);

                                $event->sheet->getDelegate()->getStyle("D2:P2")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("D11:Q11")->applyFromArray($style2);

                                $event->sheet->getDelegate()->getStyle("B4:B7")->applyFromArray($style4);
                                $event->sheet->getDelegate()->getStyle("D3:P9")->applyFromArray($style4);
                                $event->sheet->getDelegate()->getStyle("D13:Q15")->applyFromArray($style4);
            }
        ];
    }

    // public function columnFormats(): array
    // {
    //     return [
    //         'E8:P8' => NumberFormat::FORMAT_PERCENTAGE
    //         // 'C' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
    //     ];
    // }

    public function title(): string
        {
            return 'YF';
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
        return view('exports/export_yf',[

            'pastfyactual'=>$this->paper_pastfyactual_prod,
            'target'=>$this->paper_target_prod,
            'target_months'=>$this->paper_target_months_prod,
            'actual_months'=>$this->paper_actual_months_prod,
            'currentfy'=>$this->current_fy_year,
            'pastfy'=>$this->past_fy_year,
            'pastfytarget'=>$this->paper_pastfytarget_prod
        ]);
    }

}