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
                                <h4>Dashboard</h4>
                            </div>

                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="energy-tab" data-toggle="tab" href="#energy" role="tab" aria-controls="energy" aria-selected="true">Energy Consumption</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="water-tab" data-toggle="tab" href="#water" role="tab" aria-controls="water" aria-selected="false">Water Consumption</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="paper-tab" data-toggle="tab" href="#paper" role="tab" aria-controls="paper" aria-selected="false">Paper Consumption</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="energy" role="tabpanel" aria-labelledby="energy-tab">
                                        <h5 class="mt-3 ml-2">Energy Consumption</h5>
                                        <div class="text-left mt-4 d-flex flex-row">
                                            <div class="form-group ml-3 col-2">
                                                <label><strong>Fiscal Year :</strong></label>
                                                    <select class="form-control select2bs4 selectYearEnergy" name="fiscal_year" id="selFiscalYearEnergy" style="width: 100%;">
                                                        <!-- Code generated -->
                                                    </select>
                                            </div>
                                        </div><br>
                                
                                        <div class="table-responsive">
                                            <table id="tblViewEnergyConsumption" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 6.66%;">Energy Consumption KwH/Mo</th>
                                                        {{-- <th style="width: 6.66%;" class="march-past-fy"></th> --}}
                                                        <th style="width: 6.66%;" class="april-current-fy"></th>
                                                        <th style="width: 6.66%;" class="may-current-fy"></th>
                                                        <th style="width: 6.66%;" class="june-current-fy"></th>
                                                        <th style="width: 6.66%;" class="july-current-fy"></th>
                                                        <th style="width: 6.66%;" class="august-current-fy"></th>
                                                        <th style="width: 6.66%;" class="september-current-fy"></th>
                                                        <th style="width: 6.66%;" class="october-current-fy"></th>
                                                        <th style="width: 6.66%;" class="november-current-fy"></th>
                                                        <th style="width: 6.66%;" class="december-current-fy"></th>
                                                        <th style="width: 6.66%;" class="january-current-fy"></th>
                                                        <th style="width: 6.66%;" class="february-current-fy"></th>
                                                        <th style="width: 6.66%;" class="march-current-fy"></th>
                                                        <th style="width: 6.66%;" class="total-current-fy">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Target</td>
                                                        {{-- <td class="march-target-past text-left" id="march-target-past"></td> --}}
                                                        <td class="april-target text-left" id="april-target"></td>
                                                        <td class="may-target text-left" id="may-target"></td>
                                                        <td class="june-target text-left" id="june-target"></td>
                                                        <td class="july-target text-left" id="july-target"></td>
                                                        <td class="august-target text-left" id="august-target"></td>
                                                        <td class="september-target text-left" id="september-target"></td>
                                                        <td class="october-target text-left" id="october-target"></td>
                                                        <td class="november-target text-left" id="november-target"></td>
                                                        <td class="december-target text-left" id="december-target"></td>
                                                        <td class="january-target text-left" id="january-target"></td>
                                                        <td class="february-target text-left" id="february-target"></td>
                                                        <td class="march-target text-left" id="march-target"></td>
                                                        <td class="total-target text-left" id="total-target"></td>
                                                    </tr>
                                                </tbody>
                                               
                                                    <tr>
                                                        <td>Actual</td>
                                                        {{-- <td class="march-actual-past text-left" id="march-actual-past"></td> --}}
                                                        <td class="april-actual text-left" id="april-actual"></td>
                                                        <td class="may-actual text-left" id="may-actual"></td>
                                                        <td class="june-actual text-left" id="june-actual"></td>
                                                        <td class="july-actual text-left" id="july-actual"></td>
                                                        <td class="august-actual text-left" id="august-actual"></td>
                                                        <td class="september-actual text-left" id="september-actual"></td>
                                                        <td class="october-actual text-left" id="october-actual"></td>
                                                        <td class="november-actual text-left" id="november-actual"></td>
                                                        <td class="december-actual text-left" id="december-actual"></td>
                                                        <td class="january-actual text-left" id="january-actual"></td>
                                                        <td class="february-actual text-left" id="february-actual"></td>
                                                        <td class="march-actual text-left" id="march-actual"></td>
                                                        <td class="total-actual text-left" id="total-actual"></td>
                                                    </tr>

                                                    <tr>
                                                        <td>|</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        {{-- <td></td> --}}
                                                    </tr>

                                                    
                                                    <tr>
                                                        <td>Tricolor Chart Data</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        {{-- <td></td> --}}
                                                    </tr>
                                                
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="water" role="tabpanel" aria-labelledby="water-tab">
                                        <h5 class="mt-3 ml-2">Water Consumption</h5>
                                        <div class="text-left mt-4 d-flex flex-row">
                                            <div class="form-group ml-3 col-2">
                                                <label><strong>Fiscal Year :</strong></label>
                                                    <select class="form-control select2bs4 selectYearWater" name="fiscal_year" id="selFiscalYearWater" style="width: 100%;">
                                                        <!-- Code generated -->
                                                    </select>
                                            </div>
                                        </div><br>
                                
                                        <div class="table-responsive">
                                            <table id="tblViewWaterConsumption" class="table table-sm table-bordered table-striped table-hover text-center" style="width: 100%;">
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
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                        {{-- <td style="width: 6.66%;"></td> --}}
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="paper" role="tabpanel" aria-labelledby="paper-tab">
                                        <h5 class="mt-3 ml-2">Paper Consumption</h5>
                                        <div class="text-left mt-4 d-flex flex-row">
                                            <div class="form-group ml-3 col-2">
                                                <label><strong>Fiscal Year :</strong></label>
                                                    <select class="form-control select2bs4 selectYearPaper" name="fiscal_year" id="selFiscalYearPaper" style="width: 100%;">
                                                        <!-- Code generated -->
                                                    </select>
                                            </div>
                                        </div><br>
                                
                                        <div class="table-responsive">
                                            <table id="tblViewPaperConsumption" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 6.66%;">Paper Consumption</th>
                                                        {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                        <th class="april-paper-current-fy" style="width: 6.66%;"></th>
                                                        <th class="may-paper-current-fy" style="width: 6.66%;"></th>
                                                        <th class="june-paper-current-fy" style="width: 6.66%;"></th>
                                                        <th class="july-paper-current-fy" style="width: 6.66%;"></th>
                                                        <th class="august-paper-current-fy" style="width: 6.66%;"></th>
                                                        <th class="september-paper-current-fy" style="width: 6.66%;"></th>
                                                        <th class="october-paper-current-fy" style="width: 6.66%;"></th>
                                                        <th class="november-paper-current-fy" style="width: 6.66%;"></th>
                                                        <th class="december-paper-current-fy" style="width: 6.66%;"></th>
                                                        <th class="january-paper-current-fy" style="width: 6.66%;"></th>
                                                        <th class="february-paper-current-fy" style="width: 6.66%;"></th>
                                                        <th class="march-paper-current-fy" style="width: 6.66%;"></th>
                                                        <th style="width: 6.66%;">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 6.66%;">Target</td>
                                                        {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                        <td class="april-paper-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="may-paper-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="june-paper-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="july-paper-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="august-paper-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="september-paper-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="october-paper-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="november-paper-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="december-paper-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="january-paper-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="february-paper-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="march-paper-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="total-paper-current-fy-target" style="width: 6.66%;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">Actual</td>
                                                        {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                        <td class="april-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="may-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="june-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="july-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="august-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="september-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="october-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="november-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="december-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="january-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="february-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="march-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="total-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">|</td>
                                                        {{-- <td style="width: 6.66%;"></td> --}}
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                        {{-- <td style="width: 6.66%;"></td> --}}
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                        <td style="width: 6.66%;"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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
                    }
                });
            }

            //============= GET ENERGY DATA FOR DASHBOARD ===================================================
            function GetCurrentFYEnergyData() {
                $.ajax({
                    method: "get",
                    url: "get_current_energy_data",
                    data: {
                        fiscal_year: $('#selFiscalYearEnergy').val()
                    },
                    dataType: "json",
                    success: function(response) {
                        var pastYear = response['pastFY'];
                        var pastYear = Number(pastYear);
                        var currentYear = response['currentFY'];
                        var currentYear = Number(currentYear);
                        //=========
                        var iconPastMarch = response['iconPastMarch'];
                        var iconCurrentApril = response['iconCurrentApril'];
                        var iconCurrentMay = response['iconCurrentMay'];
                        var iconCurrentJune = response['iconCurrentJune'];
                        var iconCurrentJuly = response['iconCurrentJuly'];
                        var iconCurrentAugust = response['iconCurrentAugust'];
                        var iconCurrentSeptember = response['iconCurrentSeptember'];
                        var iconCurrentOctober = response['iconCurrentOctober'];
                        var iconCurrentNovember = response['iconCurrentNovember'];
                        var iconCurrentDecember = response['iconCurrentDecember'];
                        var iconCurrentJanuary = response['iconCurrentJanuary'];
                        var iconCurrentFebruary = response['iconCurrentFebruary'];
                        var iconCurrentMarch = response['iconCurrentMarch'];
                        //=========

                        //=========
                        var pastMarchTarget = response['marchTargetPastFy'];
                        var pastMarchActual = response['marchActualPastFy'];
                        var currentAprilTarget = response['aprilTargetCurrentFy'];
                        var currentAprilActual = response['aprilActualCurrentFy'];
                        var currentMayTarget = response['mayTargetCurrentFy'];
                        var currentMayActual = response['mayActualCurrentFy'];
                        var currentJuneTarget = response['juneTargetCurrentFy'];
                        var currentJuneActual = response['juneActualCurrentFy'];
                        var currentJulyTarget = response['julyTargetCurrentFy'];
                        var currentJulyActual = response['julyActualCurrentFy'];
                        var currentAugustTarget = response['augustTargetCurrentFy'];
                        var currentAugustActual = response['augustActualCurrentFy'];
                        var currentSeptemberTarget = response['septemberTargetCurrentFy'];
                        var currentSeptemberActual = response['septemberActualCurrentFy'];
                        var currentOctoberTarget = response['octoberTargetCurrentFy'];
                        var currentOctoberActual = response['octoberActualCurrentFy'];
                        var currentNovemberTarget = response['novemberTargetCurrentFy'];
                        var currentNovemberActual = response['novemberActualCurrentFy'];
                        var currentDecemberTarget = response['decemberTargetCurrentFy'];
                        var currentDecemberActual = response['decemberActualCurrentFy'];
                        var currentJanuaryTarget = response['januaryTargetCurrentFy'];
                        var currentJanuaryActual = response['januaryActualCurrentFy'];
                        var currentFebruaryTarget = response['februaryTargetCurrentFy'];
                        var currentFebruaryActual = response['februaryActualCurrentFy'];
                        var currentMarchTarget = response['marchTargetCurrentFy'];
                        var currentMarchActual = response['marchActualCurrentFy'];
                        //========

                        // console.log(currentYear + 1);
                        if(currentYear != null) {
                            $('.april-current-fy').html('April ' + currentYear); 
                            $('.may-current-fy').html('May ' + currentYear); 
                            $('.june-current-fy').html('June ' + currentYear); 
                            $('.july-current-fy').html('July ' + currentYear); 
                            $('.august-current-fy').html('August ' + currentYear); 
                            $('.september-current-fy').html('September ' + currentYear); 
                            $('.october-current-fy').html('October ' + currentYear); 
                            $('.november-current-fy').html('November ' + currentYear); 
                            $('.december-current-fy').html('December ' + currentYear); 
                            $('.january-current-fy').html('January ' + (currentYear + 1)); 
                            $('.february-current-fy').html('February ' + (currentYear + 1)); 
                            $('.march-current-fy').html('March ' + (currentYear + 1)); 
                        } else {
                            $('.april-current-fy').html(' ');
                            $('.may-current-fy').html(' ');
                            $('.june-current-fy').html(' ');
                            $('.july-current-fy').html(' ');
                            $('.august-current-fy').html(' ');
                            $('.september-current-fy').html(' ');
                            $('.october-current-fy').html(' ');
                            $('.november-current-fy').html(' ');
                            $('.december-current-fy').html(' ');
                            $('.january-current-fy').html(' ');
                            $('.february-current-fy').html(' ');
                            $('.march-current-fy').html(' ');
                        }

                        //===== CURRENT FY MONTHS =============
                        if(currentAprilTarget != null) {
                            $('.april-target').html(currentAprilTarget); 
                        } else {
                            $('.april-target').html('-'); 
                        }

                        if(currentAprilActual == 0 || currentAprilActual == null) {
                            $('.april-actual').html('-'); 
                        } else if(currentAprilActual != null) {
                            $('.april-actual').html(currentAprilActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentApril);
                        }  

                        //=======
                        if(currentMayTarget != null) {
                            $('.may-target').html(currentMayTarget); 
                        } else {
                            $('.may-target').html('-'); 
                        }

                        if(currentMayActual == 0 || currentMayActual == null) {
                            $('.may-actual').html('-'); 
                            
                        } else if(currentMayActual != null){
                            $('.may-actual').html(currentMayActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentMay);
                        }

                        //=======
                        if(currentJuneTarget != null) {
                            $('.june-target').html(currentJuneTarget); 
                        } else {
                            $('.june-target').html('-'); 
                        }

                        if(currentJuneActual == 0 || currentJuneActual == null) {
                            $('.june-actual').html('-'); 
                            
                        } else if(currentJuneActual != null) {
                            $('.june-actual').html(currentJuneActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentJune);
                        }

                        //=======
                        if(currentJulyTarget != null) {
                            $('.july-target').html(currentJulyTarget); 
                        } else {
                            $('.july-target').html('-'); 
                        }

                        if(currentJulyActual == 0 || currentJulyActual == null) {
                            $('.july-actual').html('-'); 
                            
                        } else if(currentJulyActual != null) {
                            $('.july-actual').html(currentJulyActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentJuly);
                        }

                        //=======
                        if(currentAugustTarget != null) {
                            $('.august-target').html(currentAugustTarget); 
                        } else {
                            $('.august-target').html('-'); 
                        }

                        if(currentAugustActual == 0 || currentAugustActual == null) {
                            $('.august-actual').html('-'); 
                            
                        } else if(currentAugustActual != null) {
                            $('.august-actual').html(currentAugustActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentAugust);
                        }

                        //=======
                        if(currentSeptemberTarget != null) {
                            $('.september-target').html(currentSeptemberTarget); 
                        } else {
                            $('.september-target').html('-'); 
                        }

                        if(currentSeptemberActual == 0 || currentSeptemberActual == null) {
                            $('.september-actual').html('-'); 
                            
                        } else if(currentSeptemberActual != null) {
                            $('.september-actual').html(currentSeptemberActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentSeptember);
                        }

                        //=======
                        if(currentOctoberTarget != null) {
                            $('.october-target').html(currentOctoberTarget); 
                        } else {
                            $('.october-target').html('-'); 
                        }

                        if(currentOctoberActual == 0 || currentOctoberActual == null) {
                            $('.october-actual').html('-'); 
                            
                        } else if(currentOctoberActual != null) {
                            $('.october-actual').html(currentOctoberActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentOctober);
                        }

                        //=======
                        if(currentNovemberTarget != null) {
                            $('.november-target').html(currentNovemberTarget); 
                        } else {
                            $('.november-target').html('-'); 
                        }

                        if(currentNovemberActual == 0 || currentNovemberActual == null) {
                            $('.november-actual').html('-'); 
                            
                        } else if(currentNovemberActual != null) {
                            $('.november-actual').html(currentNovemberActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentNovember);
                        }

                        //=======
                        if(currentDecemberTarget != null) {
                            $('.december-target').html(currentDecemberTarget); 
                        } else {
                            $('.december-target').html('-'); 
                        }

                        if (currentDecemberActual == 0 || currentDecemberActual == null) {
                            $('.december-actual').html('-'); 
                        }
                        else if(currentDecemberActual != null) {
                            $('.december-actual').html(currentDecemberActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentDecember);
                        //   console.log(currentDecemberActual);
                        } 

                        //=======
                         if(currentJanuaryTarget != null) {
                            $('.january-target').html(currentJanuaryTarget); 
                        } else {
                            $('.january-target').html('-'); 
                        }

                        if(currentJanuaryActual == 0 || currentJanuaryActual == null) {
                            $('.january-actual').html('-'); 
                            
                        } else if(currentJanuaryActual != null) {
                            $('.january-actual').html(currentJanuaryActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentJanuary);
                        }

                        //=======
                        if(currentFebruaryTarget != null) {
                            $('.february-target').html(currentFebruaryTarget); 
                        } else {
                            $('.february-target').html('-'); 
                        }

                        if(currentFebruaryActual == 0 || currentFebruaryActual == null) {
                            $('.february-actual').html('-'); 
                            
                        } else if(currentFebruaryActual != null) {
                            $('.february-actual').html(currentFebruaryActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentFebruary);
                        }

                         //=======
                         if(currentMarchTarget != null) {
                            $('.march-target').html(currentMarchTarget); 
                        } else {
                            $('.march-target').html('-'); 
                        }

                        if(currentMarchActual == 0 || currentMarchActual == null) {
                            $('.march-actual').html('-'); 
                        } else if(currentMarchActual != null) {
                            $('.march-actual').html(currentMarchActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentMarch);
                        }
                        //===== CURRENT FY MONTHS =============

                        var currentAprilTargetNum = null;
                        var currentMayTargetNum = null;
                        var currentJuneTargetNum = null;
                        var currentJulyTargetNum = null;
                        var currentAugustTargetNum = null;
                        var currentSeptemberTargetNum = null;
                        var currentOctoberTargetNum = null;
                        var currentNovemberTargetNum = null;
                        var currentDecemberTargetNum = null;
                        var currentJanuaryTargetNum = null;
                        var currentFebruaryTargetNum = null;
                        var currentMarchTargetNum = null;

                        if(currentAprilTarget != null) {
                            var currentAprilTargetNum = Number(currentAprilTarget.replace(/,/g, ''));
                            // console.log(currentAprilTarget);
                        } 
                        if (currentMayTarget != null) {
                            var currentMayTargetNum = Number(currentMayTarget.replace(/,/g, ''));
                            // console.log(currentMayTarget);
                        }
                        if (currentJuneTarget != null) {
                            var currentJuneTargetNum = Number(currentJuneTarget.replace(/,/g, ''));
                        }
                        if (currentJulyTarget != null) {
                            var currentJulyTargetNum = Number(currentJulyTarget.replace(/,/g, ''));
                        }
                        if (currentAugustTarget != null) {
                            var currentAugustTargetNum = Number(currentAugustTarget.replace(/,/g, ''));
                        }
                        if (currentSeptemberTarget != null) {
                            var currentSeptemberTargetNum = Number(currentSeptemberTarget.replace(/,/g, ''));
                        }
                        if (currentOctoberTarget != null) {
                            var currentOctoberTargetNum = Number(currentOctoberTarget.replace(/,/g, ''));
                        }
                        if (currentNovemberTarget != null) {
                            var currentNovemberTargetNum = Number(currentNovemberTarget.replace(/,/g, ''));
                        }
                        if (currentDecemberTarget != null) {
                            var currentDecemberTargetNum = Number(currentDecemberTarget.replace(/,/g, ''));
                        }
                        if (currentJanuaryTarget != null) {
                            var currentJanuaryTargetNum = Number(currentJanuaryTarget.replace(/,/g, ''));
                        }
                        if (currentFebruaryTarget != null) {
                            var currentFebruaryTargetNum = Number(currentFebruaryTarget.replace(/,/g, ''));
                        }
                        if (currentMarchTarget != null) {
                            var currentMarchTargetNum = Number(currentMarchTarget.replace(/,/g, ''));
                        }
                      
                         var totalTargetNum = currentAprilTargetNum + currentMayTargetNum + currentJuneTargetNum + currentJulyTargetNum + currentAugustTargetNum + currentSeptemberTargetNum + currentOctoberTargetNum + currentNovemberTargetNum + currentDecemberTargetNum + currentJanuaryTargetNum + currentFebruaryTargetNum + currentMarchTargetNum;

                         var totalTargetNumFormatted = totalTargetNum.toLocaleString('en');

                        if(totalTargetNumFormatted != 0) {
                            $('#total-target').html(totalTargetNumFormatted);
                        }
                        else {
                            $('#total-target').html('-');
                        }

                        var currentAprilActualNum = null;
                        var currentMayActualNum = null;
                        var currentJuneActualNum = null;
                        var currentJulyActualNum = null;
                        var currentAugustActualNum = null;
                        var currentSeptemberActualNum = null;
                        var currentOctoberActualNum = null;
                        var currentNovemberActualNum = null;
                        var currentDecemberActualNum = null; 
                        var currentJanuaryActualNum = null;
                        var currentFebruaryActualNum = null;
                        var currentMarchActualNum = null;

                        if(currentAprilActual != null) {
                            var currentAprilActualNum = Number(currentAprilActual.replace(/,/g, ''));
                        }
                        if(currentMayActual != null) {
                            var currentMayActualNum = Number(currentMayActual.replace(/,/g, ''));
                        }
                        if(currentJuneActual != null) {
                            var currentJuneActualNum = Number(currentJuneActual.replace(/,/g, ''));
                        }
                        if(currentJulyActual != null) {
                            var currentJulyActualNum = Number(currentJulyActual.replace(/,/g, ''));
                        }
                        if(currentAugustActual != null) {
                            var currentAugustActualNum = Number(currentAugustActual.replace(/,/g, ''));
                        }
                        if(currentSeptemberActual != null) {
                            var currentSeptemberActualNum = Number(currentSeptemberActual.replace(/,/g, ''));
                        }
                        if(currentOctoberActual != null) {
                            var currentOctoberActualNum = Number(currentOctoberActual.replace(/,/g, ''));
                        }
                        if(currentNovemberActual != null) {
                            var currentNovemberActualNum = Number(currentNovemberActual.replace(/,/g, ''));
                        }
                        if(currentDecemberActual != null) {
                            var currentDecemberActualNum = Number(currentDecemberActual.replace(/,/g, ''));
                        }
                        if(currentJanuaryActual != null) {
                            var currentJanuaryActualNum = Number(currentJanuaryActual.replace(/,/g, ''));
                        }
                        if(currentFebruaryActual != null) {
                            var currentFebruaryActualNum = Number(currentFebruaryActual.replace(/,/g, ''));
                        }
                        if(currentMarchActual != null) {
                            var currentMarchActualNum = Number(currentMarchActual.replace(/,/g, ''));
                        }

                        var totalActualNum = currentAprilActualNum + currentMayActualNum + currentJuneActualNum + currentJulyActualNum + currentAugustActualNum + currentSeptemberActualNum + currentOctoberActualNum + currentNovemberActualNum + currentDecemberActualNum + currentJanuaryActualNum + currentFebruaryActualNum + currentMarchActualNum;

                        var totalActualNumFormatted = totalActualNum.toLocaleString('en');
                        // console.log(totalActualNumFormatted);

                        if(totalActualNumFormatted != 0) {
                            $('#total-actual').html(totalActualNumFormatted);
                        }
                        else {
                            $('#total-actual').html('-');
                        }
                    },

                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    },
                });
            }
            //============= GET ENERGY DATA FOR DASHBOARD ===================================================

            GetCurrentFYEnergyData();

            $('#selFiscalYearEnergy').on('change', function() {
                $('.selectYearEnergy').val($(this).find(":selected").val());
                $(".selectYearEnergy").val();

                GetCurrentFYEnergyData();
                    
                dataTableEnergyConsumptions.draw();
            });

            function GetCurrentFYPaperData() {
                $.ajax({
                    url: 'get_current_paper_data',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        fiscal_year: $('#selFiscalYearPaper').val()
                    },
                    success: function (response) {
                        var currentYear = Number(response['currentYear']);
                        var nextYear = Number(response['currentYear'] + 1);
                        var iconApril = response['iconApril']; 
                        var iconMay = response['iconMay']; 
                        var iconJune = response['iconJune']; 
                        var iconJuly = response['iconJuly']; 
                        var iconAugust = response['iconAugust']; 
                        var iconSeptember = response['iconSeptember']; 
                        var iconOctober = response['iconOctober']; 
                        var iconNovember = response['iconNovember']; 
                        var iconDecember = response['iconDecember']; 
                        var iconJanuary = response['iconJanuary']; 
                        var iconFebruary = response['iconFebruary']; 
                        var iconMarch = response['iconMarch']; 
                        var paperTargetApril = parseFloat(response['paperTargetApril']);
                        var paperActualApril = parseFloat(response['paperActualApril']);
                        var paperTargetMay = parseFloat(response['paperTargetMay']);
                        var paperActualMay = parseFloat(response['paperActualMay']);
                        var paperTargetJune = parseFloat(response['paperTargetJune']);
                        var paperActualJune = parseFloat(response['paperActualJune']);
                        var paperTargetJuly = parseFloat(response['paperTargetJuly']);
                        var paperActualJuly = parseFloat(response['paperActualJuly']);
                        var paperTargetAugust = parseFloat(response['paperTargetAugust']);
                        var paperActualAugust = parseFloat(response['paperActualAugust']);
                        var paperTargetSeptember = parseFloat(response['paperTargetSeptember']);
                        var paperActualSeptember = parseFloat(response['paperActualSeptember']);
                        var paperTargetOctober = parseFloat(response['paperTargetOctober']);
                        var paperActualOctober = parseFloat(response['paperActualOctober']);
                        var paperTargetNovember = parseFloat(response['paperTargetNovember']);
                        var paperActualNovember = parseFloat(response['paperActualNovember']);
                        var paperTargetDecember = parseFloat(response['paperTargetDecember']);
                        var paperActualDecember = parseFloat(response['paperActualDecember']);
                        var paperTargetJanuary = parseFloat(response['paperTargetJanuary']);
                        var paperActualJanuary = parseFloat(response['paperActualJanuary']);
                        var paperTargetFebruary = parseFloat(response['paperTargetFebruary']);
                        var paperActualFebruary = parseFloat(response['paperActualFebruary']);
                        var paperTargetMarch = parseFloat(response['paperTargetMarch']);
                        var paperActualMarch = parseFloat(response['paperActualMarch']);


                        $('.april-paper-current-fy').html('April ' + currentYear);
                        $('.may-paper-current-fy').html('May ' + currentYear);
                        $('.june-paper-current-fy').html('June ' + currentYear);
                        $('.july-paper-current-fy').html('July ' + currentYear);
                        $('.august-paper-current-fy').html('August ' + currentYear);
                        $('.september-paper-current-fy').html('September ' + currentYear);
                        $('.october-paper-current-fy').html('October ' + currentYear);
                        $('.november-paper-current-fy').html('November ' + currentYear);
                        $('.december-paper-current-fy').html('December ' + currentYear);
                        $('.january-paper-current-fy').html('January ' + nextYear);
                        $('.february-paper-current-fy').html('February ' + nextYear);
                        $('.march-paper-current-fy').html('March ' + nextYear);



                        if(paperTargetApril == 0) {
                            $('.april-paper-current-fy-target').html('-');
                        } else {
                            $('.april-paper-current-fy-target').html(paperTargetApril);
                        }

                        if(paperActualApril == 0) {
                            $('.april-paper-current-fy-actual').html('-');
                        } else {
                            $('.april-paper-current-fy-actual').html(paperActualApril + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconApril);
                        }


                        if(paperTargetMay == 0) {
                            $('.may-paper-current-fy-target').html('-');
                        } else {
                            $('.may-paper-current-fy-target').html(paperTargetMay);
                        }

                        if(paperActualMay == 0) {
                            $('.may-paper-current-fy-actual').html('-');
                        } else {
                            $('.may-paper-current-fy-actual').html(paperActualMay + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconMay);
                        }

                    
                        if(paperTargetJune == 0) {
                            $('.june-paper-current-fy-target').html('-');
                        } else {
                            $('.june-paper-current-fy-target').html(paperTargetJune);
                        }

                        if(paperActualJune == 0) {
                            $('.june-paper-current-fy-actual').html('-');
                        } else {
                            $('.june-paper-current-fy-actual').html(paperActualJune + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconJune);
                        }


                        if(paperTargetJuly == 0) {
                            $('.july-paper-current-fy-target').html('-');
                        } else {
                            $('.july-paper-current-fy-target').html(paperTargetJuly);
                        }

                        if(paperActualJuly == 0) {
                            $('.july-paper-current-fy-actual').html('-');
                        } else {
                            $('.july-paper-current-fy-actual').html(paperActualJuly + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconJuly);
                        }


                        if(paperTargetAugust == 0) {
                            $('.august-paper-current-fy-target').html('-');
                        } else {
                            $('.august-paper-current-fy-target').html(paperTargetAugust);
                        }

                        if(paperActualAugust == 0) {
                            $('.august-paper-current-fy-actual').html('-');
                        } else {
                            $('.august-paper-current-fy-actual').html(paperActualAugust + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconAugust);
                        }


                        if(paperTargetSeptember == 0) {
                            $('.september-paper-current-fy-target').html('-');
                        } else {
                            $('.september-paper-current-fy-target').html(paperTargetSeptember);
                        }

                        if(paperActualSeptember == 0) {
                            $('.september-paper-current-fy-actual').html('-');
                        } else {
                            $('.september-paper-current-fy-actual').html(paperActualSeptember + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconSeptember);
                        }


                        if(paperTargetOctober == 0) {
                            $('.october-paper-current-fy-target').html('-');
                        } else {
                            $('.october-paper-current-fy-target').html(paperTargetOctober);
                        }

                        if(paperActualOctober == 0) {
                            $('.october-paper-current-fy-actual').html('-');
                        } else {
                            $('.october-paper-current-fy-actual').html(paperActualOctober + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconOctober);
                        }


                        if(paperTargetNovember == 0) {
                            $('.november-paper-current-fy-target').html('-');
                        } else {
                            $('.november-paper-current-fy-target').html(paperTargetNovember);
                        }

                        if(paperActualNovember == 0) {
                            $('.november-paper-current-fy-actual').html('-');
                        } else {
                            $('.november-paper-current-fy-actual').html(paperActualNovember + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconNovember);
                        }


                        if(paperTargetDecember == 0) {
                            $('.december-paper-current-fy-target').html('-');
                        } else {
                            $('.december-paper-current-fy-target').html(paperTargetDecember);
                        }

                        if(paperActualDecember == 0) {
                            $('.december-paper-current-fy-actual').html('-');
                        } else {
                            $('.december-paper-current-fy-actual').html(paperActualDecember + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconDecember);
                        }


                        if(paperTargetJanuary == 0) {
                            $('.january-paper-current-fy-target').html('-');
                        } else {
                            $('.january-paper-current-fy-target').html(paperTargetJanuary);
                        }

                        if(paperActualJanuary == 0) {
                            $('.january-paper-current-fy-actual').html('-');
                        } else {
                            $('.january-paper-current-fy-actual').html(paperActualJanuary + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconJanuary);
                        }


                        if(paperTargetFebruary == 0) {
                            $('.february-paper-current-fy-target').html('-');
                        } else {
                            $('.february-paper-current-fy-target').html(paperTargetFebruary);
                        }

                        if(paperActualFebruary == 0) {
                            $('.february-paper-current-fy-actual').html('-');
                        } else {
                            $('.february-paper-current-fy-actual').html(paperActualFebruary + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconFebruary);
                        }


                        if(paperTargetMarch == 0) {
                            $('.march-paper-current-fy-target').html('-');
                        } else {
                            $('.march-paper-current-fy-target').html(paperTargetMarch);
                        }

                        if(paperActualMarch == 0) {
                            $('.march-paper-current-fy-actual').html('-');
                        } else {
                            $('.march-paper-current-fy-actual').html(paperActualMarch + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconMarch);
                        }

                        var paperTargetTotal = paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember + paperTargetOctober + paperTargetNovember + paperTargetDecember + paperTargetJanuary + paperTargetFebruary + paperTargetMarch;

                        // console.log(paperTargetMarch);
                        // var paperTargetTotal = parseFloat(paperTargetTotal);
                        var paperTargetTotal = paperTargetTotal.toFixed(2);

                        if(paperTargetTotal == 0) {
                            $('.total-paper-current-fy-target').html('-');
                        } else {
                            $('.total-paper-current-fy-target').html(paperTargetTotal);
                        }


                        var paperActualTotal = paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember + paperActualOctober + paperActualNovember + paperActualDecember + paperActualJanuary + paperActualFebruary + paperActualMarch;

                        var paperActualTotal = paperActualTotal.toFixed(2);

                        if(paperActualTotal == 0) {
                            $('.total-paper-current-fy-actual').html('-');
                        } else {
                            $('.total-paper-current-fy-actual').html(paperActualTotal);
                        }



                    }
                });
            }

            GetCurrentFYPaperData();

            $('#selFiscalYearPaper').on('change', function() {
                $('.selectYearPaper').val($(this).find(":selected").val());
                $(".selectYearPaper").val();

                GetCurrentFYPaperData();
                    
                dataTablePaperConsumptions.draw();
            });


             //===== DATATABLES OF ENERGY CONSUMPTION ================
             var dataTableEnergyConsumptions = $("#tblViewEnergyConsumption").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF ENERGY CONSUMPTION END ================


            //===== DATATABLES OF ENERGY CONSUMPTION ================
            var dataTablePaperConsumptions = $("#tblViewPaperConsumption").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF ENERGY CONSUMPTION END ================


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
