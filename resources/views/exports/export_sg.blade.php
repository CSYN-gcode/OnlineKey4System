{{-- PAPER --}}

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
    
                        <td></td>
                        <td></td>
                        <td></td> {{-- reduction --}}
                        <th>{{ 'Mar-'.$pastfy}}</th>
                        <td>{{ 'Apr-'.$currentfy}}</td>
                        <td>{{ 'May-'.$currentfy}}</td>
                        <td>{{ 'Jun-'.$currentfy}}</td>
                        <td>{{ 'Jul-'.$currentfy}}</td>
                        <td>{{ 'Aug-'.$currentfy}}</td>
                        <td>{{ 'Sep-'.$currentfy}}</td>
                        <td>{{ 'Oct-'.$currentfy}}</td>
                        <td>{{ 'Nov-'.$currentfy}}</td>
                        <td>{{ 'Dec-'.$currentfy}}</td>
                        <td>{{ 'Jan-'.$currentfy_plus1}}</td>
                        <td>{{ 'Feb-'.$currentfy_plus1}}</td>
                        <td>{{ 'Mar-'.$currentfy_plus1}}</td>
        </tr>
                
            <!-- END  ROW -->
    
        <!-- PAST FY DATA -->
        <tr>
            
            <td></td>
            <td>{{ '=++(P3-D3)/12' }}</td>{{-- reduction --}}
            <td></td>
            @php
                $paper_pastfyactual_round = round($paper_pastfyactual, 2);
                for ($i= 0; $i <= 12; $i++) { 
                    echo '<td>'.$paper_pastfyactual_round.'</td>';
                }
            @endphp
        </tr>
            <!-- END  ROW -->        
            
        </thead>
        <tbody>
            <!-- ENERGY paper_target ROW -->
            
            <tr>
                
    
                {{-- @php
                    $fy_diff = ($paper_pastfyactual - $paper_target) * 0.5;
                    // $fy_diff_a = ($paper_pastfyactual - $fy_diff)
                    $pastfy_reduction = $paper_pastfyactual - $fy_diff;
                    $pastfy_reduction_round = round($pastfy_reduction, 1);
                    $reduction = ($pastfy_reduction - $paper_pastfyactual)/12;
                    $reduction_round = round($reduction, 4);
    
                            $data = array();
                            $a = $reduction;
                            $b = $paper_pastfyactual;
                            $c = $b + $a;
                            // $c_round = round($c, 2);
                            array_push($data, $c);
                @endphp --}}
    
                <td></td>
                <td>{{ '=++(P4-D4)/12' }}</td>
                <td>Performance</td>
                <td>{{ $paper_pastfyactual_round }}</td>
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
                
                {{--comment 11 columns --}}
                {{-- @for ($i = 0; $i < 11; $i++)
                    @php
                        $next[$i] = $data[$i] + $a; --}}
                        {{-- // $next_round[$i] = round($next[$i], 2);
                        array_push($data, $next[$i]);
                        $data_round[$i] = round($data[$i], 1);
                    @endphp
                    <td>{{ $data_round[$i] }}</td>
                @endfor --}}
                {{--comment 1 column --}}
                    {{-- <td>{{ $pastfy_reduction_round }}</td> --}}
                
                    
            </tr> 
            <!-- END ENERGY paper_target ROW -->
    
            <!-- ENERGY ACTUAL ROW -->
            <tr>
                
                
                {{-- @php
                    $a_fy_diff = ($paper_pastfyactual - $paper_target) * 0.8;
                    // $fy_diff_a = ($paper_pastfyactual - $fy_diff)
                    $a_pastfy_reduction = $paper_pastfyactual - $a_fy_diff;
                    $a_pastfy_reduction_round = round($a_pastfy_reduction, 1);
                    $a_reduction = ($a_pastfy_reduction - $paper_pastfyactual)/12;
                    $a_reduction_round = round($a_reduction, 4);
    
                            $a_data = array();
                            $a_1 = $a_reduction;
                            $b_1 = $paper_pastfyactual;
                            $c_1 = $b_1 + $a_1;
                            // $c_round = round($c, 2);
                            array_push($a_data, $c_1);
                @endphp --}}
    
                <td></td>
                <td>{{ '=++(P5-D5)/12' }}</td>
                <td>Performance</td>
                <td>{{ $paper_pastfyactual_round }}</td>
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

                {{-- <td></td>
                <td>{{ $a_reduction_round }}</td>
                <td>Performance</td>
                <td>{{ $paper_pastfyactual_round }}</td> --}}
                {{-- 11 columns --}}
                {{-- @for ($i = 0; $i < 11; $i++)
                    @php
                        $a_next[$i] = $a_data[$i] + $a_1; --}}
                        {{-- // $next_round[$i] = round($next[$i], 2);
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
                
    
                {{-- @php
                    $b_reduction = ($paper_target - $paper_pastfyactual)/12;
                    $b_reduction_round = round($b_reduction, 4);
                    // $fy_diff_a = ($paper_pastfyactual - $fy_diff)
                    // $a_pastfy_reduction = $paper_pastfyactual - $a_fy_diff;
                    $paper_target_round = round($paper_target, 1);
                    // $a_reduction = ($a_pastfy_reduction - $paper_pastfyactual)/12;
                    // $a_reduction_round = round($a_reduction, 4);
    
                            $b_data = array();
                            $a_2 = $b_reduction;
                            $b_2 = $paper_pastfyactual;
                            $c_2 = $b_2 + $a_2;
                            // $c_round = round($c, 2);
                            array_push($b_data, $c_2);
                @endphp --}}

                <td></td>
                <td>{{ '=++(P6-D6)/12' }}</td>
                <td>Performance</td>
                <td>{{ $paper_pastfyactual_round }}</td>
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
                <td>{{ $paper_target }}</td>
                    
                {{-- <td></td>
                <td>{{ $b_reduction_round }}</td>
                <td>Performance</td>
                <td>{{ $paper_pastfyactual_round }}</td> --}}
                {{-- 11 columns --}}
                {{-- @for ($i = 0; $i < 11; $i++)
                    @php
                        $b_next[$i] = $b_data[$i] + $a_2; --}}
                        {{-- // $next_round[$i] = round($next[$i], 2);
                        array_push($b_data, $b_next[$i]);
                        $b_data_round[$i] = round($b_data[$i], 1);
                    @endphp
                    <td>{{ $b_data_round[$i] }}</td>
                @endfor --}}
                {{-- 1 column --}}
                    {{-- <td>{{ $paper_target_round }}</td> --}}
            
            </tr> 
            {{-- <!-- END PAPER ACTUAL ROW -->
                @php
                $sg_paper_target = array();
                $sg_paper_actual = array();
                //  paper_target_months(array) dep_id=sg(3) is from "24-35"
                for ($i= 0; $i < 12; $i++) { 
                    array_push($sg_paper_target , $paper_target_months[$i]);
                    array_push($sg_paper_actual , $paper_actual_months[$i]);
                }
                $a_paper_target = $paper_target;//$a
                $array_sg_paper_target = array();//$bb
                $array_sg_paper_actual = array();//$bb
                // $tricolor_last = array();
                // $count = array(0,1,2,3,4,5,6,7,8,9,10,11);//$bb
                // $e = array();
                $tricolor_last = ($a_paper_target - array_sum($sg_paper_target)) + array_sum($sg_paper_actual);
                $c_reduction = ($tricolor_last - $paper_pastfyactual)/12;
                $c_reduction_round = round($c_reduction, 4);
                @endphp 
            <!-- ENERGY ACTUAL ROW --> --}}
            <tr>
                
                <td></td>
                <td>{{ '=++(P7-D7)/12' }}</td>
                <td>Actual Performance</td>
                <td>{{ $paper_pastfyactual_round }}</td>
                <td>{{ '=E37' }}</td>
                <td>{{ '=F37' }}</td>
                <td>{{ '=G37' }}</td>
                <td>{{ '=H37' }}</td>
                <td>{{ '=I37' }}</td>
                <td>{{ '=J37' }}</td>
                <td>{{ '=K37' }}</td>
                <td>{{ '=L37' }}</td>
                <td>{{ '=M37' }}</td>
                <td>{{ '=N37' }}</td>
                <td>{{ '=O37' }}</td>
                <td>{{ '=P37' }}</td>
    
                {{-- <td></td>
                <td>{{ $c_reduction_round }}</td>
                <td>Actual Performance</td>
                <td>{{ $paper_pastfyactual_round }}</td> --}}
                {{-- 12 columns --}}
                {{-- @for ($i = 3; $i < 12; $i++)
                    <td>{{ $array_tricolor[$i] }}</td>
                @endfor
                @for ($i = 0; $i <= 2; $i++)
                    <td>{{ $array_tricolor[$i] }}</td>
                @endfor --}}
                {{-- @php --}}
                {{-- $tricolor_array = array();//FOR TRICOLOR PERCENTAGE --}}
    
                    {{-- for($i= 3; $i <= 11; $i++){
                //     array_push($array_sg_paper_target, $sg_paper_target[$i]);
                //     array_push($array_sg_paper_actual, $sg_paper_actual[$i]);
                //     $d = ($a_paper_target - array_sum($array_sg_paper_target)) + array_sum($array_sg_paper_actual);
                //     array_push($tricolor_array,$d);//for tricolor percentage
                //     $d_round = round($d, 2);
                //     echo '<td>'.$d_round.'</td>';
                // }
                // for($i= 0; $i <= 2; $i++){
                //     array_push($array_sg_paper_target, $sg_paper_target[$i]);
                //     array_push($array_sg_paper_actual, $sg_paper_actual[$i]);
                //     $d = ($a_paper_target - array_sum($array_sg_paper_target)) + array_sum($array_sg_paper_actual);
                //     array_push($tricolor_array,$d);//for tricolor percentage
                //     $d_round = round($d, 2);
                //     echo '<td>'.$d_round.'</td>';
                // }
                @endphp --}}
            
            </tr> 
            <!-- END PAPER ACTUAL ROW -->
    
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
                <td>{{ '=++(E4-P7)/(E4-P6)' }}</td>
                {{-- @php
                $paper_pastfy_tricolor_data = array();
                    $pastfy_tricolor_ab = $data[0] - $paper_pastfyactual;
                            if ($pastfy_tricolor_ab == 0) {
                                $pastfy_tricolor_percentage = 0;
                                $pastfy_tricolor_percentage_round = 0;
                                echo '<td>'.$pastfy_tricolor_percentage_round.'%'.'</td>';
                                array_push($paper_pastfy_tricolor_data, $pastfy_tricolor_percentage);
                            }
                            else {
                                $pastfy_tricolor = ($data[0] - $paper_pastfyactual)/$pastfy_tricolor_ab;
                                $pastfy_tricolor_percentage = $pastfy_tricolor * 100;
                                $pastfy_tricolor_percentage_round = round($pastfy_tricolor_percentage, 0);
                                echo '<td>'.$pastfy_tricolor_percentage_round.'%'.'</td>';
                                array_push($paper_pastfy_tricolor_data, $pastfy_tricolor_percentage);
                            }
    
                $paper_tricolor_data = array();
                    $tricolor_a = $data[0]; //static
                    for ($i=0; $i <= 11; $i++) { 
                        $tricolor_b = $b_data[$i]; //with interation
                        // $tricolor_c = ($a_paper_target - $sg_paper_target[$i]) + $sg_paper_actual[$i]; //with interation
                        // array_push($tricolor_array_sg_paper_target, $sg_paper_target[$i]);
                        // array_push($tricolor_array_sg_actual, $sg_paper_actual[$i]);
                        $tricolor_c = $tricolor_array[$i];
                        $tricolor_ab = $tricolor_a - $tricolor_b;
                        if ($tricolor_ab == 0) {
                            $tricolor_percentage = 0;
                            echo '<td>'.$tricolor_percentage.'%'.'</td>';
                            array_push($paper_tricolor_data, $tricolor_percentage);
                        }
                        else {
                            $tricolor_d = ($tricolor_a - $tricolor_c)/$tricolor_ab; //with interation
                            $tricolor_percentage = $tricolor_d * 100;
                            $tricolor_percentage_round = round($tricolor_percentage, 0);
                            echo '<td>'.$tricolor_percentage_round.'%'.'</td>';
                            array_push($paper_tricolor_data, $tricolor_percentage);
                        }
                        
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
                        if ($paper_pastfy_tricolor_data >= 100) {
                                $paper_pastfy_tricolor_data_round = 100;
                                echo '<td>'.$paper_pastfy_tricolor_data_round.'%</td>';
                            }
                        elseif($paper_pastfy_tricolor_data <= 0) {
                                $paper_pastfy_tricolor_data_round = 0;
                                echo '<td>'.$paper_pastfy_tricolor_data_round.'%</td>';
                            }
                        else{
                                $paper_pastfy_tricolor_data_round = round($paper_pastfy_tricolor_data, 0);
                                echo '<td>'.$paper_pastfy_tricolor_data_round.'%'.'</td>';
                            }
    
                    for($i=0; $i <= 11; $i++){
                        
                            if ($paper_tricolor_data[$i] >= 100) {
                                $paper_tricolor_data_round = 100;
                                echo '<td>'.$paper_tricolor_data_round.'%</td>';
                            }
                            elseif ($paper_tricolor_data[$i] <= 0) {
                                $paper_tricolor_data_round = 0;
                                echo '<td>'.$paper_tricolor_data_round.'%</td>';
                            }
                            else{
                                $paper_tricolor_data_round = round($paper_tricolor_data[$i], 0);
                                echo '<td>'.$paper_tricolor_data_round.'%'.'</td>';
                            }
                                       
                    }
                @endphp             --}}
            </tr>
    
        </tbody>
    </table>
    
    {{-- ENERGY --}}
    <table class="table table-striped">
        <thead>
            <!--  ROW -->
        <tr>
            
    
                        <th> ENERGY CONSUMPTION KWH/MO'S (based in KwH per $1K Sales) </th>
        </tr>
    
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
            <td>{{ '=++(P13-D13)/12' }}</td>{{-- reduction --}}
            <td></td>
            @php
                $energy_pastfyactual_round = round($energy_pastfyactual, 1);
                for ($i= 0; $i <= 12; $i++) { 
                    echo '<td>'.$energy_pastfyactual.'</td>';
                }
            @endphp
        </tr>
            <!-- END  ROW -->        
            
        </thead>
        <tbody>
            <!-- ENERGY energy_target ROW -->
            
            <tr>
    
                {{-- @php
                    $fy_diff = ($energy_pastfyactual - $energy_target) * 0.5;
                    // $fy_diff_a = ($energy_pastfyactual - $fy_diff)
                    $pastfy_reduction = $energy_pastfyactual - $fy_diff;
                    $pastfy_reduction_round = round($pastfy_reduction, 1);
                    $reduction = ($pastfy_reduction - $energy_pastfyactual)/12;
                    $reduction_round = round($reduction, 4);
    
                            $data = array();
                            $a = $reduction;
                            $b = $energy_pastfyactual;
                            $c = $b + $a;
                            // $c_round = round($c, 2);
                            array_push($data, $c);
                @endphp --}}
    
                <td></td>
                <td>{{ '=++(P14-D14)/12' }}</td>
                <td>Performance</td>
                <td>{{ $energy_pastfyactual }}</td>
                <td>{{ '=++D14+B14' }}</td>
                <td>{{ '=++E14+B14' }}</td>
                <td>{{ '=++F14+B14' }}</td>
                <td>{{ '=++G14+B14' }}</td>
                <td>{{ '=++H14+B14' }}</td>
                <td>{{ '=++I14+B14' }}</td>
                <td>{{ '=++J14+B14' }}</td>
                <td>{{ '=++K14+B14' }}</td>
                <td>{{ '=++L14+B14' }}</td>
                <td>{{ '=++M14+B14' }}</td>
                <td>{{ '=++N14+B14' }}</td>
                <td>{{ '=++P13-(P13-P16)*0.5' }}</td>

                {{-- <td></td>
                <td>{{ $reduction_round }}</td>
                <td>Performance</td>
                <td>{{ $energy_pastfyactual }}</td> --}}
                {{-- 11 columns --}}
                {{-- @for ($i = 0; $i < 11; $i++)
                    @php
                        $next[$i] = $data[$i] + $a;
                        // $next_round[$i] = round($next[$i], 2);
                        array_push($data, $next[$i]);
                        $data_round[$i] = round($data[$i], 1);
                    @endphp
                    <td>{{ $data_round[$i] }}</td>
                @endfor --}}
                {{-- 1 column --}}
                    {{-- <td>{{ $pastfy_reduction_round }}</td> --}}
                
                    
            </tr> 
            <!-- END ENERGY energy_target ROW -->
    
            <!-- ENERGY ACTUAL ROW -->
            <tr>
                
    
                {{-- @php
                    $a_fy_diff = ($energy_pastfyactual - $energy_target) * 0.8;
                    // $fy_diff_a = ($energy_pastfyactual - $fy_diff)
                    $a_pastfy_reduction = $energy_pastfyactual - $a_fy_diff;
                    $a_pastfy_reduction_round = round($a_pastfy_reduction, 1);
                    $a_reduction = ($a_pastfy_reduction - $energy_pastfyactual)/12;
                    $a_reduction_round = round($a_reduction, 4);
    
                            $a_data = array();
                            $a_1 = $a_reduction;
                            $b_1 = $energy_pastfyactual;
                            $c_1 = $b_1 + $a_1;
                            // $c_round = round($c, 2);
                            array_push($a_data, $c_1);
                @endphp --}}
    
                <td></td>
                <td>{{ '=++(P15-D15)/12' }}</td>
                <td>Performance</td>
                <td>{{ $energy_pastfyactual }}</td>
                <td>{{ '=++D15+B15' }}</td>
                <td>{{ '=++E15+B15' }}</td>
                <td>{{ '=++F15+B15' }}</td>
                <td>{{ '=++G15+B15' }}</td>
                <td>{{ '=++H15+B15' }}</td>
                <td>{{ '=++I15+B15' }}</td>
                <td>{{ '=++J15+B15' }}</td>
                <td>{{ '=++K15+B15' }}</td>
                <td>{{ '=++L15+B15' }}</td>
                <td>{{ '=++M15+B15' }}</td>
                <td>{{ '=++N15+B15' }}</td>
                <td>{{ '=++P13-(P13-P16)*0.8' }}</td>

                {{-- <td></td>
                <td>{{ $a_reduction_round }}</td>
                <td>Performance</td>
                <td>{{ $energy_pastfyactual }}</td> --}}
                {{-- 11 columns --}}
                {{-- @for ($i = 0; $i < 11; $i++)
                    @php
                        $a_next[$i] = $a_data[$i] + $a_1;
                        // $next_round[$i] = round($next[$i], 2);
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
                
    
                {{-- @php
                    $b_reduction = ($energy_target - $energy_pastfyactual)/12;
                    $b_reduction_round = round($b_reduction, 4);
                    // $fy_diff_a = ($energy_pastfyactual - $fy_diff)
                    // $a_pastfy_reduction = $energy_pastfyactual - $a_fy_diff;
                    $energy_target_round = round($energy_target, 1);
                    // $a_reduction = ($a_pastfy_reduction - $energy_pastfyactual)/12;
                    // $a_reduction_round = round($a_reduction, 4);
    
                            $b_data = array();
                            $a_2 = $b_reduction;
                            $b_2 = $energy_pastfyactual;
                            $c_2 = $b_2 + $a_2;
                            // $c_round = round($c, 2);
                            array_push($b_data, $c_2);
                @endphp --}}
                    
                <td></td>
                <td>{{ '=++(P16-D16)/12' }}</td>
                <td>Performance</td>
                <td>{{ $energy_pastfyactual }}</td>
                <td>{{ '=++D16+B16' }}</td>
                <td>{{ '=++E16+B16' }}</td>
                <td>{{ '=++F16+B16' }}</td>
                <td>{{ '=++G16+B16' }}</td>
                <td>{{ '=++H16+B16' }}</td>
                <td>{{ '=++I16+B16' }}</td>
                <td>{{ '=++J16+B16' }}</td>
                <td>{{ '=++K16+B16' }}</td>
                <td>{{ '=++L16+B16' }}</td>
                <td>{{ '=++M16+B16' }}</td>
                <td>{{ '=++N16+B16' }}</td>
                <td>{{ $energy_target }}</td>
                    
                {{-- <td></td>
                <td>{{ $b_reduction_round }}</td>
                <td>Performance</td>
                <td>{{ $energy_pastfyactual }}</td> --}}
                {{-- 11 columns --}}
                {{-- @for ($i = 0; $i < 11; $i++)
                    @php
                        $b_next[$i] = $b_data[$i] + $a_2;
                        // $next_round[$i] = round($next[$i], 2);
                        array_push($b_data, $b_next[$i]);
                        $b_data_round[$i] = round($b_data[$i], 1);
                    @endphp
                    <td>{{ $b_data_round[$i] }}</td>
                @endfor --}}
                {{-- 1 column --}}
                    {{-- <td>{{ $energy_target_round }}</td> --}}
    
            
            </tr> 
            {{-- <!-- END ENERGY ACTUAL ROW -->
                @php
                $sg_energy_target = array();
                $sg_energy_actual = array();
                //  energy_target_months(array) dep_id=sg(3) is from "24-35"
                for ($i=1; $i <= 12; $i++) { 
                    array_push($sg_energy_target , $energy_target_months[$i]);
                    array_push($sg_energy_actual , $energy_actual_months[$i]);
                }
                $a_energy_target = $energy_target;//$a
                $array_sg_energy_target = array();//$bb
                $array_sg_energy_actual = array();//$bb
                // $tricolor_last = array();
                // $count = array(0,1,2,3,4,5,6,7,8,9,10,11);//$bb
                // $e = array();
                $tricolor_last = ($a_energy_target - array_sum($sg_energy_target)) + array_sum($sg_energy_actual);
                $c_reduction = ($tricolor_last - $energy_pastfyactual)/12;
                $c_reduction_round = round($c_reduction, 4);
                @endphp 
            <!-- ENERGY ACTUAL ROW --> --}}
            <tr>
                

                <td></td>
                <td>{{ '=++(P17-D17)/12' }}</td>
                <td>Actual Performance</td>
                <td>{{ $energy_pastfyactual }}</td>
                <td>{{ '=+E41' }}</td>
                <td>{{ '=+F41' }}</td>
                <td>{{ '=+G41' }}</td>
                <td>{{ '=+H41' }}</td>
                <td>{{ '=+I41' }}</td>
                <td>{{ '=+J41' }}</td>
                <td>{{ '=+K41' }}</td>
                <td>{{ '=+L41' }}</td>
                <td>{{ '=+M41' }}</td>
                <td>{{ '=+N41' }}</td>
                <td>{{ '=+O41' }}</td>
                <td>{{ '=+P41' }}</td>
                
                {{-- <td></td>
                <td>{{ $c_reduction_round }}</td>
                <td>Actual Performance</td>
                <td>{{ $energy_pastfyactual }}</td> --}}
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
                    array_push($array_sg_energy_target, $sg_energy_target[$i]);
                    array_push($array_sg_energy_actual, $sg_energy_actual[$i]);
                    $d = ($a_energy_target - array_sum($array_sg_energy_target)) + array_sum($array_sg_energy_actual);
                    array_push($tricolor_array,$d);//for tricolor percentage
                    $d_round = round($d, 2);
                    echo '<td>'.$d_round.'</td>';
                }
                for($i= 0; $i <= 2; $i++){
                    array_push($array_sg_energy_target, $sg_energy_target[$i]);
                    array_push($array_sg_energy_actual, $sg_energy_actual[$i]);
                    $d = ($a_energy_target - array_sum($array_sg_energy_target)) + array_sum($array_sg_energy_actual);
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
                <td>{{ '=++(E14-D17)/(E14-D16)' }}</td>
                <td>{{ '=E16/E17' }}</td>
                <td>{{ '=F16/F17' }}</td>
                <td>{{ '=G16/G17' }}</td>
                <td>{{ '=H16/H17' }}</td>
                <td>{{ '=I16/I17' }}</td>
                <td>{{ '=J16/J17' }}</td>
                <td>{{ '=K16/K17' }}</td>
                <td>{{ '=L16/L17' }}</td>
                <td>{{ '=M16/M17' }}</td>
                <td>{{ '=N16/N17' }}</td>
                <td>{{ '=O16/O17' }}</td>
                <td>{{ '=P16/P17' }}</td>    

            {{-- <td></td> 
            <td></td>
                <td>Computed Tri-color Rate</td>
                @php
                $energy_pastfy_tricolor_data = array();
                    $pastfy_tricolor_ab = $data[0] - $energy_pastfyactual;
                            if ($pastfy_tricolor_ab == 0) {
                                $pastfy_tricolor_percentage = 0;
                                $pastfy_tricolor_percentage_round = 0;
                                echo '<td>'.$pastfy_tricolor_percentage_round.'%'.'</td>';
                                array_push($energy_pastfy_tricolor_data, $pastfy_tricolor_percentage);
                            }
                            else {
                                $pastfy_tricolor = ($data[0] - $energy_pastfyactual)/$pastfy_tricolor_ab;
                                $pastfy_tricolor_percentage = $pastfy_tricolor * 100;
                                $pastfy_tricolor_percentage_round = round($pastfy_tricolor_percentage, 0);
                                echo '<td>'.$pastfy_tricolor_percentage_round.'%'.'</td>';
                                array_push($energy_pastfy_tricolor_data, $pastfy_tricolor_percentage);
                            }
    
                $energy_tricolor_data = array();
                    $tricolor_a = $data[0]; //static
                    for ($i=0; $i <= 11; $i++) { 
                        $tricolor_b = $b_data[$i]; //with interation
                        // $tricolor_c = ($a_energy_target - $sg_energy_target[$i]) + $sg_energy_actual[$i]; //with interation
                        // array_push($tricolor_array_sg_energy_target, $sg_energy_target[$i]);
                        // array_push($tricolor_array_sg_actual, $sg_energy_actual[$i]);
                        $tricolor_c = $tricolor_array[$i];
                        $tricolor_ab = $tricolor_a - $tricolor_b;
                        if ($tricolor_ab == 0) {
                            $tricolor_percentage = 0;
                            echo '<td>'.$tricolor_percentage.'%'.'</td>';
                            array_push($energy_tricolor_data, $tricolor_percentage);
                        }
                        else {
                            $tricolor_d = ($tricolor_a - $tricolor_c)/$tricolor_ab; //with interation
                            $tricolor_percentage = $tricolor_d * 100;
                            $tricolor_percentage_round = round($tricolor_percentage, 0);
                            echo '<td>'.$tricolor_percentage_round.'%'.'</td>';
                            array_push($energy_tricolor_data, $tricolor_percentage);
                        }
                        
                    }
                @endphp --}}
            </tr>
    
            <tr>

            <td></td> 
            <td></td>
                <td>Conditional Tri-color Rate</td>
                <td>{{ '=IF(OR(D18>=100%),100%,IF(OR(D18<=0%),0%,AVERAGE(D18)))' }}</td>
                <td>{{ '=IF(OR(E18>=100%),100%,IF(OR(E18<=0%),0%,AVERAGE(E18)))' }}</td>
                <td>{{ '=IF(OR(F18>=100%),100%,IF(OR(F18<=0%),0%,AVERAGE(F18)))' }}</td>
                <td>{{ '=IF(OR(G18>=100%),100%,IF(OR(G18<=0%),0%,AVERAGE(G18)))' }}</td>
                <td>{{ '=IF(OR(H18>=100%),100%,IF(OR(H18<=0%),0%,AVERAGE(H18)))' }}</td>
                <td>{{ '=IF(OR(I18>=100%),100%,IF(OR(I18<=0%),0%,AVERAGE(I18)))' }}</td>
                <td>{{ '=IF(OR(J18>=100%),100%,IF(OR(J18<=0%),0%,AVERAGE(J18)))' }}</td>
                <td>{{ '=IF(OR(K18>=100%),100%,IF(OR(K18<=0%),0%,AVERAGE(K18)))' }}</td>
                <td>{{ '=IF(OR(L18>=100%),100%,IF(OR(L18<=0%),0%,AVERAGE(L18)))' }}</td>
                <td>{{ '=IF(OR(M18>=100%),100%,IF(OR(M18<=0%),0%,AVERAGE(M18)))' }}</td>
                <td>{{ '=IF(OR(N18>=100%),100%,IF(OR(N18<=0%),0%,AVERAGE(N18)))' }}</td>
                <td>{{ '=IF(OR(O18>=100%),100%,IF(OR(O18<=0%),0%,AVERAGE(O18)))' }}</td>
                <td>{{ '=IF(OR(P18>=100%),100%,IF(OR(P18<=0%),0%,AVERAGE(P18)))' }}</td>
                
            {{-- <td></td>  
            <td></td>
                <td>Conditional Tri-color Rate</td>    
                @php
                        if ($energy_pastfy_tricolor_data >= 100) {
                                $energy_pastfy_tricolor_percentage_round = 100;
                                echo '<td>'.$energy_pastfy_tricolor_percentage_round.'%'.'</td>';
                            }
                        elseif ($energy_pastfy_tricolor_data <= 0) {
                                $energy_pastfy_tricolor_percentage_round = 0;
                                echo '<td>'.$energy_pastfy_tricolor_percentage_round.'%'.'</td>';
                            }
                        else{
                                $pastfy_tricolor_percentage_round = round($energy_pastfy_tricolor_data, 0);
                                echo '<td>'.$pastfy_tricolor_percentage_round.'%'.'</td>';
                            }
    
                    for($i=0; $i <= 11; $i++){
                        
                            if ($energy_tricolor_data[$i] >= 100) {
                                $energy_tricolor_data_round = 100;
                                echo '<td>'.$energy_tricolor_data_round.'%'.'</td>';
                            }
                            elseif ($energy_tricolor_data[$i] <= 0) {
                                $energy_tricolor_data_round = 0;
                                echo '<td>'.$energy_tricolor_data_round.'%'.'</td>';
                            }
                            else{
                                $energy_tricolor_data_round = round($energy_tricolor_data[$i], 0);
                                echo '<td>'.$energy_tricolor_data_round.'%'.'</td>';
                            }
                                       
                    }
                @endphp             --}}
            </tr>
    
        </tbody>
    </table>
    
    {{-- WATER --}}
    
    <table class="table table-striped">
        <thead>
            <!--  ROW -->
        <tr>
            
    
                        <th>  WATER CONSUMPTION PER HEAD COUNT (CU.Meter)  </th>
        </tr>
    
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
            <td>{{ '=++(P23-D23)/12' }}</td>{{-- reduction --}}
            <td></td>
            @php
                $water_pastfyactual_round = round($water_pastfyactual, 1);
                for ($i= 0; $i <= 12; $i++) { 
                    echo '<td>'.$water_pastfyactual.'</td>';
                }
            @endphp
        </tr>
            <!-- END  ROW -->        
            
        </thead>
        <tbody>
            <!-- ENERGY water_target ROW -->
            
            <tr>
                
                <td></td>
                <td>{{ '=++(P24-D24)/12' }}</td>
                <td>Performance</td>
                <td>{{ $water_pastfyactual }}</td>
                <td>{{ '=++D24+B24' }}</td>
                <td>{{ '=++E24+B24' }}</td>
                <td>{{ '=++F24+B24' }}</td>
                <td>{{ '=++G24+B24' }}</td>
                <td>{{ '=++H24+B24' }}</td>
                <td>{{ '=++I24+B24' }}</td>
                <td>{{ '=++J24+B24' }}</td>
                <td>{{ '=++K24+B24' }}</td>
                <td>{{ '=++L24+B24' }}</td>
                <td>{{ '=++M24+B24' }}</td>
                <td>{{ '=++N24+B24' }}</td>
                <td>{{ '=++P23-(P23-P26)*0.5' }}</td>
    
                {{-- @php
                    $fy_diff = ($water_pastfyactual - $water_target) * 0.5;
                    // $fy_diff_a = ($water_pastfyactual - $fy_diff)
                    $pastfy_reduction = $water_pastfyactual - $fy_diff;
                    $pastfy_reduction_round = round($pastfy_reduction, 1);
                    $reduction = ($pastfy_reduction - $water_pastfyactual)/12;
                    $reduction_round = round($reduction, 4);
    
                            $data = array();
                            $a = $reduction;
                            $b = $water_pastfyactual;
                            $c = $b + $a;
                            // $c_round = round($c, 2);
                            array_push($data, $c);
                @endphp --}}
    
                {{-- <td></td>
                <td>{{ $reduction_round }}</td>
                <td>Performance</td>
                <td>{{ $water_pastfyactual }}</td> --}}
                {{-- 11 columns --}}
                {{-- @for ($i = 0; $i < 11; $i++)
                    @php
                        $next[$i] = $data[$i] + $a;
                        // $next_round[$i] = round($next[$i], 2);
                        array_push($data, $next[$i]);
                        $data_round[$i] = round($data[$i], 1);
                    @endphp
                    <td>{{ $data_round[$i] }}</td>
                @endfor --}}
                {{-- 1 column --}}
                    {{-- <td>{{ $pastfy_reduction_round }}</td> --}}
                
                    
            </tr> 
            <!-- END ENERGY water_target ROW -->
    
            <!-- ENERGY ACTUAL ROW -->
            <tr>
                
                <td></td>
                <td>{{ '=++(P25-D25)/12' }}</td>
                <td>Performance</td>
                <td>{{ $water_pastfyactual }}</td>
                <td>{{ '=++D25+B25' }}</td>
                <td>{{ '=++E25+B25' }}</td>
                <td>{{ '=++F25+B25' }}</td>
                <td>{{ '=++G25+B25' }}</td>
                <td>{{ '=++H25+B25' }}</td>
                <td>{{ '=++I25+B25' }}</td>
                <td>{{ '=++J25+B25' }}</td>
                <td>{{ '=++K25+B25' }}</td>
                <td>{{ '=++L25+B25' }}</td>
                <td>{{ '=++M25+B25' }}</td>
                <td>{{ '=++N25+B25' }}</td>
                <td>{{ '=++P23-(P23-P26)*0.8' }}</td>

                {{-- @php
                    $a_fy_diff = ($water_pastfyactual - $water_target) * 0.8;
                    // $fy_diff_a = ($water_pastfyactual - $fy_diff)
                    $a_pastfy_reduction = $water_pastfyactual - $a_fy_diff;
                    $a_pastfy_reduction_round = round($a_pastfy_reduction, 1);
                    $a_reduction = ($a_pastfy_reduction - $water_pastfyactual)/12;
                    $a_reduction_round = round($a_reduction, 4);
    
                            $a_data = array();
                            $a_1 = $a_reduction;
                            $b_1 = $water_pastfyactual;
                            $c_1 = $b_1 + $a_1;
                            // $c_round = round($c, 2);
                            array_push($a_data, $c_1);
                @endphp --}}
    
                {{-- <td></td>
                <td>{{ $a_reduction_round }}</td>
                <td>Performance</td>
                <td>{{ $water_pastfyactual }}</td> --}}
                {{-- 11 columns --}}
                {{-- @for ($i = 0; $i < 11; $i++)
                    @php
                        $a_next[$i] = $a_data[$i] + $a_1;
                        // $next_round[$i] = round($next[$i], 2);
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
                <td>{{ '=++(P26-D26)/12' }}</td>
                <td>Performance</td>
                <td>{{ $water_pastfyactual }}</td>
                <td>{{ '=++D26+B26' }}</td>
                <td>{{ '=++E26+B26' }}</td>
                <td>{{ '=++F26+B26' }}</td>
                <td>{{ '=++G26+B26' }}</td>
                <td>{{ '=++H26+B26' }}</td>
                <td>{{ '=++I26+B26' }}</td>
                <td>{{ '=++J26+B26' }}</td>
                <td>{{ '=++K26+B26' }}</td>
                <td>{{ '=++L26+B26' }}</td>
                <td>{{ '=++M26+B26' }}</td>
                <td>{{ '=++N26+B26' }}</td>
                <td>{{ $water_target }}</td>
    
                {{-- @php
                    $b_reduction = ($water_target - $water_pastfyactual)/12;
                    $b_reduction_round = round($b_reduction, 4);
                    // $fy_diff_a = ($water_pastfyactual - $fy_diff)
                    // $a_pastfy_reduction = $water_pastfyactual - $a_fy_diff;
                    $water_target_round = round($water_target, 1);
                    // $a_reduction = ($a_pastfy_reduction - $water_pastfyactual)/12;
                    // $a_reduction_round = round($a_reduction, 4);
    
                            $b_data = array();
                            $a_2 = $b_reduction;
                            $b_2 = $water_pastfyactual;
                            $c_2 = $b_2 + $a_2;
                            // $c_round = round($c, 2);
                            array_push($b_data, $c_2);
                @endphp --}}
                    
                {{-- <td></td>
                <td>{{ $b_reduction_round }}</td>
                <td>Performance</td>
                <td>{{ $water_pastfyactual }}</td> --}}
                {{-- 11 columns --}}
                {{-- @for ($i = 0; $i < 11; $i++)
                    @php
                        $b_next[$i] = $b_data[$i] + $a_2;
                        // $next_round[$i] = round($next[$i], 2);
                        array_push($b_data, $b_next[$i]);
                        $b_data_round[$i] = round($b_data[$i], 1);
                    @endphp
                    <td>{{ $b_data_round[$i] }}</td>
                @endfor --}}
                {{-- 1 column --}}
                    {{-- <td>{{ $water_target_round }}</td> --}}
    
            
            </tr> 
            {{-- <!-- END ENERGY ACTUAL ROW -->
                @php
                $sg_water_target = array();
                $sg_water_actual = array();
                //  water_target_months(array) dep_id=sg(3) is from "24-35"
                for ($i=1; $i <= 12; $i++) { 
                    array_push($sg_water_target , $water_target_months[$i]);
                    array_push($sg_water_actual , $water_actual_months[$i]);
                }
                $a_water_target = $water_target;//$a
                $array_sg_water_target = array();//$bb
                $array_sg_water_actual = array();//$bb
                // $tricolor_last = array();
                // $count = array(0,1,2,3,4,5,6,7,8,9,10,11);//$bb
                // $e = array();
                $tricolor_last = ($a_water_target - array_sum($sg_water_target)) + array_sum($sg_water_actual);
                $c_reduction = ($tricolor_last - $water_pastfyactual)/12;
                $c_reduction_round = round($c_reduction, 4);
                @endphp 
            <!-- ENERGY ACTUAL ROW --> --}}
            <tr>
                
                <td></td>
                <td>{{ '=++(P27-D27)/12' }}</td>
                <td>Actual Performance</td>
                <td>{{ $water_pastfyactual }}</td>
                <td>{{ '=+E47' }}</td>
                <td>{{ '=+F47' }}</td>
                <td>{{ '=+G47' }}</td>
                <td>{{ '=+H47' }}</td>
                <td>{{ '=+I47' }}</td>
                <td>{{ '=+J47' }}</td>
                <td>{{ '=+K47' }}</td>
                <td>{{ '=+L47' }}</td>
                <td>{{ '=+M47' }}</td>
                <td>{{ '=+N47' }}</td>
                <td>{{ '=+O47' }}</td>
                <td>{{ '=+P47' }}</td>
                
                {{-- <td></td>
                <td>{{ $c_reduction_round }}</td>
                <td>Actual Performance</td>
                <td>{{ $water_pastfyactual }}</td> --}}
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
                    array_push($array_sg_water_target, $sg_water_target[$i]);
                    array_push($array_sg_water_actual, $sg_water_actual[$i]);
                    $d = ($a_water_target - array_sum($array_sg_water_target)) + array_sum($array_sg_water_actual);
                    array_push($tricolor_array,$d);//for tricolor percentage
                    $d_round = round($d, 2);
                    echo '<td>'.$d_round.'</td>';
                }
                for($i= 0; $i <= 2; $i++){
                    array_push($array_sg_water_target, $sg_water_target[$i]);
                    array_push($array_sg_water_actual, $sg_water_actual[$i]);
                    $d = ($a_water_target - array_sum($array_sg_water_target)) + array_sum($array_sg_water_actual);
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
                <td>{{ '=++(E24-D27)/(E24-D26)' }}</td>
                <td>{{ '=++(E24-E27)/(E24-E26)' }}</td>
                <td>{{ '=++(E24-F27)/(E24-F26)' }}</td>
                <td>{{ '=++(E24-G27)/(E24-G26)' }}</td>
                <td>{{ '=++(E24-H27)/(E24-H26)' }}</td>
                <td>{{ '=++(E24-I27)/(E24-I26)' }}</td>
                <td>{{ '=++(E24-J27)/(E24-J26)' }}</td>
                <td>{{ '=++(E24-K27)/(E24-K26)' }}</td>
                <td>{{ '=++(E24-L27)/(E24-L26)' }}</td>
                <td>{{ '=++(E24-M27)/(E24-M26)' }}</td>
                <td>{{ '=++(E24-N27)/(E24-N26)' }}</td>
                <td>{{ '=++(E24-O27)/(E24-O26)' }}</td>
                <td>{{ '=++(E24-P27)/(E24-P26)' }}</td>

            {{-- <td></td> 
            <td></td>
                <td>Computed Tri-color Rate</td>
                @php
                    $water_pastfy_tricolor_data = array();
                        $pastfy_tricolor_ab = $data[0] - $water_pastfyactual;
                            if ($pastfy_tricolor_ab == 0) {
                                $pastfy_tricolor_percentage = 0;
                                $pastfy_tricolor_percentage_round = 0;
                                echo '<td>'.$pastfy_tricolor_percentage_round.'%'.'</td>';
                                array_push($water_pastfy_tricolor_data, $pastfy_tricolor_percentage);
                            }
                            else {
                                $pastfy_tricolor = ($data[0] - $water_pastfyactual)/$pastfy_tricolor_ab;
                                $pastfy_tricolor_percentage = $pastfy_tricolor * 100;
                                $pastfy_tricolor_percentage_round = round($pastfy_tricolor_percentage, 0);
                                echo '<td>'.$pastfy_tricolor_percentage_round.'%'.'</td>';
                                array_push($water_pastfy_tricolor_data, $pastfy_tricolor_percentage);
                            }
    
                    $water_tricolor_data = array();
                    $tricolor_a = $data[0]; //static
                    for ($i=0; $i <= 11; $i++) { 
                        $tricolor_b = $b_data[$i]; //with interation
                        // $tricolor_c = ($a_water_target - $sg_water_target[$i]) + $sg_water_actual[$i]; //with interation
                        // array_push($tricolor_array_sg_water_target, $sg_water_target[$i]);
                        // array_push($tricolor_array_sg_actual, $sg_water_actual[$i]);
                        $tricolor_c = $tricolor_array[$i];
                        $tricolor_ab = $tricolor_a - $tricolor_b;
                        if ($tricolor_ab == 0) {
                            $tricolor_percentage = 0;
                            echo '<td>'.$tricolor_percentage.'%'.'</td>';
                            array_push($water_tricolor_data, $tricolor_percentage);
                        }
                        else {
                            $tricolor_d = ($tricolor_a - $tricolor_c)/$tricolor_ab; //with interation
                            $tricolor_percentage = $tricolor_d * 100;
                            $tricolor_percentage_round = round($tricolor_percentage, 0);
                            echo '<td>'.$tricolor_percentage_round.'%'.'</td>';
                            array_push($water_tricolor_data, $tricolor_percentage);
                        }
                        
                    }
                @endphp --}}
            </tr>
    
            <tr>
                
            <td></td> 
            <td></td>
                <td>Conditional Tri-color Rate</td>
                <td>{{ '=IF(OR(D28>=100%),100%,IF(OR(D28<=0%),0%,AVERAGE(D28)))' }}</td>
                <td>{{ '=IF(OR(E28>=100%),100%,IF(OR(E28<=0%),0%,AVERAGE(E28)))' }}</td>
                <td>{{ '=IF(OR(F28>=100%),100%,IF(OR(F28<=0%),0%,AVERAGE(F28)))' }}</td>
                <td>{{ '=IF(OR(G28>=100%),100%,IF(OR(G28<=0%),0%,AVERAGE(G28)))' }}</td>
                <td>{{ '=IF(OR(H28>=100%),100%,IF(OR(H28<=0%),0%,AVERAGE(H28)))' }}</td>
                <td>{{ '=IF(OR(I28>=100%),100%,IF(OR(I28<=0%),0%,AVERAGE(I28)))' }}</td>
                <td>{{ '=IF(OR(J28>=100%),100%,IF(OR(J28<=0%),0%,AVERAGE(J28)))' }}</td>
                <td>{{ '=IF(OR(K28>=100%),100%,IF(OR(K28<=0%),0%,AVERAGE(K28)))' }}</td>
                <td>{{ '=IF(OR(L28>=100%),100%,IF(OR(L28<=0%),0%,AVERAGE(L28)))' }}</td>
                <td>{{ '=IF(OR(M28>=100%),100%,IF(OR(M28<=0%),0%,AVERAGE(M28)))' }}</td>
                <td>{{ '=IF(OR(N28>=100%),100%,IF(OR(N28<=0%),0%,AVERAGE(N28)))' }}</td>
                <td>{{ '=IF(OR(O28>=100%),100%,IF(OR(O28<=0%),0%,AVERAGE(O28)))' }}</td>
                <td>{{ '=IF(OR(P28>=100%),100%,IF(OR(P28<=0%),0%,AVERAGE(P28)))' }}</td>
                
            {{-- <td></td>  
            <td></td>
                <td>Conditional Tri-color Rate</td>      
                @php
                        if ($water_pastfy_tricolor_data >= 100) {
                                $water_pastfy_tricolor_data_round = 100;
                                echo '<td>'.$water_pastfy_tricolor_data_round.'%'.'</td>';
                            }
                        elseif ($water_pastfy_tricolor_data <= 0) {
                                $water_pastfy_tricolor_data_round = 0;
                                echo '<td>'.$water_pastfy_tricolor_data_round.'%'.'</td>';
                            }  
                        else{
                                $water_pastfy_tricolor_data_round = round($water_pastfy_tricolor_data, 0);
                                echo '<td>'.$water_pastfy_tricolor_data_round.'%'.'</td>';
                            }
    
                    for($i=0; $i <= 11; $i++){
                        
                            if ($water_tricolor_data[$i] >= 100) {
                                $water_tricolor_data_round = 100;
                                echo '<td>'.$water_tricolor_data_round.'%</td>';
                            }
                            elseif ($water_tricolor_data[$i] <= 0) {
                                $water_tricolor_data_round = 0;
                                echo '<td>'.$water_tricolor_data_round.'%</td>';
                            }
                            else{
                                $water_tricolor_data_round = round($water_tricolor_data[$i], 0);
                                echo '<td>'.$water_tricolor_data_round.'%'.'</td>';
                            }          
                    }
                @endphp             --}}
            </tr>
    
            <tr>
                {{-- blank row --}}
            </tr>
    
            <tr>
                
    
                
                <td>Over All Performance</td>
                <td></td>
                <td></td>
                {{-- @php
                    $pastoverall = ($paper_pastfy_tricolor_data[0] + $energy_pastfy_tricolor_data[0] + $water_pastfy_tricolor_data[0]) / 3;
                    echo '<td>'.$pastoverall.'%</td>';
                @endphp --}}
                <td>{{ '=AVERAGE(D9,D19)' }}</td>
                <td>{{ '=AVERAGE(E9,E19,E29)' }}</td>
                <td>{{ '=AVERAGE(F9,F19,F29)' }}</td>
                <td>{{ '=AVERAGE(G9,G19,G29)' }}</td>
                <td>{{ '=AVERAGE(H9,H19,H29)' }}</td>
                <td>{{ '=AVERAGE(I9,I19,I29)' }}</td>
                <td>{{ '=AVERAGE(J9,J19,J29)' }}</td>
                <td>{{ '=AVERAGE(K9,K19,K29)' }}</td>
                <td>{{ '=AVERAGE(L9,L19,L29)' }}</td>
                <td>{{ '=AVERAGE(M9,M19,M29)' }}</td>
                <td>{{ '=AVERAGE(N9,N19,N29)' }}</td>
                <td>{{ '=AVERAGE(O9,O19,O29)' }}</td>
                <td>{{ '=AVERAGE(P9,P19,P29)' }}</td>
                
                {{-- 12 COLUMNS --}}
                {{-- @php
                        $array_paper_tricolor_data = array();
                        $array_energy_tricolor_data = array();
                        $array_water_tricolor_data = array();
    
                        for($j=0; $j <= 11; $j++){
                                if ($paper_tricolor_data[$j] >= 100){
                                    $paper_tricolor_data[$j] = 100;
                                    array_push($array_paper_tricolor_data, $paper_tricolor_data[$j]);
                                }elseif($paper_tricolor_data[$j] <= 0){
                                    $paper_tricolor_data[$j] = 0;
                                    array_push($array_paper_tricolor_data, $paper_tricolor_data[$j]);
                                }
                                else{
                                    array_push($array_paper_tricolor_data, $paper_tricolor_data[$j]);
                                }
    
                                if ($energy_tricolor_data[$j] >= 100){
                                    $energy_tricolor_data[$j] = 100;
                                    array_push($array_energy_tricolor_data, $energy_tricolor_data[$j]);
                                }elseif($energy_tricolor_data[$j] <= 0){
                                    $energy_tricolor_data[$j] = 0;
                                    array_push($array_energy_tricolor_data, $energy_tricolor_data[$j]);
                                }else{
                                    array_push($array_energy_tricolor_data, $energy_tricolor_data[$j]);
                                }
                                
                                if ($water_tricolor_data[$j] >= 100){
                                    $water_tricolor_data[$j] = 100;
                                    array_push($array_water_tricolor_data, $water_tricolor_data[$j]);
                                }elseif($water_tricolor_data[$j] <= 0){
                                    $water_tricolor_data[$j] = 0;
                                    array_push($array_water_tricolor_data, $water_tricolor_data[$j]);
                                }else{
                                    array_push($array_water_tricolor_data, $water_tricolor_data[$j]);
                                }
                            }
    
                    for($i=0; $i <= 11; $i++){
    
                        $overall_average = ($array_paper_tricolor_data[$i] + $array_energy_tricolor_data[$i] + $array_water_tricolor_data[$i]) / 3;
                        $overall_average_round = round($overall_average, 0);
                        // array_push($overall_gg, $overall_average[$i]);
                        echo '<td>'.$overall_average_round.'%</td>';
                    }
    
                        // if ($paper_tricolor_data[$i] >= 100 && $energy_tricolor_data[$i] >= 100 && $water_tricolor_data[$i] >= 100) {
                        //     $paper_tricolor_data[$i] = 100;
                        //     $energy_tricolor_data[$i] = 100;
                        //     $water_tricolor_data[$i] = 100;
                            
                        //     $overall_average = ($paper_tricolor_data[$i] + $energy_tricolor_data[$i] + $water_tricolor_data[$i]) / 3;
                        //     $overall_average_round = round($overall_average, 0);
                        //     echo '<td>'.$overall_average_round.'%</td>';
                        // }
                        // elseif ($paper_tricolor_data[$i] >= 100 && $energy_tricolor_data[$i] >= 100) {
                        //     $paper_tricolor_data[$i] = 100;
                        //     $energy_tricolor_data[$i] = 100;
    
                        //     $overall_average = ($paper_tricolor_data[$i] + $energy_tricolor_data[$i] + $water_tricolor_data[$i]) / 3;
                        //     $overall_average_round = round($overall_average, 0);
                        //     echo '<td>'.$overall_average_round.'%</td>';
                        // }
                        // elseif ($paper_tricolor_data[$i] >= 100) {
                        //     $paper_tricolor_data[$i] = 100;
    
                        //     $overall_average = ($paper_tricolor_data[$i] + $energy_tricolor_data[$i] + $water_tricolor_data[$i]) / 3;
                        //     $overall_average_round = round($overall_average, 0);
                        //     echo '<td>'.$overall_average_round.'%</td>';
                        // }
                        // else {
                        //     $overall_average = ($paper_tricolor_data[$i] + $energy_tricolor_data[$i] + $water_tricolor_data[$i]) / 3;
                        //     $overall_average_round = round($overall_average, 0);
                        //     echo '<td>'.$overall_average_round.'%</td>';
                        // }      
                    
                @endphp --}}
                
            </tr>
    
        </tbody>
    </table>
    
    <table class="table table-striped">
        <thead>
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
        </thead>
        <tbody>
            <tr>
                
    
                <td></td>
                <td></td>
                <td>Target</td>
                <td>{{ $paper_pastfytarget }}</td>
                <td>{{ '=Monitoring!E38' }}</td>
                <td>{{ '=Monitoring!F38' }}</td>
                <td>{{ '=Monitoring!G38' }}</td>
                <td>{{ '=Monitoring!H38' }}</td>
                <td>{{ '=Monitoring!I38' }}</td>
                <td>{{ '=Monitoring!J38' }}</td>
                <td>{{ '=Monitoring!K38' }}</td>
                <td>{{ '=Monitoring!L38' }}</td>
                <td>{{ '=Monitoring!M38' }}</td>
                <td>{{ '=Monitoring!N38' }}</td>
                <td>{{ '=Monitoring!O38' }}</td>
                <td>{{ '=Monitoring!P38' }}</td>
                <td>{{ '=SUM(E34:P34)' }}</td>

                {{-- @php
                    $paper_pastfytarget_round = round($paper_pastfytarget ,2);
                @endphp
                <td>{{ $paper_pastfytarget_round }}</td>      
                @php
                    $array_sg_paper_target_round = array();
                    for($i= 0; $i <= 11; $i++){
                    $sg_paper_target_round = round($sg_paper_target[$i], 2);
                    array_push($array_sg_paper_target_round, $sg_paper_target_round);
                    }
    
                    for($i= 3; $i <= 11; $i++){
                    echo '<td>'.$array_sg_paper_target_round[$i].'</td>';
                    }
                    for($i= 0; $i <= 2; $i++){
                    echo '<td>'.$array_sg_paper_target_round[$i].'</td>';
                    } 
                    // $sg_paper_target_sum = array_sum($sg_paper_target);
                    // $sg_paper_target_sum_round = round($sg_paper_target_sum, 2);
                    // echo '<td>'.$sg_paper_target_sum_round.'</td>';
                @endphp --}}
               
                  
            </tr>
                
            <tr>
                
                <td></td>
                <td></td>
                <td>Actual</td>
                <td>{{ $paper_pastfyactual_round }}</td>
                <td>{{ '=Monitoring!E46' }}</td>
                <td>{{ '=Monitoring!F46' }}</td>
                <td>{{ '=Monitoring!G46' }}</td>
                <td>{{ '=Monitoring!H46' }}</td>
                <td>{{ '=Monitoring!I46' }}</td>
                <td>{{ '=Monitoring!J46' }}</td>
                <td>{{ '=Monitoring!K46' }}</td>
                <td>{{ '=Monitoring!L46' }}</td>
                <td>{{ '=Monitoring!M46' }}</td>
                <td>{{ '=Monitoring!N46' }}</td>
                <td>{{ '=Monitoring!O46' }}</td>
                <td>{{ '=Monitoring!P46' }}</td>
                <td>{{ '=SUM(E35:P35)' }}</td>

                {{-- <td></td>
                <td></td> 
                <td>Actual</td>
                <td>{{ $paper_pastfyactual_round }}</td>
                @php
                    $array_sg_paper_actual_round = array();
                    for($i= 0; $i <= 11; $i++){
                    $sg_paper_actual_round = round($sg_paper_actual[$i], 2);
                    array_push($array_sg_paper_actual_round, $sg_paper_actual_round);
                    }
                    for($i= 3; $i <= 11; $i++){
                    echo '<td>'.$array_sg_paper_actual_round[$i].'</td>';
                    }
                    for($i= 0; $i <= 2; $i++){
                    echo '<td>'.$array_sg_paper_actual_round[$i].'</td>';
                    } 
                    // $sg_paper_actual_sum = array_sum($sg_paper_actual);
                    // $sg_paper_actual_sum_round = round($sg_paper_actual_sum, 2);
                    // echo '<td>'.$sg_paper_actual_sum_round.'</td>';
                @endphp --}}
                
            </tr>
    
            <tr>
                
                <td></td>
                <td></td> 
                <td>-</td>
                 <td></td>{{-- BLANK COLUMN --}}

                 <td>{{ '=E34-E35' }}</td>
                 <td>{{ '=F34-F35' }}</td>
                 <td>{{ '=G34-G35' }}</td>
                 <td>{{ '=H34-H35' }}</td>
                 <td>{{ '=I34-I35' }}</td>
                 <td>{{ '=J34-J35' }}</td>
                 <td>{{ '=K34-K35' }}</td>
                 <td>{{ '=L34-L35' }}</td>
                 <td>{{ '=M34-M35' }}</td>
                 <td>{{ '=N34-N35' }}</td>
                 <td>{{ '=O34-O35' }}</td>
                 <td>{{ '=P34-P35' }}</td>
                 <td>{{ '=Q34-Q35' }}</td>
                
                {{-- @php
                    for($i= 3; $i <= 11; $i++){
                        $diff_paper_targetvsactual = $array_sg_paper_target_round[$i] - $array_sg_paper_actual_round[$i];
                        echo '<td>'.$diff_paper_targetvsactual.'</td>';
                    }
                for($i= 0; $i <= 2; $i++){
                        $diff_paper_targetvsactual = $array_sg_paper_target_round[$i] - $array_sg_paper_actual_round[$i];
                        echo '<td>'.$diff_paper_targetvsactual.'</td>';
                    } 
                        $diff_paper_target_and_actual = $sg_paper_target_sum - $sg_paper_actual_sum;
                        $diff_paper_target_and_actual_round = round($diff_paper_target_and_actual, 2);
                        echo '<td>'.$diff_paper_target_and_actual_round.'</td>';   
                @endphp --}}
                
            </tr>
    
            <tr>
                
    
                <th>TRI COLOR CHART Data</th>   
                <td></td>
                <td></td>
                <td></td>   

                <td>{{ '=D35' }}</td>   
                <td>{{ '=Q34-E34+E35' }}</td>   
                <td>{{ '=Q34-SUM(E34:F34)+SUM(E35:F35)' }}</td>   
                <td>{{ '=Q34-SUM(E34:G34)+SUM(E35:G35)' }}</td>   
                <td>{{ '=Q34-SUM(E34:H34)+SUM(E35:H35)' }}</td>   
                <td>{{ '=Q34-SUM(E34:I34)+SUM(E35:I35)' }}</td>   
                <td>{{ '=Q34-SUM(E34:J34)+SUM(E35:J35)' }}</td>   
                <td>{{ '=Q34-SUM(E34:K34)+SUM(E35:K35)' }}</td>   
                <td>{{ '=Q34-SUM(E34:L34)+SUM(E35:L35)' }}</td>   
                <td>{{ '=Q34-SUM(E34:M34)+SUM(E35:M35)' }}</td>   
                <td>{{ '=Q34-SUM(E34:N34)+SUM(E35:N35)' }}</td>   
                <td>{{ '=Q34-SUM(E34:O34)+SUM(E35:O35)' }}</td>  
                <td>{{ '=Q34-SUM(E34:P34)+SUM(E35:P35)' }}</td>  
                <td>{{ '=S34-SUM(E34:P34)+SUM(E35:P35)' }}</td>  
                
                {{-- @php
                $array_sg_paper_target_1 = array();//$bb
                $array_sg_paper_actual_1 = array();//$bb
    
                for($i= 3; $i <= 11; $i++){
                    array_push($array_sg_paper_target_1, $sg_paper_target[$i]);
                    array_push($array_sg_paper_actual_1, $sg_paper_actual[$i]);
                    $d = ($a_paper_target - array_sum($array_sg_paper_target_1)) + array_sum($array_sg_paper_actual_1);
                    $d_round = round($d, 2);
                    echo '<td>'.$d_round.'</td>';
                    }
                for($i= 0; $i <= 2; $i++){
                    array_push($array_sg_paper_target_1, $sg_paper_target[$i]);
                    array_push($array_sg_paper_actual_1, $sg_paper_actual[$i]);
                    $d = ($a_paper_target - array_sum($array_sg_paper_target_1)) + array_sum($array_sg_paper_actual_1);
                    $d_round = round($d, 2);
                    echo '<td>'.$d_round.'</td>';
                    }
    
                    $tricolor_total = (0 - $sg_paper_target_sum) + $sg_paper_actual_sum;
                    $tricolor_total_round = round($tricolor_total, 2);
                    echo '<td>'.$tricolor_total_round.'</td>';
                @endphp     --}}
            </tr>
        </tbody>
       
    </table>
    
    <table class="table table-striped">
        <thead>
            <tr>
                
    
                <th>ENERGY CONSUMPTION Kwh/Mo's</th>           
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
        </thead>
        <tbody>
            <tr>
                
                <td></td>
                <td></td>
                <td>Target</td>
                <td>{{ $energy_pastfytarget }}</td>
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
                <td>{{ '=AVERAGE(E40:P40)' }}</td>

                {{-- @php
                    $energy_pastfytarget_round = round($energy_pastfytarget ,2);
                @endphp      
                <td>{{ $energy_pastfytarget_round }}</td>
                @php
                    $array_sg_energy_target_round = array();
                    for($i= 0; $i <= 11; $i++){
                    $sg_energy_target_round = round($sg_energy_target[$i], 2);
                    array_push($array_sg_energy_target_round, $sg_energy_target_round);
                    }
    
                    for($i= 3; $i <= 11; $i++){
                    echo '<td>'.$array_sg_energy_target_round[$i].'</td>';
                    }
                    for($i= 0; $i <= 2; $i++){
                    echo '<td>'.$array_sg_energy_target_round[$i].'</td>';
                    } 
                    $sg_energy_target_sum = array_sum($sg_energy_target);
                    $sg_energy_target_sum_round = round($sg_energy_target_sum, 2);
                    echo '<td>'.$sg_energy_target_sum_round.'</td>';
                    
                @endphp --}}
                  
            </tr>
                
            <tr>
                
                <td></td>
                <td></td>
                <td>Actual</td>
                <td>{{ $energy_pastfyactual_round }}</td>
                <td>{{ '=Monitoring!E11' }}</td>
                <td>{{ '=Monitoring!F11' }}</td>
                <td>{{ '=Monitoring!G11' }}</td>
                <td>{{ '=Monitoring!H11' }}</td>
                <td>{{ '=Monitoring!I11' }}</td>
                <td>{{ '=Monitoring!J11' }}</td>
                <td>{{ '=Monitoring!K11' }}</td>
                <td>{{ '=Monitoring!L11' }}</td>
                <td>{{ '=Monitoring!M11' }}</td>
                <td>{{ '=Monitoring!N11' }}</td>
                <td>{{ '=Monitoring!O11' }}</td>
                <td>{{ '=Monitoring!P11' }}</td>
                <td>{{ '=AVERAGE(E41:P41)' }}</td>
    
                {{-- <td></td>
                <td></td> 
                <td>Actual</td>
                <td>{{ $energy_pastfyactual_round }}</td>
                @php
                    $array_sg_energy_actual_round = array();
                    for($i= 0; $i <= 11; $i++){
                    $sg_energy_actual_round = round($sg_energy_actual[$i], 2);
                    array_push($array_sg_energy_actual_round, $sg_energy_actual_round);
                    }
    
                    for($i= 3; $i <= 11; $i++){
                    echo '<td>'.$array_sg_energy_actual_round[$i].'</td>';
                    }
                    for($i= 0; $i <= 2; $i++){
                    echo '<td>'.$array_sg_energy_actual_round[$i].'</td>';
                    } 
                    $sg_energy_actual_sum = array_sum($sg_energy_actual);
                    $sg_energy_actual_sum_round = round($sg_energy_actual_sum, 2);
                    echo '<td>'.$sg_energy_actual_sum_round.'</td>';
                @endphp --}}
                
            </tr>
    
            <tr>
    
                <td></td>
                <td></td> 
                <td>-</td>
                 <td></td>{{-- BLANK COLUMN --}}

                 <td>{{ '=E40-E41' }}</td>
                 <td>{{ '=F40-F41' }}</td>
                 <td>{{ '=G40-G41' }}</td>
                 <td>{{ '=H40-H41' }}</td>
                 <td>{{ '=I40-I41' }}</td>
                 <td>{{ '=J40-J41' }}</td>
                 <td>{{ '=K40-K41' }}</td>
                 <td>{{ '=L40-L41' }}</td>
                 <td>{{ '=M40-M41' }}</td>
                 <td>{{ '=N40-N41' }}</td>
                 <td>{{ '=O40-O41' }}</td>
                 <td>{{ '=P40-P41' }}</td>
                 <td>{{ '=Q40-Q41' }}</td>

                {{-- @php
                    for($i= 3; $i <= 11; $i++){
                        $diff_energy_targetvsactual = $array_sg_energy_target_round[$i] - $array_sg_energy_actual_round[$i];
                    echo '<td>'.$diff_energy_targetvsactual.'</td>';
                    }
                for($i= 0; $i <= 2; $i++){
                        $diff_energy_targetvsactual = $array_sg_energy_target_round[$i] - $array_sg_energy_actual_round[$i];
                    echo '<td>'.$diff_energy_targetvsactual.'</td>';
                    } 
    
                    $diff_energy_target_and_actual = $sg_energy_target_sum - $sg_energy_actual_sum;
                    $diff_energy_target_and_actual_round = round($diff_energy_target_and_actual, 2);
                    echo '<td>'.$diff_energy_target_and_actual_round.'</td>';   
                @endphp --}}
                
            </tr>
    
            <tr>

                <th>TRI COLOR CHART Data</th>   
                <td></td>
                <td></td>
                <td></td>   

                <td>{{ '=D41' }}</td>   
                <td>{{ '=E41' }}</td>   
                <td>{{ '=F41' }}</td>   
                <td>{{ '=G41' }}</td>   
                <td>{{ '=H41' }}</td>   
                <td>{{ '=I41' }}</td>   
                <td>{{ '=J41' }}</td>   
                <td>{{ '=K41' }}</td>   
                <td>{{ '=L41' }}</td>   
                <td>{{ '=M41' }}</td>   
                <td>{{ '=N41' }}</td>   
                <td>{{ '=O41' }}</td>  
                <td>{{ '=P41' }}</td>  
                <td>{{ '=S40-SUM(E40:P40)+SUM(E41:P41)' }}</td> 
                
    
                {{-- <th>TRI COLOR CHART Data</th>   
                <td></td>
                <td></td>
                <td></td>   
                @php
                $array_sg_energy_target_1 = array();//$bb
                $array_sg_energy_actual_1 = array();//$bb
    
                for($i= 3; $i <= 11; $i++){
                    array_push($array_sg_energy_target_1, $sg_energy_target[$i]);
                    array_push($array_sg_energy_actual_1, $sg_energy_actual[$i]);
                    $d = ($a_energy_target - array_sum($array_sg_energy_target_1)) + array_sum($array_sg_energy_actual_1);
                    $d_round = round($d, 2);
                    echo '<td>'.$d_round.'</td>';
                    }
                for($i= 0; $i <= 2; $i++){
                    array_push($array_sg_energy_target_1, $sg_energy_target[$i]);
                    array_push($array_sg_energy_actual_1, $sg_energy_actual[$i]);
                    $d = ($a_energy_target - array_sum($array_sg_energy_target_1)) + array_sum($array_sg_energy_actual_1);
                    $d_round = round($d, 2);
                    echo '<td>'.$d_round.'</td>';
                    }
    
                    $tricolor_total = (0 - $sg_energy_target_sum) + $sg_energy_actual_sum;
                    $tricolor_total_round = round($tricolor_total, 2);
                    echo '<td>'.$tricolor_total_round.'</td>';
                @endphp     --}}
            </tr>
        </tbody>
       
    </table>
    
    <table class="table table-striped">
        <thead>
            <tr>
                
    
                <th>WATER CONSUMPTION</th>           
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
        </thead>
        <tbody>
            <tr>
                
                <td></td>
                <td></td>
                <td>Target</td>
                <td>{{ $water_pastfytarget }}</td>
                <td>{{ '=Monitoring!E14' }}</td>
                <td>{{ '=Monitoring!F14' }}</td>
                <td>{{ '=Monitoring!G14' }}</td>
                <td>{{ '=Monitoring!H14' }}</td>
                <td>{{ '=Monitoring!I14' }}</td>
                <td>{{ '=Monitoring!J14' }}</td>
                <td>{{ '=Monitoring!K14' }}</td>
                <td>{{ '=Monitoring!L14' }}</td>
                <td>{{ '=Monitoring!M14' }}</td>
                <td>{{ '=Monitoring!N14' }}</td>
                <td>{{ '=Monitoring!O14' }}</td>
                <td>{{ '=Monitoring!P14' }}</td>
                <td>{{ '=P26' }}</td>
    
                {{-- <td></td>
                <td></td>
                <td>Target</td>
                @php
                    $water_pastfytarget_round = round($water_pastfytarget ,2);
                @endphp
                <td>{{ $water_pastfytarget_round }}</td>          
                @php
                    $array_sg_water_target_round = array();
                    for($i= 0; $i <= 11; $i++){
                    $sg_water_target_round = round($sg_water_target[$i], 2);
                    array_push($array_sg_water_target_round, $sg_water_target_round);
                    }
    
                    for($i= 3; $i <= 11; $i++){
                    echo '<td>'.$array_sg_water_target_round[$i].'</td>';
                    }
                    for($i= 0; $i <= 2; $i++){
                    echo '<td>'.$array_sg_water_target_round[$i].'</td>';
                    } 
                    $sg_water_target_sum = array_sum($sg_water_target);
                    $sg_water_target_sum_round = round($sg_water_target_sum, 2);
                    echo '<td>'.$sg_water_target_sum_round.'</td>';
                @endphp --}}
                  
            </tr>
                
            <tr>
                
                <td></td>
                <td></td>
                <td>Actual</td>
                <td>{{ $water_pastfyactual_round }}</td>
                <td>{{ '=Monitoring!E23' }}</td>
                <td>{{ '=Monitoring!F23' }}</td>
                <td>{{ '=Monitoring!G23' }}</td>
                <td>{{ '=Monitoring!H23' }}</td>
                <td>{{ '=Monitoring!I23' }}</td>
                <td>{{ '=Monitoring!J23' }}</td>
                <td>{{ '=Monitoring!K23' }}</td>
                <td>{{ '=Monitoring!L23' }}</td>
                <td>{{ '=Monitoring!M23' }}</td>
                <td>{{ '=Monitoring!N23' }}</td>
                <td>{{ '=Monitoring!O23' }}</td>
                <td>{{ '=Monitoring!P23' }}</td>
                <td>{{ '=SUM(E47:P47)' }}</td>
    
                {{-- <td></td>
                <td></td> 
                <td>Actual</td>
                <td>{{ $water_pastfyactual_round }}</td>
                @php
                    $array_sg_water_actual_round = array();
                    for($i= 0; $i <= 11; $i++){
                    $sg_water_actual_round = round($sg_water_actual[$i], 2);
                    array_push($array_sg_water_actual_round, $sg_water_actual_round);
                    }
    
                    for($i= 3; $i <= 11; $i++){
                    echo '<td>'.$array_sg_water_actual_round[$i].'</td>';
                    }
                    for($i= 0; $i <= 2; $i++){
                    echo '<td>'.$array_sg_water_actual_round[$i].'</td>';
                    } 
                    $sg_water_actual_sum = array_sum($sg_water_actual);
                    $sg_water_actual_sum_round = round($sg_water_actual_sum, 2);
                    echo '<td>'.$sg_water_actual_sum_round.'</td>';
                @endphp --}}
                
            </tr>
    
            <tr>
                
                <td></td>
                <td></td> 
                <td>-</td>
                 <td></td>{{-- BLANK COLUMN --}}

                 <td>{{ '=E46-E47' }}</td>
                 <td>{{ '=F46-F47' }}</td>
                 <td>{{ '=G46-G47' }}</td>
                 <td>{{ '=H46-H47' }}</td>
                 <td>{{ '=I46-I47' }}</td>
                 <td>{{ '=J46-J47' }}</td>
                 <td>{{ '=K46-K47' }}</td>
                 <td>{{ '=L46-L47' }}</td>
                 <td>{{ '=M46-M47' }}</td>
                 <td>{{ '=N46-N47' }}</td>
                 <td>{{ '=O46-O47' }}</td>
                 <td>{{ '=P46-P47' }}</td>
                 <td>{{ '=Q46-Q47' }}</td>
    
                {{-- @php
                    for($i= 3; $i < 12; $i++){  
                        if ($sg_water_actual[$i] !== null && $sg_water_target[$i] !== null) {
                            $diff_water_targetvsactual = $array_sg_water_target_round[$i] - $array_sg_water_actual_round[$i];
                            echo '<td>'.$diff_water_targetvsactual.'</td>';
                        }
                        elseif ($sg_water_actual[$i] !== null) {
                            $diff_water_targetvsactual = $array_sg_water_target_round[$i] - 0;
                            echo '<td>'.$diff_water_targetvsactual.'</td>';
                        }
                        elseif ($sg_water_target[$i] !== null) {
                            $diff_water_targetvsactual = 0 - $array_sg_water_actual_round[$i];
                            echo '<td>'.$diff_water_targetvsactual.'</td>';
                        }
                            
                    }
                    for($i= 0; $i <= 2; $i++){
                        if ($sg_water_actual[$i] !== null && $sg_water_target[$i] !== null) {
                            $diff_water_targetvsactual = $array_sg_water_target_round[$i] - $array_sg_water_actual_round[$i];
                            echo '<td>'.$diff_water_targetvsactual.'</td>';
                        }
                        elseif ($sg_water_actual[$i] !== null) {
                            $diff_water_targetvsactual = $array_sg_water_target_round[$i] - 0;
                            echo '<td>'.$diff_water_targetvsactual.'</td>';
                        }
                        elseif ($sg_water_target[$i] !== null) {
                            $diff_water_targetvsactual = 0 - $array_sg_water_actual_round[$i];
                            echo '<td>'.$diff_water_targetvsactual.'</td>';
                        }
                    } 
    
                    $diff_water_target_and_actual = $sg_water_target_sum - $sg_water_actual_sum;
                    $diff_water_target_and_actual_round = round($diff_water_target_and_actual, 2); 
                    echo '<td>'.$diff_water_target_and_actual_round.'</td>';   
                @endphp --}}
                
            </tr>
    
            <tr>

                <th>TRI COLOR CHART Data</th>   
                <td></td>
                <td></td>
                <td></td>   

                <td>{{ '=D47' }}</td>   
                <td>{{ '=Q46-E46+E47' }}</td>   
                <td>{{ '=Q46-F46+F47' }}</td>   
                <td>{{ '=Q46-G46+G47' }}</td>   
                <td>{{ '=Q46-H46+H47' }}</td>   
                <td>{{ '=Q46-I46+I47' }}</td>   
                <td>{{ '=Q46-J46+J47' }}</td>   
                <td>{{ '=Q46-K46+K47' }}</td>   
                <td>{{ '=Q46-L46+L47' }}</td>   
                <td>{{ '=Q46-M46+M47' }}</td>   
                <td>{{ '=Q46-N46+N47' }}</td>   
                <td>{{ '=Q46-O46+O47' }}</td>  
                <td>{{ '=Q46-P46+P47' }}</td>  
                <td>{{ '=S46-SUM(E46:P46)+SUM(E47:P47)' }}</td>
                
                {{-- <th>TRI COLOR CHART Data</th>   
                <td></td>
                <td></td>
                <td></td>   
                @php
                $array_sg_water_target_1 = array();//$bb
                $array_sg_water_actual_1 = array();//$bb
    
                for($i= 3; $i <= 11; $i++){
                    array_push($array_sg_water_target_1, $sg_water_target[$i]);
                    array_push($array_sg_water_actual_1, $sg_water_actual[$i]);
                    $d = ($a_water_target - array_sum($array_sg_water_target_1)) + array_sum($array_sg_water_actual_1);
                    $d_round = round($d, 2);
                    echo '<td>'.$d_round.'</td>';
                    }
                for($i= 0; $i <= 2; $i++){
                    array_push($array_sg_water_target_1, $sg_water_target[$i]);
                    array_push($array_sg_water_actual_1, $sg_water_actual[$i]);
                    $d = ($a_water_target - array_sum($array_sg_water_target_1)) + array_sum($array_sg_water_actual_1);
                    $d_round = round($d, 2);
                    echo '<td>'.$d_round.'</td>';
                    }
    
                    $tricolor_total = (0 - $sg_water_target_sum) + $sg_water_actual_sum;
                    $tricolor_total_round = round($tricolor_total, 2);
                    echo '<td>'.$tricolor_total_round.'</td>';
                @endphp     --}}
            </tr>
    </tbody>
   
</table>




