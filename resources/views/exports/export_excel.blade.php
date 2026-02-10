<table class="table table-striped">
    <thead>
        <!--  ROW -->
    <tr>
                    <th>ENERGY CONSUMPTION (FY2022 - based on KwH per $1K Sales)</th>
                    <th></th>
                    <th>FY2021 Actual</th>
                    <th>FY2022 Target</th>
                    <th>April</th>
                    <th>May</th>
                    <th>June</th>
                    <th>July</th>
                    <th>August</th>
                    <th>September</th>
                    <th>October</th>
                    <th>November</th>
                    <th>December</th>
                    <th>January</th>
                    <th>February</th>
                    <th>March</th>
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
            <td></td>
            <td></td>

            @forelse( $energy_april4 as $e_april) <td> {{ $e_april->target}} </td> @empty <td></td> @endforelse
            @forelse( $energy_may5 as $e_may)     <td> {{ $e_may->target  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_june6 as $e_june)   <td> {{ $e_june->target }} </td> @empty <td></td> @endforelse 
            @forelse( $energy_july7 as $e_july)   <td> {{ $e_july->target }} </td> @empty <td></td> @endforelse
            @forelse( $energy_aug8 as $e_aug)     <td> {{ $e_aug->target  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_sep9 as $e_sep)     <td> {{ $e_sep->target  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_oct10 as $e_oct)    <td> {{ $e_oct->target  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_nov11 as $e_nov)    <td> {{ $e_nov->target  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_dec12 as $e_dec)    <td> {{ $e_dec->target  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_jan1 as $e_jan)     <td> {{ $e_jan->target  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_feb2 as $e_feb)     <td> {{ $e_feb->target  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_mar3 as $e_mar)     <td> {{ $e_mar->target  }} </td> @empty <td></td> @endforelse
                
        </tr> 
        <!-- END ENERGY TARGET ROW -->

        <!-- ENERGY ACTUAL ROW -->
        <tr>
            <td>Monthly Target</td>
            <td></td>
            <td></td>
            <td></td>

            @forelse( $energy_april4 as $e_april) <td> {{ $e_april->actual}} </td> @empty <td></td> @endforelse
            @forelse( $energy_may5 as $e_may)     <td> {{ $e_may->actual  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_june6 as $e_june)   <td> {{ $e_june->actual }} </td> @empty <td></td> @endforelse 
            @forelse( $energy_july7 as $e_july)   <td> {{ $e_july->actual }} </td> @empty <td></td> @endforelse
            @forelse( $energy_aug8 as $e_aug)     <td> {{ $e_aug->actual  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_sep9 as $e_sep)     <td> {{ $e_sep->actual  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_oct10 as $e_oct)    <td> {{ $e_oct->actual  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_nov11 as $e_nov)    <td> {{ $e_nov->actual  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_dec12 as $e_dec)    <td> {{ $e_dec->actual  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_jan1 as $e_jan)     <td> {{ $e_jan->actual  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_feb2 as $e_feb)     <td> {{ $e_feb->actual  }} </td> @empty <td></td> @endforelse
            @forelse( $energy_mar3 as $e_mar)     <td> {{ $e_mar->actual  }} </td> @empty <td></td> @endforelse
                
        </tr> 
        <!-- END ENERGY ACTUAL ROW -->

        <tr>
        <!-- ROW -> BLANK ROW -->
        </tr>
       
        <tr>
            <td></td>            
        </tr>

        <tr>
        <td></td> 
        <td></td> 
        <td></td>
            <td>Target</td>
            <td>1</td>      
            <td>2</td>    
        </tr>
        <tr>
        <td></td> 
        <td></td> 
        <td></td>
            <td>Actual</td>
            <td>1</td>      
            <td>2</td>            
        </tr>

        <tr>
        <!-- ROW -> BLANK ROW -->
        </tr>

        <tr>
        <td></td> 
        <td></td> 
            <td>TRI COLOR CHART Data</td>          
        </tr>

    </tbody>
   
</table>

<table class="table table-striped">
    <thead>
        <!--  ROW -->
    <tr>
                    <th>WATER CONSUMPTION</th>
                    <th></th>
                    <th>FY2021 Actual</th>
                    <th>FY2022 Target</th>
                    <!-- <th>March(past FY)</th> -->
                    <th>April</th>
                    <th>May</th>
                    <th>June</th>
                    <th>July</th>
                    <th>August</th>
                    <th>September</th>
                    <th>October</th>
                    <th>November</th>
                    <th>December</th>
                    <th>January</th>
                    <th>February</th>
                    <th>March</th>
    </tr>
        <!-- END  ROW -->

    <tr>
        <!--  ROW -> BLANK ROW -->
    </tr>
        <!-- END  ROW -->        
        
    </thead>
    <tbody>
        <!--  ROW -->
        <tr>
            <td>Target</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            @forelse ($WaterConsumption as $water)
            <td>{{ $water->target }}</td>
            @empty
            <td></td>
            @endforelse
        </tr>
        <!-- END  ROW -->

        <!--  ROW -->
        <tr>
            <td>Actual</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        @forelse ($WaterConsumption as $water)
            <td>{{ $water->actual }}</td>
        @empty
            <td></td>
        @endforelse
        </tr>
        <!-- END  ROW -->
       
    </tbody>
   
</table>

<table class="table table-striped">
    <thead>
        <!--  ROW -->
    <tr>
                    <th>PAPER CONSUMPTION</th>
                    <th></th>
                    <th>FY2021 Actual</th>
                    <th>FY2022 Target</th>
                    <!-- <th>March(past FY)</th> -->
                    <th>April</th>
                    <th>May</th>
                    <th>June</th>
                    <th>July</th>
                    <th>August</th>
                    <th>September</th>
                    <th>October</th>
                    <th>November</th>
                    <th>December</th>
                    <th>January</th>
                    <th>February</th>
                    <th>March</th>
    </tr>
        <!-- END  ROW -->

    <tr>
        <!--  ROW -> BLANK ROW -->
    </tr>
        <!-- END  ROW -->        
        
    </thead>
    <tbody>
        <!--  ROW -->
        <tr>
            <td>Target</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            {{-- <!-- @forelse ($InkConsumption as $ink)
            <td>{{ $ink->target }}</td>
            @empty
            <td></td>
            @endforelse --> --}}
        </tr>
        <!-- END  ROW -->

        <!--  ROW -->
        <tr>
            <td>Actual</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        {{-- <!-- @forelse ($InkConsumption as $ink)
            
            <td>{{ $ink->actual }}</td>
        @endforelse -->
        </tr>
        <!-- END  ROW --> --}}
       
    </tbody>
   
</table>

<table class="table table-striped">
    <thead>
        <!--  ROW -->
    <tr>
                    <th>INK CONSUMPTION (FY2022 - based on KwH per $1K Sales)</th>
                    <th></th>
                    <th>FY2021 Actual</th>
                    <th>FY2022 Target</th>
                    <!-- <th>March(past FY)</th> -->
                    <th>April</th>
                    <th>May</th>
                    <th>June</th>
                    <th>July</th>
                    <th>August</th>
                    <th>September</th>
                    <th>October</th>
                    <th>November</th>
                    <th>December</th>
                    <th>January</th>
                    <th>February</th>
                    <th>March</th>
    </tr>
        <!-- END  ROW -->

    <tr>
        <!--  ROW -> BLANK ROW -->
    </tr>
        <!-- END  ROW -->        
        
    </thead>
    <tbody>
        <!--  ROW -->
        <tr>
            <td>Target</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            @forelse ($InkConsumption as $ink)
            <td>{{ $ink->target }}</td>
            @empty
            <td></td>
            @endforelse
        </tr>
        <!-- END  ROW -->

        <!--  ROW -->
        <tr>
            <td>Actual</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        @forelse ($InkConsumption as $ink)
            
            <td>{{ $ink->actual }}</td>
            @empty
            <td></td>
        @endforelse
        </tr>
        <!-- END  ROW -->
       
    </tbody>
   
</table>


