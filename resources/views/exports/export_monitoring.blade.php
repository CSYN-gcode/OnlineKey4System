<table class="table table-striped">
    <thead>
        <!--  ROW -->
        @php
            $currentfy_plus1 = $currentfy + 1; 
        @endphp
    <tr>
        <th>ENERGY CONSUMPTION (FY{{ $currentfy }} - based on KwH per $1K Sales)</th>
        <th>&nbsp;</th>
        <th>{{ 'FY '.$pastfy.' Actual'}}</th>
        <th>{{ 'FY '.$currentfy.' Target'}}</th>
        <th>{{ 'Apr-'.$currentfy}}</th>
        <th>{{ 'May-'.$currentfy}}</th>
        <th>{{ 'Jun-'.$currentfy}}</th>
        <th>{{ 'Jul-'.$currentfy}}</th>
        <th>{{ 'Aug-'.$currentfy}}</th>
        <th>{{ 'Sep-'.$currentfy}}</th>
        <th>{{ 'Oct-'.$currentfy}}</th>
        <th>{{ 'Nov-'.$currentfy}}</th>
        <th>{{ 'Dec-'.$currentfy}}</th>
        <th>{{ 'Jan-'.$currentfy_plus1}}</th>
        <th>{{ 'Feb-'.$currentfy_plus1}}</th>
        <th>{{ 'Mar-'.$currentfy_plus1}}</th>
        <th>&nbsp; Average </th>
    </tr>
            
        <!-- END  ROW -->

    <tr>
        <!--  ROW -> BLANK ROW -->
    </tr>
        <!-- END  ROW -->        
        
    </thead>
    <tbody>
        <!-- ENERGY TARGET ROW -->
        <tr>
            <td>Monthly Target</td>
            
            <td></td>
            <td>{{ $export_energy_pastfyactual_ave }}</td>
            <td>{{ $export_energy_target_ave}}</td>
            {{-- LOOP FOR APRIL TO DEC --}}
            @php
                $ave_target_energy = $export_energy_target_ave;
                $ave_actual_energy = $export_energy_actual_ave;

            for ($i = 4; $i <= 12; $i++){
                if ($export_energy_target_months[$i] !== null) {
                    $energy_target_months_round = round($export_energy_target_months[$i], 2);
                    echo '<td>'.$energy_target_months_round.'</td>';
                    }
                else {
                echo '<td>'.$export_energy_target_months[$i].'</td>';
                }
            }
            // {{-- LOOP FOR JAN TO MAR --}}
            for ($i = 1; $i <= 3; $i++){
                if ($export_energy_target_months[$i] !== null) {
                    $energy_target_months_round = round($export_energy_target_months[$i], 2);
                    echo '<td>'.$energy_target_months_round.'</td>';
                    }
                else {
                echo '<td>'.$export_energy_target_months[$i].'</td>';
                }
            }
            @endphp

            <td>{{ $ave_target_energy }}</td>
                
        </tr> 
        <!-- END ENERGY TARGET ROW -->

        <!-- ENERGY KwH/Consumption ROW -->
        <tr>
            <td>KwH/Consumption</td>
            <td></td>
            <td></td>
            <td></td>
            @php
            for ($i = 4; $i <= 12; $i++){
                if ($export_energy_actual_months[$i] !== null) {
                    $energy_actual_months_round = round($export_energy_actual_months[$i], 2);
                echo '<td>'.$energy_actual_months_round.'</td>';
                    }
                else {
                echo '<td>'.$export_energy_actual_months[$i].'</td>';
                }
            }
            // {{-- LOOP FOR JAN TO MAR --}}
            for ($i = 1; $i <= 3; $i++){
                if ($export_energy_actual_months[$i] !== null) {
                    $energy_actual_months_round = round($export_energy_actual_months[$i], 2);
                echo '<td>'.$energy_actual_months_round.'</td>';
                    }
                else {
                echo '<td>'.$export_energy_actual_months[$i].'</td>';
                }
            }
            @endphp

            <td>{{ $ave_actual_energy }}</td>
                
        </tr> 
        <!-- END ENERGY KwH/Consumption ROW -->

        <!-- ENERGY ACTUAL ROW -->
        <tr>
            <td>Monthly Actual</td>
            <td></td>
            <td>{{ $export_energy_pastfyactual_ave }}</td>
            <td>{{ $export_energy_target_ave}}</td>
            @php
            for ($i = 4; $i <= 12; $i++){
                if ($export_energy_actual_months[$i] !== null) {
                    $energy_actual_months_round = round($export_energy_actual_months[$i], 2);
                    echo '<td>'.$energy_actual_months_round.'</td>';
                    }
                else {
                echo '<td>'.$export_energy_actual_months[$i].'</td>';
                }
            }
            // {{-- LOOP FOR JAN TO MAR --}}
            for ($i = 1; $i <= 3; $i++){
                if ($export_energy_actual_months[$i] !== null) {
                    $energy_actual_months_round = round($export_energy_actual_months[$i], 2);
                    echo '<td>'.$energy_actual_months_round.'</td>';
                    }
                else {
                echo '<td>'.$export_energy_actual_months[$i].'</td>';
                }
            }
            @endphp
            <td>{{ $ave_actual_energy }}</td>
                
        </tr> 
        <!-- END ENERGY ACTUAL ROW -->

        <tr>
        <!-- ROW -> BLANK ROW -->
        </tr>

        <tr>
        <td></td> 
        <td></td> 
        <td></td>
        <td></td>
        <th>{{ 'Apr-'.$currentfy}}</th>
        <th>{{ 'May-'.$currentfy}}</th>
        <th>{{ 'Jun-'.$currentfy}}</th>
        <th>{{ 'Jul-'.$currentfy}}</th>
        <th>{{ 'Aug-'.$currentfy}}</th>
        <th>{{ 'Sep-'.$currentfy}}</th>
        <th>{{ 'Oct-'.$currentfy}}</th>
        <th>{{ 'Nov-'.$currentfy}}</th>
        <th>{{ 'Dec-'.$currentfy}}</th>
        <th>{{ 'Jan-'.$currentfy_plus1}}</th>
        <th>{{ 'Feb-'.$currentfy_plus1}}</th>
        <th>{{ 'Mar-'.$currentfy_plus1}}</th>
        <th>Average</th>
        </tr>

        <tr>
        <td></td> 
        <td></td> 
        <td></td>
            <td>Target</td>
            @php
            // {{-- LOOP FOR APRIL TO DEC --}}
            for ($i = 4; $i <= 12; $i++){
                if ($export_energy_target_months[$i] !== null) {
                    $energy_target_months_round = round($export_energy_target_months[$i], 2);
                    echo '<td>'.$energy_target_months_round.'</td>';
                    }
                else {
                    echo '<td>'.$export_energy_target_months[$i].'</td>';
                }
                
            }
            // {{-- LOOP FOR JAN TO MAR --}}
            for ($i = 1; $i <= 3; $i++){
                if ($export_energy_target_months[$i] !== null) {
                    $energy_target_months_round = round($export_energy_target_months[$i], 2);
                    echo '<td>'.$energy_target_months_round.'</td>';
                    }
                else {
                    echo '<td>'.$export_energy_target_months[$i].'</td>';
                }
            }
            @endphp

            {{-- Total Target --}}
            <td>{{ $ave_target_energy }}</td>

        </tr>
        <tr>
        <td></td> 
        <td></td> 
        <td></td>
            <td>Actual</td>
            @php
            // {{-- LOOP FOR APRIL TO DEC --}}
            for ($i = 4; $i <= 12; $i++){
                if ($export_energy_actual_months[$i] !== null) {
                    $energy_actual_months_round = round($export_energy_actual_months[$i], 2);
                    echo '<td>'.$energy_actual_months_round.'</td>';
                    }
                else {
                    echo '<td>'.$export_energy_actual_months[$i].'</td>';
                }
            }
            // {{-- LOOP FOR JAN TO MAR --}}
            for ($i = 1; $i <= 3; $i++){
                if ($export_energy_actual_months[$i] !== null) {
                    $energy_actual_months_round = round($export_energy_actual_months[$i], 2);
                    echo '<td>'.$energy_actual_months_round.'</td>';
                    }
                else {
                    echo '<td>'.$export_energy_actual_months[$i].'</td>';
                }
            }
            @endphp

            {{-- Total Actual --}}
            <td>{{ $ave_actual_energy }}</td>
        </tr>

        <tr>
        <!-- ROW -> BLANK ROW -->
        </tr>

        <tr>
        <td></td> 
        <td></td> 
            <td>TRI COLOR CHART Data</td>
            <td></td>
            @php
            // {{-- LOOP FOR APRIL TO DEC --}}
            for ($i = 4; $i <= 12; $i++){
                if ($export_energy_actual_months[$i] !== null) {
                    $energy_actual_months_round = round($export_energy_actual_months[$i], 2);
                    echo '<td>'.$energy_actual_months_round.'</td>';
                    }
                else {
                    echo '<td>'.$export_energy_actual_months[$i].'</td>';
                }
            }
            // {{-- LOOP FOR JAN TO MAR --}}
            for ($i = 1; $i <= 3; $i++){
                if ($export_energy_actual_months[$i] !== null) {
                    $energy_actual_months_round = round($export_energy_actual_months[$i], 2);
                    echo '<td>'.$energy_actual_months_round.'</td>';
                    }
                else {
                    echo '<td>'.$export_energy_actual_months[$i].'</td>';
                }
            }
            @endphp
            {{-- Total Actual --}}
            <td>{{ $ave_actual_energy }}</td>
        </tr>

    </tbody>
   
</table>

<table class="table table-striped">
    <thead>
        <!--  ROW -->
    <tr>
                    <th>WATER CONSUMPTION</th>
                    <th></th>
                    <th>{{ 'FY '.$pastfy.' Actual'}}</th>
        <th>{{ 'FY '.$currentfy.' Target'}}</th>
                    <!-- <th>March(past FY)</th> -->
                    <th>{{ 'Apr-'.$currentfy}}</th>
                    <th>{{ 'May-'.$currentfy}}</th>
                    <th>{{ 'Jun-'.$currentfy}}</th>
                    <th>{{ 'Jul-'.$currentfy}}</th>
                    <th>{{ 'Aug-'.$currentfy}}</th>
                    <th>{{ 'Sep-'.$currentfy}}</th>
                    <th>{{ 'Oct-'.$currentfy}}</th>
                    <th>{{ 'Nov-'.$currentfy}}</th>
                    <th>{{ 'Dec-'.$currentfy}}</th>
                    <th>{{ 'Jan-'.$currentfy_plus1}}</th>
                    <th>{{ 'Feb-'.$currentfy_plus1}}</th>
                    <th>{{ 'Mar-'.$currentfy_plus1}}</th>
                    <th>Average</th>
    </tr>
        <!-- END  ROW -->       
        
    </thead>
    <tbody>
            <!-- ROW -->
        <tr>
            <td>Monthly Target</td>
            <td></td>
            <td>{{ $export_water_pasftyactual_ave }}</td>
            <td>{{ $export_water_target_ave }}</td>
            @php
                $ave_target_water = $export_water_target_ave;
                // $ave_actualmp_water = $export_water_actualmp_ave;
                $ave_actualmp_water = number_format((float)$export_water_actualmp_ave, 2, '.', '');
                // $ave_actualconsuption_water = $export_water_actual_consumption_ave;
                $ave_actualconsuption_water = number_format((float)$export_water_actual_consumption_ave, 2, '.', '');
                $ave_actual_water = $export_water_actual_ave;
            @endphp

            @php
                //{{-- LOOP FOR APRIL TO DEC --}}
                for ($i = 4; $i <= 12; $i++){
                    if ($export_water_target_months[$i] !== null) {
                        $water_target_months_round = round($export_water_target_months[$i], 2);
                        echo '<td>'.$water_target_months_round.'</td>';
                    }
                    else {
                        echo '<td>'.$export_water_target_months[$i].'</td>';
                    }
                    
                }
                // {{-- LOOP FOR JAN TO MAR --}}
                for ($i = 1; $i <= 3; $i++){
                    if ($export_water_target_months[$i] !== null) {
                        $water_target_months_round = round($export_water_target_months[$i], 2);
                        echo '<td>'.$water_target_months_round.'</td>';
                    }
                    else {
                        echo '<td>'.$export_water_target_months[$i].'</td>';
                    }
                }
            @endphp

            {{-- Total Target --}}
            <td>{{ $ave_target_water }}</td>

        </tr>
            <!-- END  ROW --> 
            
        <!--  ROW -->
        <tr>
            <td>FY 2022 Total Water Consumption: Factory 1 Factory 2</td>
            <td></td>
            <td></td>
            <td></td>
            {{-- 12 columns --}}
            @php
                //{{-- LOOP FOR APRIL TO DEC --}}
                for ($i = 4; $i <= 12; $i++){
                    echo '<td>'.$export_water_actual_months[$i].'</td>';

                    // if ($export_water_actual_months[$i] === null) {
                    //     echo '<td>'.$export_water_actual_months[$i].'</td>';
                    // }
                    // else {
                    //     // $water_actual_months_round = round($export_water_actual_months[$i], 2);
                    //     echo '<td>'.$export_water_actual_months[$i].'</td>';
                    // }
                }
                // {{-- LOOP FOR JAN TO MAR --}}
                for ($i = 1; $i <= 3; $i++){
                    echo '<td>'.$export_water_actual_months[$i].'</td>';
                    // if ($export_water_actual_months[$i] !== null) {
                    //     $water_actual_months_round = round($export_water_actual_months[$i], 2);
                    //     echo '<td>'.$water_actual_months_round.'</td>';
                    // }
                    // else {
                    //     echo '<td></td>';
                    // }
                }
            @endphp
            <td>{{ $ave_actualconsuption_water }}</td>
                
        </tr>
        <!-- END  ROW -->

        <!--  ROW -->
        <tr>
            <td>FY 2022 Total Manpower</td>
            <td></td>
            <td></td>
            <td></td>
            @for($i = 4; $i <= 12 ; $i++) 
            <td>{{ $export_water_mpcount_months[$i] }}</td>
            @endfor

            @for($i = 1; $i <= 3 ; $i++) 
            <td>{{ $export_water_mpcount_months[$i] }}</td>
            @endfor
            <td>{{ $ave_actualmp_water }}</td>
            
        </tr>
        <!-- END  ROW -->

        <!--  ROW -->
        <tr>
            <td>Consumption per headcount cu.meter Month</td>
            <td></td>
            <td>{{ $export_water_pasftyactual_ave }}</td>
            <td>{{ $export_water_target_ave }}</td>
            {{-- 12 columns --}}
            @php
                //{{-- LOOP FOR APRIL TO DEC --}}
                for ($i = 4; $i <= 12; $i++){
                    echo '<td>'.$export_water_actualpermp_months[$i].'</td>';
                    // if ($export_water_actualpermp_months[$i] !== null) {
                    //     $water_actualpermp_months_round = round($export_water_actualpermp_months[$i], 2);
                    //     echo '<td>'.$water_actualpermp_months_round.'</td>';
                    // }
                    // else {
                    //     echo '<td>'.$export_water_actualpermp_months[$i].'</td>';
                    // }
                }
                // {{-- LOOP FOR JAN TO MAR --}}
                for ($i = 1; $i <= 3; $i++){
                    echo '<td>'.$export_water_actualpermp_months[$i].'</td>';
                    // if ($export_water_actualpermp_months[$i] !== null) {
                    //     $water_actualpermp_months_round = round($export_water_actualpermp_months[$i], 2);
                    //     echo '<td>'.$water_actualpermp_months_round.'</td>';
                    // }
                    // else {
                    //     echo '<td>'.$export_water_actualpermp_months[$i].'</td>';
                    // }
                }
            @endphp
            <td>{{ $ave_actual_water }}</td>
            
        </tr>
        <!-- END  ROW -->

        <tr>
            <!-- ROW -> BLANK ROW -->
        </tr>

        <!-- ROW -->
        <tr>
            <td></td> 
            <td></td> 
            <td></td>
            <td></td>
            <th>{{ 'Apr-'.$currentfy}}</th>
            <th>{{ 'May-'.$currentfy}}</th>
            <th>{{ 'Jun-'.$currentfy}}</th>
            <th>{{ 'Jul-'.$currentfy}}</th>
            <th>{{ 'Aug-'.$currentfy}}</th>
            <th>{{ 'Sep-'.$currentfy}}</th>
            <th>{{ 'Oct-'.$currentfy}}</th>
            <th>{{ 'Nov-'.$currentfy}}</th>
            <th>{{ 'Dec-'.$currentfy}}</th>
            <th>{{ 'Jan-'.$currentfy_plus1}}</th>
            <th>{{ 'Feb-'.$currentfy_plus1}}</th>
            <th>{{ 'Mar-'.$currentfy_plus1}}</th>
            <th>Total</th>
        </tr>
        <!--END  ROW -->

        <!-- WATER TARGET ROW -->
        <tr>
            <td></td> 
            <td></td> 
            <td></td>
            <td>Target</td>
            @php
                //{{-- LOOP FOR APRIL TO DEC --}}
                for ($i = 4; $i <= 12; $i++){
                    echo '<td>'.$export_water_target_months[$i].'</td>';
                    // if ($export_water_target_months[$i] !== null) {
                    //     $water_target_months_round = round($export_water_target_months[$i], 2);
                    //     echo '<td>'.$water_target_months_round.'</td>';
                    // }
                    // else {
                    //     echo '<td>'.$export_water_target_months[$i].'</td>';
                    // }
                }
                // {{-- LOOP FOR JAN TO MAR --}}
                for ($i = 1; $i <= 3; $i++){
                    echo '<td>'.$export_water_target_months[$i].'</td>';
                    // if ($export_water_target_months[$i] !== null) {
                    //     $water_target_months_round = round($export_water_target_months[$i], 2);
                    //     echo '<td>'.$water_target_months_round.'</td>';
                    // }
                    // else {
                    //     echo '<td>'.$export_water_target_months[$i].'</td>';
                    // }
                }
            @endphp

            {{-- Total Target --}}
            <td>{{ round($export_water_target_sum, 2) }}</td>
    
        </tr>
        <!-- END WATER TARGET ROW -->

        <!-- WATER ACTUAL ROW -->
        <tr>
            <td></td> 
            <td></td> 
            <td></td>
                <td>Actual</td>
                @php
                //{{-- LOOP FOR APRIL TO DEC --}}
                for ($i = 4; $i <= 12; $i++){
                    echo '<td>'.$export_water_actualpermp_months[$i].'</td>';
                    
                    // if ($export_water_actualpermp_months[$i] !== null) {
                    //     $water_actualpermp_months_round = round($export_water_actualpermp_months[$i], 2);
                    //     echo '<td>'.$water_actualpermp_months_round.'</td>';
                    // }
                    // else {
                    //     echo '<td>'.$export_water_actualpermp_months[$i].'</td>';
                    // }   
                }
                // {{-- LOOP FOR JAN TO MAR --}}
                for ($i = 1; $i <= 3; $i++){
                    echo '<td>'.$export_water_actualpermp_months[$i].'</td>';
                    // if ($export_water_actualpermp_months[$i] !== null) {
                    //     $water_actualpermp_months_round = round($export_water_actualpermp_months[$i], 2);
                    //     echo '<td>'.$water_actualpermp_months_round.'</td>';
                    // }
                    // else {
                    //     echo '<td>'.$export_water_actualpermp_months[$i].'</td>';
                    // }
                }
                @endphp

                {{-- Total Actual --}}
                @php
                    $water_actualpermp_months_sum = array();
                @endphp
                @for ($i = 1; $i <= 12; $i++)
                    @php
                       array_push($water_actualpermp_months_sum, $export_water_actualpermp_months[$i]);
                    @endphp
                @endfor
                @php
                $val_water_actualpermp_months_sum = array_sum($water_actualpermp_months_sum);
                @endphp
                <td>{{ round($val_water_actualpermp_months_sum, 2)  }}</td>
                
            
            </tr>
        <!-- END WATER ACTUAL ROW -->

        <tr>
        <!-- ROW -> BLANK ROW -->
        </tr>
    
        <!-- WATER TRICOLOR CHART ROW -->
        <tr>
            <td></td> 
            <td></td> 
                <td>TRI COLOR CHART Data</td>
                <td></td> 
                {{-- 12 columns --}}
                @php
                //{{-- LOOP FOR APRIL TO DEC --}}
                for ($i = 4; $i <= 12; $i++){
                    echo '<td>'.$export_water_actualpermp_months[$i].'</td>';
                    // if ($export_water_actualpermp_months[$i] !== null) {
                    //     $water_actualpermp_months_round = round($export_water_actualpermp_months[$i], 2);
                    //     echo '<td>'.$water_actualpermp_months_round.'</td>';
                    // }
                    // else {
                    //     echo '<td>'.$export_water_actualpermp_months[$i].'</td>';
                    // }
                }
                // {{-- LOOP FOR JAN TO MAR --}}
                for ($i = 1; $i <= 3; $i++){
                    echo '<td>'.$export_water_actualpermp_months[$i].'</td>';
                    // if ($export_water_actualpermp_months[$i] !== null) {
                    //     $water_actualpermp_months_round = round($export_water_actualpermp_months[$i], 2);
                    //     echo '<td>'.$water_actualpermp_months_round.'</td>';
                    // }
                    // else {
                    //     echo '<td>'.$export_water_actualpermp_months[$i].'</td>';
                    // }
                }
                @endphp

                {{-- Total Actual --}}
                @php
                    $water_actualpermp_months_sum = array();
                for ($i = 1; $i <= 12; $i++){
                       array_push($water_actualpermp_months_sum, $export_water_actualpermp_months[$i]);
                }
                $val_water_actualpermp_months_sum = array_sum($water_actualpermp_months_sum);
                @endphp
                <td>{{ round($val_water_actualpermp_months_sum, 2) }}</td>
           
        </tr>
        <!-- END WATER TRICOLOR CHART ROW -->
       
    </tbody>
   
</table>
                @php
                   $paper_pastfyactual_prod = $export_paper_pastfyactual_prod;
                   
                   $paper_pastfyactual_sg = $export_paper_pastfyactual_sg;
                   $paper_pastfyactual_sg_round = round($paper_pastfyactual_sg, 2);

                   $total_paper_pastfyactual = $export_total_paper_pastfyactual;
                   $total_paper_pastfyactual_round = round($total_paper_pastfyactual, 2);

                   $paper_target_prod = $export_paper_target_prod;

                   $paper_target_sg = $export_paper_target_sg;
                   $paper_target_sg_round = round($paper_target_sg, 2);

                   $total_paper_currentfytarget = $export_total_paper_currentfytarget;
                   $total_paper_currentfytarget_round = round($total_paper_currentfytarget, 2);

                   $paper_target_months_sg = $export_paper_target_months_sg;
                   $paper_actual_months_sg = $export_paper_actual_months_sg;
                   
                //    $paper_target_months_sg_round = round($paper_target_months_sg, 2);

                    $a_paper_pastfyactual_prod = array();
                    $a_paper_target_prod = array();
                    // $a_paper_pastfyactual_sg = array();
                    $a_paper_pastfyactual_prod_round = array();
                    $a_paper_target_prod_round = array();
                    
                    // $a_paper_target_sg = array();

                    for($i = 1; $i <= 4 ; $i++){
                        array_push($a_paper_pastfyactual_prod, $paper_pastfyactual_prod[$i]);
                        array_push($a_paper_target_prod, $paper_target_prod[$i]);

                        $paper_pastfyactual_prod_round[$i] = round($paper_pastfyactual_prod[$i], 2);
                        $paper_target_prod_round[$i] = round($paper_target_prod[$i], 2);
                        array_push($a_paper_pastfyactual_prod_round, $paper_pastfyactual_prod_round[$i]);
                        array_push($a_paper_target_prod_round, $paper_target_prod_round[$i]);

                        // array_push($a_paper_pastfyactual_sg, $paper_pastfyactual_sg[$i]);
                        // array_push($a_paper_target_sg, $paper_target_sg[$i]);
                    }

                    $diff_ts = ($a_paper_pastfyactual_prod[2] - $a_paper_target_prod[2])/12;
                        $diff_ts_round = round($diff_ts, 2);

                    $diff_cn = ($a_paper_pastfyactual_prod[0] - $a_paper_target_prod[0])/12;
                        $diff_cn_round = round($diff_cn, 2);

                    $diff_yf = ($a_paper_pastfyactual_prod[3] - $a_paper_target_prod[3])/12;
                        $diff_yf_round = round($diff_yf, 2);

                    $diff_pps= ($a_paper_pastfyactual_prod[1] - $a_paper_target_prod[1])/12;
                        $diff_pps_round = round($diff_pps, 2);

                    $diff_sg = ($paper_pastfyactual_sg - $paper_target_sg)/12;
                        $diff_sg_round = round($diff_sg, 2);
                @endphp
<!-- MONTHLY PAPER TARGET ALL SECTION 1ST-->
<table class="table table-striped">
    <thead>
        <!--  ROW -->
    <tr>
                    <th>PAPER CONSUMPTION</th>
                    <th></th>
                    <th>{{ 'FY '.$pastfy.' Actual'}}</th>
                    <th>{{ 'FY '.$currentfy.' Target'}}</th>
                    <!-- <th>March(past FY)</th> -->
                    <th>{{ 'Apr-'.$currentfy}}</th>
                    <th>{{ 'May-'.$currentfy}}</th>
                    <th>{{ 'Jun-'.$currentfy}}</th>
                    <th>{{ 'Jul-'.$currentfy}}</th>
                    <th>{{ 'Aug-'.$currentfy}}</th>
                    <th>{{ 'Sep-'.$currentfy}}</th>
                    <th>{{ 'Oct-'.$currentfy}}</th>
                    <th>{{ 'Nov-'.$currentfy}}</th>
                    <th>{{ 'Dec-'.$currentfy}}</th>
                    <th>{{ 'Jan-'.$currentfy_plus1}}</th>
                    <th>{{ 'Feb-'.$currentfy_plus1}}</th>
                    <th>{{ 'Mar-'.$currentfy_plus1}}</th>
    </tr>
        <!-- END  ROW -->       
        
    </thead>
    <tbody>
            <!-- ROW -->
        <tr>
            <td>TS</td>
            <td>{{ '=(D26-C26)/12' }}</td>
            <td>{{ $a_paper_pastfyactual_prod_round[2] }}</td>
            <td>{{ $a_paper_target_prod_round[2] }}</td>
            {{-- 12 columns --}}
            @php
                $data = array();
                    $a = $diff_ts;
                    $b = $a_paper_pastfyactual_prod[2];
                    $c = $b - $a;
                    // $c_round = round($c, 2);
                    array_push($data, $c);
            @endphp
            @for ($i = 0; $i < 12; $i++)
                @php
                    $next[$i] = $data[$i] - $a;
                    // $next_round[$i] = round($next[$i], 2);
                    array_push($data, $next[$i]);
                    // $data_round[$i] = round($data[$i], 1);
                @endphp
                <td>{{ $data[$i] }}</td>
            @endfor
          

        </tr>
            <!-- END  ROW -->
            
            <!-- ROW -->
        <tr>
            <td>CN</td>
            <td>{{ '=(D27-C27)/12' }}</td>
            <td>{{ $a_paper_pastfyactual_prod_round[0] }}</td>
            <td>{{ $a_paper_target_prod_round[0] }}</td>
            {{-- 12 columns --}}
            @php
                $data = array();
                    $a = $diff_cn;
                    $b = $a_paper_pastfyactual_prod[0];
                    $c = $b - $a;
                    // $c_round = round($c, 2);
                    array_push($data, $c);
            @endphp
            @for ($i = 0; $i < 12; $i++)
                @php
                    $next[$i] = $data[$i] - $a;
                    // $next_round[$i] = round($next[$i], 2);
                    array_push($data, $next[$i]);
                    // $data_round[$i] = round($data[$i], 1);
                @endphp
                <td>{{ $data[$i] }}</td>
            @endfor

        </tr>
            <!-- END  ROW -->

            <!-- ROW -->
        <tr>
            <td>YF</td>
            <td>{{ '=(D28-C28)/12' }}</td>
            <td>{{ $a_paper_pastfyactual_prod_round[3] }}</td>
            <td>{{ $a_paper_target_prod_round[3] }}</td>
            {{-- 12 columns --}}
            @php
                $data = array();
                    $a = $diff_yf;
                    $b = $a_paper_pastfyactual_prod[3];
                    $c = $b - $a;
                    // $c_round = round($c, 2);
                    array_push($data, $c);
            @endphp
            @for ($i = 0; $i < 12; $i++)
                @php
                    $next[$i] = $data[$i] - $a;
                    // $next_round[$i] = round($next[$i], 2);
                    array_push($data, $next[$i]);
                    // $data_round[$i] = round($data[$i], 1);
                @endphp
                <td>{{ $data[$i] }}</td>
            @endfor

        </tr>
            <!-- END  ROW -->

            <!-- ROW -->
        <tr>
            <td>PPS</td>
            <td>{{ '=(D29-C29)/12' }}</td>
            <td>{{ $a_paper_pastfyactual_prod_round[1] }}</td>
            <td>{{ $a_paper_target_prod_round[1] }}</td>
            {{-- 12 columns --}}
            @php
                $data = array();
                    $a = $diff_pps;
                    $b = $a_paper_pastfyactual_prod[1];
                    $c = $b - $a;
                    // $c_round = round($c, 2);
                    array_push($data, $c);
            @endphp
            @for ($i = 0; $i < 12; $i++)
                @php
                    $next[$i] = $data[$i] - $a;
                    // $next_round[$i] = round($next[$i], 2);
                    array_push($data, $next[$i]);
                    // $data_round[$i] = round($data[$i], 1);
                @endphp
                <td>{{ $data[$i] }}</td>
            @endfor

        </tr>
            <!-- END  ROW -->

            <!-- ROW -->
        <tr>
            <td>ADMIN/QAD</td>
            <td>{{ '=(D30-C30)/12' }}</td>
            <td>{{ $paper_pastfyactual_sg_round }}</td>
            <td>{{ $paper_target_sg_round }}</td>
            {{-- 12 columns --}}
            @php
                $data = array();
                    $a = $diff_sg;
                    $b = $paper_pastfyactual_sg;
                    $c = $b - $a;
                    // $c_round = round($c, 2);
                    array_push($data, $c);
            @endphp
            @for ($i = 0; $i < 12; $i++)
                @php
                    $next[$i] = $data[$i] - $a;
                    // $next_round[$i] = round($next[$i], 2);
                    array_push($data, $next[$i]);
                    // $data_round[$i] = round($data[$i], 1);
                @endphp
                <td>{{ $data[$i] }}</td>
            @endfor

        </tr>
            <!-- END  ROW -->

            <!-- ROW -->
        <tr>
            <td>TARGET</td>
            <td></td>
            <td>{{ $total_paper_pastfyactual_round }}</td>
            <td>{{ $total_paper_currentfytarget_round }}</td>
            {{-- 12 columns --}}
            @php
                $data = array();
                    $a = $diff_ts + $diff_cn + $diff_yf + $diff_pps + $diff_sg;
                    $b = array_sum($a_paper_pastfyactual_prod) + $paper_pastfyactual_sg;
                    $c = $b - $a;
                    // $c_round = round($c, 2);
                    array_push($data, $c);
            @endphp
            @for ($i = 0; $i < 12; $i++)
                @php
                    $next[$i] = $data[$i] - $a;
                    // $next_round[$i] = round($next[$i], 2);
                    array_push($data, $next[$i]);
                    // $data_round[$i] = round($data[$i], 0);
                @endphp
                <td>{{ $data[$i] }}</td>
            @endfor

        </tr>
            <!-- END  ROW -->
    </tbody>
   
</table>
<!-- END PAPER MONTHLY TARGET 1ST-->

<!-- MONTHLY PAPER TARGET ALL SECTION 2ND -->
<table class="table table-striped">
    <thead>
        <!--  ROW -->
    <tr>
                    <th>PAPER CONSUMPTION</th>
                    <th></th>
                    <th>{{ 'FY '.$pastfy.' Actual'}}</th>
                    <th>{{ 'FY '.$currentfy.' Target'}}</th>
                    <!-- <th>March(past FY)</th> -->
                    <th>{{ 'Apr-'.$currentfy}}</th>
                    <th>{{ 'May-'.$currentfy}}</th>
                    <th>{{ 'Jun-'.$currentfy}}</th>
                    <th>{{ 'Jul-'.$currentfy}}</th>
                    <th>{{ 'Aug-'.$currentfy}}</th>
                    <th>{{ 'Sep-'.$currentfy}}</th>
                    <th>{{ 'Oct-'.$currentfy}}</th>
                    <th>{{ 'Nov-'.$currentfy}}</th>
                    <th>{{ 'Dec-'.$currentfy}}</th>
                    <th>{{ 'Jan-'.$currentfy_plus1}}</th>
                    <th>{{ 'Feb-'.$currentfy_plus1}}</th>
                    <th>{{ 'Mar-'.$currentfy_plus1}}</th>
                    <th>Average</th>
    </tr>
        <!-- END  ROW -->       
        
    </thead>
    <tbody>
            <!-- ROW -->
        <tr>
            <td>TS</td>
            <td>{{ '=(D26-C26)/12' }}</td>
            <td>{{ $a_paper_pastfyactual_prod_round[2] }}</td>
            <td>{{ $a_paper_target_prod_round[2] }}</td>
            {{-- //id = 3 --}}
            {{-- 12 columns --}}
            @php
                for($i = 27; $i <= 35; $i++){  //{{-- Paper_Target_Months_Prod_Ream(array) dep_id=TS(3) is from "24-35" --}}
                    if ($export_paper_target_months_prod[$i] !== null) {
                        $paper_target_months_prod_round = round($export_paper_target_months_prod[$i], 2);
                        echo '<td>'.$paper_target_months_prod_round.'</td>';
                    }
                    else {
                    echo '<td>'.$export_paper_target_months_prod[$i].'</td>';
                    }   
                }
                for ($i = 24; $i <= 26; $i++){
                    if ($export_paper_target_months_prod[$i] !== null) {
                        $paper_target_months_prod_round = round($export_paper_target_months_prod[$i], 2);
                        echo '<td>'.$paper_target_months_prod_round.'</td>';
                    }
                    else {
                    echo '<td>'.$export_paper_target_months_prod[$i].'</td>';
                    }
                }
            @endphp
            
            {{-- TS MONTHLY TARGET AVERAGE --}}
            @php
                $array_ts = array();
                for ($i=24; $i <= 35; $i++) { 
                    array_push($array_ts , $export_paper_target_months_prod[$i]);
                }
                // $a_array_ts = array_filter($array_ts);
                $a_array_ts = array_filter($array_ts, function($x) { return $x !== null; });
                if (count($a_array_ts) == 0) {
                    $average_ts_round = 0;
                }
                elseif($a_array_ts == null){
                    $average_ts_round = '';
                }
                else {
                    $average_ts = array_sum($a_array_ts)/count($a_array_ts);
                    $average_ts_round = round($average_ts, 2);
                }
                
                // echo $average;
                // $array_ts = array_filter($array_ts);
                // 
                // if(count($array_ts)){
                //     echo '<td>'.$average = array_sum($a_array_ts)/count($a_array_ts).'</td>';
                // }    
                
                // $array_avg_ts = array_sum($array_ts)/count($array_ts);
                
            @endphp
                <td>{{ $average_ts_round }}</td>

            
            
        </tr>
            <!-- END  ROW -->
            
            <!-- ROW -->
        <tr>
            <td>CN</td>
            <td>{{ '=(D27-C27)/12' }}</td>
            <td>{{ $a_paper_pastfyactual_prod_round[0] }}</td>
            <td>{{ $a_paper_target_prod_round[0] }}</td>
            {{-- //id = 1 --}}
            {{-- 12 columns --}}
            @php
                for($i = 3; $i <= 11; $i++){  //{{-- Paper_Target_Months_Prod_Ream(array) dep_id=TS(3) is from "0-11" --}}
                    if ($export_paper_target_months_prod[$i] !== null) {
                        $paper_target_months_prod_round = round($export_paper_target_months_prod[$i], 2);
                        echo '<td>'.$paper_target_months_prod_round.'</td>';
                    }
                    else {
                        echo '<td>'.$export_paper_target_months_prod[$i].'</td>';
                    }
                }
                for ($i = 0; $i <= 2; $i++){
                    if ($export_paper_target_months_prod[$i] !== null) {
                        $paper_target_months_prod_round = round($export_paper_target_months_prod[$i], 2);
                        echo '<td>'.$paper_target_months_prod_round.'</td>';
                    }
                    else {
                        echo '<td>'.$export_paper_target_months_prod[$i].'</td>';
                    }
                }
            @endphp

            {{-- CN MONTHLY TARGET AVERAGE --}}
            @php
                $array_cn = array();
                for ($i=0; $i <= 11; $i++) { 
                    array_push($array_cn , $export_paper_target_months_prod[$i]);
                }
                // $a_array_ts = array_filter($array_ts);
                $a_array_cn = array_filter($array_cn, function($x) { return $x !== null; });
                
                if (count($a_array_cn) == 0) {
                    $average_cn_round = 0;
                }
                elseif($a_array_cn == null){
                    $average_cn_round = '';
                }
                else {
                    $average_cn = array_sum($a_array_cn)/count($a_array_cn);
                    $average_cn_round = round($average_cn, 2);
                }
                // echo $average;
                // $array_ts = array_filter($array_ts);
                // 
                // if(count($array_ts)){
                //     echo '<td>'.$average = array_sum($a_array_ts)/count($a_array_ts).'</td>';
                // }    
                
                // $array_avg_ts = array_sum($array_ts)/count($array_ts);
                
            @endphp
                <td>{{ $average_cn_round }}</td>

        </tr>
            <!-- END  ROW -->

            <!-- ROW -->
        <tr>
            <td>YF</td>
            <td>{{ '=(D28-C28)/12' }}</td>
            <td>{{ $a_paper_pastfyactual_prod_round[3] }}</td>
            <td>{{ $a_paper_target_prod_round[3] }}</td>
            {{-- //id = 4 --}}
            @php
                //12 columns
                for($i = 39; $i <= 47; $i++){  //{{-- Paper_Target_Months_Prod_Ream(array) dep_id=YF(2) is from "36-47" --}}
                    if ($export_paper_target_months_prod[$i] !== null) {
                        $paper_target_months_prod_round = round($export_paper_target_months_prod[$i], 2);
                        echo '<td>'.$paper_target_months_prod_round.'</td>';
                    }
                    else {
                        echo '<td>'.$export_paper_target_months_prod[$i].'</td>';
                    }
                }
                for ($i = 36; $i <= 38; $i++){
                    if ($export_paper_target_months_prod[$i] !== null) {
                        $paper_target_months_prod_round = round($export_paper_target_months_prod[$i], 2);
                        echo '<td>'.$paper_target_months_prod_round.'</td>';
                    }
                    else {
                        echo '<td>'.$export_paper_target_months_prod[$i].'</td>';
                    }
                }
            @endphp

            {{-- YF MONTHLY TARGET AVERAGE --}}
            @php
                $array_yf = array();
                for ($i=36; $i <= 47; $i++) { 
                    array_push($array_yf , $export_paper_target_months_prod[$i]);
                }
                // $a_array_ts = array_filter($array_ts);
                $a_array_yf = array_filter($array_yf, function($x) { return $x !== null; });
                if (count($a_array_yf) == 0) {
                    $average_yf_round = 0;
                }
                elseif($a_array_yf == null){
                    $average_yf_round = '';
                }
                else {
                    $average_yf = array_sum($a_array_yf)/count($a_array_yf);
                    $average_yf_round = round($average_yf, 2);
                }
                
                // echo $average;
                // $array_ts = array_filter($array_ts);
                // 
                // if(count($array_ts)){
                //     echo '<td>'.$average = array_sum($a_array_ts)/count($a_array_ts).'</td>';
                // }    
                
                // $array_avg_ts = array_sum($array_ts)/count($array_ts);
                
            @endphp
                <td>{{ $average_yf_round }}</td>

        </tr>
            <!-- END  ROW -->

            <!-- ROW -->
        <tr>
            <td>PPS</td>
            <td>{{ '=(D29-C29)/12' }}</td>
            <td>{{ $a_paper_pastfyactual_prod_round[1] }}</td>
            <td>{{ $a_paper_target_prod_round[1] }}</td>
            {{-- //id = 2 --}}
            {{-- 12 columns --}}
            @php
                for($i = 15; $i <= 23; $i++){  //{{-- Paper_Target_Months_Prod_Ream(array) dep_id=PPS(1) is from "12-23" --}}
                    if ($export_paper_target_months_prod[$i] !== null) {
                        $paper_target_months_prod_round = round($export_paper_target_months_prod[$i], 2);
                        echo '<td>'.$paper_target_months_prod_round.'</td>';
                    }
                    else {
                        echo '<td>'.$export_paper_target_months_prod[$i].'</td>';
                    }
                }
                for ($i = 12; $i <= 14; $i++){
                    if ($export_paper_target_months_prod[$i] !== null) {
                        $paper_target_months_prod_round = round($export_paper_target_months_prod[$i], 2);
                        echo '<td>'.$paper_target_months_prod_round.'</td>';
                    }
                    else {
                        echo '<td>'.$export_paper_target_months_prod[$i].'</td>';
                    }
                }
            @endphp

            {{-- CN MONTHLY TARGET AVERAGE --}}
            @php
                $array_pps = array();
                for ($i=12; $i <= 23; $i++) { 
                    array_push($array_pps , $export_paper_target_months_prod[$i]);
                }
                // $a_array_ts = array_filter($array_ts);
                $a_array_pps = array_filter($array_pps, function($x) { return $x !== null; });
                if (count($a_array_pps) == 0) {
                    $average_pps_round = 0;
                }
                elseif($a_array_pps == null){
                    $average_pps_round = '';
                }
                else {
                    $average_pps = array_sum($a_array_pps)/count($a_array_pps);
                    $average_pps_round = round($average_pps, 2);
                }
                
                // echo $average;
                // $array_ts = array_filter($array_ts);
                // 
                // if(count($array_ts)){
                //     echo '<td>'.$average = array_sum($a_array_ts)/count($a_array_ts).'</td>';
                // }    
                
                // $array_avg_ts = array_sum($array_ts)/count($array_ts);
                
            @endphp
                <td>{{ $average_pps_round }}</td>
        </tr>
            <!-- END  ROW -->

            <!-- ROW -->
        <tr>
            <td>ADMIN/QAD</td>
            <td>{{ '=(D30-C30)/12' }}</td>
            <td>{{ $paper_pastfyactual_sg_round }}</td>
            <td>{{ $paper_target_sg_round }}</td>
            {{-- 12 columns --}}
            @php
                for($i= 3; $i < 12; $i++){
                    if ($paper_target_months_sg[$i] !== null) {
                        $paper_target_months_sg_round = round($paper_target_months_sg[$i], 2);
                        echo '<td>'.$paper_target_months_sg_round.'</td>';
                    }
                    else {
                        echo '<td>'.$paper_target_months_sg[$i].'</td>';
                    }
                }
                for ($i= 0; $i <= 2; $i++){
                    if ($paper_target_months_sg[$i] !== null) {
                        $paper_target_months_sg_round = round($paper_target_months_sg[$i], 2);
                        echo '<td>'.$paper_target_months_sg_round.'</td>';
                    }
                    else {
                        echo '<td>'.$paper_target_months_sg[$i].'</td>';
                    }
                }
            @endphp
            {{-- SG MONTHLY TARGET AVERAGE --}}
            @php
                $array_sg = array();
                for ($i=0; $i < 12; $i++) { 
                    array_push($array_sg , $paper_target_months_sg[$i]);
                }
                // $a_array_ts = array_filter($array_ts);
                $a_array_sg = array_filter($array_sg, function($x) { return $x !== null; });
                if (count($a_array_sg) == 0) {
                    $average_sg_round = 0;
                }
                elseif($a_array_sg == null){
                    $average_sg_round = '';
                }
                else {
                    $average_sg = array_sum($a_array_sg)/count($a_array_sg);
                    $average_sg_round = round($average_sg, 2);
                }
                
                // echo $average;
                // $array_ts = array_filter($array_ts);
                // 
                // if(count($array_ts)){
                //     echo '<td>'.$average = array_sum($a_array_ts)/count($a_array_ts).'</td>';
                // }    
                
                // $array_avg_ts = array_sum($array_ts)/count($array_ts);
                
            @endphp
                <td>{{ $average_sg_round }}</td>
            

        </tr>
            <!-- END  ROW -->

            <!-- ROW -->
        <tr>
            <td>MONTHLY TARGET</td>
            <td></td>
            <td>{{ $total_paper_pastfyactual_round }}</td>
            <td>{{ $total_paper_currentfytarget_round }}</td>
            {{-- 12 columns --}}
            {{-- MONTHLY TARGET SUM --}}
            @php
            $monthly_target_total_pick = array();
            $monthly_target_total = array();
            // $monthly_target_total_round = array();
            @endphp
                @for ($i= 0; $i <12; $i++)
                @php
                $monthly_target_pick = array();
                @endphp
                    @for ($j= $i; $j <= 47; $j+=12)
                    @php
                    array_push($monthly_target_pick, $export_paper_target_months_prod[$j]);  
                    @endphp
                    
                    @endfor
                    @php
                    $monthly_target_sum = array_sum($monthly_target_pick);
                    array_push($monthly_target_total_pick, $monthly_target_sum);
                    $monthly_target_total_sum =  $paper_target_months_sg[$i] + $monthly_target_total_pick[$i];
                    array_push($monthly_target_total, $monthly_target_total_sum);
                    // $monthly_target_total_s = round($monthly_target_total, 2);
                    // array_push($monthly_target_total_round, $monthly_target_total_s[$i]);
                    // $monthly_target_total_sum_round = as($monthly_target_total_sum, 2);
                    @endphp
                    
                @endfor
            @php
            for($i= 3; $i < 12; $i++){
                if ($monthly_target_total[$i] !== null) {
                    $monthly_target_total_round = round($monthly_target_total[$i], 2);
                    echo '<td>'.$monthly_target_total_round.'</td>';
                }
                else {
                    echo '<td>'.$monthly_target_total[$i].'</td>';
                }
            }
            for ($i= 0; $i <= 2; $i++){
                if ($monthly_target_total[$i] !== null) {
                    $monthly_target_total_round = round($monthly_target_total[$i], 2);
                    echo '<td>'.$monthly_target_total_round.'</td>';
                }
                else {
                    echo '<td>'.$monthly_target_total[$i].'</td>';
                }
            }
            @endphp
                @php
                   $monthly_target_total_sum = array_sum($monthly_target_total);
                   $monthly_target_total_sum_round = round($monthly_target_total_sum, 2);
                @endphp
                <td>{{ $monthly_target_total_sum_round }}</td>
            
        </tr>
            <!-- END  ROW -->
    </tbody>
   
</table>
<!-- END PAPER CONSUMPTION 2ND-->

<!-- MONTHLY PAPER ACTUAL ALL SECTION 3RD -->
<table class="table table-striped">
    <thead>
        <!--  ROW -->
    <tr>
                    <th>PAPER CONSUMPTION</th>
                    <th></th>
                    <th>{{ 'FY '.$pastfy.' Actual'}}</th>
                    <th>{{ 'FY '.$currentfy.' Target'}}</th>
                    <!-- <th>March(past FY)</th> -->
                    <th>{{ 'Apr-'.$currentfy}}</th>
                    <th>{{ 'May-'.$currentfy}}</th>
                    <th>{{ 'Jun-'.$currentfy}}</th>
                    <th>{{ 'Jul-'.$currentfy}}</th>
                    <th>{{ 'Aug-'.$currentfy}}</th>
                    <th>{{ 'Sep-'.$currentfy}}</th>
                    <th>{{ 'Oct-'.$currentfy}}</th>
                    <th>{{ 'Nov-'.$currentfy}}</th>
                    <th>{{ 'Dec-'.$currentfy}}</th>
                    <th>{{ 'Jan-'.$currentfy_plus1}}</th>
                    <th>{{ 'Feb-'.$currentfy_plus1}}</th>
                    <th>{{ 'Mar-'.$currentfy_plus1}}</th>
                    <th>Total</th>
    </tr>
        <!-- END  ROW -->       
        
    </thead>
    <tbody>
            <!-- ROW -->
        <tr>
            <td>TS</td>
            <td>{{ '=(D26-C26)/12' }}</td>
            <td>{{ $a_paper_pastfyactual_prod_round[2] }}</td>
            <td>{{ $a_paper_target_prod_round[2] }}</td>
            {{-- //id = 3 --}}
            {{-- 12 columns --}}
            @php
            for($i = 27; $i <= 35; $i++){ //{{-- Paper_Target_Months_Prod_Ream(array) dep_id=TS(3) is from "24-35" --}}
                if ($export_paper_actual_months_prod[$i] !== null) {
                    $paper_actual_months_prod_round = round($export_paper_actual_months_prod[$i], 2);
                    echo '<td>'.$paper_actual_months_prod_round.'</td>';
                }
                else {
                    echo '<td>'.$export_paper_actual_months_prod[$i].'</td>';
                }
            }
            for ($i = 24; $i <= 26; $i++){
                if ($export_paper_actual_months_prod[$i] !== null) {
                    $paper_actual_months_prod_round = round($export_paper_actual_months_prod[$i], 2);
                    echo '<td>'.$paper_actual_months_prod_round.'</td>';
                }
                else {
                    echo '<td>'.$export_paper_actual_months_prod[$i].'</td>';
                }
            }
            @endphp

            {{-- TS MONTHLY ACTUAL AVERAGE --}}
            @php
                $array_ts_actual = array();
                for ($i=24; $i <= 35; $i++) { 
                    array_push($array_ts_actual , $export_paper_actual_months_prod[$i]);
                }
                // $a_array_ts = array_filter($array_ts);
                $a_array_ts_actual = array_filter($array_ts_actual, function($x) { return $x !== null; });
                if (count($a_array_ts_actual) == 0) {
                    $average_ts_actual_round = 0;
                }
                elseif($a_array_ts_actual == null){
                    $average_ts_actual_round = '';
                }
                else {
                    $average_ts_actual = array_sum($a_array_ts_actual)/count($a_array_ts_actual);
                    $average_ts_actual_round = round($average_ts_actual, 2);
                }
                
                // echo $average;
                // $array_ts = array_filter($array_ts);
                // 
                // if(count($array_ts)){
                //     echo '<td>'.$average = array_sum($a_array_ts)/count($a_array_ts).'</td>';
                // }    
                
                // $array_avg_ts = array_sum($array_ts)/count($array_ts);
                
            @endphp
                <td>{{ $average_ts_actual_round }}</td>

        </tr>
            <!-- END  ROW -->
            
            <!-- ROW -->
        <tr>
            <td>CN</td>
            <td>{{ '=(D27-C27)/12' }}</td>
            <td>{{ $a_paper_pastfyactual_prod_round[0] }}</td>
            <td>{{ $a_paper_target_prod_round[0] }}</td>
            {{-- //id = 1 --}}
            {{-- 12 columns --}}
            @php
            for($i = 3; $i <= 11; $i++){ //{{-- Paper_Target_Months_Prod_Ream(array) dep_id=TS(3) is from "0-11" --}}
                if ($export_paper_actual_months_prod[$i] !== null) {
                    $paper_actual_months_prod_round = round($export_paper_actual_months_prod[$i], 2);
                    echo '<td>'.$paper_actual_months_prod_round.'</td>';
                }
                else {
                    echo '<td>'.$export_paper_actual_months_prod[$i].'</td>';
                }
            }
            for ($i = 0; $i <= 2; $i++){
                if ($export_paper_actual_months_prod[$i] !== null) {
                    $paper_actual_months_prod_round = round($export_paper_actual_months_prod[$i], 2);
                    echo '<td>'.$paper_actual_months_prod_round.'</td>';
                }
                else {
                    echo '<td>'.$export_paper_actual_months_prod[$i].'</td>';
                }
            }
            @endphp

            {{-- CN MONTHLY ACTUAL AVERAGE --}}
            @php
                $array_cn_actual = array();
                for ($i=0; $i <= 11; $i++) { 
                    array_push($array_cn_actual , $export_paper_actual_months_prod[$i]);
                }
                // $a_array_ts = array_filter($array_ts);
                $a_array_cn_actual = array_filter($array_cn_actual, function($x) { return $x !== null; });
                if (count($a_array_cn_actual) == 0) {
                    $average_cn_actual_round = 0;
                }
                elseif($a_array_cn_actual == null){
                    $average_cn_actual_round = '';
                }
                else {
                    $average_cn_actual = array_sum($a_array_cn_actual)/count($a_array_cn_actual);
                    $average_cn_actual_round = round($average_cn_actual, 2);
                }
                
                // echo $average;
                // $array_ts = array_filter($array_ts);
                // 
                // if(count($array_ts)){
                //     echo '<td>'.$average = array_sum($a_array_ts)/count($a_array_ts).'</td>';
                // }    
                
                // $array_avg_ts = array_sum($array_ts)/count($array_ts);
                
            @endphp
                <td>{{ $average_cn_actual_round }}</td>

        </tr>
            <!-- END  ROW -->

            <!-- ROW -->
        <tr>
            <td>YF</td>
            <td>{{ '=(D28-C28)/12' }}</td>
            <td>{{ $a_paper_pastfyactual_prod_round[3] }}</td>
            <td>{{ $a_paper_target_prod_round[3] }}</td>
            {{-- //id = 4 --}}
            {{-- 12 columns --}}
            @php
            for($i = 39; $i <= 47; $i++){ //{{-- Paper_Target_Months_Prod_Ream(array) dep_id=TS(3) is from "36-47" --}}
                if ($export_paper_actual_months_prod[$i] !== null) {
                    $paper_actual_months_prod_round = round($export_paper_actual_months_prod[$i], 2);
                    echo '<td>'.$paper_actual_months_prod_round.'</td>';
                }
                else {
                    echo '<td>'.$export_paper_actual_months_prod[$i].'</td>';
                }
            }
            for ($i = 36; $i <= 38; $i++){
                if ($export_paper_actual_months_prod[$i] !== null) {
                    $paper_actual_months_prod_round = round($export_paper_actual_months_prod[$i], 2);
                    echo '<td>'.$paper_actual_months_prod_round.'</td>';
                }
                else {
                    echo '<td>'.$export_paper_actual_months_prod[$i].'</td>';
                }
            }
            @endphp

            {{-- YF MONTHLY ACTUAL AVERAGE --}}
            @php
                $array_yf_actual = array();
                for ($i=36; $i <= 47; $i++) { 
                    array_push($array_yf_actual , $export_paper_actual_months_prod[$i]);
                }
                // $a_array_ts = array_filter($array_ts);
                $a_array_yf_actual = array_filter($array_yf_actual, function($x) { return $x !== null; });
                if (count($a_array_yf_actual) == 0) {
                    $average_yf_actual_round = 0;
                }
                elseif($a_array_yf_actual == null){
                    $average_yf_actual_round = '';
                }
                else {
                    $average_yf_actual = array_sum($a_array_yf_actual)/count($a_array_yf_actual);
                    $average_yf_actual_round = round($average_yf_actual, 2);
                }
                
                // echo $average;
                // $array_ts = array_filter($array_ts);
                // 
                // if(count($array_ts)){
                //     echo '<td>'.$average = array_sum($a_array_ts)/count($a_array_ts).'</td>';
                // }    
                
                // $array_avg_ts = array_sum($array_ts)/count($array_ts);
                
            @endphp
                <td>{{ $average_yf_actual_round }}</td>

        </tr>
            <!-- END  ROW -->

            <!-- ROW -->
        <tr>
            <td>PPS</td>
            <td>{{ '=(D29-C29)/12' }}</td>
            <td>{{ $a_paper_pastfyactual_prod_round[1] }}</td>
            <td>{{ $a_paper_target_prod_round[1] }}</td>
            {{-- //id = 2 --}}
            {{-- 12 columns --}}
            @php
            for($i = 15; $i <= 23; $i++){ //{{-- Paper_Actual_Months_Prod_Ream(array) dep_id=TS(3) is from "12-23" --}}
                if ($export_paper_actual_months_prod[$i] !== null) {
                    $paper_actual_months_prod_round = round($export_paper_actual_months_prod[$i], 2);
                    echo '<td>'.$paper_actual_months_prod_round.'</td>';
                }
                else {
                    echo '<td>'.$export_paper_actual_months_prod[$i].'</td>';
                }
            }
            for ($i = 12; $i <= 14; $i++){
                if ($export_paper_actual_months_prod[$i] !== null) {
                    $paper_actual_months_prod_round = round($export_paper_actual_months_prod[$i], 2);
                    echo '<td>'.$paper_actual_months_prod_round.'</td>';
                }
                else {
                    echo '<td>'.$export_paper_actual_months_prod[$i].'</td>';
                }
            }
            @endphp
    
            {{-- PPS MONTHLY ACTUAL AVERAGE --}}
            @php
                $array_pps_actual = array();
                for ($i=12; $i <= 23; $i++) { 
                    array_push($array_pps_actual , $export_paper_actual_months_prod[$i]);
                }
                // $a_array_ts = array_filter($array_ts);
                $a_array_pps_actual = array_filter($array_pps_actual, function($x) { return $x !== null; });
                if (count($a_array_pps_actual) == 0) {
                    $average_pps_actual_round = 0;
                }
                elseif($a_array_pps_actual == null){
                    $average_pps_actual_round = '';
                }
                else {
                    $average_pps_actual = array_sum($a_array_pps_actual)/count($a_array_pps_actual);
                    $average_pps_actual_round = round($average_pps_actual, 2);
                }
                // echo $average;
                // $array_ts = array_filter($array_ts);
                // 
                // if(count($array_ts)){
                //     echo '<td>'.$average = array_sum($a_array_ts)/count($a_array_ts).'</td>';
                // }    
                
                // $array_avg_ts = array_sum($array_ts)/count($array_ts);
               
            @endphp
                <td>{{ $average_pps_actual_round }}</td>

        </tr>
            <!-- END  ROW -->

            <!-- ROW -->
        <tr>
            <td>ADMIN/QAD</td>
            <td>{{ '=(D30-C30)/12' }}</td>
            <td>{{ $paper_pastfyactual_sg_round }}</td>
            <td>{{ $paper_target_sg_round }}</td>
            {{-- 12 columns --}}
            @php
            for($i= 3; $i < 12; $i++){
                if ($paper_actual_months_sg[$i] !== null) {
                    $paper_actual_months_sg_round = round($paper_actual_months_sg[$i], 2);
                    echo '<td>'.$paper_actual_months_sg_round.'</td>';
                }
                else {
                    echo '<td>'.$paper_actual_months_sg[$i].'</td>';
                }
            }
            for ($i= 0; $i <= 2; $i++){
                if ($paper_actual_months_sg[$i] !== null) {
                    $paper_actual_months_sg_round = round($paper_actual_months_sg[$i], 2);
                    echo '<td>'.$paper_actual_months_sg_round.'</td>';
                }
                else {
                    echo '<td>'.$paper_actual_months_sg[$i].'</td>';
                }
            }
            @endphp

            {{-- SG MONTHLY TARGET AVERAGE --}}
            @php
                $array_sg_actual = array();
                for ($i=0; $i < 12; $i++) { 
                    array_push($array_sg_actual , $paper_actual_months_sg[$i]);
                }
                    $a_array_sg_actual = array_filter($array_sg_actual, function($x) { return $x !== null; });
                // $a_array_ts = array_filter($array_ts);
                if (count($a_array_sg_actual) == 0) {
                    $average_sg_actual_round = 0;
                }
                elseif($a_array_sg_actual == null){
                    $average_sg_actual_round = '';
                }
                else {
                    $average_sg_actual = array_sum($a_array_sg_actual)/count($a_array_sg_actual);
                    $average_sg_actual_round = round($average_sg_actual, 2);
                }
                // echo $average;
                // $array_ts = array_filter($array_ts);
                // 
                // if(count($array_ts)){
                //     echo '<td>'.$average = array_sum($a_array_ts)/count($a_array_ts).'</td>';
                // }    
                
                // $array_avg_ts = array_sum($array_ts)/count($array_ts);
            @endphp
                <td>{{ $average_sg_actual_round }}</td>

        </tr>
            <!-- END  ROW -->

            <!-- ROW -->
        <tr>
            <td>MONTHLY ACTUAL</td>
            <td></td>
            <td>{{ $total_paper_pastfyactual_round }}</td>
            <td>{{ $total_paper_currentfytarget_round }}</td>
            {{-- 12 columns --}}
            {{-- MONTHLY ACTUAL SUM --}}
            @php
            $monthly_actual_total_pick = array();
            $monthly_actual_total = array();
            // $monthly_target_total_round = array();
            @endphp
                @for ($i= 0; $i <12; $i++)
                @php
                $monthly_actual_pick = array();
                @endphp
                    @for ($j= $i; $j <= 47; $j+=12)
                    @php
                    array_push($monthly_actual_pick, $export_paper_actual_months_prod[$j]);  
                    @endphp
                    
                    @endfor
                    @php
                    $monthly_actual_sum = array_sum($monthly_actual_pick);
                    array_push($monthly_actual_total_pick, $monthly_actual_sum);
                    $monthly_actual_total_sum =  $paper_actual_months_sg[$i] + $monthly_actual_total_pick[$i];
                    array_push($monthly_actual_total, $monthly_actual_total_sum);
                    // $monthly_target_total_s = round($monthly_target_total, 2);
                    // array_push($monthly_target_total_round, $monthly_target_total_s[$i]);
                    // $monthly_target_total_sum_round = as($monthly_target_total_sum, 2);
                    @endphp
                    
                @endfor

            @php
            for($i= 3; $i < 12; $i++){
                if ($monthly_actual_total[$i] !== null) {
                    $monthly_actual_total_round = round($monthly_actual_total[$i], 2);
                    echo '<td>'.$monthly_actual_total_round.'</td>';
                }
                else {
                    echo '<td>'.$monthly_actual_total[$i].'</td>';
                }
            }
            for ($i= 0; $i <= 2; $i++){
                if ($monthly_actual_total[$i] !== null) {
                    $monthly_actual_total_round = round($monthly_actual_total[$i], 2);
                    echo '<td>'.$monthly_actual_total_round.'</td>';
                }
                else {
                    echo '<td>'.$monthly_actual_total[$i].'</td>';
                }
            }
            @endphp
                @php
                $monthly_actual_total_sum = array_sum($monthly_actual_total);
                $monthly_actual_total_sum_round = round($monthly_actual_total_sum, 2);
                @endphp
                <td>{{ $monthly_actual_total_sum_round }}</td>

        </tr>
            <!-- END  ROW -->
            
        <tr>
            <!-- ROW -> BLANK ROW -->
        </tr>

        <tr>
            <td></td> 
            <td></td> 
            <td></td>
            <td></td>
            <th>{{ 'Apr-'.$currentfy}}</th>
            <th>{{ 'May-'.$currentfy}}</th>
            <th>{{ 'Jun-'.$currentfy}}</th>
            <th>{{ 'Jul-'.$currentfy}}</th>
            <th>{{ 'Aug-'.$currentfy}}</th>
            <th>{{ 'Sep-'.$currentfy}}</th>
            <th>{{ 'Oct-'.$currentfy}}</th>
            <th>{{ 'Nov-'.$currentfy}}</th>
            <th>{{ 'Dec-'.$currentfy}}</th>
            <th>{{ 'Jan-'.$currentfy_plus1}}</th>
            <th>{{ 'Feb-'.$currentfy_plus1}}</th>
            <th>{{ 'Mar-'.$currentfy_plus1}}</th>
            <th>Total</th>
        </tr>

        <!--  TARGET ROW -->
        <tr>
            <td></td> 
            <td></td> 
            <td></td>
                <td>Target</td>
                {{-- 12 columns --}}
                {{-- MONTHLY TARGET SUM --}}
                @php
                $monthly_target_total_pick = array();
                $monthly_target_total = array();
                // $monthly_target_total_round = array();
                @endphp
                    @for ($i= 0; $i <12; $i++)
                    @php
                    $monthly_target_pick = array();
                    @endphp
                        @for ($j= $i; $j <= 47; $j+=12)
                        @php
                        array_push($monthly_target_pick, $export_paper_target_months_prod[$j]);  
                        @endphp
                        
                        @endfor
                        @php
                        $monthly_target_sum = array_sum($monthly_target_pick);
                        array_push($monthly_target_total_pick, $monthly_target_sum);
                        $monthly_target_total_sum =  $paper_target_months_sg[$i] + $monthly_target_total_pick[$i];
                        array_push($monthly_target_total, $monthly_target_total_sum);
                        // $monthly_target_total_s = round($monthly_target_total, 2);
                        // array_push($monthly_target_total_round, $monthly_target_total_s[$i]);
                        // $monthly_target_total_sum_round = as($monthly_target_total_sum, 2);
                        @endphp
                        
                    @endfor
                
                @php
                for($i= 3; $i < 12; $i++){
                    if ($monthly_target_total[$i] !== null) {
                        $monthly_target_total_round = round($monthly_target_total[$i], 2);
                        echo '<td>'.$monthly_target_total_round.'</td>';
                    }
                    else {
                        echo '<td>'.$monthly_target_total[$i].'</td>';
                    }
                }
                for ($i= 0; $i <= 2; $i++){
                    if ($monthly_target_total[$i] !== null) {
                        $monthly_target_total_round = round($monthly_target_total[$i], 2);
                        echo '<td>'.$monthly_target_total_round.'</td>';
                    }
                    else {
                        echo '<td>'.$monthly_target_total[$i].'</td>';
                    }
                }
                @endphp
                    @php
                    $monthly_target_total_sum = array_sum($monthly_target_total);
                    $monthly_target_total_sum_round = round($monthly_target_total_sum, 2);
                    @endphp
                    <td>{{ $monthly_target_total_sum_round }}</td>
    
        </tr>
        <!-- END TARGET ROW -->

        <!-- ACTUAL ROW -->
        <tr>
            <td></td> 
            <td></td> 
            <td></td>
                <td>Actual</td>
                {{-- 12 columns --}}
                {{-- MONTHLY ACTUAL SUM --}}
                @php
                $monthly_actual_total_pick = array();
                $monthly_actual_total = array();
                // $monthly_target_total_round = array();
                @endphp
                    @for ($i= 0; $i <12; $i++)
                    @php
                    $monthly_actual_pick = array();
                    @endphp
                        @for ($j= $i; $j <= 47; $j+=12)
                        @php
                        array_push($monthly_actual_pick, $export_paper_actual_months_prod[$j]);  
                        @endphp
                        
                        @endfor
                        @php
                        $monthly_actual_sum = array_sum($monthly_actual_pick);
                        array_push($monthly_actual_total_pick, $monthly_actual_sum);
                        $monthly_actual_total_sum =  $paper_actual_months_sg[$i] + $monthly_actual_total_pick[$i];
                        array_push($monthly_actual_total, $monthly_actual_total_sum);
                        // $monthly_target_total_s = round($monthly_target_total, 2);
                        // array_push($monthly_target_total_round, $monthly_target_total_s[$i]);
                        // $monthly_target_total_sum_round = as($monthly_target_total_sum, 2);
                        @endphp
                        
                    @endfor

                @php
                for($i= 3; $i < 12; $i++){
                    if ($monthly_actual_total[$i] !== null) {
                        $monthly_actual_total_round = round($monthly_actual_total[$i], 2);
                        echo '<td>'.$monthly_actual_total_round.'</td>';
                    }
                    else {
                        echo '<td>'.$monthly_actual_total[$i].'</td>';
                    }
                }
                for ($i= 0; $i <= 2; $i++){
                    if ($monthly_actual_total[$i] !== null) {
                        $monthly_actual_total_round = round($monthly_actual_total[$i], 2);
                        echo '<td>'.$monthly_actual_total_round.'</td>';
                    }
                    else {
                        echo '<td>'.$monthly_actual_total[$i].'</td>';
                    }
                }
                @endphp
                    @php
                    $monthly_actual_total_sum = array_sum($monthly_actual_total);
                    $monthly_actual_total_sum_round = round($monthly_actual_total_sum, 2);
                    @endphp
                    <td>{{ $monthly_actual_total_sum_round }}</td>
        </tr>
        <!-- END  ACTUAL ROW -->

        <tr>
        <!-- ROW -> BLANK ROW -->
        </tr>
    
        <!--  TRICOLOR CHART ROW -->
        <tr>
            <td></td> 
            <td></td> 
                <td>TRI COLOR CHART Data</td>
                <td></td> 
                @php
                    $a = $monthly_target_total_sum_round;
                    $bb = array();
                    $cc = array();
                    // $e = array();
                    for($i= 3; $i < 12; $i++){
                        array_push($bb , $monthly_target_total_round[$i]);
                        array_push($cc , $monthly_actual_total_round[$i]);
                        $d = ($a - array_sum($bb)) + array_sum($cc);
                        $d_round = round($d, 2);
                        echo '<td>'.$d_round.'</td>';
                    }
                    for($i= 0; $i <= 2; $i++){
                        array_push($bb , $monthly_target_total_round[$i]);
                        array_push($cc , $monthly_actual_total_round[$i]);
                        $d = ($a - array_sum($bb)) + array_sum($cc);
                        $d_round = round($d, 2);
                        echo '<td>'.$d_round.'</td>';
                    }
                @endphp 
                {{-- @for($i= 3; $i < 12; $i++)
                    <td>{{ $e[$i] }}</td>
                @endfor
                @for($i= 0; $i <= 2; $i++)
                    <td>{{ $e[$i] }}</td>
                @endfor      --}}
                
                
        </tr>
        <!-- END TRICOLOR CHART ROW -->
        
    </tbody>
   
</table>
<!-- END PAPER CONSUMPTION ACTUAL 3RD-->
                            
<!-- MONTHLY PAPER ACTUAL ALL SECTION 4TH -->
<table class="table table-striped">
    <thead>
        <!--  ROW -->
    <tr>
                    <th>INK CONSUMPTION (Monitoring Only)</th>
                    <th></th>
                    <th>{{ 'FY '.$pastfy.' Actual'}}</th>
                    <th>{{ 'FY '.$currentfy.' Target'}}</th>
                    <!-- <th>March(past FY)</th> -->
                    <th>{{ 'Apr-'.$currentfy}}</th>
                    <th>{{ 'May-'.$currentfy}}</th>
                    <th>{{ 'Jun-'.$currentfy}}</th>
                    <th>{{ 'Jul-'.$currentfy}}</th>
                    <th>{{ 'Aug-'.$currentfy}}</th>
                    <th>{{ 'Sep-'.$currentfy}}</th>
                    <th>{{ 'Oct-'.$currentfy}}</th>
                    <th>{{ 'Nov-'.$currentfy}}</th>
                    <th>{{ 'Dec-'.$currentfy}}</th>
                    <th>{{ 'Jan-'.$currentfy_plus1}}</th>
                    <th>{{ 'Feb-'.$currentfy_plus1}}</th>
                    <th>{{ 'Mar-'.$currentfy_plus1}}</th>
                    <th>Average</th>
    </tr>
        <!-- END  ROW -->       
        
    </thead>
    <tbody>
        {{-- @php
           $ink_past_actual_round = round($export_ink_past_actual, 2);
           $ink_current_target_round = round($export_ink_current_target, 2);
        @endphp --}}
            {{-- TEST --}}
            
                @php
                    $array_total = array();
                    $departments = array('BOD','IAS','FIN','HRD','ESS','LOG','FAC','ISS','QAD','EMS','TS','CN','YF','PPS');
                    for ($i= 0; $i < 14; $i++) {
                        $dep_counter = $i + 1; 
                        echo '<tr>';
                        echo '<td>'.$departments[$i].'</td>';
                        echo '<td></td>';
                        echo '<td>'.round($export_ink_past_actual[$dep_counter],2).'</td>';
                        echo '<td>'.round($export_ink_current_target[$dep_counter],2).'</td>';
                        // {{-- //id = 1 --}}
                        // {{-- 12 columns --}}
                    
                        for($j = 3; $j <= 11; $j++){ //{{-- INK MONTHLY ACTUAL(array) dep_id=TS-PROD(3) is from "0-11" --}}
                            if ($export_ink_actual_months[$i][$j] !== null) {
                                $ink_actual_months_round = round($export_ink_actual_months[$i][$j], 2);
                                echo '<td>'.$ink_actual_months_round.'</td>';
                            }
                            else {
                                echo '<td>'.$export_ink_actual_months[$i][$j].'</td>';
                            }
                        }
                        for ($j = 0; $j <= 2; $j++){
                            if ($export_ink_actual_months[$i][$j] !== null) {
                                $ink_actual_months_round = round($export_ink_actual_months[$i][$j], 2);
                                echo '<td>'.$ink_actual_months_round.'</td>';
                            }
                            else {
                                echo '<td>'.$export_ink_actual_months[$i][$j].'</td>';
                            }
                        }
            
                        // {{-- TS-PROD MONTHLY ACTUAL AVERAGE --}}
                    
                        $ink_array = array();
                        for ($j= 0; $j <= 11; $j++) { 
                            array_push($ink_array , $export_ink_actual_months[$i][$j]);
                        }
                        // $a_array_ts = array_filter($array_ts);
                        $a_ink_array = array_filter($ink_array, function($x) { return $x !== null; });
                        if (count($a_ink_array) !== 0) {
                            $ink_average = array_sum($a_ink_array)/count($a_ink_array);
                            $ink_average_round = round($ink_average, 2);
                            echo '<td>'.$ink_average_round.'</td>';
                            array_push($array_total ,$ink_average_round);
                        }
                        elseif($a_ink_array == null){
                            $ink_average = '';
                            $ink_average_round = '';
                            echo '<td>'.$ink_average_round.'</td>';
                            array_push($array_total ,$ink_average_round);
                        }
                        else {
                            $ink_average = 0;
                            $ink_average_round = 0;
                            echo '<td>'.$ink_average_round.'</td>';
                            array_push($array_total ,$ink_average_round);
                        }

                        echo '</tr>';
                    }

                    
                @endphp
             
                <!-- END  ROW -->

            <!-- ROW -->
        <tr>
            <td>MONTHLY ACTUAL</td>
            <td></td>
            <td>{{ round(array_sum($export_ink_past_actual),2) }}</td>
            <td>{{ round(array_sum($export_ink_current_target),2)}}</td>
            {{-- MONTHLY ACTUAL SUM --}}
            @php
                $ink_monthly_actual_total = array();
                // $ink_monthly_actual_total = array();
                // $monthly_target_total_round = array();
                for ($i= 0; $i < 12; $i++){
                    $ink_monthly_actual_pick = array();
                    for ($j= 0; $j <14; $j++){
                    array_push($ink_monthly_actual_pick, $export_ink_actual_months[$j][$i]);  
                    }
                    // for ($i=0; $i < count($ink_monthly_actual_pick); $i++) {
                        $filter_ink_monthly_actual_pick = array_filter($ink_monthly_actual_pick, function($x) { return $x !== null; });
                        if (count($filter_ink_monthly_actual_pick) !== 0) {
                            $ink_monthly_actual_sum = array_sum($ink_monthly_actual_pick);
                            // $ink_monthly_actual_sum_round = round($ink_monthly_actual_sum, 2);
                            array_push($ink_monthly_actual_total, $ink_monthly_actual_sum);
                        }
                        else {
                            $ink_monthly_actual_sum = '';
                            array_push($ink_monthly_actual_total, $ink_monthly_actual_sum);
                        }
                    // }
                    // $ink_monthly_actual_total_sum = $ink_monthly_actual_total_pick[$i];
                    // array_push($ink_monthly_actual_total, $ink_monthly_actual_total_sum);
                    // $monthly_target_total_s = round($monthly_target_total, 2);
                    // array_push($monthly_target_total_round, $monthly_target_total_s[$i]);
                    // $monthly_target_total_sum_round = as($monthly_target_total_sum, 2);
                    
                }
            
                for($i= 3; $i < 12; $i++){ 
                    // if ($ink_monthly_actual_total[$i] !== null) {
                    //     echo '<td>'.$ink_monthly_actual_total_round.'</td>';
                    // }
                    // else {
                        echo '<td>'.$ink_monthly_actual_total[$i].'</td>';
                    // }
                }
                for($i= 0; $i <= 2; $i++){
                    // if ($ink_monthly_actual_total[$i] !== null) {
                    //     $ink_monthly_actual_total_round = round($ink_monthly_actual_total[$i], 2);
                    //     echo '<td>'.$ink_monthly_actual_total_round.'</td>';
                    // }
                    // else {
                        echo '<td>'.$ink_monthly_actual_total[$i].'</td>';
                    // }
                }
            @endphp

            @php
                $ink_monthly_total_sum = array_sum($array_total);
                $ink_monthly_total_sum_round = round($ink_monthly_total_sum, 2);
            @endphp
                <td>{{ $ink_monthly_total_sum_round }}</td>

        </tr>
            <!-- END  ROW -->
            
        <tr>
            <!-- ROW -> BLANK ROW -->
        </tr>

        <tr>
            <td></td> 
            <td></td> 
            <td></td>
            <td></td>
            <th>{{ 'Apr-'.$currentfy}}</th>
            <th>{{ 'May-'.$currentfy}}</th>
            <th>{{ 'Jun-'.$currentfy}}</th>
            <th>{{ 'Jul-'.$currentfy}}</th>
            <th>{{ 'Aug-'.$currentfy}}</th>
            <th>{{ 'Sep-'.$currentfy}}</th>
            <th>{{ 'Oct-'.$currentfy}}</th>
            <th>{{ 'Nov-'.$currentfy}}</th>
            <th>{{ 'Dec-'.$currentfy}}</th>
            <th>{{ 'Jan-'.$currentfy_plus1}}</th>
            <th>{{ 'Feb-'.$currentfy_plus1}}</th>
            <th>{{ 'Mar-'.$currentfy_plus1}}</th>
            <th>Total</th>
        </tr>
                {{-- PHP CODE HERE --}}
                @php
                    
                // == MONTHLY TARGET SUM ==  && // == MONTHLY ACTUAL SUM ==
                    $ink_monthly_target_total = array();
                    $ink_monthly_actual_total = array();

                    for ($i= 0; $i < 12; $i++){
                        // $counter = 

                        $ink_monthly_target_pick = array();
                        $ink_monthly_actual_pick = array();

                        for ($j= 0; $j < 14; $j++){ 
                        array_push($ink_monthly_target_pick, $export_ink_target_months[$j][$i]);
                        array_push($ink_monthly_actual_pick, $export_ink_actual_months[$j][$i]);
                        
                        // $counter = 
                        }
                        

                        $filter_ink_monthly_target_pick = array_filter($ink_monthly_target_pick, function($x) { return $x !== null; });
                        if (count($filter_ink_monthly_target_pick) !== 0) {
                            $ink_monthly_target_sum = array_sum($ink_monthly_target_pick);
                            // $ink_monthly_target_sum_round = round($ink_monthly_target_sum, 2);
                            array_push($ink_monthly_target_total, $ink_monthly_target_sum);
                        }
                        else {
                            $ink_monthly_target_sum = '';
                            array_push($ink_monthly_target_total, $ink_monthly_target_sum);
                        }

                        $filter_ink_monthly_actual_pick = array_filter($ink_monthly_actual_pick, function($x) { return $x !== null; });
                            if (count($filter_ink_monthly_actual_pick) !== 0) {
                                $ink_monthly_actual_sum = array_sum($ink_monthly_actual_pick);
                                // $ink_monthly_actual_sum_round = round($ink_monthly_actual_sum, 2);
                                array_push($ink_monthly_actual_total, $ink_monthly_actual_sum);
                            }
                            else {
                                $ink_monthly_actual_sum = '';
                                array_push($ink_monthly_actual_total, $ink_monthly_actual_sum);
                            }
                    }
                @endphp
        <!-- INK TARGET ROW -->
        <tr>
            <td></td> 
            <td></td> 
            <td></td>
                <td>Target</td>
                {{-- 12 columns --}}
                {{-- MONTHLY TARGET SUM --}}
                @php
                    for($i= 3; $i < 12; $i++){ 
                        echo '<td>'.$ink_monthly_target_total[$i].'</td>';
                        // if ($ink_monthly_target_total[$i] !== null) {
                        //     $ink_monthly_target_total_round = round($ink_monthly_target_total[$i], 2);
                        //     echo '<td>'.$ink_monthly_target_total_round.'</td>';
                        // }
                        // else {
                        //     echo '<td>'.$ink_monthly_target_total[$i].'</td>';
                        // }
                    }
                    for($i= 0; $i <= 2; $i++){
                        echo '<td>'.$ink_monthly_target_total[$i].'</td>';
                        // if ($ink_monthly_target_total[$i] !== null) {
                        //     $ink_monthly_target_total_round = round($ink_monthly_target_total[$i], 2);
                        //     echo '<td>'.$ink_monthly_target_total_round.'</td>';
                        // }
                        // else {
                        //     echo '<td>'.$ink_monthly_target_total[$i].'</td>';
                        // }
                    }
                    
                    $ink_monthly_target_total_sum = array_sum($ink_monthly_target_total);
                    $ink_monthly_target_total_sum_round = round($ink_monthly_target_total_sum, 2);
                @endphp
                <td>{{ $ink_monthly_target_total_sum_round }}</td>
    
        </tr>
        <!-- END WATER TARGET ROW -->

        <!-- INK ACTUAL ROW -->
        <tr>
            <td></td> 
            <td></td> 
            <td></td>
                <td>Actual</td>
                {{-- 12 columns --}}
                {{-- MONTHLY ACTUAL SUM --}}
            @php
                for($i= 3; $i < 12; $i++){ 
                    echo '<td>'.$ink_monthly_actual_total[$i].'</td>';
                    // if ($ink_monthly_actual_total[$i] !== null) {
                    //     $ink_monthly_actual_total_round = round($ink_monthly_actual_total[$i], 2);
                    //     echo '<td>'.$ink_monthly_actual_total_round.'</td>';
                    // }
                    // else {
                    //     echo '<td>'.$ink_monthly_actual_pick[$i].'</td>';
                    // }
                }
                for($i= 0; $i <= 2; $i++){
                    echo '<td>'.$ink_monthly_actual_total[$i].'</td>';
                    // if ($ink_monthly_actual_total[$i] !== null) {
                    //     $ink_monthly_actual_total_round = round($ink_monthly_actual_total[$i], 2);
                    //     echo '<td>'.$ink_monthly_actual_total_round.'</td>';
                    // }
                    // else {
                    //     echo '<td>'.$ink_monthly_actual_pick[$i].'</td>';
                    // }
                }
                
                    $ink_monthly_actual_total_sum = array_sum($ink_monthly_actual_total);
                    $ink_monthly_actual_total_sum_round = round($ink_monthly_actual_total_sum, 2);
            @endphp
                    <td>{{ $ink_monthly_actual_total_sum_round }}</td>
        </tr>
        <!-- END WATER ACTUAL ROW -->

        <tr>
        <!-- ROW -> BLANK ROW -->
        </tr>
    
        <!-- WATER TRICOLOR CHART ROW -->
        <tr>
            <td></td> 
            <td></td> 
                <td>TRI COLOR CHART Data</td>
                <td></td>
                {{-- @php
                    
                // == MONTHLY TARGET SUM ==  && // == MONTHLY ACTUAL SUM ==
                    $ink_monthly_target_total = array();
                    $ink_monthly_actual_total = array();

                    for ($i= 0; $i <12; $i++){

                        $ink_monthly_target_pick = array();
                        $ink_monthly_actual_pick = array();

                        for ($j= $i; $j <= 47; $j+=12){ 
                        array_push($ink_monthly_target_pick, $export_ink_target_months[$j]);
                        array_push($ink_monthly_actual_pick, $export_ink_actual_months[$j]);  
                        }

                        $filter_ink_monthly_target_pick = array_filter($ink_monthly_target_pick, function($x) { return $x !== null; });
                        if (count($filter_ink_monthly_target_pick) !== 0) {
                            $ink_monthly_target_sum = array_sum($ink_monthly_target_pick);
                            array_push($ink_monthly_target_total, $ink_monthly_target_sum);
                        }
                        else {
                            $ink_monthly_target_sum = '';
                            array_push($ink_monthly_target_total, $ink_monthly_target_sum);
                        }

                        $filter_ink_monthly_actual_pick = array_filter($ink_monthly_actual_pick, function($x) { return $x !== null; });
                            if (count($filter_ink_monthly_actual_pick) !== 0) {
                                $ink_monthly_actual_sum = array_sum($ink_monthly_actual_pick);
                                array_push($ink_monthly_actual_total, $ink_monthly_actual_sum);
                            }
                            else {
                                $ink_monthly_actual_sum = '';
                                array_push($ink_monthly_actual_total, $ink_monthly_actual_sum);
                            }
                    }
                @endphp --}}

                @php
                    $ink_a = round(array_sum($ink_monthly_target_total), 2);
                    $ink_bb = array();
                    $ink_cc = array();
                    // $e = array();
                    for($i= 3; $i < 12; $i++){
                        array_push($ink_bb , $ink_monthly_target_total[$i]);
                        array_push($ink_cc , $ink_monthly_actual_total[$i]);
                        $ink_d = ($ink_a - array_sum($ink_bb)) + array_sum($ink_cc);
                        $ink_d_round = round($ink_d,2);
                        echo '<td>'.$ink_d_round.'</td>';
                    }
                    for($i= 0; $i <= 2; $i++){
                        array_push($ink_bb , $ink_monthly_target_total[$i]);
                        array_push($ink_cc , $ink_monthly_actual_total[$i]);
                        $ink_d = ($ink_a - array_sum($ink_bb)) + array_sum($ink_cc);
                        $ink_d_round = round($ink_d,2);
                        echo '<td>'.$ink_d_round.'</td>';
                    }
                @endphp 
                
        </tr>
        <!-- END WATER TRICOLOR CHART ROW -->
        
    </tbody>
   
</table>
<!-- END PAPER CONSUMPTION ACTUAL 4TH-->




