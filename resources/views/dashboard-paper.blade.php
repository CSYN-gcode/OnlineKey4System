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
                                <h4>Paper Consumption - Dashboard</h4>
                            </div>

                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item paperConsumptionSG" style="display: none;">
                                        <a class="nav-link" id="paper-tab" data-toggle="tab" href="#paper" role="tab" aria-controls="paper" aria-selected="false">Paper Consumption - SG</a>
                                    </li>

                                    <li class="nav-item paperConsumptionTS" id="paperConsumptionTS" style="display: none;">
                                        <a class="nav-link" id="paper-prod-ts-tab" data-toggle="tab" href="#paper-prod-ts" role="tab" aria-controls="paper-prod-ts" aria-selected="false">Paper Consumption - TS</a>
                                    </li>

                                    <li class="nav-item paperConsumptionCN" style="display: none;">
                                        <a class="nav-link" id="paper-prod-cn-tab" data-toggle="tab" href="#paper-prod-cn" role="tab" aria-controls="paper-prod-cn" aria-selected="false">Paper Consumption - CN</a>
                                    </li>

                                    <li class="nav-item paperConsumptionYF" style="display: none;">
                                        <a class="nav-link" id="paper-prod-yf-tab" data-toggle="tab" href="#paper-prod-yf" role="tab" aria-controls="paper-prod-yf" aria-selected="false">Paper Consumption - YF</a>
                                    </li>

                                    <li class="nav-item paperConsumptionPPS" style="display: none;">
                                        <a class="nav-link" id="paper-prod-pps-tab" data-toggle="tab" href="#paper-prod-pps" role="tab" aria-controls="paper-prod-pps" aria-selected="false">Paper Consumption - PPS</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    
                                    <div class="tab-pane fade" id="paper" role="tabpanel" aria-labelledby="paper-tab">
                                        <h5 class="mt-3 ml-2">Paper Consumption - SG</h5>
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
                                                        <th style="width: 6.66%;">Paper Consumption - SG</th>
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
                                                        <td style="width: 6.66%;" class="april-paper-actual-target"></td>
                                                        <td style="width: 6.66%;" class="may-paper-actual-target"></td>
                                                        <td style="width: 6.66%;" class="june-paper-actual-target"></td>
                                                        <td style="width: 6.66%;" class="july-paper-actual-target"></td>
                                                        <td style="width: 6.66%;" class="august-paper-actual-target"></td>
                                                        <td style="width: 6.66%;" class="september-paper-actual-target"></td>
                                                        <td style="width: 6.66%;" class="october-paper-actual-target"></td>
                                                        <td style="width: 6.66%;" class="november-paper-actual-target"></td>
                                                        <td style="width: 6.66%;" class="december-paper-actual-target"></td>
                                                        <td style="width: 6.66%;" class="january-paper-actual-target"></td>
                                                        <td style="width: 6.66%;" class="february-paper-actual-target"></td>
                                                        <td style="width: 6.66%;" class="march-paper-actual-target"></td>
                                                        <td style="width: 6.66%;" class="total-paper-actual-target"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                        {{-- <td style="width: 6.66%;"></td> --}}
                                                        <td style="width: 6.66%;" class="april-paper-tricolor"></td>
                                                        <td style="width: 6.66%;" class="may-paper-tricolor"></td>
                                                        <td style="width: 6.66%;" class="june-paper-tricolor"></td>
                                                        <td style="width: 6.66%;" class="july-paper-tricolor"></td>
                                                        <td style="width: 6.66%;" class="august-paper-tricolor"></td>
                                                        <td style="width: 6.66%;" class="september-paper-tricolor"></td>
                                                        <td style="width: 6.66%;" class="october-paper-tricolor"></td>
                                                        <td style="width: 6.66%;" class="november-paper-tricolor"></td>
                                                        <td style="width: 6.66%;" class="december-paper-tricolor"></td>
                                                        <td style="width: 6.66%;" class="january-paper-tricolor"></td>
                                                        <td style="width: 6.66%;" class="february-paper-tricolor"></td>
                                                        <td style="width: 6.66%;" class="march-paper-tricolor"></td>
                                                        <td style="width: 6.66%;" class="total-paper-tricolor"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="paper-prod-ts" role="tabpanel" aria-labelledby="paper-prod-ts-tab">
                                        <h5 class="mt-3 ml-2">Paper Consumption - TS</h5>
                                        <div class="text-left mt-4 d-flex flex-row">
                                            <div class="form-group ml-3 col-2">
                                                <label><strong>Fiscal Year :</strong></label>
                                                    <select class="form-control select2bs4 selectYearPaperTS" name="fiscal_year" id="selFiscalYearPaperTS" style="width: 100%;">
                                                        <!-- Code generated -->
                                                    </select>
                                            </div>
                                        </div><br>
                                
                                        <div class="table-responsive">
                                            <table id="tblViewPaperConsumptionTS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 6.66%;">Paper Consumption - TS</th>
                                                        {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                        <th class="april-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                        <th class="may-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                        <th class="june-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                        <th class="july-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                        <th class="august-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                        <th class="september-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                        <th class="october-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                        <th class="november-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                        <th class="december-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                        <th class="january-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                        <th class="february-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                        <th class="march-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                        <th style="width: 6.66%;">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 6.66%;">Target</td>
                                                        {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                        <td class="april-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="may-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="june-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="july-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="august-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="september-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="october-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="november-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="december-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="january-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="february-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="march-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="total-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">Actual</td>
                                                        {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                        <td class="april-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="may-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="june-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="july-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="august-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="september-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="october-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="november-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="december-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="january-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="february-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="march-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="total-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">|</td>
                                                        {{-- <td style="width: 6.66%;"></td> --}}
                                                        <td style="width: 6.66%;" class="april-paper-ts-actual-target"></td>
                                                        <td style="width: 6.66%;" class="may-paper-ts-actual-target"></td>
                                                        <td style="width: 6.66%;" class="june-paper-ts-actual-target"></td>
                                                        <td style="width: 6.66%;" class="july-paper-ts-actual-target"></td>
                                                        <td style="width: 6.66%;" class="august-paper-ts-actual-target"></td>
                                                        <td style="width: 6.66%;" class="september-paper-ts-actual-target"></td>
                                                        <td style="width: 6.66%;" class="october-paper-ts-actual-target"></td>
                                                        <td style="width: 6.66%;" class="november-paper-ts-actual-target"></td>
                                                        <td style="width: 6.66%;" class="december-paper-ts-actual-target"></td>
                                                        <td style="width: 6.66%;" class="january-paper-ts-actual-target"></td>
                                                        <td style="width: 6.66%;" class="february-paper-ts-actual-target"></td>
                                                        <td style="width: 6.66%;" class="march-paper-ts-actual-target"></td>
                                                        <td style="width: 6.66%;" class="total-paper-ts-actual-target"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                        {{-- <td style="width: 6.66%;"></td> --}}
                                                        <td style="width: 6.66%;" class="april-paper-ts-tricolor"></td>
                                                        <td style="width: 6.66%;" class="may-paper-ts-tricolor"></td>
                                                        <td style="width: 6.66%;" class="june-paper-ts-tricolor"></td>
                                                        <td style="width: 6.66%;" class="july-paper-ts-tricolor"></td>
                                                        <td style="width: 6.66%;" class="august-paper-ts-tricolor"></td>
                                                        <td style="width: 6.66%;" class="september-paper-ts-tricolor"></td>
                                                        <td style="width: 6.66%;" class="october-paper-ts-tricolor"></td>
                                                        <td style="width: 6.66%;" class="november-paper-ts-tricolor"></td>
                                                        <td style="width: 6.66%;" class="december-paper-ts-tricolor"></td>
                                                        <td style="width: 6.66%;" class="january-paper-ts-tricolor"></td>
                                                        <td style="width: 6.66%;" class="february-paper-ts-tricolor"></td>
                                                        <td style="width: 6.66%;" class="march-paper-ts-tricolor"></td>
                                                        <td style="width: 6.66%;" class="total-paper-ts-tricolor"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>



                                    <div class="tab-pane fade" id="paper-prod-cn" role="tabpanel" aria-labelledby="paper-prod-cn-tab">
                                        <h5 class="mt-3 ml-2">Paper Consumption - CN</h5>
                                        <div class="text-left mt-4 d-flex flex-row">
                                            <div class="form-group ml-3 col-2">
                                                <label><strong>Fiscal Year :</strong></label>
                                                    <select class="form-control select2bs4 selectYearPaperCN" name="fiscal_year" id="selFiscalYearPaperCN" style="width: 100%;">
                                                        <!-- Code generated -->
                                                    </select>
                                            </div>
                                        </div><br>
                                
                                        <div class="table-responsive">
                                            <table id="tblViewPaperConsumptionCN" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 6.66%;">Paper Consumption - CN</th>
                                                        {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                        <th class="april-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                        <th class="may-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                        <th class="june-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                        <th class="july-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                        <th class="august-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                        <th class="september-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                        <th class="october-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                        <th class="november-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                        <th class="december-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                        <th class="january-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                        <th class="february-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                        <th class="march-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                        <th style="width: 6.66%;">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 6.66%;">Target</td>
                                                        {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                        <td class="april-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="may-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="june-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="july-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="august-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="september-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="october-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="november-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="december-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="january-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="february-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="march-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="total-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">Actual</td>
                                                        {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                        <td class="april-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="may-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="june-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="july-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="august-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="september-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="october-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="november-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="december-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="january-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="february-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="march-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="total-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">|</td>
                                                        {{-- <td style="width: 6.66%;"></td> --}}
                                                        <td style="width: 6.66%;" class="april-paper-cn-actual-target"></td>
                                                        <td style="width: 6.66%;" class="may-paper-cn-actual-target"></td>
                                                        <td style="width: 6.66%;" class="june-paper-cn-actual-target"></td>
                                                        <td style="width: 6.66%;" class="july-paper-cn-actual-target"></td>
                                                        <td style="width: 6.66%;" class="august-paper-cn-actual-target"></td>
                                                        <td style="width: 6.66%;" class="september-paper-cn-actual-target"></td>
                                                        <td style="width: 6.66%;" class="october-paper-cn-actual-target"></td>
                                                        <td style="width: 6.66%;" class="november-paper-cn-actual-target"></td>
                                                        <td style="width: 6.66%;" class="december-paper-cn-actual-target"></td>
                                                        <td style="width: 6.66%;" class="january-paper-cn-actual-target"></td>
                                                        <td style="width: 6.66%;" class="february-paper-cn-actual-target"></td>
                                                        <td style="width: 6.66%;" class="march-paper-cn-actual-target"></td>
                                                        <td style="width: 6.66%;" class="total-paper-cn-actual-target"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                        {{-- <td style="width: 6.66%;"></td> --}}
                                                        <td style="width: 6.66%;" class="april-paper-cn-tricolor"></td>
                                                        <td style="width: 6.66%;" class="may-paper-cn-tricolor"></td>
                                                        <td style="width: 6.66%;" class="june-paper-cn-tricolor"></td>
                                                        <td style="width: 6.66%;" class="july-paper-cn-tricolor"></td>
                                                        <td style="width: 6.66%;" class="august-paper-cn-tricolor"></td>
                                                        <td style="width: 6.66%;" class="september-paper-cn-tricolor"></td>
                                                        <td style="width: 6.66%;" class="october-paper-cn-tricolor"></td>
                                                        <td style="width: 6.66%;" class="november-paper-cn-tricolor"></td>
                                                        <td style="width: 6.66%;" class="december-paper-cn-tricolor"></td>
                                                        <td style="width: 6.66%;" class="january-paper-cn-tricolor"></td>
                                                        <td style="width: 6.66%;" class="february-paper-cn-tricolor"></td>
                                                        <td style="width: 6.66%;" class="march-paper-cn-tricolor"></td>
                                                        <td style="width: 6.66%;" class="total-paper-cn-tricolor"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="paper-prod-yf" role="tabpanel" aria-labelledby="paper-prod-yf-tab">
                                        <h5 class="mt-3 ml-2">Paper Consumption - YF</h5>
                                        <div class="text-left mt-4 d-flex flex-row">
                                            <div class="form-group ml-3 col-2">
                                                <label><strong>Fiscal Year :</strong></label>
                                                    <select class="form-control select2bs4 selectYearPaperYF" name="fiscal_year" id="selFiscalYearPaperYF" style="width: 100%;">
                                                        <!-- Code generated -->
                                                    </select>
                                            </div>
                                        </div><br>
                                
                                        <div class="table-responsive">
                                            <table id="tblViewPaperConsumptionYF" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 6.66%;">Paper Consumption - YF</th>
                                                        {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                        <th class="april-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                        <th class="may-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                        <th class="june-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                        <th class="july-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                        <th class="august-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                        <th class="september-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                        <th class="october-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                        <th class="november-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                        <th class="december-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                        <th class="january-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                        <th class="february-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                        <th class="march-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                        <th style="width: 6.66%;">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 6.66%;">Target</td>
                                                        {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                        <td class="april-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="may-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="june-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="july-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="august-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="september-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="october-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="november-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="december-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="january-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="february-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="march-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="total-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">Actual</td>
                                                        {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                        <td class="april-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="may-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="june-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="july-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="august-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="september-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="october-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="november-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="december-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="january-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="february-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="march-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="total-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">|</td>
                                                        {{-- <td style="width: 6.66%;"></td> --}}
                                                        <td style="width: 6.66%;" class="april-paper-yf-actual-target"></td>
                                                        <td style="width: 6.66%;" class="may-paper-yf-actual-target"></td>
                                                        <td style="width: 6.66%;" class="june-paper-yf-actual-target"></td>
                                                        <td style="width: 6.66%;" class="july-paper-yf-actual-target"></td>
                                                        <td style="width: 6.66%;" class="august-paper-yf-actual-target"></td>
                                                        <td style="width: 6.66%;" class="september-paper-yf-actual-target"></td>
                                                        <td style="width: 6.66%;" class="october-paper-yf-actual-target"></td>
                                                        <td style="width: 6.66%;" class="november-paper-yf-actual-target"></td>
                                                        <td style="width: 6.66%;" class="december-paper-yf-actual-target"></td>
                                                        <td style="width: 6.66%;" class="january-paper-yf-actual-target"></td>
                                                        <td style="width: 6.66%;" class="february-paper-yf-actual-target"></td>
                                                        <td style="width: 6.66%;" class="march-paper-yf-actual-target"></td>
                                                        <td style="width: 6.66%;" class="total-paper-yf-actual-target"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                        {{-- <td style="width: 6.66%;"></td> --}}
                                                        <td style="width: 6.66%;" class="april-paper-yf-tricolor"></td>
                                                        <td style="width: 6.66%;" class="may-paper-yf-tricolor"></td>
                                                        <td style="width: 6.66%;" class="june-paper-yf-tricolor"></td>
                                                        <td style="width: 6.66%;" class="july-paper-yf-tricolor"></td>
                                                        <td style="width: 6.66%;" class="august-paper-yf-tricolor"></td>
                                                        <td style="width: 6.66%;" class="september-paper-yf-tricolor"></td>
                                                        <td style="width: 6.66%;" class="october-paper-yf-tricolor"></td>
                                                        <td style="width: 6.66%;" class="november-paper-yf-tricolor"></td>
                                                        <td style="width: 6.66%;" class="december-paper-yf-tricolor"></td>
                                                        <td style="width: 6.66%;" class="january-paper-yf-tricolor"></td>
                                                        <td style="width: 6.66%;" class="february-paper-yf-tricolor"></td>
                                                        <td style="width: 6.66%;" class="march-paper-yf-tricolor"></td>
                                                        <td style="width: 6.66%;" class="total-paper-yf-tricolor"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="paper-prod-pps" role="tabpanel" aria-labelledby="paper-prod-pps-tab">
                                        <h5 class="mt-3 ml-2">Paper Consumption - PPS</h5>
                                        <div class="text-left mt-4 d-flex flex-row">
                                            <div class="form-group ml-3 col-2">
                                                <label><strong>Fiscal Year :</strong></label>
                                                    <select class="form-control select2bs4 selectYearPaperPPS" name="fiscal_year" id="selFiscalYearPaperPPS" style="width: 100%;">
                                                        <!-- Code generated -->
                                                    </select>
                                            </div>
                                        </div><br>
                                
                                        <div class="table-responsive">
                                            <table id="tblViewPaperConsumptionPPS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 6.66%;">Paper Consumption - PPS</th>
                                                        {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                        <th class="april-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                        <th class="may-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                        <th class="june-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                        <th class="july-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                        <th class="august-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                        <th class="september-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                        <th class="october-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                        <th class="november-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                        <th class="december-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                        <th class="january-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                        <th class="february-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                        <th class="march-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                        <th style="width: 6.66%;">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 6.66%;">Target</td>
                                                        {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                        <td class="april-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="may-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="june-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="july-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="august-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="september-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="october-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="november-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="december-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="january-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="february-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="march-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                        <td class="total-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">Actual</td>
                                                        {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                        <td class="april-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="may-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="june-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="july-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="august-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="september-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="october-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="november-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="december-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="january-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="february-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="march-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                        <td class="total-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">|</td>
                                                        {{-- <td style="width: 6.66%;"></td> --}}
                                                        <td style="width: 6.66%;" class="april-paper-pps-actual-target"></td>
                                                        <td style="width: 6.66%;" class="may-paper-pps-actual-target"></td>
                                                        <td style="width: 6.66%;" class="june-paper-pps-actual-target"></td>
                                                        <td style="width: 6.66%;" class="july-paper-pps-actual-target"></td>
                                                        <td style="width: 6.66%;" class="august-paper-pps-actual-target"></td>
                                                        <td style="width: 6.66%;" class="september-paper-pps-actual-target"></td>
                                                        <td style="width: 6.66%;" class="october-paper-pps-actual-target"></td>
                                                        <td style="width: 6.66%;" class="november-paper-pps-actual-target"></td>
                                                        <td style="width: 6.66%;" class="december-paper-pps-actual-target"></td>
                                                        <td style="width: 6.66%;" class="january-paper-pps-actual-target"></td>
                                                        <td style="width: 6.66%;" class="february-paper-pps-actual-target"></td>
                                                        <td style="width: 6.66%;" class="march-paper-pps-actual-target"></td>
                                                        <td style="width: 6.66%;" class="total-paper-pps-actual-target"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                        {{-- <td style="width: 6.66%;"></td> --}}
                                                        <td style="width: 6.66%;" class="april-paper-pps-tricolor"></td>
                                                        <td style="width: 6.66%;" class="may-paper-pps-tricolor"></td>
                                                        <td style="width: 6.66%;" class="june-paper-pps-tricolor"></td>
                                                        <td style="width: 6.66%;" class="july-paper-pps-tricolor"></td>
                                                        <td style="width: 6.66%;" class="august-paper-pps-tricolor"></td>
                                                        <td style="width: 6.66%;" class="september-paper-pps-tricolor"></td>
                                                        <td style="width: 6.66%;" class="october-paper-pps-tricolor"></td>
                                                        <td style="width: 6.66%;" class="november-paper-pps-tricolor"></td>
                                                        <td style="width: 6.66%;" class="december-paper-pps-tricolor"></td>
                                                        <td style="width: 6.66%;" class="january-paper-pps-tricolor"></td>
                                                        <td style="width: 6.66%;" class="february-paper-pps-tricolor"></td>
                                                        <td style="width: 6.66%;" class="march-paper-pps-tricolor"></td>
                                                        <td style="width: 6.66%;" class="total-paper-pps-tricolor"></td>
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

                        if(paperTargetApril == 0 || paperActualApril == 0) {
                            $('.april-paper-actual-target').html('-');
                        } else {
                            var aprilDifference = paperTargetApril - paperActualApril;
                            var aprilDifference = aprilDifference.toFixed(2);
                            $('.april-paper-actual-target').html(aprilDifference);

                            if(aprilDifference < 0) {
                                $('.may-paper-actual-target').html(aprilDifference);
                                $('.may-paper-actual-target').css('color', 'red');
                            } else {
                                $('.may-paper-actual-target').html(aprilDifference);
                            }
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

                        if(paperTargetMay == 0 || paperActualMay == 0) {
                            $('.may-paper-actual-target').html('-');
                        } else {
                            var mayDifference = paperTargetMay - paperActualMay;
                            var mayDifference = mayDifference.toFixed(2);

                            if(mayDifference < 0) {
                                $('.may-paper-actual-target').html(mayDifference);
                                $('.may-paper-actual-target').css('color', 'red');
                            } else {
                                $('.may-paper-actual-target').html(mayDifference);
                            }
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

                        if(paperTargetJune == 0 || paperActualJune == 0) {
                            $('.june-paper-actual-target').html('-');
                        } else {
                            var juneDifference = paperTargetJune - paperActualJune;
                            var juneDifference = juneDifference.toFixed(2);

                            if(juneDifference < 0) {
                                $('.june-paper-actual-target').html(juneDifference);
                                $('.june-paper-actual-target').css('color', 'red');
                            } else {
                                $('.june-paper-actual-target').html(juneDifference);
                            }
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

                        if(paperTargetJuly == 0 || paperActualJuly == 0) {
                            $('.july-paper-actual-target').html('-');
                        } else {
                            var julyDifference = paperTargetJuly - paperActualJuly;
                            var julyDifference = julyDifference.toFixed(2);

                            if(julyDifference < 0) {
                                $('.july-paper-actual-target').html(julyDifference);
                                $('.july-paper-actual-target').css('color', 'red');
                            } else {
                                $('.july-paper-actual-target').html(julyDifference);
                            }
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

                        if(paperTargetAugust == 0 || paperActualAugust == 0) {
                            $('.august-paper-actual-target').html('-');
                        } else {
                            var augustDifference = paperTargetAugust - paperActualAugust;
                            var augustDifference = augustDifference.toFixed(2);

                            if(augustDifference < 0) {
                                $('.august-paper-actual-target').html(augustDifference);
                                $('.august-paper-actual-target').css('color', 'red');
                            } else {
                                $('.august-paper-actual-target').html(augustDifference);
                            }
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

                        if(paperTargetSeptember == 0 || paperActualSeptember == 0) {
                            $('.september-paper-actual-target').html('-');
                        } else {
                            var septemberDifference = paperTargetSeptember - paperActualSeptember;
                            var septemberDifference = septemberDifference.toFixed(2);

                            if(septemberDifference < 0) {
                                $('.september-paper-actual-target').html(septemberDifference);
                                $('.september-paper-actual-target').css('color', 'red');
                            } else {
                                $('.september-paper-actual-target').html(septemberDifference);
                            }
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

                        if(paperTargetOctober == 0 || paperActualOctober == 0) {
                            $('.october-paper-actual-target').html('-');
                        } else {
                            var octoberDifference = paperTargetOctober - paperActualOctober;
                            var octoberDifference = octoberDifference.toFixed(2);

                            if(octoberDifference < 0) {
                                $('.october-paper-actual-target').html(octoberDifference);
                                $('.october-paper-actual-target').css('color', 'red');
                            } else {
                                $('.october-paper-actual-target').html(octoberDifference);
                            }
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


                        if(paperTargetNovember == 0 || paperActualNovember == 0) {
                            $('.november-paper-actual-target').html('-');
                        } else {
                            var novemberDifference = paperTargetNovember - paperActualNovember;
                            var novemberDifference = novemberDifference.toFixed(2);

                            if(novemberDifference < 0) {
                                $('.november-paper-actual-target').html(novemberDifference);
                                $('.november-paper-actual-target').css('color', 'red');
                            } else {
                                $('.november-paper-actual-target').html(novemberDifference);
                            }
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

                        if(paperTargetDecember == 0 || paperActualDecember == 0) {
                            $('.december-paper-actual-target').html('-');
                        } else {
                            var decemberDifference = paperTargetDecember - paperActualDecember;
                            var decemberDifference = decemberDifference.toFixed(2);

                            if(decemberDifference < 0) {
                                $('.december-paper-actual-target').html(decemberDifference);
                                $('.december-paper-actual-target').css('color', 'red');
                            } else {
                                $('.december-paper-actual-target').html(decemberDifference);
                            }
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

                        if(paperTargetJanuary == 0 || paperActualJanuary == 0) {
                            $('.january-paper-actual-target').html('-');
                        } else {
                            var januaryDifference = paperTargetJanuary - paperActualJanuary;
                            var januaryDifference = januaryDifference.toFixed(2);

                            if(januaryDifference < 0) {
                                $('.january-paper-actual-target').html(januaryDifference);
                                $('.january-paper-actual-target').css('color', 'red');
                            } else {
                                $('.january-paper-actual-target').html(januaryDifference);
                            }
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

                        if(paperTargetFebruary == 0 || paperActualFebruary == 0) {
                            $('.february-paper-actual-target').html('-');
                        } else {
                            var februaryDifference = paperTargetFebruary - paperActualFebruary;
                            var februaryDifference = februaryDifference.toFixed(2);

                            if(februaryDifference < 0) {
                                $('.february-paper-actual-target').html(februaryDifference);
                                $('.february-paper-actual-target').css('color', 'red');
                            } else {
                                $('.february-paper-actual-target').html(februaryDifference);
                            }
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


                        if(paperTargetMarch == 0 || paperActualMarch == 0) {
                            $('.march-paper-actual-target').html('-');
                        } else {
                            var marchDifference = paperTargetMarch - paperActualMarch;
                            var marchDifference = marchDifference.toFixed(2);

                            if(marchDifference < 0) {
                                $('.march-paper-actual-target').html(marchDifference);
                                $('.march-paper-actual-target').css('color', 'red');
                            } else {
                                $('.march-paper-actual-target').html(marchDifference);
                            }
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


                        if(paperTargetTotal == 0 || paperActualTotal == 0) {
                            $('.total-paper-actual-target').html('-');
                        } else {
                            var totalDifference = paperTargetTotal - paperActualTotal;
                            var totalDifference = totalDifference.toFixed(2);

                            if(totalDifference < 0) {
                                $('.total-paper-actual-target').html(totalDifference);
                                $('.total-paper-actual-target').css('color', 'red');
                                $('.total-paper-tricolor').html(totalDifference);
                                $('.total-paper-tricolor').css('color', 'red');
                            } else {
                                $('.total-paper-actual-target').html(totalDifference);
                                $('.total-paper-tricolor').html(totalDifference);

                            }
                        }

                    //===== BASED ON EXCEL COMPUTATION ==============
                    //===== SUBTRACT PAPER TARGET FOR APRIL FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR APRIL ==============
                    var aprilTricolor = paperTargetTotal - paperTargetApril + paperActualApril;
                    var aprilTricolor =  Number(aprilTricolor.toFixed(2));
                    //===== SUBTRACT PAPER TARGET FOR APRIL FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR APRIL ==============

                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY) ==============
                    var aprilMayTarget =  paperTargetApril + paperTargetMay;
                    var aprilMayTarget =  Number(aprilMayTarget.toFixed(2));

                    var aprilMayActual =  paperActualApril + paperActualMay;
                    var aprilMayActual =  Number(aprilMayActual.toFixed(2));


                    var mayTricolor = paperTargetTotal - aprilMayTarget + aprilMayActual;
                    var mayTricolor =  Number(mayTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE) ==============
                    var aprilMayJuneTarget =  paperTargetApril + paperTargetMay + paperTargetJune;
                    var aprilMayJuneTarget =  Number(aprilMayJuneTarget.toFixed(2));

                    var aprilMayJuneActual =  paperActualApril + paperActualMay + paperActualJune;
                    var aprilMayJuneActual =  Number(aprilMayJuneActual.toFixed(2));

                    var juneTricolor = paperTargetTotal - aprilMayJuneTarget + aprilMayJuneActual;
                    var juneTricolor =  Number(juneTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE +JULY) ==============
                    var aprilMayJuneJulyTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly;
                    var aprilMayJuneJulyTarget =  Number(aprilMayJuneJulyTarget.toFixed(2));

                    var aprilMayJuneJulyActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly;
                    var aprilMayJuneJulyActual =  Number(aprilMayJuneJulyActual.toFixed(2));

                    var julyTricolor = paperTargetTotal - aprilMayJuneJulyTarget + aprilMayJuneJulyActual;
                    var julyTricolor =  Number(julyTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST) ==============
                    var aprilMayJuneJulyAugustTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust;
                    var aprilMayJuneJulyAugustTarget =  Number(aprilMayJuneJulyAugustTarget.toFixed(2));

                    var aprilMayJuneJulyAugustActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust;
                    var aprilMayJuneJulyAugustActual =  Number(aprilMayJuneJulyAugustActual.toFixed(2));

                    var augustTricolor = paperTargetTotal - aprilMayJuneJulyAugustTarget + aprilMayJuneJulyAugustActual;
                    var augustTricolor =  Number(augustTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST + SEPTEMBER) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST + SEPTEMBER) ==============
                    var aprilMayJuneJulyAugustSeptemberTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember;
                    var aprilMayJuneJulyAugustSeptemberTarget =  Number(aprilMayJuneJulyAugustSeptemberTarget.toFixed(2));

                    var aprilMayJuneJulyAugustSeptemberActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember;
                    var aprilMayJuneJulyAugustSeptemberActual =  Number(aprilMayJuneJulyAugustSeptemberActual.toFixed(2));

                    var septemberTricolor = paperTargetTotal - aprilMayJuneJulyAugustSeptemberTarget + aprilMayJuneJulyAugustSeptemberActual;
                    var septemberTricolor =  Number(septemberTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST + SEPTEMBER + OCTOBER) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST + SEPTEMBER + OCTOBER) ==============
                    var aprilMayJuneJulyAugustSeptemberOctoberTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember + paperTargetOctober;
                    var aprilMayJuneJulyAugustSeptemberOctoberTarget =  Number(aprilMayJuneJulyAugustSeptemberOctoberTarget.toFixed(2));

                    var aprilMayJuneJulyAugustSeptemberOctoberActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember + paperActualOctober;
                    var aprilMayJuneJulyAugustSeptemberOctoberActual =  Number(aprilMayJuneJulyAugustSeptemberOctoberActual.toFixed(2));

                    var octoberTricolor = paperTargetTotal - aprilMayJuneJulyAugustSeptemberOctoberTarget + aprilMayJuneJulyAugustSeptemberOctoberActual;
                    var octoberTricolor =  Number(octoberTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER) ==============
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember + paperTargetOctober + paperTargetNovember;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberTarget =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberTarget.toFixed(2));

                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember + paperActualOctober + paperActualNovember;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberActual =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberActual.toFixed(2));

                    var novemberTricolor = paperTargetTotal - aprilMayJuneJulyAugustSeptemberOctoberNovemberTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberActual;
                    var novemberTricolor =  Number(novemberTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER) ==============
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember + paperTargetOctober + paperTargetNovember + paperTargetDecember;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberTarget =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberTarget.toFixed(2));

                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember + paperActualOctober + paperActualNovember + paperActualDecember;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberActual =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberActual.toFixed(2));

                    var decemberTricolor = paperTargetTotal - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberActual;
                    var decemberTricolor =  Number(decemberTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER + JANUARY) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER + JANUARY) ==============
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember + paperTargetOctober + paperTargetNovember + paperTargetDecember + paperTargetJanuary;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryTarget =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryTarget.toFixed(2));

                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember + paperActualOctober + paperActualNovember + paperActualDecember + paperActualJanuary;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryActual =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryActual.toFixed(2));

                    var januaryTricolor = paperTargetTotal - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryActual;
                    var januaryTricolor =  Number(januaryTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER + JANUARY + FEBRUARY) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER + JANUARY + FEBRUARY) ==============
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember + paperTargetOctober + paperTargetNovember + paperTargetDecember + paperTargetJanuary + paperTargetFebruary;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryTarget =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryTarget.toFixed(2));

                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember + paperActualOctober + paperActualNovember + paperActualDecember + paperActualJanuary + paperActualFebruary;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryActual =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryActual.toFixed(2));

                    var februaryTricolor = paperTargetTotal - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryActual;
                    var februaryTricolor =  Number(februaryTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER + JANUARY + FEBRUARY + MARCH) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER + JANUARY + FEBRUARY + MARCH) ==============
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember + paperTargetOctober + paperTargetNovember + paperTargetDecember + paperTargetJanuary + paperTargetFebruary + paperTargetMarch;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchTarget =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchTarget.toFixed(2));

                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember + paperActualOctober + paperActualNovember + paperActualDecember + paperActualJanuary + paperActualFebruary + paperActualMarch;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchActual =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchActual.toFixed(2));

                    var marchTricolor = paperTargetTotal - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchActual;
                    var marchTricolor =  Number(marchTricolor.toFixed(2));


                    var totalTricolor = '';

                
                        if(aprilTricolor != 0) {
                            $('.april-paper-tricolor').html(aprilTricolor);
                        } else {
                            $('.april-paper-tricolor').html('-');
                        }


                        if(mayTricolor != 0) {
                            $('.may-paper-tricolor').html(mayTricolor);
                        } else {
                            $('.may-paper-tricolor').html('-');
                        }
                    

                        if(juneTricolor != 0) {
                            $('.june-paper-tricolor').html(juneTricolor);
                        } else {
                            $('.june-paper-tricolor').html('-');
                        }

                        if(julyTricolor != 0) {
                            $('.july-paper-tricolor').html(julyTricolor);
                        } else {
                            $('.july-paper-tricolor').html('-');
                        }

                        if(augustTricolor != 0) {
                            $('.august-paper-tricolor').html(augustTricolor);
                        } else {
                            $('.august-paper-tricolor').html('-');
                        }

                        if(septemberTricolor != 0) {
                            $('.september-paper-tricolor').html(septemberTricolor);
                        } else {
                            $('.september-paper-tricolor').html('-');
                        }

                        if(octoberTricolor != 0) {
                            $('.october-paper-tricolor').html(octoberTricolor);
                        } else {
                            $('.october-paper-tricolor').html('-');
                        }

                        if(novemberTricolor != 0) {
                            $('.november-paper-tricolor').html(novemberTricolor);
                        } else {
                            $('.november-paper-tricolor').html('-');
                        }


                        if(decemberTricolor != 0) {
                            $('.december-paper-tricolor').html(decemberTricolor);
                        } else {
                            $('.december-paper-tricolor').html('-');
                        }

                        if(januaryTricolor != 0) {
                            $('.january-paper-tricolor').html(januaryTricolor);
                        } else {
                            $('.january-paper-tricolor').html('-');
                        }

                        if(februaryTricolor != 0) {
                            $('.february-paper-tricolor').html(februaryTricolor);
                        } else {
                            $('.february-paper-tricolor').html('-');
                        }

                        if(marchTricolor != 0) {
                            $('.march-paper-tricolor').html(marchTricolor);
                        } else {
                            $('.march-paper-tricolor').html('-');
                        }


                        // if(totalTricolor != 0) {
                        //     $('.total-paper-tricolor').html(totalDifference);
                        // } else {
                        //     $('.total-paper-tricolor').html('-');
                        // }
 
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

            GetCurrentFYPaperDataTS();

            $('#selFiscalYearPaperTS').on('change', function() {
                $('.selectYearPaperTS').val($(this).find(":selected").val());
                $('.selectYearPaperTS').val();

                GetCurrentFYPaperDataTS();
                    
                dataTablePaperConsumptionsTS.draw();
            });

            GetCurrentFYPaperDataCN();

            $('#selFiscalYearPaperCN').on('change', function() {
                $('.selectYearPaperCN').val($(this).find(":selected").val());
                $('.selectYearPaperCN').val();

                GetCurrentFYPaperDataCN();
                    
                dataTablePaperConsumptionsCN.draw();
            });

            GetCurrentFYPaperDataPPS();

            $('#selFiscalYearPaperPPS').on('change', function() {
                $('.selectYearPaperPPS').val($(this).find(":selected").val());
                $('.selectYearPaperPPS').val();

                GetCurrentFYPaperDataPPS();
                    
                dataTablePaperConsumptionsPPS.draw();
            });


            GetCurrentFYPaperDataYF();

            $('#selFiscalYearPaperYF').on('change', function() {
                $('.selectYearPaperYF').val($(this).find(":selected").val());
                $('.selectYearPaperYF').val();

                GetCurrentFYPaperDataYF();
                    
                dataTablePaperConsumptionsYF.draw();
            });

            //===== DATATABLES OF PAPER CONSUMPTION ================
            var dataTablePaperConsumptions = $("#tblViewPaperConsumption").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF PAPER CONSUMPTION END ================

            //===== DATATABLES OF PAPER TS CONSUMPTION ================
             var dataTablePaperConsumptionsTS = $("#tblViewPaperConsumptionTS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF PAPER TS CONSUMPTION END ================


            //===== DATATABLES OF PAPER CN CONSUMPTION ================
            var dataTablePaperConsumptionsCN = $("#tblViewPaperConsumptionCN").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF PAPER CN CONSUMPTION END ================


             //===== DATATABLES OF PAPER YF CONSUMPTION ================
             var dataTablePaperConsumptionsYF = $("#tblViewPaperConsumptionYF").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF PAPER YF CONSUMPTION END ================


            //===== DATATABLES OF PAPER PPS CONSUMPTION ================
            var dataTablePaperConsumptionsPPS = $("#tblViewPaperConsumptionPPS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF PAPER PPS CONSUMPTION END ================
        });
    </script>
@endsection
