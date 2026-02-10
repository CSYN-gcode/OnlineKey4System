@php $layout = 'layouts.super_user_layout'; @endphp
@auth
    @php
    if (Auth::user()->user_level_id == 1) {
        $layout = 'layouts.super_user_layout';
    } elseif (Auth::user()->user_level_id == 2) {
        $layout = 'layouts.admin_layout';
    } elseif (Auth::user()->user_level_id == 3) {
        $layout = 'layouts.user_layout';
    }
    @endphp
@endauth

@extends($layout)
@section('title', 'Dashboard')

{{-- CONTENT PAGE--}}
@section('content_page')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Water Consumption - Dashboard</h4>
                            </div>

                            <div class="card-body">
                                {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item waterConsumption" style="display: none;">
                                        <a class="nav-link active" id="water-tab" data-toggle="tab" href="#water" role="tab" aria-controls="water" aria-selected="false">Water Consumption</a>
                                    </li>

                                </ul> --}}

                                {{-- <div class="tab-content" id="myTabContent">
                                    
                                    <div class="tab-pane fade show active" id="water" role="tabpanel" aria-labelledby="water-tab"> --}}
                                        {{-- <h5 class="mt-3 ml-2">Water Consumption</h5> --}}
                                        <div class="text-left mt-2 d-flex flex-row">
                                            <div class="form-group ml-3 col-2">
                                                <label><strong>Fiscal Year :</strong></label>
                                                    <select class="form-control select2bs4 selectYearWater" name="fiscal_year" id="selFiscalYearWater" style="width: 100%;">
                                                        <!-- Code generated -->
                                                    </select>
                                            </div>
                                        </div><br>
                                
                                        <div class="table-responsive">
                                            <table id="tblViewWaterConsumption" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 6.66%;">Water Consumption</th>
                                                        {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                        <th class="april-water-current-fy" style="width: 6.66%;"></th>
                                                        <th class="may-water-current-fy" style="width: 6.66%;"></th>
                                                        <th class="june-water-current-fy" style="width: 6.66%;"></th>
                                                        <th class="july-water-current-fy" style="width: 6.66%;"></th>
                                                        <th class="august-water-current-fy" style="width: 6.66%;"></th>
                                                        <th class="september-water-current-fy" style="width: 6.66%;"></th>
                                                        <th class="october-water-current-fy" style="width: 6.66%;"></th>
                                                        <th class="november-water-current-fy" style="width: 6.66%;"></th>
                                                        <th class="december-water-current-fy" style="width: 6.66%;"></th>
                                                        <th class="january-water-current-fy" style="width: 6.66%;"></th>
                                                        <th class="february-water-current-fy" style="width: 6.66%;"></th>
                                                        <th class="march-water-current-fy" style="width: 6.66%;"></th>
                                                        <th style="width: 6.66%;">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 6.66%;">Target</td>
                                                        {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                        <td class="april-water-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="may-water-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="june-water-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="july-water-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="august-water-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="september-water-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="october-water-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="november-water-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="december-water-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="january-water-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="february-water-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="march-water-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="total-water-current-fy-target" style="width: 6.66%;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">Actual</td>
                                                        {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                        <td class="april-water-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="may-water-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="june-water-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="july-water-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="august-water-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="september-water-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="october-water-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="november-water-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="december-water-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="january-water-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="february-water-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="march-water-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="total-water-current-fy-actual" style="width: 6.66%;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">|</td>
                                                        {{-- <td style="width: 6.66%;"></td> --}}
                                                        <td style="width: 6.66%;" class="april-water-actual-target"></td>
                                                        <td style="width: 6.66%;" class="may-water-actual-target"></td>
                                                        <td style="width: 6.66%;" class="june-water-actual-target"></td>
                                                        <td style="width: 6.66%;" class="july-water-actual-target"></td>
                                                        <td style="width: 6.66%;" class="august-water-actual-target"></td>
                                                        <td style="width: 6.66%;" class="september-water-actual-target"></td>
                                                        <td style="width: 6.66%;" class="october-water-actual-target"></td>
                                                        <td style="width: 6.66%;" class="november-water-actual-target"></td>
                                                        <td style="width: 6.66%;" class="december-water-actual-target"></td>
                                                        <td style="width: 6.66%;" class="january-water-actual-target"></td>
                                                        <td style="width: 6.66%;" class="february-water-actual-target"></td>
                                                        <td style="width: 6.66%;" class="march-water-actual-target"></td>
                                                        <td style="width: 6.66%;" class="total-water-actual-target"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                        {{-- <td style="width: 6.66%;"></td> --}}
                                                        <td style="width: 6.66%;" class="april-water-tricolor"></td>
                                                        <td style="width: 6.66%;" class="may-water-tricolor"></td>
                                                        <td style="width: 6.66%;" class="june-water-tricolor"></td>
                                                        <td style="width: 6.66%;" class="july-water-tricolor"></td>
                                                        <td style="width: 6.66%;" class="august-water-tricolor"></td>
                                                        <td style="width: 6.66%;" class="september-water-tricolor"></td>
                                                        <td style="width: 6.66%;" class="october-water-tricolor"></td>
                                                        <td style="width: 6.66%;" class="november-water-tricolor"></td>
                                                        <td style="width: 6.66%;" class="december-water-tricolor"></td>
                                                        <td style="width: 6.66%;" class="january-water-tricolor"></td>
                                                        <td style="width: 6.66%;" class="february-water-tricolor"></td>
                                                        <td style="width: 6.66%;" class="march-water-tricolor"></td>
                                                        <td style="width: 6.66%;" class="total-water-tricolor"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    {{-- </div>

                                </div> --}}
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </section> 
    </div>
@endsection
{{-- JS CONTENT --}}
@section('js_content')
    <script type="text/javascript">
    

        $(document).ready(function () {

            // var ctrs = 0;
            
            // console.log(ctrs);
            // setTimeout(() => {
            //     ctrs = ctrs + 1;
            //     window.location.reload();
            // }, 1000);

            GetFiscalYearFilter();

            function GetFiscalYearFilter() {
                let result = '<option value="0" selected disabled> -- Select Fiscal Year -- </option>';

                $.ajax({
                    url: 'get_fiscal_year_for_filter',
                    method: 'get',
                    dataType: 'json',
                    beforeSend: function () {
                        result = '<option value="0" selected disabled> -- Loading -- </option>';
                        // cboElement.html(result);
                        $(".selectYearEnergy").html(result);
                    },
                    success: function (response) {
                        result = '';
                        let year = response['years'];

                        if (year.length > 0) { // true
                            result += '<option value="0" selected disabled> Select Fiscal Year </option>';
                            // result += '<option value=""> All </option>';
                            for (let index = 0; index < year.length; index++) {
                                result += '<option value="' + year[index].fiscal_year + '">' + year[index].fiscal_year + '</option>';
                            }
                        }
                        else {
                            result = '<option value="0" selected disabled> No record found </option>';
                        }
                        // cboElement.html(result);
                        $(".selectYearEnergy").html(result);
                        $(".selectYearPaper").html(result);
                        $(".selectYearWater").html(result);
                        $(".selectYearInk").html(result);
                        $(".selectYearPaperTS").html(result);
                        $(".selectYearPaperCN").html(result);
                        $(".selectYearPaperYF").html(result);
                        $(".selectYearPaperPPS").html(result);
                    }
                });
            }

            GetCurrentFYWaterData();

            // GetCurrentFYWaterData();

            $('#selFiscalYearWater').on('change', function() {
                $('.selectYearWater').val($(this).find(":selected").val());
                $('.selectYearWater').val();

                GetCurrentFYWaterData();
                    
                dataTableWaterConsumptions.draw();
            });

            //===== DATATABLES OF WATER CONSUMPTION ================
            var dataTableWaterConsumptions = $("#tblViewWaterConsumption").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF WATER CONSUMPTION END ================

        });
    </script>
@endsection
