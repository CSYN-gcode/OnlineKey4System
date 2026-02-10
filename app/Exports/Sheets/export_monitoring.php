<?php

namespace App\Exports\Sheets;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
// use Maatwebsite\Excel\Concerns\WithColumnWidths;
// use PhpOffice\PhpSpreadsheet\Style\FromQuery;

class export_monitoring implements FromView, WithEvents, WithTitle, WithColumnFormatting
{
    public function __construct(
        $Energy_PastFyActual_Average,
        $Energy_Target_Average,
        $Energy_Actual_Average,
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
        $pastFy_year
    )
    {
       $this->energy_pastfyactual_ave = $Energy_PastFyActual_Average;
       $this->energy_target_ave = $Energy_Target_Average;
       $this->energy_actual_ave = $Energy_Actual_Average;
       $this->energy_target_months = $Energy_Target_Months;
       $this->energy_actual_months = $Energy_Actual_Months;
       $this->water_pasftyactual_ave = $Water_PastFyActual_Average;
       $this->water_target_ave = $Water_Target_Average;
       $this->water_target_sum = $Water_Target_Sum;
       $this->water_actualmp_ave = $Water_Actual_mp_ave; //6.1
       $this->water_actual_consumption_ave = $Water_Actual_consumption_ave; //6.2
       $this->water_actual_ave = $Water_Actual_Average; //6.3
       $this->water_target_months = $Water_Target_Months;
       $this->water_actual_months = $Water_Actual_Months;
       $this->water_mpcount_months = $Water_MPCount_Months;
       $this->water_actualpermp_months = $Water_Actualpermp_Months;
    //    $this->water_fac1_actual_months = $Water_Fac1_Actual_Months;
    //    $this->water_fac2_actual_months = $Water_Fac2_Actual_Months;
    //    $this->water_fac1_mpcount_months = $Water_Fac1_MPCount_Months;
    //    $this->water_fac2_mpcount_months = $Water_Fac2_MPCount_Months;
       $this->paper_pastfyactual_prod = $Paper_PastFyActual_Prod_Ream;
       $this->paper_pastfyactual_sg = $Paper_PastActual_SG_Ream;
       $this->total_paper_pastfyactual = $TotalPaper_Past_FY_Actual;
       $this->paper_target_prod = $Paper_Target_Prod_Ream;
       $this->paper_target_sg = $Paper_Target_SG_Ream;
       $this->total_paper_currentfytarget = $TotalPaper_Current_FY_Target;
       $this->paper_target_months_prod = $Paper_Target_Months_Prod_Ream;
       $this->paper_target_months_sg = $Paper_Target_Months_SG_Ream;
       $this->paper_actual_months_prod = $Paper_Actual_Months_Prod_Ream;
       $this->paper_actual_months_sg = $Paper_Actual_Months_SG_Ream;
       $this->ink_past_actual = $Ink_Past_Actual;
       $this->ink_current_target = $Ink_Current_Target;
       $this->ink_target_months = $Ink_Target_Months;
       $this->ink_actual_months = $Ink_Actual_Months;
       $this->current_fy_year = $CurrentFY_year;
       $this->past_fy_year = $pastFy_year;
    }

    public function registerEvents(): array
    {
            //BOLD HEADING WITH BORDERS
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

                // $styleOutline_right = [
                //             'font' => [
                //                 'bold' => true
                //             ],
                //             'borders' => [
                //                 'right' => [
                //                     'borderStyle' => 'medium',
                //                     'color' => ['rgb' => '#000000']
                //                 ],
                //             ]
                //         ];

                // $styleOutline_bottom = [
                //             'font' => [
                //                 'bold' => true
                //             ],
                //             'borders' => [
                //                 'bottom' => [
                //                     'borderStyle' => 'thin',
                //                     'color' => ['rgb' => '#000000']
                //                 ],
                //             ]
                //         ];

                // $styleOutline_top = [
                //             'font' => [
                //                 'bold' => true
                //             ],
                //             'borders' => [
                //                 'top' => [
                //                     'borderStyle' => 'medium',
                //                     'color' => ['rgb' => '#000000']
                //                 ],
                //             ]
                //         ];

                $stylecell = [
                            'borders' => [
                                'allBorders' => [
                                    'borderStyle' => 'thin',
                                    'color' => ['rgb' => '#000000']
                                ],
                            ]
                        ];

                // $stylecell_top_only = [
                //             'borders' => [
                //                 'top' => [
                //                     'borderStyle' => 'medium',
                //                     'color' => ['rgb' => '#000000']
                //                 ],
                //             ]
                //         ];
                // $style1 = array(
                //     'font' => array(
                //         'name'      =>  'Calibri',
                //         'size'      =>  12,
                //         // 'color'      =>  'red',
                //         // 'italic'      =>  true
                //     )
                // );

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

            AfterSheet::class => function(AfterSheet $event) use ($styleHeader,$stylecell,$style2,$style4){

                //BORDER ALL
                $event->sheet->getStyle("A1:Q11")->applyFromArray($stylecell);
                $event->sheet->getStyle("A13:Q23")->applyFromArray($stylecell);
                $event->sheet->getStyle("A25:Q53")->applyFromArray($stylecell);
                $event->sheet->getStyle("A55:Q76")->applyFromArray($stylecell);

                $event->sheet->getDelegate()->getStyle('A1:Q11')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFFCD');

                $event->sheet->getDelegate()->getStyle('A13:Q23')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFFCD');

                $event->sheet->getDelegate()->getStyle('A25:Q53')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFFCD');

                $event->sheet->getDelegate()->getStyle('A55:Q76')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFFCD');

                $event->sheet->getColumnDimension('A')->setWidth(60);
                $event->sheet->getColumnDimension('B')->setWidth(10);
                $event->sheet->getColumnDimension('C')->setWidth(15);
                $event->sheet->getColumnDimension('D')->setWidth(15);
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


                                $event->sheet->getStyle("A1:Q1")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("A13")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C11")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C23")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C53")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C76")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C13:Q13")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("A25")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("A33")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("A41")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("A55")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C25:Q25")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("D8:D9")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("E19:Q19")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("D20:D21")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("D50:D51")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("D73:D74")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C33:Q33")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C41:Q41")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("E49:Q49")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C55:Q55")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("E72:Q72")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("E7:Q7")->applyFromArray($styleHeader);

                                $event->sheet->getDelegate()->getStyle("B1:Q1")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("C41:Q41")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("C25:Q25")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("E49:Q49")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("C33:Q33")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("C55:Q55")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("E19:Q19")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("E72:Q72")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("E7:Q7")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("C13:Q13")->applyFromArray($style2);

                                $event->sheet->getDelegate()->getStyle("C14:Q17")->applyFromArray($style4);
                                $event->sheet->getDelegate()->getStyle("E8:Q11")->applyFromArray($style4);
                                $event->sheet->getDelegate()->getStyle("C3:Q5")->applyFromArray($style4);
                                $event->sheet->getDelegate()->getStyle("E20:Q23")->applyFromArray($style4);
                                $event->sheet->getDelegate()->getStyle("B26:Q31")->applyFromArray($style4);
                                $event->sheet->getDelegate()->getStyle("B34:Q39")->applyFromArray($style4);
                                $event->sheet->getDelegate()->getStyle("B42:Q47")->applyFromArray($style4);
                                $event->sheet->getDelegate()->getStyle("E50:Q53")->applyFromArray($style4);
                                $event->sheet->getDelegate()->getStyle("C56:Q70")->applyFromArray($style4);
                                $event->sheet->getDelegate()->getStyle("E73:Q76")->applyFromArray($style4);

            }
        ];
    }

    public function title(): string
        {
            return 'Monitoring';
        }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'C' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
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
    
    // public function columnWidths(): array
    // {
    //     return [
    //         // 'A' => 55,
    //         // 'B' => 45,
    //         'E' => 500,
    //     ];
    // }

    public function view(): View
    {
        return view('exports/export_monitoring',[

            // 'months'=>$this->month_name,
        'export_energy_pastfyactual_ave'   => $this->energy_pastfyactual_ave,
        'export_energy_target_ave' => $this->energy_target_ave,
        'export_energy_actual_ave' => $this->energy_actual_ave,
        'export_energy_target_months'  => $this->energy_target_months,
        'export_energy_actual_months' => $this->energy_actual_months,
        'export_water_pasftyactual_ave' => $this->water_pasftyactual_ave,
        'export_water_target_ave' => $this->water_target_ave,
        'export_water_target_sum' => $this->water_target_sum,
        'export_water_actualmp_ave' => $this->water_actualmp_ave, //6.1
        'export_water_actual_consumption_ave' => $this->water_actual_consumption_ave, //6.2
        'export_water_actual_ave' => $this->water_actual_ave, //6.3
        'export_water_target_months' => $this->water_target_months,
        'export_water_actual_months' => $this->water_actual_months,
        'export_water_mpcount_months' => $this->water_mpcount_months,
        'export_water_actualpermp_months' => $this->water_actualpermp_months,
        // 'export_water_fac1_actual_months'  => $this->water_fac1_actual_months,
        // 'export_water_fac2_actual_months' => $this->water_fac2_actual_months,
        // 'export_water_fac1_mpcount_months' => $this->water_fac1_mpcount_months,
        // 'export_water_fac2_mpcount_months' => $this->water_fac2_mpcount_months,
        'export_paper_pastfyactual_prod'  => $this->paper_pastfyactual_prod,
        'export_paper_pastfyactual_sg'  => $this->paper_pastfyactual_sg,
        'export_total_paper_pastfyactual'  => $this->total_paper_pastfyactual,
        'export_paper_target_prod' => $this->paper_target_prod,
        'export_paper_target_sg' => $this->paper_target_sg,
        'export_total_paper_currentfytarget'  => $this->total_paper_currentfytarget,
        'export_paper_target_months_prod' => $this->paper_target_months_prod,
        'export_paper_target_months_sg' => $this->paper_target_months_sg,
        'export_paper_actual_months_prod' => $this->paper_actual_months_prod,
        'export_paper_actual_months_sg' => $this->paper_actual_months_sg,
        'export_ink_past_actual'  => $this->ink_past_actual,
        'export_ink_current_target'   => $this->ink_current_target,
        'export_ink_target_months'  => $this->ink_target_months,
        'export_ink_actual_months' => $this->ink_actual_months,
        'currentfy'=>$this->current_fy_year,
        'pastfy'=>$this->past_fy_year
        ]);
    }

}
