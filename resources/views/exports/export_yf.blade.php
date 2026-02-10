<table class="table table-striped">
    <thead>
        <!--  ROW -->
    <tr>
                    <th>  PAPER  CONSUMPTION  </th>
    </tr>
        @php
            $currentfy_plus1 = $currentfy + 1; 
        @endphp
    <tr>               
                    <th></th>
                    <th></th>
                    <th></th> {{-- reduction --}}
                    <th>{{ 'Mar-'.$pastfy}}</th>
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

    <!-- PAST FY DATA -->
    <tr>
        <td></td>
        <td>{{ '=(P3-D3)/12' }}</td>
        <td></td>
        @php
            $pastfyactual_round = round($pastfyactual[4], 1);
            for ($i= 0; $i <= 12; $i++) { 
                echo '<td>'.$pastfyactual_round.'</td>';
            }
        @endphp

        {{-- <td></td>
        <td>{{ ($pastfyactual[4] - $pastfyactual[4])/12 }}</td> --}}
        {{-- reduction --}}
        {{-- <td></td>
        @php
            $pastfyactual_round = round($pastfyactual[4], 1);
            for ($i= 0; $i <= 12; $i++) { 
                echo '<td>'.$pastfyactual_round.'</td>';
            }
        @endphp --}}
    </tr>
        <!-- END  ROW -->        
        
    </thead>
    <tbody>
        <!-- ENERGY TARGET ROW -->
        
        <tr>
            <td></td>
            <td>{{ '=++(P4-D4)/12' }}</td>
            <td>Performance</td>
            <td>{{ $pastfyactual_round }}</td>
            <td>{{ '=++D4+B4' }}</td>
            <td>{{ '=++E4+B4' }}</td>
            <td>{{ '=++F4+B4' }}</td>
            <td>{{ '=++G4+B4' }}</td>
            <td>{{ '=++H4+B4' }}</td>
            <td>{{ '=++I4+B4' }}</td>
            <td>{{ '=++J4+B4' }}</td>
            <td>{{ '=++K4+B4' }}</td>
            <td>{{ '=++L4+B4' }}</td>
            <td>{{ '=++M4+B4' }}</td>
            <td>{{ '=++N4+B4' }}</td>
            <td>{{ '=++P3-(P3-P6)*0.5' }}</td>

            {{-- @php
                $fy_diff = ($pastfyactual[4] - $target[4]) * 0.5;
                // $fy_diff_a = ($pastfyactual[4] - $fy_diff)
                $pastfy_reduction = $pastfyactual[4] - $fy_diff;
                $pastfy_reduction_round = round($pastfy_reduction, 1);
                $reduction = ($pastfy_reduction - $pastfyactual[4])/12;
                $reduction_round = round($reduction, 4);

                        $data = array();
                        $a = $reduction;
                        $b = $pastfyactual[4];
                        $c = $b + $a;
                        array_push($data, $c);
            @endphp --}}

            {{-- <td></td>
            <td>{{ $reduction_round }}</td>
            <td>Performance</td>
            <td>{{ $pastfyactual_round }}</td> --}}
            {{-- 11 columns --}}
            {{-- @for ($i = 0; $i < 11; $i++)
                @php
                    $next[$i] = $data[$i] + $a;
                    array_push($data, $next[$i]);
                    $data_round[$i] = round($data[$i], 1);
                @endphp
                <td>{{ $data_round[$i] }}</td>
            @endfor --}}
            {{-- 1 column --}}
                {{-- <td>{{ $pastfy_reduction_round }}</td> --}}
            
                
        </tr> 
        <!-- END ENERGY TARGET ROW -->

        <!-- ENERGY ACTUAL ROW -->
        <tr>

            <td></td>
            <td>{{ '=++(P5-D5)/12' }}</td>
            <td>Performance</td>
            <td>{{ $pastfyactual_round }}</td>
            <td>{{ '=++D5+B5' }}</td>
            <td>{{ '=++E5+B5' }}</td>
            <td>{{ '=++F5+B5' }}</td>
            <td>{{ '=++G5+B5' }}</td>
            <td>{{ '=++H5+B5' }}</td>
            <td>{{ '=++I5+B5' }}</td>
            <td>{{ '=++J5+B5' }}</td>
            <td>{{ '=++K5+B5' }}</td>
            <td>{{ '=++L5+B5' }}</td>
            <td>{{ '=++M5+B5' }}</td>
            <td>{{ '=++N5+B5' }}</td>
            <td>{{ '=++P3-(P3-P6)*0.8' }}</td>

            {{-- @php
                $a_fy_diff = ($pastfyactual[4] - $target[4]) * 0.8;
                // $fy_diff_a = ($pastfyactual[4] - $fy_diff)
                $a_pastfy_reduction = $pastfyactual[4] - $a_fy_diff;
                $a_pastfy_reduction_round = round($a_pastfy_reduction, 1);
                $a_reduction = ($a_pastfy_reduction - $pastfyactual[4])/12;
                $a_reduction_round = round($a_reduction, 4);

                        $a_data = array();
                        $a_1 = $a_reduction;
                        $b_1 = $pastfyactual[4];
                        $c_1 = $b_1 + $a_1;
                        array_push($a_data, $c_1);
            @endphp --}}

            {{-- <td></td>
            <td>{{ $a_reduction_round }}</td>
            <td>Performance</td>
            <td>{{ $pastfyactual_round }}</td> --}}
            {{-- 11 columns --}}
            {{-- @for ($i = 0; $i < 11; $i++)
                @php
                    $a_next[$i] = $a_data[$i] + $a_1;
                    array_push($a_data, $a_next[$i]);
                    $a_data_round[$i] = round($a_data[$i], 1);
                @endphp
                <td>{{ $a_data_round[$i] }}</td>
            @endfor --}}
            {{-- 1 column --}}
                {{-- <td>{{ $a_pastfy_reduction_round }}</td> --}}

        
        </tr> 
        <!-- END ENERGY ACTUAL ROW -->

        <!-- ENERGY ACTUAL ROW -->
        <tr>
            <td></td>
            <td>{{ '=++(P6-D6)/12' }}</td>
            <td>Performance</td>
            <td>{{ $pastfyactual_round }}</td>
            <td>{{ '=++D6+B6' }}</td>
            <td>{{ '=++E6+B6' }}</td>
            <td>{{ '=++F6+B6' }}</td>
            <td>{{ '=++G6+B6' }}</td>
            <td>{{ '=++H6+B6' }}</td>
            <td>{{ '=++I6+B6' }}</td>
            <td>{{ '=++J6+B6' }}</td>
            <td>{{ '=++K6+B6' }}</td>
            <td>{{ '=++L6+B6' }}</td>
            <td>{{ '=++M6+B6' }}</td>
            <td>{{ '=++N6+B6' }}</td>
            <td>{{ $target[4] }}</td>

            {{-- @php
                $b_reduction = ($target[4] - $pastfyactual[4])/12;
                $b_reduction_round = round($b_reduction, 4);
                // $fy_diff_a = ($pastfyactual[4] - $fy_diff)
                // $a_pastfy_reduction = $pastfyactual[4] - $a_fy_diff;
                $target_round = round($target[4], 1);
                // $a_reduction = ($a_pastfy_reduction - $pastfyactual[4])/12;

                        $b_data = array();
                        $a_2 = $b_reduction;
                        $b_2 = $pastfyactual[4];
                        $c_2 = $b_2 + $a_2;
                        array_push($b_data, $c_2);
            @endphp --}}
                
            {{-- <td></td>
            <td>{{ $b_reduction_round }}</td>
            <td>Performance</td>
            <td>{{ $pastfyactual_round }}</td> --}}
            {{-- 11 columns --}}
            {{-- @for ($i = 0; $i < 11; $i++)
                @php
                    $b_next[$i] = $b_data[$i] + $a_2;
                    array_push($b_data, $b_next[$i]);
                    $b_data_round[$i] = round($b_data[$i], 1);
                @endphp
                <td>{{ $b_data_round[$i] }}</td>
            @endfor --}}
            {{-- 1 column --}}
                {{-- <td>{{ $target_round }}</td> --}}

        
        </tr> 
        <!-- END ENERGY ACTUAL ROW -->
            {{-- @php
            $yf_target = array();
            $yf_actual = array();
            //  target_months(array) dep_id=YF(4) is from "36-47"
            for ($i = 36; $i <= 47; $i++) { 
                array_push($yf_target , $target_months[$i]);
                array_push($yf_actual , $actual_months[$i]);
            }
            $a_target = $target[4];//$a
            $array_yf_target = array();//$bb
            $array_yf_actual = array();//$bb
            // $tricolor_last = array();
            // $count = array(0,1,2,3,4,5,6,7,8,9,10,11);//$bb
            // $e = array();
            $tricolor_last = ($a_target - array_sum($yf_target)) + array_sum($yf_actual);
            $c_reduction = ($tricolor_last - $pastfyactual[4])/12;
            $c_reduction_round = round($b_reduction, 4);
            @endphp  --}}
        <!-- ENERGY ACTUAL ROW -->
        <tr>

            <td></td>
            <td>{{ '=++(P7-D7)/12' }}</td>
            <td>Actual Performance</td>
            <td>{{ $pastfyactual_round }}</td>
            <td>{{ '=E15' }}</td>
            <td>{{ '=F15' }}</td>
            <td>{{ '=G15' }}</td>
            <td>{{ '=H15' }}</td>
            <td>{{ '=I15' }}</td>
            <td>{{ '=J15' }}</td>
            <td>{{ '=K15' }}</td>
            <td>{{ '=L15' }}</td>
            <td>{{ '=M15' }}</td>
            <td>{{ '=N15' }}</td>
            <td>{{ '=O15' }}</td>
            <td>{{ '=P15' }}</td>
            
            {{-- <td></td>
            <td>{{ $c_reduction_round }}</td>
            <td>Actual Performance</td>
            <td>{{ $pastfyactual_round }}</td> --}}
            {{-- 12 columns --}}
            {{-- @for ($i = 3; $i < 12; $i++)
                <td>{{ $array_tricolor[$i] }}</td>
            @endfor
            @for ($i = 0; $i <= 2; $i++)
                <td>{{ $array_tricolor[$i] }}</td>
            @endfor --}}
            {{-- @php
            $tricolor_array = array();//FOR TRICOLOR PERCENTAGE

                for($i= 3; $i <= 11; $i++){
                array_push($array_yf_target, $yf_target[$i]);
                array_push($array_yf_actual, $yf_actual[$i]);
                $d = ($a_target - array_sum($array_yf_target)) + array_sum($array_yf_actual);
                // array_push($e, $d);
                array_push($tricolor_array,$d);//for tricolor percentage
                $d_round = round($d, 2);
                echo '<td>'.$d_round.'</td>';
            }
            for($i= 0; $i <= 2; $i++){
                array_push($array_yf_target, $yf_target[$i]);
                array_push($array_yf_actual, $yf_actual[$i]);
                $d = ($a_target - array_sum($array_yf_target)) + array_sum($array_yf_actual);
                array_push($tricolor_array,$d);//for tricolor percentage
                $d_round = round($d, 2);
                echo '<td>'.$d_round.'</td>';
            }
            @endphp --}}
        
        </tr> 
        <!-- END ENERGY ACTUAL ROW -->

        <tr>

            <td></td> 
            <td></td>
                <td>Computed Tri-color Rate</td>
                <td>{{ '=++(E4-D7)/(E4-D6)' }}</td>
                <td>{{ '=++(E4-E7)/(E4-E6)' }}</td>
                <td>{{ '=++(E4-F7)/(E4-F6)' }}</td>
                <td>{{ '=++(E4-G7)/(E4-G6)' }}</td>
                <td>{{ '=++(E4-H7)/(E4-H6)' }}</td>
                <td>{{ '=++(E4-I7)/(E4-I6)' }}</td>
                <td>{{ '=++(E4-J7)/(E4-J6)' }}</td>
                <td>{{ '=++(E4-K7)/(E4-K6)' }}</td>
                <td>{{ '=++(E4-L7)/(E4-L6)' }}</td>
                <td>{{ '=++(E4-M7)/(E4-M6)' }}</td>
                <td>{{ '=++(E4-N7)/(E4-N6)' }}</td>
                <td>{{ '=++(E4-O7)/(E4-O6)' }}</td>
        {{-- <td></td> 
        <td></td>
            <td>Computed Tri-color Rate</td>
            @php
                $pastfy_tricolor_ab = $data[0] - $pastfyactual[4];
                    if ($pastfy_tricolor_ab == 0) {
                        $pastfy_tricolor_percentage = 0;
                        $pastfy_tricolor_percentage_round = 0;
                        echo '<td>'.$pastfy_tricolor_percentage_round.'%'.'</td>';
                    }
                    else {
                        $pastfy_tricolor = ($data[0] - $pastfyactual[4])/$pastfy_tricolor_ab;
                        $pastfy_tricolor_percentage = $pastfy_tricolor * 100;
                        $pastfy_tricolor_percentage_round = round($pastfy_tricolor_percentage, 0);
                        echo '<td>'.$pastfy_tricolor_percentage_round.'%'.'</td>';
                    }

            $tricolor_data = array();
                $tricolor_a = $data[0]; //static
                for ($i=0; $i <= 11; $i++) { 
                    $tricolor_b = $b_data[$i]; //with interation
                    // $tricolor_c = ($a_target - $yf_target[$i]) + $yf_actual[$i]; //with interation
                    // array_push($tricolor_array_yf_target, $yf_target[$i]);
                    // array_push($tricolor_array_yf_actual, $yf_actual[$i]);
                    $tricolor_c = $tricolor_array[$i];
                    $tricolor_ab = $tricolor_a - $tricolor_b;
                    if ($tricolor_ab == 0) {
                        $tricolor_percentage = 0;
                        echo '<td>'.$tricolor_percentage.'%'.'</td>';
                        array_push($tricolor_data, $tricolor_percentage);
                    }
                    else {
                        $tricolor_d = ($tricolor_a - $tricolor_c)/$tricolor_ab; //with interation
                        $tricolor_percentage = $tricolor_d * 100;
                        $tricolor_percentage_round = round($tricolor_percentage, 0);
                        echo '<td>'.$tricolor_percentage_round.'%'.'</td>';
                        array_push($tricolor_data, $tricolor_percentage);
                    }
                    
                    // if ($tricolor_percentage <= 100) {
                    //     
                    // }
                    
                }
            @endphp --}}
        </tr>

        <tr>

            <td></td> 
            <td></td>
                <td>Conditional Tri-color Rate</td>
                <td>{{ '=IF(OR(D8>=100%),100%,IF(OR(D8<=0%),0%,AVERAGE(D8)))' }}</td>
                <td>{{ '=IF(OR(E8>=100%),100%,IF(OR(E8<=0%),0%,AVERAGE(E8)))' }}</td>
                <td>{{ '=IF(OR(F8>=100%),100%,IF(OR(F8<=0%),0%,AVERAGE(F8)))' }}</td>
                <td>{{ '=IF(OR(G8>=100%),100%,IF(OR(G8<=0%),0%,AVERAGE(G8)))' }}</td>
                <td>{{ '=IF(OR(H8>=100%),100%,IF(OR(H8<=0%),0%,AVERAGE(H8)))' }}</td>
                <td>{{ '=IF(OR(I8>=100%),100%,IF(OR(I8<=0%),0%,AVERAGE(I8)))' }}</td>
                <td>{{ '=IF(OR(J8>=100%),100%,IF(OR(J8<=0%),0%,AVERAGE(J8)))' }}</td>
                <td>{{ '=IF(OR(K8>=100%),100%,IF(OR(K8<=0%),0%,AVERAGE(K8)))' }}</td>
                <td>{{ '=IF(OR(L8>=100%),100%,IF(OR(L8<=0%),0%,AVERAGE(L8)))' }}</td>
                <td>{{ '=IF(OR(M8>=100%),100%,IF(OR(M8<=0%),0%,AVERAGE(M8)))' }}</td>
                <td>{{ '=IF(OR(N8>=100%),100%,IF(OR(N8<=0%),0%,AVERAGE(N8)))' }}</td>
                <td>{{ '=IF(OR(O8>=100%),100%,IF(OR(O8<=0%),0%,AVERAGE(O8)))' }}</td>
                <td>{{ '=IF(OR(P8>=100%),100%,IF(OR(P8<=0%),0%,AVERAGE(P8)))' }}</td>

        {{-- <td></td>  
        <td></td>
            <td>Conditional Tri-color Rate</td> 
            @php
                    if ($pastfy_tricolor_percentage >= 100) {
                            echo '<td> 100% </td>';
                        }
                    else{
                            echo '<td>'.$pastfy_tricolor_percentage_round.'%'.'</td>';
                        }

                for($i=0; $i <= 11; $i++){
                    
                        if ($tricolor_data[$i] >= 100) {
                            echo '<td> 100% </td>';
                        }
                        else{
                            $tricolor_data_round = round($tricolor_data[$i], 0);
                            echo '<td>'.$tricolor_data_round.'%'.'</td>';
                        }
                                   
                }
            @endphp             --}}
        </tr>

        <tr>
        <!-- ROW -> BLANK ROW -->
        </tr>

        <tr>
            <th>PAPER CONSUMPTION</th>           
            <th></th>
            <th></th>
            <th>{{ 'Mar-'.$pastfy}}</th>
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

        <tr>
            <td></td>
            <td></td>
            <td>Target</td>
            <td>{{ $pastfytarget[4] }}</td>
            <td>{{ '=Monitoring!E36' }}</td>
            <td>{{ '=Monitoring!F36' }}</td>
            <td>{{ '=Monitoring!G36' }}</td>
            <td>{{ '=Monitoring!H36' }}</td>
            <td>{{ '=Monitoring!I36' }}</td>
            <td>{{ '=Monitoring!J36' }}</td>
            <td>{{ '=Monitoring!K36' }}</td>
            <td>{{ '=Monitoring!L36' }}</td>
            <td>{{ '=Monitoring!M36' }}</td>
            <td>{{ '=Monitoring!N36' }}</td>
            <td>{{ '=Monitoring!O36' }}</td>
            <td>{{ '=Monitoring!P36' }}</td>
            <td>{{ '=SUM(E12:P12)' }}</td>

            {{-- <td></td>
            <td></td>
            <td>Target</td>=    
            @php
                $pastfytarget_round = round($pastfytarget[4], 2);
            @endphp
            <td>{{ $pastfytarget_round }}</td>     
            @php
                $array_yf_target_round = array();
                for($i= 0; $i <= 11; $i++){
                $yf_target_round = round($yf_target[$i], 2);
                array_push($array_yf_target_round, $yf_target_round);
                }

                for($i= 3; $i <= 11; $i++){
                echo '<td>'.$array_yf_target_round[$i].'</td>';
                }
                for($i= 0; $i <= 2; $i++){
                echo '<td>'.$array_yf_target_round[$i].'</td>';
                }

                $yf_target_sum = array_sum($yf_target);
                $yf_target_sum_round = round($yf_target_sum, 2);
                echo '<td>'.$yf_target_sum_round.'</td>';
            @endphp --}}
              
        </tr>
            
        <tr>

            <td></td>
            <td></td>
            <td>Actual</td>
            <td>{{ $pastfyactual_round }}</td>
            <td>{{ '=Monitoring!E44' }}</td>
            <td>{{ '=Monitoring!F44' }}</td>
            <td>{{ '=Monitoring!G44' }}</td>
            <td>{{ '=Monitoring!H44' }}</td>
            <td>{{ '=Monitoring!I44' }}</td>
            <td>{{ '=Monitoring!J44' }}</td>
            <td>{{ '=Monitoring!K44' }}</td>
            <td>{{ '=Monitoring!L44' }}</td>
            <td>{{ '=Monitoring!M44' }}</td>
            <td>{{ '=Monitoring!N44' }}</td>
            <td>{{ '=Monitoring!O44' }}</td>
            <td>{{ '=Monitoring!P44' }}</td>
            <td>{{ '=SUM(E13:P13)' }}</td>
            {{-- <td></td>
            <td></td> 
            <td>Actual</td>
            <td>{{ $pastfyactual_round }}</td>
            @php
                $array_yf_actual_round = array();
                for($i= 0; $i <= 11; $i++){
                $yf_actual_round = round($yf_actual[$i], 2);
                array_push($array_yf_actual_round, $yf_actual_round);
                }

                for($i= 3; $i <= 11; $i++){
                echo '<td>'.$array_yf_actual_round[$i].'</td>';
                }
                for($i= 0; $i <= 2; $i++){
                echo '<td>'.$array_yf_actual_round[$i].'</td>';
                }

                $yf_actual_sum = array_sum($yf_actual);
                $yf_actual_sum_round = round($yf_actual_sum, 2);
                echo '<td>'.$yf_actual_sum_round.'</td>';
            @endphp --}}
            
        </tr>

        <tr>

            <td></td>
            <td></td> 
            <td>-</td>
                <td></td>{{-- BLANK COLUMN --}}

                <td>{{ '=E12-E13' }}</td>
                <td>{{ '=F12-F13' }}</td>
                <td>{{ '=G12-G13' }}</td>
                <td>{{ '=H12-H13' }}</td>
                <td>{{ '=I12-I13' }}</td>
                <td>{{ '=J12-J13' }}</td>
                <td>{{ '=K12-K13' }}</td>
                <td>{{ '=L12-L13' }}</td>
                <td>{{ '=M12-M13' }}</td>
                <td>{{ '=N12-N13' }}</td>
                <td>{{ '=O12-O13' }}</td>
                <td>{{ '=P12-P13' }}</td>
                <td>{{ '=Q12-Q13' }}</td>

            {{-- <td></td>
            <td></td> 
            <td>-</td>
             <td></td> --}}
             {{-- BLANK COLUMN --}}
            {{-- @php
                for($i= 3; $i <= 11; $i++){
                    $diff_targetvsactual = $array_yf_target_round[$i] - $array_yf_actual_round[$i];
                echo '<td>'.$diff_targetvsactual.'</td>';
                }
            for($i= 0; $i <= 2; $i++){
                    $diff_targetvsactual = $array_yf_target_round[$i] - $array_yf_actual_round[$i];
                echo '<td>'.$diff_targetvsactual.'</td>';
                } 

                $diff_target_and_actual = $yf_target_sum_round - $yf_actual_sum_round;
                echo '<td>'.$diff_target_and_actual.'</td>';   
            @endphp --}}
            
        </tr>

        <tr>

            <th>TRI COLOR CHART Data</th>   
            <td></td>
            <td></td>
            <td></td>   

            <td>{{ '=D13' }}</td>   
            <td>{{ '=Q12-SUM(E12:F12)+SUM(E13:F13)' }}</td>   
            <td>{{ '=Q12-SUM(E12:G12)+SUM(E13:G13)' }}</td>   
            <td>{{ '=Q12-SUM(E12:H12)+SUM(E13:H13)' }}</td>   
            <td>{{ '=Q12-SUM(E12:I12)+SUM(E13:I13)' }}</td>   
            <td>{{ '=Q12-SUM(E12:J12)+SUM(E13:J13)' }}</td>   
            <td>{{ '=Q12-SUM(E12:K12)+SUM(E13:K13)' }}</td>   
            <td>{{ '=Q12-SUM(E12:L12)+SUM(E13:L13)' }}</td>   
            <td>{{ '=Q12-SUM(E12:M12)+SUM(E13:M13)' }}</td>   
            <td>{{ '=Q12-SUM(E12:N12)+SUM(E13:N13)' }}</td>   
            <td>{{ '=Q12-SUM(E12:O12)+SUM(E13:O13)' }}</td>   
            <td>{{ '=Q12-SUM(E12:P12)+SUM(E13:P13)' }}</td>   
            <td>{{ '=Q12-SUM(E12:Q12)+SUM(E13:Q13)' }}</td>   
            <td>{{ '=S12-SUM(E12:P12)+SUM(E13:P13)' }}</td>  

            {{-- <th>TRI COLOR CHART Data</th>   
            <td></td>
            <td></td>
            <td></td>   
            @php
            $array_yf_target_1 = array();//$bb
            $array_yf_actual_1 = array();//$bb

            for($i= 3; $i <= 11; $i++){
                array_push($array_yf_target_1, $yf_target[$i]);
                array_push($array_yf_actual_1, $yf_actual[$i]);
                $d = ($a_target - array_sum($array_yf_target_1)) + array_sum($array_yf_actual_1);
                $d_round = round($d, 2);
                echo '<td>'.$d_round.'</td>';
                }
            for($i= 0; $i <= 2; $i++){
                array_push($array_yf_target_1, $yf_target[$i]);
                array_push($array_yf_actual_1, $yf_actual[$i]);
                $d = ($a_target - array_sum($array_yf_target_1)) + array_sum($array_yf_actual_1);
                $d_round = round($d, 2);
                echo '<td>'.$d_round.'</td>';
                }

                $tricolor_total = (0 - $yf_target_sum_round) + $yf_actual_sum_round;
                echo '<td>'.$tricolor_total.'</td>';
            @endphp     --}}
        </tr>

    </tbody>
   
</table>


