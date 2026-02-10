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
                                <h4>Ink Consumption - Dashboard</h4>
                            </div>

                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item inkConsumptionBOD" style="display: none;">
                                        <a class="nav-link" id="ink_bod-tab" data-toggle="tab" href="#ink_bod" role="tab" aria-controls="ink_bod" aria-selected="true">&nbsp; BOD &nbsp;</a>
                                    </li>

                                    <li class="nav-item inkConsumptionIAS" style="display: none;">
                                        <a class="nav-link" id="ink_ias-tab" data-toggle="tab" href="#ink_ias" role="tab" aria-controls="ink_ais" aria-selected="false">&nbsp; IAS &nbsp;</a>
                                    </li>

                                    <li class="nav-item inkConsumptionFIN" style="display: none;">
                                        <a class="nav-link" id="ink_fin-tab" data-toggle="tab" href="#ink_fin" role="tab" aria-controls="ink_fin" aria-selected="false">&nbsp; FIN &nbsp;</a>
                                    </li>

                                    <li class="nav-item inkConsumptionHRD" style="display: none;">
                                        <a class="nav-link" id="ink_hrd-tab" data-toggle="tab" href="#ink_hrd" role="tab" aria-controls="ink_hrd" aria-selected="false">&nbsp; HRD &nbsp;</a>
                                    </li>

                                    <li class="nav-item inkConsumptionESS" style="display: none;">
                                        <a class="nav-link" id="ink_ess-tab" data-toggle="tab" href="#ink_ess" role="tab" aria-controls="ink_ess" aria-selected="false">&nbsp; ESS &nbsp;</a>
                                    </li>

                                    <li class="nav-item inkConsumptionLOG" style="display: none;">
                                        <a class="nav-link" id="ink_log-tab" data-toggle="tab" href="#ink_log" role="tab" aria-controls="ink_log" aria-selected="false">&nbsp; LOG &nbsp;</a>
                                    </li>

                                    <li class="nav-item inkConsumptionFAC" style="display: none;">
                                        <a class="nav-link" id="ink_fac-tab" data-toggle="tab" href="#ink_fac" role="tab" aria-controls="ink_fac" aria-selected="false">&nbsp; FAC &nbsp;</a>
                                    </li>

                                    <li class="nav-item inkConsumptionISS" style="display: none;">
                                        <a class="nav-link" id="ink_iss-tab" data-toggle="tab" href="#ink_iss" role="tab" aria-controls="ink_iss" aria-selected="false">&nbsp; ISS &nbsp;</a>
                                    </li>

                                    <li class="nav-item inkConsumptionQAD" style="display: none;">
                                        <a class="nav-link" id="ink_qad-tab" data-toggle="tab" href="#ink_qad" role="tab" aria-controls="ink_qad" aria-selected="false">&nbsp; QAD &nbsp;</a>
                                    </li>

                                    <li class="nav-item inkConsumptionEMS" style="display: none;">
                                        <a class="nav-link" id="ink_ems-tab" data-toggle="tab" href="#ink_ems" role="tab" aria-controls="ink_ems" aria-selected="false">&nbsp; EMS &nbsp;</a>
                                    </li>

                                    <li class="nav-item inkConsumptionTS" style="display: none;">
                                        <a class="nav-link" id="ink_ts-tab" data-toggle="tab" href="#ink_ts" role="tab" aria-controls="ink_ts" aria-selected="false">&nbsp; TS &nbsp;</a>
                                    </li>

                                    <li class="nav-item inkConsumptionCN" style="display: none;">
                                        <a class="nav-link" id="ink_cn-tab" data-toggle="tab" href="#ink_cn" role="tab" aria-controls="ink_cn" aria-selected="false">&nbsp; CN &nbsp;</a>
                                    </li>

                                    <li class="nav-item inkConsumptionYF" style="display: none;">
                                        <a class="nav-link" id="ink_yf-tab" data-toggle="tab" href="#ink_yf" role="tab" aria-controls="ink_yf" aria-selected="false">&nbsp; YF &nbsp;</a>
                                    </li>

                                    <li class="nav-item inkConsumptionPPS" style="display: none;">
                                        <a class="nav-link" id="ink_pps-tab" data-toggle="tab" href="#ink_pps" role="tab" aria-controls="ink_pps" aria-selected="false">&nbsp; PPS &nbsp;</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">

                                        <!-- DASHBOARD INK BOD TAB -->
                                        <div class="tab-pane fade" id="ink_bod" role="tabpanel" aria-labelledby="ink_bod-tab">
                                            <h5 class="mt-3 ml-2">Ink Consumption - BOD</h5>
                                            <div class="text-left mt-4 d-flex flex-row">
                                                <div class="form-group ml-3 col-2">
                                                    <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearInkBOD" name="fiscal_year" id="selFiscalYearInkBOD" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                </div>
                                            </div><br>

                                            <div class="table-responsive">
                                                <table id="tblViewInkConsumptionBOD" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 6.66%;">Ink Consumption</th>
                                                            {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                            <th class="april-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                            <th class="may-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                            <th class="june-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                            <th class="july-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                            <th class="august-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                            <th class="september-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                            <th class="october-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                            <th class="november-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                            <th class="december-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                            <th class="january-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                            <th class="february-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                            <th class="march-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                            <th style="width: 6.66%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 6.66%;">Target</td>
                                                            {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="may-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="june-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="july-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="august-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="september-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="october-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="november-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="december-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="january-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="february-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="march-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="total-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Actual</td>
                                                            {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="may-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="june-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="july-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="august-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="september-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="october-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="november-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="december-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="january-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="february-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="march-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="total-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">|</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-bod-actual-target"></td>
                                                            <td style="width: 6.66%;" class="may-ink-bod-actual-target"></td>
                                                            <td style="width: 6.66%;" class="june-ink-bod-actual-target"></td>
                                                            <td style="width: 6.66%;" class="july-ink-bod-actual-target"></td>
                                                            <td style="width: 6.66%;" class="august-ink-bod-actual-target"></td>
                                                            <td style="width: 6.66%;" class="september-ink-bod-actual-target"></td>
                                                            <td style="width: 6.66%;" class="october-ink-bod-actual-target"></td>
                                                            <td style="width: 6.66%;" class="november-ink-bod-actual-target"></td>
                                                            <td style="width: 6.66%;" class="december-ink-bod-actual-target"></td>
                                                            <td style="width: 6.66%;" class="january-ink-bod-actual-target"></td>
                                                            <td style="width: 6.66%;" class="february-ink-bod-actual-target"></td>
                                                            <td style="width: 6.66%;" class="march-ink-bod-actual-target"></td>
                                                            <td style="width: 6.66%;" class="total-ink-bod-actual-target"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-bod-tricolor"></td>
                                                            <td style="width: 6.66%;" class="may-ink-bod-tricolor"></td>
                                                            <td style="width: 6.66%;" class="june-ink-bod-tricolor"></td>
                                                            <td style="width: 6.66%;" class="july-ink-bod-tricolor"></td>
                                                            <td style="width: 6.66%;" class="august-ink-bod-tricolor"></td>
                                                            <td style="width: 6.66%;" class="september-ink-bod-tricolor"></td>
                                                            <td style="width: 6.66%;" class="october-ink-bod-tricolor"></td>
                                                            <td style="width: 6.66%;" class="november-ink-bod-tricolor"></td>
                                                            <td style="width: 6.66%;" class="december-ink-bod-tricolor"></td>
                                                            <td style="width: 6.66%;" class="january-ink-bod-tricolor"></td>
                                                            <td style="width: 6.66%;" class="february-ink-bod-tricolor"></td>
                                                            <td style="width: 6.66%;" class="march-ink-bod-tricolor"></td>
                                                            <td style="width: 6.66%;" class="total-ink-bod-tricolor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- DASHBOARD INK BOD TAB END -->

                                        <!-- DASHBOARD INK IAS TAB -->
                                        <div class="tab-pane fade" id="ink_ias" role="tabpanel" aria-labelledby="ink_ias-tab">
                                            <h5 class="mt-3 ml-2">Ink Consumption - IAS</h5>
                                            <div class="text-left mt-4 d-flex flex-row">
                                                <div class="form-group ml-3 col-2">
                                                    <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearInkIAS" name="fiscal_year" id="selFiscalYearInkIAS" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                </div>
                                            </div><br>

                                            <div class="table-responsive">
                                                <table id="tblViewInkConsumptionIAS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 6.66%;">Ink Consumption</th>
                                                            {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                            <th class="april-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                            <th class="may-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                            <th class="june-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                            <th class="july-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                            <th class="august-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                            <th class="september-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                            <th class="october-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                            <th class="november-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                            <th class="december-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                            <th class="january-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                            <th class="february-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                            <th class="march-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                            <th style="width: 6.66%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 6.66%;">Target</td>
                                                            {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="may-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="june-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="july-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="august-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="september-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="october-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="november-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="december-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="january-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="february-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="march-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="total-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Actual</td>
                                                            {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="may-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="june-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="july-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="august-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="september-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="october-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="november-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="december-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="january-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="february-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="march-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="total-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">|</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-ias-actual-target"></td>
                                                            <td style="width: 6.66%;" class="may-ink-ias-actual-target"></td>
                                                            <td style="width: 6.66%;" class="june-ink-ias-actual-target"></td>
                                                            <td style="width: 6.66%;" class="july-ink-ias-actual-target"></td>
                                                            <td style="width: 6.66%;" class="august-ink-ias-actual-target"></td>
                                                            <td style="width: 6.66%;" class="september-ink-ias-actual-target"></td>
                                                            <td style="width: 6.66%;" class="october-ink-ias-actual-target"></td>
                                                            <td style="width: 6.66%;" class="november-ink-ias-actual-target"></td>
                                                            <td style="width: 6.66%;" class="december-ink-ias-actual-target"></td>
                                                            <td style="width: 6.66%;" class="january-ink-ias-actual-target"></td>
                                                            <td style="width: 6.66%;" class="february-ink-ias-actual-target"></td>
                                                            <td style="width: 6.66%;" class="march-ink-ias-actual-target"></td>
                                                            <td style="width: 6.66%;" class="total-ink-ias-actual-target"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-ias-tricolor"></td>
                                                            <td style="width: 6.66%;" class="may-ink-ias-tricolor"></td>
                                                            <td style="width: 6.66%;" class="june-ink-ias-tricolor"></td>
                                                            <td style="width: 6.66%;" class="july-ink-ias-tricolor"></td>
                                                            <td style="width: 6.66%;" class="august-ink-ias-tricolor"></td>
                                                            <td style="width: 6.66%;" class="september-ink-ias-tricolor"></td>
                                                            <td style="width: 6.66%;" class="october-ink-ias-tricolor"></td>
                                                            <td style="width: 6.66%;" class="november-ink-ias-tricolor"></td>
                                                            <td style="width: 6.66%;" class="december-ink-ias-tricolor"></td>
                                                            <td style="width: 6.66%;" class="january-ink-ias-tricolor"></td>
                                                            <td style="width: 6.66%;" class="february-ink-ias-tricolor"></td>
                                                            <td style="width: 6.66%;" class="march-ink-ias-tricolor"></td>
                                                            <td style="width: 6.66%;" class="total-ink-ias-tricolor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- DASHBOARD INK IAS TAB END -->

                                        <!-- DASHBOARD INK FIN TAB -->
                                        <div class="tab-pane fade" id="ink_fin" role="tabpanel" aria-labelledby="ink_fin-tab">
                                            <h5 class="mt-3 ml-2">Ink Consumption - FIN</h5>
                                            <div class="text-left mt-4 d-flex flex-row">
                                                <div class="form-group ml-3 col-2">
                                                    <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearInkFIN" name="fiscal_year" id="selFiscalYearInkFIN" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                </div>
                                            </div><br>

                                            <div class="table-responsive">
                                                <table id="tblViewInkConsumptionFIN" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 6.66%;">Ink Consumption</th>
                                                            {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                            <th class="april-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                            <th class="may-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                            <th class="june-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                            <th class="july-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                            <th class="august-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                            <th class="september-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                            <th class="october-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                            <th class="november-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                            <th class="december-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                            <th class="january-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                            <th class="february-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                            <th class="march-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                            <th style="width: 6.66%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 6.66%;">Target</td>
                                                            {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="may-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="june-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="july-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="august-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="september-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="october-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="november-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="december-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="january-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="february-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="march-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="total-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Actual</td>
                                                            {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="may-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="june-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="july-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="august-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="september-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="october-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="november-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="december-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="january-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="february-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="march-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="total-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">|</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-fin-actual-target"></td>
                                                            <td style="width: 6.66%;" class="may-ink-fin-actual-target"></td>
                                                            <td style="width: 6.66%;" class="june-ink-fin-actual-target"></td>
                                                            <td style="width: 6.66%;" class="july-ink-fin-actual-target"></td>
                                                            <td style="width: 6.66%;" class="august-ink-fin-actual-target"></td>
                                                            <td style="width: 6.66%;" class="september-ink-fin-actual-target"></td>
                                                            <td style="width: 6.66%;" class="october-ink-fin-actual-target"></td>
                                                            <td style="width: 6.66%;" class="november-ink-fin-actual-target"></td>
                                                            <td style="width: 6.66%;" class="december-ink-fin-actual-target"></td>
                                                            <td style="width: 6.66%;" class="january-ink-fin-actual-target"></td>
                                                            <td style="width: 6.66%;" class="february-ink-fin-actual-target"></td>
                                                            <td style="width: 6.66%;" class="march-ink-fin-actual-target"></td>
                                                            <td style="width: 6.66%;" class="total-ink-fin-actual-target"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-fin-tricolor"></td>
                                                            <td style="width: 6.66%;" class="may-ink-fin-tricolor"></td>
                                                            <td style="width: 6.66%;" class="june-ink-fin-tricolor"></td>
                                                            <td style="width: 6.66%;" class="july-ink-fin-tricolor"></td>
                                                            <td style="width: 6.66%;" class="august-ink-fin-tricolor"></td>
                                                            <td style="width: 6.66%;" class="september-ink-fin-tricolor"></td>
                                                            <td style="width: 6.66%;" class="october-ink-fin-tricolor"></td>
                                                            <td style="width: 6.66%;" class="november-ink-fin-tricolor"></td>
                                                            <td style="width: 6.66%;" class="december-ink-fin-tricolor"></td>
                                                            <td style="width: 6.66%;" class="january-ink-fin-tricolor"></td>
                                                            <td style="width: 6.66%;" class="february-ink-fin-tricolor"></td>
                                                            <td style="width: 6.66%;" class="march-ink-fin-tricolor"></td>
                                                            <td style="width: 6.66%;" class="total-ink-fin-tricolor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- DASHBOARD INK FIN TAB END -->

                                        <!-- DASHBOARD INK HRD TAB -->
                                        <div class="tab-pane fade" id="ink_hrd" role="tabpanel" aria-labelledby="ink_hrd-tab">
                                            <h5 class="mt-3 ml-2">Ink Consumption - HRD</h5>
                                            <div class="text-left mt-4 d-flex flex-row">
                                                <div class="form-group ml-3 col-2">
                                                    <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearInkHRD" name="fiscal_year" id="selFiscalYearInkHRD" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                </div>
                                            </div><br>

                                            <div class="table-responsive">
                                                <table id="tblViewInkConsumptionHRD" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 6.66%;">Ink Consumption</th>
                                                            {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                            <th class="april-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                            <th class="may-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                            <th class="june-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                            <th class="july-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                            <th class="august-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                            <th class="september-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                            <th class="october-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                            <th class="november-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                            <th class="december-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                            <th class="january-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                            <th class="february-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                            <th class="march-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                            <th style="width: 6.66%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 6.66%;">Target</td>
                                                            {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="may-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="june-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="july-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="august-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="september-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="october-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="november-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="december-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="january-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="february-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="march-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="total-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Actual</td>
                                                            {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="may-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="june-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="july-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="august-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="september-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="october-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="november-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="december-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="january-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="february-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="march-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="total-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">|</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-hrd-actual-target"></td>
                                                            <td style="width: 6.66%;" class="may-ink-hrd-actual-target"></td>
                                                            <td style="width: 6.66%;" class="june-ink-hrd-actual-target"></td>
                                                            <td style="width: 6.66%;" class="july-ink-hrd-actual-target"></td>
                                                            <td style="width: 6.66%;" class="august-ink-hrd-actual-target"></td>
                                                            <td style="width: 6.66%;" class="september-ink-hrd-actual-target"></td>
                                                            <td style="width: 6.66%;" class="october-ink-hrd-actual-target"></td>
                                                            <td style="width: 6.66%;" class="november-ink-hrd-actual-target"></td>
                                                            <td style="width: 6.66%;" class="december-ink-hrd-actual-target"></td>
                                                            <td style="width: 6.66%;" class="january-ink-hrd-actual-target"></td>
                                                            <td style="width: 6.66%;" class="february-ink-hrd-actual-target"></td>
                                                            <td style="width: 6.66%;" class="march-ink-hrd-actual-target"></td>
                                                            <td style="width: 6.66%;" class="total-ink-hrd-actual-target"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-hrd-tricolor"></td>
                                                            <td style="width: 6.66%;" class="may-ink-hrd-tricolor"></td>
                                                            <td style="width: 6.66%;" class="june-ink-hrd-tricolor"></td>
                                                            <td style="width: 6.66%;" class="july-ink-hrd-tricolor"></td>
                                                            <td style="width: 6.66%;" class="august-ink-hrd-tricolor"></td>
                                                            <td style="width: 6.66%;" class="september-ink-hrd-tricolor"></td>
                                                            <td style="width: 6.66%;" class="october-ink-hrd-tricolor"></td>
                                                            <td style="width: 6.66%;" class="november-ink-hrd-tricolor"></td>
                                                            <td style="width: 6.66%;" class="december-ink-hrd-tricolor"></td>
                                                            <td style="width: 6.66%;" class="january-ink-hrd-tricolor"></td>
                                                            <td style="width: 6.66%;" class="february-ink-hrd-tricolor"></td>
                                                            <td style="width: 6.66%;" class="march-ink-hrd-tricolor"></td>
                                                            <td style="width: 6.66%;" class="total-ink-hrd-tricolor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- DASHBOARD INK HRD TAB END -->

                                        <!-- DASHBOARD INK ESS TAB -->
                                        <div class="tab-pane fade" id="ink_ess" role="tabpanel" aria-labelledby="ink_ess-tab">
                                            <h5 class="mt-3 ml-2">Ink Consumption - ESS</h5>
                                            <div class="text-left mt-4 d-flex flex-row">
                                                <div class="form-group ml-3 col-2">
                                                    <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearInkESS" name="fiscal_year" id="selFiscalYearInkESS" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                </div>
                                            </div><br>

                                            <div class="table-responsive">
                                                <table id="tblViewInkConsumptionESS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 6.66%;">Ink Consumption</th>
                                                            {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                            <th class="april-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                            <th class="may-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                            <th class="june-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                            <th class="july-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                            <th class="august-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                            <th class="september-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                            <th class="october-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                            <th class="november-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                            <th class="december-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                            <th class="january-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                            <th class="february-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                            <th class="march-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                            <th style="width: 6.66%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 6.66%;">Target</td>
                                                            {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="may-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="june-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="july-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="august-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="september-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="october-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="november-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="december-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="january-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="february-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="march-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="total-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Actual</td>
                                                            {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="may-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="june-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="july-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="august-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="september-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="october-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="november-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="december-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="january-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="february-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="march-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="total-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">|</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-ess-actual-target"></td>
                                                            <td style="width: 6.66%;" class="may-ink-ess-actual-target"></td>
                                                            <td style="width: 6.66%;" class="june-ink-ess-actual-target"></td>
                                                            <td style="width: 6.66%;" class="july-ink-ess-actual-target"></td>
                                                            <td style="width: 6.66%;" class="august-ink-ess-actual-target"></td>
                                                            <td style="width: 6.66%;" class="september-ink-ess-actual-target"></td>
                                                            <td style="width: 6.66%;" class="october-ink-ess-actual-target"></td>
                                                            <td style="width: 6.66%;" class="november-ink-ess-actual-target"></td>
                                                            <td style="width: 6.66%;" class="december-ink-ess-actual-target"></td>
                                                            <td style="width: 6.66%;" class="january-ink-ess-actual-target"></td>
                                                            <td style="width: 6.66%;" class="february-ink-ess-actual-target"></td>
                                                            <td style="width: 6.66%;" class="march-ink-ess-actual-target"></td>
                                                            <td style="width: 6.66%;" class="total-ink-ess-actual-target"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-ess-tricolor"></td>
                                                            <td style="width: 6.66%;" class="may-ink-ess-tricolor"></td>
                                                            <td style="width: 6.66%;" class="june-ink-ess-tricolor"></td>
                                                            <td style="width: 6.66%;" class="july-ink-ess-tricolor"></td>
                                                            <td style="width: 6.66%;" class="august-ink-ess-tricolor"></td>
                                                            <td style="width: 6.66%;" class="september-ink-ess-tricolor"></td>
                                                            <td style="width: 6.66%;" class="october-ink-ess-tricolor"></td>
                                                            <td style="width: 6.66%;" class="november-ink-ess-tricolor"></td>
                                                            <td style="width: 6.66%;" class="december-ink-ess-tricolor"></td>
                                                            <td style="width: 6.66%;" class="january-ink-ess-tricolor"></td>
                                                            <td style="width: 6.66%;" class="february-ink-ess-tricolor"></td>
                                                            <td style="width: 6.66%;" class="march-ink-ess-tricolor"></td>
                                                            <td style="width: 6.66%;" class="total-ink-ess-tricolor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- DASHBOARD INK ESS TAB END -->

                                        <!-- DASHBOARD INK LOG TAB -->
                                        <div class="tab-pane fade" id="ink_log" role="tabpanel" aria-labelledby="ink_log-tab">
                                            <h5 class="mt-3 ml-2">Ink Consumption - LOG</h5>
                                            <div class="text-left mt-4 d-flex flex-row">
                                                <div class="form-group ml-3 col-2">
                                                    <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearInkLOG" name="fiscal_year" id="selFiscalYearInkLOG" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                </div>
                                            </div><br>

                                            <div class="table-responsive">
                                                <table id="tblViewInkConsumptionLOG" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 6.66%;">Ink Consumption</th>
                                                            {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                            <th class="april-ink-log-current-fy" style="width: 6.66%;"></th>
                                                            <th class="may-ink-log-current-fy" style="width: 6.66%;"></th>
                                                            <th class="june-ink-log-current-fy" style="width: 6.66%;"></th>
                                                            <th class="july-ink-log-current-fy" style="width: 6.66%;"></th>
                                                            <th class="august-ink-log-current-fy" style="width: 6.66%;"></th>
                                                            <th class="september-ink-log-current-fy" style="width: 6.66%;"></th>
                                                            <th class="october-ink-log-current-fy" style="width: 6.66%;"></th>
                                                            <th class="november-ink-log-current-fy" style="width: 6.66%;"></th>
                                                            <th class="december-ink-log-current-fy" style="width: 6.66%;"></th>
                                                            <th class="january-ink-log-current-fy" style="width: 6.66%;"></th>
                                                            <th class="february-ink-log-current-fy" style="width: 6.66%;"></th>
                                                            <th class="march-ink-log-current-fy" style="width: 6.66%;"></th>
                                                            <th style="width: 6.66%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 6.66%;">Target</td>
                                                            {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="may-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="june-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="july-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="august-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="september-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="october-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="november-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="december-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="january-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="february-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="march-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="total-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Actual</td>
                                                            {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="may-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="june-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="july-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="august-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="september-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="october-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="november-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="december-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="january-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="february-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="march-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="total-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">|</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-log-actual-target"></td>
                                                            <td style="width: 6.66%;" class="may-ink-log-actual-target"></td>
                                                            <td style="width: 6.66%;" class="june-ink-log-actual-target"></td>
                                                            <td style="width: 6.66%;" class="july-ink-log-actual-target"></td>
                                                            <td style="width: 6.66%;" class="august-ink-log-actual-target"></td>
                                                            <td style="width: 6.66%;" class="september-ink-log-actual-target"></td>
                                                            <td style="width: 6.66%;" class="october-ink-log-actual-target"></td>
                                                            <td style="width: 6.66%;" class="november-ink-log-actual-target"></td>
                                                            <td style="width: 6.66%;" class="december-ink-log-actual-target"></td>
                                                            <td style="width: 6.66%;" class="january-ink-log-actual-target"></td>
                                                            <td style="width: 6.66%;" class="february-ink-log-actual-target"></td>
                                                            <td style="width: 6.66%;" class="march-ink-log-actual-target"></td>
                                                            <td style="width: 6.66%;" class="total-ink-log-actual-target"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-log-tricolor"></td>
                                                            <td style="width: 6.66%;" class="may-ink-log-tricolor"></td>
                                                            <td style="width: 6.66%;" class="june-ink-log-tricolor"></td>
                                                            <td style="width: 6.66%;" class="july-ink-log-tricolor"></td>
                                                            <td style="width: 6.66%;" class="august-ink-log-tricolor"></td>
                                                            <td style="width: 6.66%;" class="september-ink-log-tricolor"></td>
                                                            <td style="width: 6.66%;" class="october-ink-log-tricolor"></td>
                                                            <td style="width: 6.66%;" class="november-ink-log-tricolor"></td>
                                                            <td style="width: 6.66%;" class="december-ink-log-tricolor"></td>
                                                            <td style="width: 6.66%;" class="january-ink-log-tricolor"></td>
                                                            <td style="width: 6.66%;" class="february-ink-log-tricolor"></td>
                                                            <td style="width: 6.66%;" class="march-ink-log-tricolor"></td>
                                                            <td style="width: 6.66%;" class="total-ink-log-tricolor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- DASHBOARD INK LOG TAB END -->

                                        <!-- DASHBOARD INK FAC TAB -->
                                        <div class="tab-pane fade" id="ink_fac" role="tabpanel" aria-labelledby="ink_fac-tab">
                                            <h5 class="mt-3 ml-2">Ink Consumption - FAC</h5>
                                            <div class="text-left mt-4 d-flex flex-row">
                                                <div class="form-group ml-3 col-2">
                                                    <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearInkFAC" name="fiscal_year" id="selFiscalYearInkFAC" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                </div>
                                            </div><br>

                                            <div class="table-responsive">
                                                <table id="tblViewInkConsumptionFAC" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 6.66%;">Ink Consumption</th>
                                                            {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                            <th class="april-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                            <th class="may-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                            <th class="june-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                            <th class="july-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                            <th class="august-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                            <th class="september-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                            <th class="october-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                            <th class="november-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                            <th class="december-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                            <th class="january-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                            <th class="february-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                            <th class="march-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                            <th style="width: 6.66%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 6.66%;">Target</td>
                                                            {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="may-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="june-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="july-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="august-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="september-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="october-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="november-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="december-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="january-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="february-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="march-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="total-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Actual</td>
                                                            {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="may-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="june-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="july-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="august-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="september-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="october-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="november-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="december-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="january-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="february-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="march-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="total-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">|</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-fac-actual-target"></td>
                                                            <td style="width: 6.66%;" class="may-ink-fac-actual-target"></td>
                                                            <td style="width: 6.66%;" class="june-ink-fac-actual-target"></td>
                                                            <td style="width: 6.66%;" class="july-ink-fac-actual-target"></td>
                                                            <td style="width: 6.66%;" class="august-ink-fac-actual-target"></td>
                                                            <td style="width: 6.66%;" class="september-ink-fac-actual-target"></td>
                                                            <td style="width: 6.66%;" class="october-ink-fac-actual-target"></td>
                                                            <td style="width: 6.66%;" class="november-ink-fac-actual-target"></td>
                                                            <td style="width: 6.66%;" class="december-ink-fac-actual-target"></td>
                                                            <td style="width: 6.66%;" class="january-ink-fac-actual-target"></td>
                                                            <td style="width: 6.66%;" class="february-ink-fac-actual-target"></td>
                                                            <td style="width: 6.66%;" class="march-ink-fac-actual-target"></td>
                                                            <td style="width: 6.66%;" class="total-ink-fac-actual-target"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-fac-tricolor"></td>
                                                            <td style="width: 6.66%;" class="may-ink-fac-tricolor"></td>
                                                            <td style="width: 6.66%;" class="june-ink-fac-tricolor"></td>
                                                            <td style="width: 6.66%;" class="july-ink-fac-tricolor"></td>
                                                            <td style="width: 6.66%;" class="august-ink-fac-tricolor"></td>
                                                            <td style="width: 6.66%;" class="september-ink-fac-tricolor"></td>
                                                            <td style="width: 6.66%;" class="october-ink-fac-tricolor"></td>
                                                            <td style="width: 6.66%;" class="november-ink-fac-tricolor"></td>
                                                            <td style="width: 6.66%;" class="december-ink-fac-tricolor"></td>
                                                            <td style="width: 6.66%;" class="january-ink-fac-tricolor"></td>
                                                            <td style="width: 6.66%;" class="february-ink-fac-tricolor"></td>
                                                            <td style="width: 6.66%;" class="march-ink-fac-tricolor"></td>
                                                            <td style="width: 6.66%;" class="total-ink-fac-tricolor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- DASHBOARD INK FAC TAB END -->

                                        <!-- DASHBOARD INK ISS TAB -->
                                        <div class="tab-pane fade" id="ink_iss" role="tabpanel" aria-labelledby="ink_iss-tab">
                                            <h5 class="mt-3 ml-2">Ink Consumption - ISS</h5>
                                            <div class="text-left mt-4 d-flex flex-row">
                                                <div class="form-group ml-3 col-2">
                                                    <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearInkISS" name="fiscal_year" id="selFiscalYearInkISS" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                </div>
                                            </div><br>

                                            <div class="table-responsive">
                                                <table id="tblViewInkConsumptionISS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 6.66%;">Ink Consumption</th>
                                                            {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                            <th class="april-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                            <th class="may-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                            <th class="june-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                            <th class="july-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                            <th class="august-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                            <th class="september-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                            <th class="october-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                            <th class="november-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                            <th class="december-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                            <th class="january-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                            <th class="february-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                            <th class="march-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                            <th style="width: 6.66%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 6.66%;">Target</td>
                                                            {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="may-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="june-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="july-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="august-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="september-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="october-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="november-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="december-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="january-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="february-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="march-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="total-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Actual</td>
                                                            {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="may-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="june-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="july-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="august-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="september-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="october-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="november-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="december-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="january-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="february-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="march-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="total-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">|</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-iss-actual-target"></td>
                                                            <td style="width: 6.66%;" class="may-ink-iss-actual-target"></td>
                                                            <td style="width: 6.66%;" class="june-ink-iss-actual-target"></td>
                                                            <td style="width: 6.66%;" class="july-ink-iss-actual-target"></td>
                                                            <td style="width: 6.66%;" class="august-ink-iss-actual-target"></td>
                                                            <td style="width: 6.66%;" class="september-ink-iss-actual-target"></td>
                                                            <td style="width: 6.66%;" class="october-ink-iss-actual-target"></td>
                                                            <td style="width: 6.66%;" class="november-ink-iss-actual-target"></td>
                                                            <td style="width: 6.66%;" class="december-ink-iss-actual-target"></td>
                                                            <td style="width: 6.66%;" class="january-ink-iss-actual-target"></td>
                                                            <td style="width: 6.66%;" class="february-ink-iss-actual-target"></td>
                                                            <td style="width: 6.66%;" class="march-ink-iss-actual-target"></td>
                                                            <td style="width: 6.66%;" class="total-ink-iss-actual-target"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-iss-tricolor"></td>
                                                            <td style="width: 6.66%;" class="may-ink-iss-tricolor"></td>
                                                            <td style="width: 6.66%;" class="june-ink-iss-tricolor"></td>
                                                            <td style="width: 6.66%;" class="july-ink-iss-tricolor"></td>
                                                            <td style="width: 6.66%;" class="august-ink-iss-tricolor"></td>
                                                            <td style="width: 6.66%;" class="september-ink-iss-tricolor"></td>
                                                            <td style="width: 6.66%;" class="october-ink-iss-tricolor"></td>
                                                            <td style="width: 6.66%;" class="november-ink-iss-tricolor"></td>
                                                            <td style="width: 6.66%;" class="december-ink-iss-tricolor"></td>
                                                            <td style="width: 6.66%;" class="january-ink-iss-tricolor"></td>
                                                            <td style="width: 6.66%;" class="february-ink-iss-tricolor"></td>
                                                            <td style="width: 6.66%;" class="march-ink-iss-tricolor"></td>
                                                            <td style="width: 6.66%;" class="total-ink-iss-tricolor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- DASHBOARD INK ISS TAB END -->

                                        <!-- DASHBOARD INK QAD TAB -->
                                        <div class="tab-pane fade" id="ink_qad" role="tabpanel" aria-labelledby="ink_qad-tab">
                                            <h5 class="mt-3 ml-2">Ink Consumption - QAD</h5>
                                            <div class="text-left mt-4 d-flex flex-row">
                                                <div class="form-group ml-3 col-2">
                                                    <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearInkQAD" name="fiscal_year" id="selFiscalYearInkQAD" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                </div>
                                            </div><br>

                                            <div class="table-responsive">
                                                <table id="tblViewInkConsumptionQAD" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 6.66%;">Ink Consumption</th>
                                                            {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                            <th class="april-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                            <th class="may-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                            <th class="june-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                            <th class="july-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                            <th class="august-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                            <th class="september-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                            <th class="october-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                            <th class="november-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                            <th class="december-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                            <th class="january-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                            <th class="february-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                            <th class="march-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                            <th style="width: 6.66%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 6.66%;">Target</td>
                                                            {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="may-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="june-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="july-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="august-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="september-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="october-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="november-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="december-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="january-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="february-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="march-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="total-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Actual</td>
                                                            {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="may-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="june-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="july-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="august-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="september-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="october-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="november-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="december-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="january-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="february-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="march-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="total-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">|</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-qad-actual-target"></td>
                                                            <td style="width: 6.66%;" class="may-ink-qad-actual-target"></td>
                                                            <td style="width: 6.66%;" class="june-ink-qad-actual-target"></td>
                                                            <td style="width: 6.66%;" class="july-ink-qad-actual-target"></td>
                                                            <td style="width: 6.66%;" class="august-ink-qad-actual-target"></td>
                                                            <td style="width: 6.66%;" class="september-ink-qad-actual-target"></td>
                                                            <td style="width: 6.66%;" class="october-ink-qad-actual-target"></td>
                                                            <td style="width: 6.66%;" class="november-ink-qad-actual-target"></td>
                                                            <td style="width: 6.66%;" class="december-ink-qad-actual-target"></td>
                                                            <td style="width: 6.66%;" class="january-ink-qad-actual-target"></td>
                                                            <td style="width: 6.66%;" class="february-ink-qad-actual-target"></td>
                                                            <td style="width: 6.66%;" class="march-ink-qad-actual-target"></td>
                                                            <td style="width: 6.66%;" class="total-ink-qad-actual-target"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-qad-tricolor"></td>
                                                            <td style="width: 6.66%;" class="may-ink-qad-tricolor"></td>
                                                            <td style="width: 6.66%;" class="june-ink-qad-tricolor"></td>
                                                            <td style="width: 6.66%;" class="july-ink-qad-tricolor"></td>
                                                            <td style="width: 6.66%;" class="august-ink-qad-tricolor"></td>
                                                            <td style="width: 6.66%;" class="september-ink-qad-tricolor"></td>
                                                            <td style="width: 6.66%;" class="october-ink-qad-tricolor"></td>
                                                            <td style="width: 6.66%;" class="november-ink-qad-tricolor"></td>
                                                            <td style="width: 6.66%;" class="december-ink-qad-tricolor"></td>
                                                            <td style="width: 6.66%;" class="january-ink-qad-tricolor"></td>
                                                            <td style="width: 6.66%;" class="february-ink-qad-tricolor"></td>
                                                            <td style="width: 6.66%;" class="march-ink-qad-tricolor"></td>
                                                            <td style="width: 6.66%;" class="total-ink-qad-tricolor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- DASHBOARD INK QAD TAB END -->

                                        <!-- DASHBOARD INK EMS TAB -->
                                        <div class="tab-pane fade" id="ink_ems" role="tabpanel" aria-labelledby="ink_ems-tab">
                                            <h5 class="mt-3 ml-2">Ink Consumption - EMS</h5>
                                            <div class="text-left mt-4 d-flex flex-row">
                                                <div class="form-group ml-3 col-2">
                                                    <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearInkEMS" name="fiscal_year" id="selFiscalYearInkEMS" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                </div>
                                            </div><br>

                                            <div class="table-responsive">
                                                <table id="tblViewInkConsumptionEMS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 6.66%;">Ink Consumption</th>
                                                            {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                            <th class="april-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                            <th class="may-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                            <th class="june-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                            <th class="july-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                            <th class="august-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                            <th class="september-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                            <th class="october-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                            <th class="november-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                            <th class="december-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                            <th class="january-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                            <th class="february-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                            <th class="march-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                            <th style="width: 6.66%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 6.66%;">Target</td>
                                                            {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="may-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="june-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="july-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="august-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="september-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="october-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="november-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="december-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="january-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="february-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="march-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="total-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Actual</td>
                                                            {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="may-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="june-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="july-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="august-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="september-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="october-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="november-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="december-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="january-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="february-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="march-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="total-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">|</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-ems-actual-target"></td>
                                                            <td style="width: 6.66%;" class="may-ink-ems-actual-target"></td>
                                                            <td style="width: 6.66%;" class="june-ink-ems-actual-target"></td>
                                                            <td style="width: 6.66%;" class="july-ink-ems-actual-target"></td>
                                                            <td style="width: 6.66%;" class="august-ink-ems-actual-target"></td>
                                                            <td style="width: 6.66%;" class="september-ink-ems-actual-target"></td>
                                                            <td style="width: 6.66%;" class="october-ink-ems-actual-target"></td>
                                                            <td style="width: 6.66%;" class="november-ink-ems-actual-target"></td>
                                                            <td style="width: 6.66%;" class="december-ink-ems-actual-target"></td>
                                                            <td style="width: 6.66%;" class="january-ink-ems-actual-target"></td>
                                                            <td style="width: 6.66%;" class="february-ink-ems-actual-target"></td>
                                                            <td style="width: 6.66%;" class="march-ink-ems-actual-target"></td>
                                                            <td style="width: 6.66%;" class="total-ink-ems-actual-target"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-ems-tricolor"></td>
                                                            <td style="width: 6.66%;" class="may-ink-ems-tricolor"></td>
                                                            <td style="width: 6.66%;" class="june-ink-ems-tricolor"></td>
                                                            <td style="width: 6.66%;" class="july-ink-ems-tricolor"></td>
                                                            <td style="width: 6.66%;" class="august-ink-ems-tricolor"></td>
                                                            <td style="width: 6.66%;" class="september-ink-ems-tricolor"></td>
                                                            <td style="width: 6.66%;" class="october-ink-ems-tricolor"></td>
                                                            <td style="width: 6.66%;" class="november-ink-ems-tricolor"></td>
                                                            <td style="width: 6.66%;" class="december-ink-ems-tricolor"></td>
                                                            <td style="width: 6.66%;" class="january-ink-ems-tricolor"></td>
                                                            <td style="width: 6.66%;" class="february-ink-ems-tricolor"></td>
                                                            <td style="width: 6.66%;" class="march-ink-ems-tricolor"></td>
                                                            <td style="width: 6.66%;" class="total-ink-ems-tricolor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- DASHBOARD INK EMS TAB END -->

                                        <!-- DASHBOARD INK TS TAB -->
                                        <div class="tab-pane fade" id="ink_ts" role="tabpanel" aria-labelledby="ink_ts-tab">
                                            <h5 class="mt-3 ml-2">Ink Consumption - TS</h5>
                                            <div class="text-left mt-4 d-flex flex-row">
                                                <div class="form-group ml-3 col-2">
                                                    <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearInkTS" name="fiscal_year" id="selFiscalYearInkTS" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                </div>
                                            </div><br>

                                            <div class="table-responsive">
                                                <table id="tblViewInkConsumptionTS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 6.66%;">Ink Consumption</th>
                                                            {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                            <th class="april-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                            <th class="may-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                            <th class="june-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                            <th class="july-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                            <th class="august-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                            <th class="september-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                            <th class="october-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                            <th class="november-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                            <th class="december-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                            <th class="january-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                            <th class="february-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                            <th class="march-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                            <th style="width: 6.66%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 6.66%;">Target</td>
                                                            {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="may-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="june-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="july-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="august-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="september-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="october-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="november-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="december-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="january-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="february-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="march-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="total-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Actual</td>
                                                            {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="may-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="june-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="july-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="august-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="september-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="october-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="november-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="december-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="january-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="february-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="march-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="total-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">|</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-ts-actual-target"></td>
                                                            <td style="width: 6.66%;" class="may-ink-ts-actual-target"></td>
                                                            <td style="width: 6.66%;" class="june-ink-ts-actual-target"></td>
                                                            <td style="width: 6.66%;" class="july-ink-ts-actual-target"></td>
                                                            <td style="width: 6.66%;" class="august-ink-ts-actual-target"></td>
                                                            <td style="width: 6.66%;" class="september-ink-ts-actual-target"></td>
                                                            <td style="width: 6.66%;" class="october-ink-ts-actual-target"></td>
                                                            <td style="width: 6.66%;" class="november-ink-ts-actual-target"></td>
                                                            <td style="width: 6.66%;" class="december-ink-ts-actual-target"></td>
                                                            <td style="width: 6.66%;" class="january-ink-ts-actual-target"></td>
                                                            <td style="width: 6.66%;" class="february-ink-ts-actual-target"></td>
                                                            <td style="width: 6.66%;" class="march-ink-ts-actual-target"></td>
                                                            <td style="width: 6.66%;" class="total-ink-ts-actual-target"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-ts-tricolor"></td>
                                                            <td style="width: 6.66%;" class="may-ink-ts-tricolor"></td>
                                                            <td style="width: 6.66%;" class="june-ink-ts-tricolor"></td>
                                                            <td style="width: 6.66%;" class="july-ink-ts-tricolor"></td>
                                                            <td style="width: 6.66%;" class="august-ink-ts-tricolor"></td>
                                                            <td style="width: 6.66%;" class="september-ink-ts-tricolor"></td>
                                                            <td style="width: 6.66%;" class="october-ink-ts-tricolor"></td>
                                                            <td style="width: 6.66%;" class="november-ink-ts-tricolor"></td>
                                                            <td style="width: 6.66%;" class="december-ink-ts-tricolor"></td>
                                                            <td style="width: 6.66%;" class="january-ink-ts-tricolor"></td>
                                                            <td style="width: 6.66%;" class="february-ink-ts-tricolor"></td>
                                                            <td style="width: 6.66%;" class="march-ink-ts-tricolor"></td>
                                                            <td style="width: 6.66%;" class="total-ink-ts-tricolor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- DASHBOARD INK TS TAB END -->

                                        <!-- DASHBOARD INK CN TAB -->
                                        <div class="tab-pane fade" id="ink_cn" role="tabpanel" aria-labelledby="ink_cn-tab">
                                            <h5 class="mt-3 ml-2">Ink Consumption - CN</h5>
                                            <div class="text-left mt-4 d-flex flex-row">
                                                <div class="form-group ml-3 col-2">
                                                    <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearInkCN" name="fiscal_year" id="selFiscalYearInkCN" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                </div>
                                            </div><br>

                                            <div class="table-responsive">
                                                <table id="tblViewInkConsumptionCN" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 6.66%;">Ink Consumption</th>
                                                            {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                            <th class="april-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                            <th class="may-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                            <th class="june-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                            <th class="july-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                            <th class="august-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                            <th class="september-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                            <th class="october-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                            <th class="november-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                            <th class="december-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                            <th class="january-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                            <th class="february-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                            <th class="march-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                            <th style="width: 6.66%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 6.66%;">Target</td>
                                                            {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="may-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="june-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="july-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="august-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="september-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="october-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="november-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="december-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="january-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="february-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="march-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="total-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Actual</td>
                                                            {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="may-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="june-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="july-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="august-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="september-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="october-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="november-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="december-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="january-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="february-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="march-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="total-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">|</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-cn-actual-target"></td>
                                                            <td style="width: 6.66%;" class="may-ink-cn-actual-target"></td>
                                                            <td style="width: 6.66%;" class="june-ink-cn-actual-target"></td>
                                                            <td style="width: 6.66%;" class="july-ink-cn-actual-target"></td>
                                                            <td style="width: 6.66%;" class="august-ink-cn-actual-target"></td>
                                                            <td style="width: 6.66%;" class="september-ink-cn-actual-target"></td>
                                                            <td style="width: 6.66%;" class="october-ink-cn-actual-target"></td>
                                                            <td style="width: 6.66%;" class="november-ink-cn-actual-target"></td>
                                                            <td style="width: 6.66%;" class="december-ink-cn-actual-target"></td>
                                                            <td style="width: 6.66%;" class="january-ink-cn-actual-target"></td>
                                                            <td style="width: 6.66%;" class="february-ink-cn-actual-target"></td>
                                                            <td style="width: 6.66%;" class="march-ink-cn-actual-target"></td>
                                                            <td style="width: 6.66%;" class="total-ink-cn-actual-target"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-cn-tricolor"></td>
                                                            <td style="width: 6.66%;" class="may-ink-cn-tricolor"></td>
                                                            <td style="width: 6.66%;" class="june-ink-cn-tricolor"></td>
                                                            <td style="width: 6.66%;" class="july-ink-cn-tricolor"></td>
                                                            <td style="width: 6.66%;" class="august-ink-cn-tricolor"></td>
                                                            <td style="width: 6.66%;" class="september-ink-cn-tricolor"></td>
                                                            <td style="width: 6.66%;" class="october-ink-cn-tricolor"></td>
                                                            <td style="width: 6.66%;" class="november-ink-cn-tricolor"></td>
                                                            <td style="width: 6.66%;" class="december-ink-cn-tricolor"></td>
                                                            <td style="width: 6.66%;" class="january-ink-cn-tricolor"></td>
                                                            <td style="width: 6.66%;" class="february-ink-cn-tricolor"></td>
                                                            <td style="width: 6.66%;" class="march-ink-cn-tricolor"></td>
                                                            <td style="width: 6.66%;" class="total-ink-cn-tricolor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- DASHBOARD INK CN TAB END -->

                                        <!-- DASHBOARD INK YF TAB -->
                                        <div class="tab-pane fade" id="ink_yf" role="tabpanel" aria-labelledby="ink_yf-tab">
                                            <h5 class="mt-3 ml-2">Ink Consumption - YF</h5>
                                            <div class="text-left mt-4 d-flex flex-row">
                                                <div class="form-group ml-3 col-2">
                                                    <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearInkYF" name="fiscal_year" id="selFiscalYearInkYF" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                </div>
                                            </div><br>

                                            <div class="table-responsive">
                                                <table id="tblViewInkConsumptionYF" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 6.66%;">Ink Consumption</th>
                                                            {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                            <th class="april-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                            <th class="may-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                            <th class="june-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                            <th class="july-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                            <th class="august-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                            <th class="september-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                            <th class="october-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                            <th class="november-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                            <th class="december-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                            <th class="january-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                            <th class="february-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                            <th class="march-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                            <th style="width: 6.66%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 6.66%;">Target</td>
                                                            {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="may-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="june-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="july-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="august-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="september-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="october-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="november-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="december-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="january-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="february-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="march-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="total-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Actual</td>
                                                            {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="may-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="june-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="july-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="august-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="september-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="october-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="november-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="december-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="january-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="february-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="march-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="total-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">|</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-yf-actual-target"></td>
                                                            <td style="width: 6.66%;" class="may-ink-yf-actual-target"></td>
                                                            <td style="width: 6.66%;" class="june-ink-yf-actual-target"></td>
                                                            <td style="width: 6.66%;" class="july-ink-yf-actual-target"></td>
                                                            <td style="width: 6.66%;" class="august-ink-yf-actual-target"></td>
                                                            <td style="width: 6.66%;" class="september-ink-yf-actual-target"></td>
                                                            <td style="width: 6.66%;" class="october-ink-yf-actual-target"></td>
                                                            <td style="width: 6.66%;" class="november-ink-yf-actual-target"></td>
                                                            <td style="width: 6.66%;" class="december-ink-yf-actual-target"></td>
                                                            <td style="width: 6.66%;" class="january-ink-yf-actual-target"></td>
                                                            <td style="width: 6.66%;" class="february-ink-yf-actual-target"></td>
                                                            <td style="width: 6.66%;" class="march-ink-yf-actual-target"></td>
                                                            <td style="width: 6.66%;" class="total-ink-yf-actual-target"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-yf-tricolor"></td>
                                                            <td style="width: 6.66%;" class="may-ink-yf-tricolor"></td>
                                                            <td style="width: 6.66%;" class="june-ink-yf-tricolor"></td>
                                                            <td style="width: 6.66%;" class="july-ink-yf-tricolor"></td>
                                                            <td style="width: 6.66%;" class="august-ink-yf-tricolor"></td>
                                                            <td style="width: 6.66%;" class="september-ink-yf-tricolor"></td>
                                                            <td style="width: 6.66%;" class="october-ink-yf-tricolor"></td>
                                                            <td style="width: 6.66%;" class="november-ink-yf-tricolor"></td>
                                                            <td style="width: 6.66%;" class="december-ink-yf-tricolor"></td>
                                                            <td style="width: 6.66%;" class="january-ink-yf-tricolor"></td>
                                                            <td style="width: 6.66%;" class="february-ink-yf-tricolor"></td>
                                                            <td style="width: 6.66%;" class="march-ink-yf-tricolor"></td>
                                                            <td style="width: 6.66%;" class="total-ink-yf-tricolor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- DASHBOARD INK YF TAB END -->

                                        <!-- DASHBOARD INK PPS TAB -->
                                        <div class="tab-pane fade" id="ink_pps" role="tabpanel" aria-labelledby="ink_pps-tab">
                                            <h5 class="mt-3 ml-2">Ink Consumption - PPS</h5>
                                            <div class="text-left mt-4 d-flex flex-row">
                                                <div class="form-group ml-3 col-2">
                                                    <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearInkPPS" name="fiscal_year" id="selFiscalYearInkPPS" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                </div>
                                            </div><br>

                                            <div class="table-responsive">
                                                <table id="tblViewInkConsumptionPPS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 6.66%;">Ink Consumption</th>
                                                            {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                            <th class="april-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                            <th class="may-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                            <th class="june-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                            <th class="july-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                            <th class="august-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                            <th class="september-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                            <th class="october-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                            <th class="november-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                            <th class="december-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                            <th class="january-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                            <th class="february-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                            <th class="march-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                            <th style="width: 6.66%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 6.66%;">Target</td>
                                                            {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="may-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="june-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="july-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="august-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="september-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="october-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="november-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="december-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="january-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="february-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="march-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                            <td class="total-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Actual</td>
                                                            {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                            <td class="april-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="may-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="june-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="july-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="august-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="september-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="october-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="november-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="december-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="january-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="february-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="march-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                            <td class="total-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">|</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-pps-actual-target"></td>
                                                            <td style="width: 6.66%;" class="may-ink-pps-actual-target"></td>
                                                            <td style="width: 6.66%;" class="june-ink-pps-actual-target"></td>
                                                            <td style="width: 6.66%;" class="july-ink-pps-actual-target"></td>
                                                            <td style="width: 6.66%;" class="august-ink-pps-actual-target"></td>
                                                            <td style="width: 6.66%;" class="september-ink-pps-actual-target"></td>
                                                            <td style="width: 6.66%;" class="october-ink-pps-actual-target"></td>
                                                            <td style="width: 6.66%;" class="november-ink-pps-actual-target"></td>
                                                            <td style="width: 6.66%;" class="december-ink-pps-actual-target"></td>
                                                            <td style="width: 6.66%;" class="january-ink-pps-actual-target"></td>
                                                            <td style="width: 6.66%;" class="february-ink-pps-actual-target"></td>
                                                            <td style="width: 6.66%;" class="march-ink-pps-actual-target"></td>
                                                            <td style="width: 6.66%;" class="total-ink-pps-actual-target"></td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                            {{-- <td style="width: 6.66%;"></td> --}}
                                                            <td style="width: 6.66%;" class="april-ink-pps-tricolor"></td>
                                                            <td style="width: 6.66%;" class="may-ink-pps-tricolor"></td>
                                                            <td style="width: 6.66%;" class="june-ink-pps-tricolor"></td>
                                                            <td style="width: 6.66%;" class="july-ink-pps-tricolor"></td>
                                                            <td style="width: 6.66%;" class="august-ink-pps-tricolor"></td>
                                                            <td style="width: 6.66%;" class="september-ink-pps-tricolor"></td>
                                                            <td style="width: 6.66%;" class="october-ink-pps-tricolor"></td>
                                                            <td style="width: 6.66%;" class="november-ink-pps-tricolor"></td>
                                                            <td style="width: 6.66%;" class="december-ink-pps-tricolor"></td>
                                                            <td style="width: 6.66%;" class="january-ink-pps-tricolor"></td>
                                                            <td style="width: 6.66%;" class="february-ink-pps-tricolor"></td>
                                                            <td style="width: 6.66%;" class="march-ink-pps-tricolor"></td>
                                                            <td style="width: 6.66%;" class="total-ink-pps-tricolor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- DASHBOARD INK PPS TAB END -->
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
                        $(".selectYearInkBOD").html(result);
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
                        $(".selectYearInkBOD").html(result);
                        $(".selectYearInkIAS").html(result);
                        $(".selectYearInkFIN").html(result);
                        $(".selectYearInkHRD").html(result);
                        $(".selectYearInkESS").html(result);
                        $(".selectYearInkLOG").html(result);
                        $(".selectYearInkFAC").html(result);
                        $(".selectYearInkISS").html(result);
                        $(".selectYearInkQAD").html(result);
                        $(".selectYearInkEMS").html(result);
                        $(".selectYearInkTS").html(result);
                        $(".selectYearInkCN").html(result);
                        $(".selectYearInkYF").html(result);
                        $(".selectYearInkPPS").html(result);
                    }
                });
            }

            //===== DATATABLES OF INK BOD CONSUMPTION ================
            GetCurrentFYInkDataBOD();

            $('#selFiscalYearInkBOD').on('change', function() {
                $('.selectYearInkBOD').val($(this).find(":selected").val());
                $('.selectYearInkBOD').val();

                GetCurrentFYInkDataBOD();

                dataTableInkConsumptionsBOD.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK BOD CONSUMPTION ================
            var dataTableInkConsumptionsBOD = $("#tblViewInkConsumptionBOD").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK BOD CONSUMPTION END ================

            //===== DATATABLES OF INK IAS CONSUMPTION ================
            GetCurrentFYInkDataIAS();

            $('#selFiscalYearInkIAS').on('change', function() {
                $('.selectYearInkIAS').val($(this).find(":selected").val());
                $('.selectYearInkIAS').val();

                GetCurrentFYInkDataIAS();

                dataTableInkConsumptionsIAS.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK IAS CONSUMPTION ================
            var dataTableInkConsumptionsIAS = $("#tblViewInkConsumptionIAS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK IAS CONSUMPTION END ================

            //===== DATATABLES OF INK FIN CONSUMPTION ================
            GetCurrentFYInkDataFIN();

            $('#selFiscalYearInkFIN').on('change', function() {
                $('.selectYearInkFIN').val($(this).find(":selected").val());
                $('.selectYearInkFIN').val();

                GetCurrentFYInkDataFIN();

                dataTableInkConsumptionsFIN.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK FIN CONSUMPTION ================
            var dataTableInkConsumptionsFIN = $("#tblViewInkConsumptionFIN").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK FIN CONSUMPTION END ================

            //===== DATATABLES OF INK HRD CONSUMPTION ================
            GetCurrentFYInkDataHRD();

            $('#selFiscalYearInkHRD').on('change', function() {
                $('.selectYearInkHRD').val($(this).find(":selected").val());
                $('.selectYearInkHRD').val();

                GetCurrentFYInkDataHRD();

                dataTableInkConsumptionsHRD.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK HRD CONSUMPTION ================
            var dataTableInkConsumptionsHRD = $("#tblViewInkConsumptionHRD").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK HRD CONSUMPTION END ================

            //===== DATATABLES OF INK ESS CONSUMPTION ================
            GetCurrentFYInkDataESS();

            $('#selFiscalYearInkESS').on('change', function() {
                $('.selectYearInkESS').val($(this).find(":selected").val());
                $('.selectYearInkESS').val();

                GetCurrentFYInkDataESS();

                dataTableInkConsumptionsESS.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK ESS CONSUMPTION ================
            var dataTableInkConsumptionsESS = $("#tblViewInkConsumptionESS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK ESS CONSUMPTION END ================

            //===== DATATABLES OF INK LOG CONSUMPTION ================
            GetCurrentFYInkDataLOG();

            $('#selFiscalYearInkLOG').on('change', function() {
                $('.selectYearInkLOG').val($(this).find(":selected").val());
                $('.selectYearInkLOG').val();

                GetCurrentFYInkDataLOG();

                dataTableInkConsumptionsLOG.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK LOG CONSUMPTION ================
            var dataTableInkConsumptionsLOG = $("#tblViewInkConsumptionLOG").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK LOG CONSUMPTION END ================

            //===== DATATABLES OF INK FAC CONSUMPTION ================
            GetCurrentFYInkDataFAC();

            $('#selFiscalYearInkFAC').on('change', function() {
                $('.selectYearInkFAC').val($(this).find(":selected").val());
                $('.selectYearInkFAC').val();

                GetCurrentFYInkDataFAC();

                dataTableInkConsumptionsFAC.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK FAC CONSUMPTION ================
            var dataTableInkConsumptionsFaC = $("#tblViewInkConsumptionFAC").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK FAC CONSUMPTION END ================

            //===== DATATABLES OF INK ISS CONSUMPTION ================
            GetCurrentFYInkDataISS();

            $('#selFiscalYearInkISS').on('change', function() {
                $('.selectYearInkISS').val($(this).find(":selected").val());
                $('.selectYearInkISS').val();

                GetCurrentFYInkDataISS();

                dataTableInkConsumptionsISS.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK ISS CONSUMPTION ================
            var dataTableInkConsumptionsISS = $("#tblViewInkConsumptionISS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK ISS CONSUMPTION END ================

            //===== DATATABLES OF INK QAD CONSUMPTION ================
            GetCurrentFYInkDataQAD();

            $('#selFiscalYearInkQAD').on('change', function() {
                $('.selectYearInkQAD').val($(this).find(":selected").val());
                $('.selectYearInkQAD').val();

                GetCurrentFYInkDataQAD();

                dataTableInkConsumptionsQAD.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK QAD CONSUMPTION ================
            var dataTableInkConsumptionsQAD = $("#tblViewInkConsumptionQAD").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK QAD CONSUMPTION END ================

            //===== DATATABLES OF INK EMS CONSUMPTION ================
            GetCurrentFYInkDataEMS();

            $('#selFiscalYearInkEMS').on('change', function() {
                $('.selectYearInkEMS').val($(this).find(":selected").val());
                $('.selectYearInkEMS').val();

                GetCurrentFYInkDataEMS();

                dataTableInkConsumptionsEMS.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK EMS CONSUMPTION ================
            var dataTableInkConsumptionsEMS = $("#tblViewInkConsumptionEMS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK EMS CONSUMPTION END ================

            //===== DATATABLES OF INK TS CONSUMPTION ================
            GetCurrentFYInkDataTS();

            $('#selFiscalYearInkTS').on('change', function() {
                $('.selectYearInkTS').val($(this).find(":selected").val());
                $('.selectYearInkTS').val();

                GetCurrentFYInkDataTS();

                dataTableInkConsumptionsTS.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK TS CONSUMPTION ================
            var dataTableInkConsumptionsTS = $("#tblViewInkConsumptionTS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK TS CONSUMPTION END ================

            //===== DATATABLES OF INK CN CONSUMPTION ================
            GetCurrentFYInkDataCN();

            $('#selFiscalYearInkCN').on('change', function() {
                $('.selectYearInkCN').val($(this).find(":selected").val());
                $('.selectYearInkCN').val();

                GetCurrentFYInkDataCN();

                dataTableInkConsumptionsCN.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK CN CONSUMPTION ================
            var dataTableInkConsumptionsCN = $("#tblViewInkConsumptionCN").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK CN CONSUMPTION END ================

            //===== DATATABLES OF INK YF CONSUMPTION ================
            GetCurrentFYInkDataYF();

            $('#selFiscalYearInkYF').on('change', function() {
                $('.selectYearInkYF').val($(this).find(":selected").val());
                $('.selectYearInkYF').val();

                GetCurrentFYInkDataYF();

                dataTableInkConsumptionsYF.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK YF CONSUMPTION ================
            var dataTableInkConsumptionsYF = $("#tblViewInkConsumptionYF").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK YF CONSUMPTION END ================

            //===== DATATABLES OF INK PPS CONSUMPTION ================
            GetCurrentFYInkDataPPS();

            $('#selFiscalYearInkPPS').on('change', function() {
                $('.selectYearInkPPS').val($(this).find(":selected").val());
                $('.selectYearInkPPS').val();

                GetCurrentFYInkDataPPS();

                dataTableInkConsumptionsPPS.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK FIN CONSUMPTION ================
            var dataTableInkConsumptionsPPS = $("#tblViewInkConsumptionPPS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK FIN CONSUMPTION END ================

        });
    </script>
@endsection
