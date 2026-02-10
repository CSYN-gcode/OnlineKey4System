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
// use Maatwebsite\Excel\Concerns\WithColumnWidths;

class export_monitoring implements FromView, ShouldAutoSize, WithEvents, WithTitle
{
    public function __construct(
        $Energy_Target_Average,
        $Energy_PastFyActual_Average,
        $Energy_Target_Months,
        $Energy_Actual_Months,
        $Water_Target_Average,
        $Water_PastFyActual_Average,
        $Water_Fac1_Actual_Months,
        $Water_Fac2_Actual_Months,
        $Water_Fac1_MPCount_Months,
        $Water_Fac2_MPCount_Months,
        $Paper_Target_Prod_Ream,
        $Paper_PastFyActual_Prod_Ream,
        $Paper_Target_SG_Ream,
        $Paper_PastActual_SG_Ream,
        $Paper_Target_Months_Prod_Ream,
        $Paper_Actual_Months_Prod_Ream,
        $Paper_Target_SG_Months_Ream,
        $Paper_Actual_SG_Months_Ream,
        $TotalPaper_Past_FY_Actual,
        $TotalPaper_Current_FY_Target,
        $Ink_Current_Target,
        $Ink_Past_Actual,
        $Ink_Target_Months,
        $Ink_Actual_Months
    )
    {   
       $this->energy_target_ave = $Energy_Target_Average;
       $this->energy_pastfyactual_ave = $Energy_PastFyActual_Average;
       $this->energy_target_months = $Energy_Target_Months;
       $this->energy_actual_months = $Energy_Actual_Months;
       $this->water_target_ave = $Water_Target_Average;
       $this->water_pasftyactual_ave = $Water_PastFyActual_Average;
       $this->water_fac1_actual_months = $Water_Fac1_Actual_Months;
       $this->water_fac2_actual_months = $Water_Fac2_Actual_Months;
       $this->water_fac1_mpcount_months = $Water_Fac1_MPCount_Months;
       $this->water_fac2_mpcount_months = $Water_Fac2_MPCount_Months;
       $this->paper_pastfyactual_prod = $Paper_PastFyActual_Prod_Ream;
       $this->paper_pastfyactual_sg = $Paper_PastActual_SG_Ream;
       $this->total_paper_pastfyactual = $TotalPaper_Past_FY_Actual;
       $this->paper_target_prod = $Paper_Target_Prod_Ream;
       $this->paper_target_sg = $Paper_Target_SG_Ream;
       $this->total_paper_currentfytarget = $TotalPaper_Current_FY_Target;
       $this->paper_target_months_prod = $Paper_Target_Months_Prod_Ream;
       $this->paper_actual_months_prod = $Paper_Actual_Months_Prod_Ream;
       $this->paper_target_sg = $Paper_Target_SG_Months_Ream;
       $this->paper_actual_sg = $Paper_Actual_SG_Months_Ream;
       $this->ink_past_actual = $Ink_Past_Actual;
       $this->ink_current_target = $Ink_Current_Target;
       $this->ink_target_months = $Ink_Target_Months;
       $this->ink_actual_months = $Ink_Actual_Months;
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
                $event->sheet->getStyle("A55:Q66")->applyFromArray($stylecell);

                $event->sheet->getDelegate()->getStyle('A1:Q11')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFF2CC');
                    
                $event->sheet->getDelegate()->getStyle('A13:Q23')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFF2CC');

                $event->sheet->getDelegate()->getStyle('A25:Q53')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFF2CC');

                $event->sheet->getDelegate()->getStyle('A55:Q66')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFF2CC');


                                $event->sheet->getStyle("A1:Q1")->applyFromArray($styleHeader);
                                // $event->sheet->getStyle("A1:Q5")->applyFromArray($stylecell);  
                                // $event->sheet->getStyle("A2:Q5")->applyFromArray($stylecell);
                                $event->sheet->getStyle("A13")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C11")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C23")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C53")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C66")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C13:Q13")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("A25")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("A33")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("A41")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("A55")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C25:Q25")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("D8:D9")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("D50:D59")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("E19:Q19")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("D20:D21")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("D63:D64")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C33:Q33")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C41:Q41")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("E49:Q49")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("C55:Q55")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("E62:Q62")->applyFromArray($styleHeader);
                                $event->sheet->getStyle("E7:Q7")->applyFromArray($styleHeader);

                                $event->sheet->getDelegate()->getStyle("B1:Q1")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("C41:Q41")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("C25:Q25")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("E49:Q49")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("C33:Q33")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("C55:Q55")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("E19:Q19")->applyFromArray($style2);
                                $event->sheet->getDelegate()->getStyle("E62:Q62")->applyFromArray($style2);
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
                                $event->sheet->getDelegate()->getStyle("C56:Q60")->applyFromArray($style4);
                                $event->sheet->getDelegate()->getStyle("E63:Q66")->applyFromArray($style4);

                                
                                
                                // $event->sheet->getStyle("Q1:Q68")->applyFromArray($styleOutline_right);
                                // $event->sheet->getStyle("Q1:Q68")->applyFromArray($styleOutline_bottom);
                                // $event->sheet->getStyle("A1:P1")->applyFromArray($styleOutline_top);
                                // $event->sheet->getStyle("A7:P7")->applyFromArray($stylecell_top_only);
                                        
                
            }
        ];
    }

    public function title(): string
        {
            return 'Monitoring';
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
        'export_energy_target_ave' => $this->energy_target_ave,
        'export_energy_pastfyactual_ave'   => $this->energy_pastfyactual_ave,
        'export_energy_target_months'  => $this->energy_target_months,
        'export_energy_actual_months' => $this->energy_actual_months,
        'export_water_target_ave' => $this->water_target_ave,
        'export_water_pasftyactual_ave' => $this->water_pasftyactual_ave,
        'export_paper_target_prod' => $this->paper_target_prod,
        'export_paper_pastfyactual_prod'  => $this->paper_pastfyactual_prod,
        'export_paper_target_sg' => $this->paper_target_sg,
        'export_paper_pastfyactual_sg'  => $this->paper_pastfyactual_sg,
        'export_total_paper_pastfyactual'  => $this->total_paper_pastfyactual,
        'export_total_paper_currentfytarget'  => $this->total_paper_currentfytarget,
        'export_ink_current_target'   => $this->ink_current_target,
        'export_ink_past_actual'  => $this->ink_past_actual,
        'export_water_fac1_actual_months'  => $this->water_fac1_actual_months,
        'export_water_fac2_actual_months' => $this->water_fac2_actual_months,
        'export_water_fac1_mpcount_months' => $this->water_fac1_mpcount_months,
        'export_water_fac2_mpcount_months' => $this->water_fac2_mpcount_months,
        'export_paper_target_months_prod' => $this->paper_target_months_prod,
        'export_paper_actual_months_prod' => $this->paper_actual_months_prod,
        'export_paper_target_sg' => $this->paper_target_sg,
        'export_paper_actual_sg' => $this->paper_actual_sg,
        'export_ink_target_months'  => $this->ink_target_months,
        'export_ink_actual_months' => $this->ink_actual_months
        ]);
    }

}