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

{{-- Here I removed the @auth because the dashboard isn't loading properly --}}
@extends($layout)
@section('title', 'Energy Consumption')

@section('content_page')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Reports</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Energy Consumption</li>
                            {{-- <!-- <li class="breadcrumb-item"><a href="{{ route('water_consumption') }}">Water Consumption</a></li> --> --}}
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="CurrentFY-tab" data-toggle="tab" href="#CurrentFY" role="tab" aria-controls="CurrentFY" aria-selected="true">Current FY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="PastFY-tab" data-toggle="tab" href="#PastFY" role="tab" aria-controls="PastFY" aria-selected="false">Previous FY</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <!-- CURRENT FY TAB -->
                <div class="tab-pane fade show active" id="CurrentFY" role="tabpanel" aria-labelledby="CurrentFY-tab">
                  
                    <div class="card-body">
                        {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="monthly-target-tab" data-toggle="tab"
                                    href="#monthly-target" role="tab" aria-controls="monthly-target"
                                    aria-selected="true">Monthly Target</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                    role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                    role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                            </li>
                        </ul> --}}

                        {{-- <div class="tab-content" id="myTabContent"> --}}

                        {{-- <div class="tab-pane fade show active" id="monthly-target" role="tabpanel" aria-labelledby="monthly-target-tab"> --}}
                        <div class="text-left mt-4 d-flex flex-row">
                            {{-- <div class="form-group ml-3 col-2">
                                <label><strong>Fiscal Year :</strong></label>
                                <select class="form-control select2bs4 selectYearEnergy" name="fiscal_year"
                                    id="selFiscalYearEnergy" style="width: 100%;">
                                    <!-- Code generated -->
                                </select>
                            </div>
                            <div class="form-group ml-3 col-2">
                                <label><strong>Month :</strong></label>
                                <select class="form-control select2bs4 selectMonthEnergy" name="month_value"
                                    id="selMonthEnergy" style="width: 100%;">
                                    <!-- Code generated -->
                                </select>
                            </div> --}}

                            <div style="margin-left: auto">

                                <!-- EXPORT TO EXCEL -->
                                <a  href="{{ route('export') }}"> <button class="btn btn-primary"><i class="fas fa-file-download"></i> Export File</button></a> &nbsp;
                                <!-- EXPORT TO EXCEL -->

                            {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalEnergyConsumption" id="btnShowEnergyActual"><i class="fa fa-plus fa-md"></i> Add Actual Consumption</button> --}}
                            </div>

                            <div>  

                            </div>

                        </div>
                        <br>

                        {{-- </div> --}}
                    </div>
                                   
                </div>

                <!-- PAST FY TAB -->
                <div class="tab-pane fade" id="PastFY" role="tabpanel" aria-labelledby="PastFY-tab">
                    <div class="card-body">
                        {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="monthly-target-tab" data-toggle="tab"
                                    href="#monthly-target" role="tab" aria-controls="monthly-target"
                                    aria-selected="true">Monthly Target</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                    role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                    role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                            </li>
                        </ul> --}}

                        {{-- <div class="tab-content" id="myTabContent"> --}}

                        {{-- <div class="tab-pane fade show active" id="monthly-target" role="tabpanel" aria-labelledby="monthly-target-tab"> --}}
                        <div class="text-left mt-4 d-flex flex-row">
                            {{-- <div class="form-group ml-3 col-2">
                                <label><strong>Fiscal Year :</strong></label>
                                <select class="form-control select2bs4 selectYearEnergy" name="fiscal_year"
                                    id="selFiscalYearEnergy" style="width: 100%;">
                                    <!-- Code generated -->
                                </select>
                            </div>
                            <div class="form-group ml-3 col-2">
                                <label><strong>Month :</strong></label>
                                <select class="form-control select2bs4 selectMonthEnergy" name="month_value"
                                    id="selMonthEnergy" style="width: 100%;">
                                    <!-- Code generated -->
                                </select>
                            </div> --}}

                            <div style="margin-left: auto">

                                {{-- <!-- EXPORT TO EXCEL -->
                                <a  href="{{ route('export') }}"> <button class="btn btn-primary"><i class="fas fa-file-download"></i>PastFY Export File</button></a> &nbsp;
                                <!-- EXPORT TO EXCEL --> --}}

                                <div class="text-right mt-4">                   
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalpastfy" id="btnShowPastFYModal">PastFY Export File</button>
                                </div>
                                <br>
                                
                                {{-- <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalEnergyConsumption" id="btnShowEnergyActual"><i
                                        class="fa fa-plus fa-md"></i> Add Actual Consumption</button> --}}
                            </div>
                        </div>
                        <br>

                        {{-- </div> --}}
                    </div>
                </div>

            </div>
        </div>

        
    </div>

    <!-- PAST FY FOR REPORT MODAL START -->
    <div class="modal fade" id="modalpastfy">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title">Select Past Fiscal Year</h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <form id="form_Export_Past_Fy" action="{{ route('export_past_fy') }}"> --}}
                <form id="form_Export_Past_Fy">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Past Fiscal Year</label>
                                    <select class="form-control select2bs4 selectPastFy" name="past_fy_id" id="selPastFy" style="width: 100%;">
                                    <!-- Code generated -->
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="btnPastFy" class="btn btn-primary"><i id="iBtnDownloadPastFyIcon" class="fas fa-file-download" ></i> Download</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- PAST FY FOR REPORT MODAL END -->

    <!-- ADD ENERGY MONTHLY TARGET -->
    <div class="modal fade" data-backdrop="static" id="modalEnergyTarget">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title" id="h4EnergyConsumptionChangeTitle"></h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal"
                        aria-label="Close" id="closeModalAddId">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddEnergyTarget">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">

                                    <input type="hidden" class="form-control" name="fiscal_year" id="fiscalYearId"
                                        style="width: 100%;" readonly> {{-- CURRENT FISCAL YEAR ID --}}
                                    <input type="hidden" class="form-control" name="energy_id" id="energyId"
                                        style="width: 100%;" readonly> {{-- ENERGY CONSUMPTION ID --}}
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Month</label>
                                    <select class="form-control select2bs4 selectMonth" type="text" name="month"
                                        id="txtSelectAddMonth" style="width: 100%;">
                                        <option value="0" disabled selected>Select Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Energy Consumption Target</label>
                                    <input type="text" class="form-control" name="energy_target" id="txtAddEnergyTarget"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="submit" id="btnAddEnergyTarget" class="btn btn-primary"><i
                                id="iBtnAddEnergyTargetIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- ADD ENERGY MONTHLY TARGET END -->


    <!-- ADD ENERGY MONTHLY CONSUMPTION -->
    <div class="modal fade" data-backdrop="static" id="modalEnergyConsumption">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title" id="h4EnergyConsumptionActualChangeTitle"></h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal"
                        aria-label="Close" id="closeModalAddId">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddEnergyActual">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="fiscal_year_consumption" id="txtFiscalYearId"
                                        style="width: 100%;" readonly> {{-- CURRENT FISCAL YEAR ID --}}
                                    <input type="hidden" class="form-control" name="energy_consumption_id" id="txtEnergyId"
                                        style="width: 100%;" readonly> {{-- ENERGY CONSUMPTION ID --}}
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Month</label>
                                    <select class="form-control select2bs4 selectMonthConsumption" type="text" name="month_consumption"
                                        id="txtSelectAddMonthConsumption" style="width: 100%;">
                                        <option value="0" disabled selected>Select Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Energy Consumption Actual</label>
                                    <input type="text" class="form-control" name="energy_consumption" id="txtAddEnergyConsumption"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnAddEnergyConsumption" class="btn btn-primary"><i id="iBtnAddEnergyConsumptionIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- ADD ENERGY MONTHLY CONSUMPTION -->

@endsection

@section('js_content')

    <script type="text/javascript">
        //Reset Modal When Close
            $('#modalpastfy').on('hidden.bs.modal', function () {
            $('#modalpastfy form')[0].reset();
            });
        
        //Close Modal When Save
      

        $(document).ready(function() {
            $('#btnPastFy').on('click', function (e) {
                e.preventDefault();
                // console.log('qwe');
                let test = $('#selPastFy').val();
                // console.log(test);

                window.location.href = "export_past_fy/"+test;

                $('#modalpastfy').modal('hide');
            });

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            GetFiscalYear();
            GetMonthsFilter($('.selectMonthEnergy'));
            GetFiscalYearFilter($('.selectYearEnergy'));

            //============================== GETFYDATA FROM TB ==============================
            GetPastFy($(".selectPastFy"));

            //============================== SELECT PAST FY FOR REPORT ==============================
            $("#formExportPastFy").submit(function(event){
                event.preventDefault(); // to stop the form submission
                SelectPastfy();
            });
            // VALIDATION(remove errors)
            $("#btnShowPastFYModal").click(function(){
                $("#selPastFy").removeClass('is-invalid');
                $("#selPastFy").attr('title', '');
                $("#selPastFy").select2('val', '0');
            });

            $("#selMonthEnergy").on('change', function() {
                dataTableEnergyConsumptions.column(0).search($(this).val()).draw();
            });

            $("#selFiscalYearEnergy").on('change', function() {
                dataTableEnergyConsumptions.column(1).search($(this).val()).draw();
            });

            //===== DATATABLES OF ENERGY CONSUMPTION ================
            var dataTableEnergyConsumptions = $("#tblEnergyConsumption").DataTable({
                "processing": false,
                "serverSide": true,
                // "responsive": true,
                // "scrollY": true,
                "ajax": {
                    url: "view_energy_consumption",
                },
                "columns": [{
                        "data": "month",
                        orderable: true,
                        width: "10%"
                    },
                    {
                        "data": "fiscal_year_id.fiscal_year",
                        width: "10%",
                        visible: false
                    },
                    {
                        "data": "year"
                        // orderable: true,
                        // width: "10%"
                        // orderable: false
                    },
                    {
                        "data": "target",
                        "render": $.fn.dataTable.render.number(',', 2, ''),
                        orderable: false
                    },
                    {
                        "data": "actual",
                        "render": $.fn.dataTable.render.number(',', 2, ''),
                        orderable: false
                    },
                    {
                        "data": "status",
                        orderable: false
                    },
                    {
                        "data": "action",
                        orderable: false
                    },
                ],
                "order": [
                    [1, 'desc'],
                    [0, 'asc']
                ]
                // "bSort": false,
            });
            //===== DATATABLES OF ENERGY CONSUMPTION END ================


            $('#txtAddEnergyTarget, #txtAddEnergyConsumption').keyup(function(e) {
                if (e.which >= 37 && e.which <= 40) return;

                $(this).val(function(index, value) {
                    return value
                        .replace(/\D/g, "")
                        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                });
            });

            $('#btnShowEnergyTarget').on('click', function(e) {
                $('input[name="energy_id"]', $("#formAddEnergyTarget")).val('');
                $('input[name="energy_target"]', $("#formAddEnergyTarget")).val('');
                $('select[name="month"]', $("#formAddEnergyTarget")).val(0).trigger('change');
                // $('select[name="month"]', $("#formAddEnergyTarget")).val(0).trigger('change');
                $('select[name="month"]', $("#formAddEnergyTarget")).prop('disabled', false);

                $('#h4EnergyConsumptionChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Energy Consumption Target');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');
            });


            //====== ADD ENERGY CONSUMPTION TARGET ======
            function AddEnergyConsumptionTarget() {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "3000",
                    "timeOut": "3000",
                    "extendedTimeOut": "3000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                };

                $.ajax({
                    url: "insert_energy_target",
                    method: "post",
                    data: $('#formAddEnergyTarget').serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $("#iBtnAddEnergyTargetIcon").addClass('fa fa-spinner fa-pulse');
                        $("#btnAddEnergyTarget").prop('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response['validation'] == 'hasError') {
                            toastr.error('Saving failed!');
                            if (response['error']['month'] === undefined) {
                                $("#txtSelectAddMonth").removeClass('is-invalid');
                                $("#txtSelectAddMonth").attr('title', '');
                            } else {
                                $("#txtSelectAddMonth").addClass('is-invalid');
                                $("#txtSelectAddMonth").attr('title', response['error']['month']);
                            }

                            if (response['error']['energy_target'] === undefined) {
                                $("#txtAddEnergyTarget").removeClass('is-invalid');
                                $("#txtAddEnergyTarget").attr('title', '');
                            } else {
                                $("#txtAddEnergyTarget").addClass('is-invalid');
                                $("#txtAddEnergyTarget").attr('title', response['error']['energy_target']);
                            }
                        } else if (response['result'] == 1) {
                            $("#modalEnergyTarget").modal('hide');

                            dataTableEnergyConsumptions.draw(); // reload the tables after insertion
                            toastr.success('Save success!');
                        } else if (response['result'] == 2) {
                            toastr.warning( 'You already have a record for this month, please edit');
                        }

                        $("#iBtnAddEnergyTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddEnergyTarget").removeAttr('disabled');
                        $("#iBtnAddEnergyTargetIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        $("#iBtnAddEnergyTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddEnergyTarget").removeAttr('disabled');
                        $("#iBtnAddEnergyTargetIcon").addClass('fa fa-check');
                    }
                });
            }

            //====== ADD ENERGY CONSUMPTION ACTUAL ======
            function AddEnergyConsumptionActual() {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "3000",
                    "timeOut": "3000",
                    "extendedTimeOut": "3000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                };

                $.ajax({
                    url: "insert_energy_actual",
                    method: "post",
                    data: $('#formAddEnergyActual').serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $("#iBtnAddEnergyActualIcon").addClass('fa fa-spinner fa-pulse');
                        $("#btnAddEnergyActual").prop('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response['validation'] == 'hasError') {
                            toastr.error('Saving failed!');
                            if (response['error']['energy_consumption'] === undefined) {
                                $("#txtAddEnergyConsumption").removeClass('is-invalid');
                                $("#txtAddEnergyConsumption").attr('title', '');
                            } else {
                                $("#txtAddEnergyConsumption").addClass('is-invalid');
                                $("#txtAddEnergyConsumption").attr('title', response['error']['energy_consumption']);
                            }
                        } else if (response['result'] == 1) {
                            $("#modalEnergyConsumption").modal('hide');

                            dataTableEnergyConsumptions.draw(); // reload the tables after insertion
                            toastr.success('Save success!');
                        }
                   
                        $("#iBtnAddEnergyActualIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddEnergyActual").removeAttr('disabled');
                        $("#iBtnAddEnergyActualIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        $("#iBtnAddEnergyActualIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddEnergyActual").removeAttr('disabled');
                        $("#iBtnAddEnergyActualIcon").addClass('fa fa-check');
                    }
                });
            }

            function GetEnergyTargetById(targetId) {
                $.ajax({
                    url: "get_energy_target_by_id",
                    method: "get",
                    data: {
                        targetId: targetId,
                    },
                    dataType: "json",
                    success: function(response) {
                        let formAddEnergyTarget = $('#formAddEnergyTarget');
                        let formAddEnergyActual = $('#formAddEnergyActual');
                        let energyTargetDetails = response['result'];
                        if (energyTargetDetails.length > 0) {
                            $('select[name="month"]', formAddEnergyTarget).val(energyTargetDetails[0].month).trigger('change');
                            $('select[name="month_consumption"]', formAddEnergyActual).val(energyTargetDetails[0].month).trigger('change');
                            $("#txtAddEnergyTarget").val(energyTargetDetails[0].target);
                            $("#txtAddEnergyConsumption").val(energyTargetDetails[0].actual);
                            
                        } else {
                            toastr.warning('No record found!');
                        }
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    },
                });
            }

            function GetMonthsFilter(cboElement) {
                let result = '<option value="0" selected disabled> -- Select Month -- </option>';

                $.ajax({
                    url: 'get_months_for_filter',
                    method: 'get',
                    dataType: 'json',
                    beforeSend: function () {
                        result = '<option value="0" selected disabled> -- Loading -- </option>';
                        cboElement.html(result);
                    },
                    success: function (response) {
                        result = '';
                        let month = response['month'];

                        if (month.length > 0) { // true
                            result += '<option value="0" selected disabled> Select Month </option>';
                            result += '<option value=""> All </option>';
                            for (let index = 0; index < month.length; index++) {

                                if(month[index].month == 1) {
                                    result += '<option value="January">January</option>';
                                } else if (month[index].month == 2) {
                                    result += '<option value="February">February</option>';
                                } else if (month[index].month == 3) {
                                    result += '<option value="March">March</option>';
                                } else if (month[index].month == 4) {
                                    result += '<option value="April">April</option>';
                                } else if (month[index].month == 5) {
                                    result += '<option value="May">May</option>';
                                } else if (month[index].month == 6) {
                                    result += '<option value="June">June</option>';
                                } else if (month[index].month == 7) {
                                    result += '<option value="July">July</option>';
                                } else if (month[index].month == 8) {
                                    result += '<option value="August">August</option>';
                                } else if (month[index].month == 9) {
                                    result += '<option value="September">September</option>';
                                } else if (month[index].month == 10) {
                                    result += '<option value="October">October</option>';
                                } else if (month[index].month == 11) {
                                    result += '<option value="November">November</option>';
                                } else if (month[index].month == 12) {
                                    result += '<option value="December">December</option>';
                                }
                            }
                        }
                        else {
                            result = '<option value="0" selected disabled> No record found </option>';
                        }
                        cboElement.html(result);
                    }
                });
            }

            function GetFiscalYearFilter(cboElement) {
                let result = '<option value="0" selected disabled> -- Select Fiscal Year -- </option>';

                $.ajax({
                    url: 'get_fiscal_year_for_filter',
                    method: 'get',
                    dataType: 'json',
                    beforeSend: function () {
                        result = '<option value="0" selected disabled> -- Loading -- </option>';
                        cboElement.html(result);
                    },
                    success: function (response) {
                        result = '';
                        let year = response['year'];

                        if (year.length > 0) { // true
                            result += '<option value="0" selected disabled> Select Fiscal Year </option>';
                            result += '<option value=""> All </option>';
                            for (let index = 0; index < year.length; index++) {
                                result += '<option value="' + year[index].fiscal_year + '">' + year[index].fiscal_year + '</option>';
                            }
                        }
                        else {
                            result = '<option value="0" selected disabled> No record found </option>';
                        }
                        cboElement.html(result);
                    }
                });
            }


            $("#formAddEnergyTarget").submit(function(event) {
                event.preventDefault(); // to stop the form submission
                $('select[name="month"]', $("#formAddEnergyTarget")).prop('disabled', false);
                AddEnergyConsumptionTarget();
            });

            //===== EDIT ENERGY CONSUMPTION =====
            $("#tblEnergyConsumption").on('click', '.actionEditEnergyConsumptionTarget', function() {
                let id = $(this).attr('energy-id');

                $("input[name='energy_id'", $("#formAddEnergyTarget")).val(id);
                $('#h4EnergyConsumptionChangeTitle').html('<i class="fas fa-edit"></i>&nbsp;&nbsp; Edit Energy Consumption Target');
                $('select[name="month"]', $("#formAddEnergyTarget")).prop('disabled', true);

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetEnergyTargetById(id);
            });

            $('#tblEnergyConsumption').on('click', '.actionAddEnergyConsumption', function() {
                let id = $(this).attr('energy-id');

                $('select[name="month_consumption"]', $("#formAddEnergyActual")).prop('disabled', true);
                $('input[name="energy_consumption_id"]', $("#formAddEnergyActual")).val(id);
                $('input[name="energy_consumption"]', $("#formAddEnergyActual")).val('');
                $('select[name="month_consumption"]', $("#formAddEnergyActual")).val(0).trigger('change');
                $('#h4EnergyConsumptionActualChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Energy Consumption Actual');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetEnergyTargetById(id);

            });
        
            $("#formAddEnergyActual").submit(function(event) {
                event.preventDefault(); // to stop the form submission
                $('select[name="month_consumption"]', $("#formAddEnergyActual")).prop('disabled', false);
                AddEnergyConsumptionActual();
            });

            $('#tblEnergyConsumption').on('click', '.actionEditEnergyConsumption', function() {
                let id = $(this).attr('energy-id');

                $('select[name="month_consumption"]', $("#formAddEnergyActual")).prop('disabled', true);
                $('input[name="energy_consumption_id"]', $("#formAddEnergyActual")).val(id);
                $('#h4EnergyConsumptionActualChangeTitle').html('<i class="fas fa-edit"></i>&nbsp;&nbsp; Edit Energy Consumption Actual');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetEnergyTargetById(id);
            });
        

        });
    </script>
@endsection
