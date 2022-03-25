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
@section('title', 'Water Consumption')

@section('content_page')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Water Consumption</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('energy_consumption') }}">Energy Consumption</a></li>
                            <li class="breadcrumb-item active">Water Consumption</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Water Consumption</h3>
                            </div>
                            <div class="card-body">
                                {{-- <ul class="nav nav-tabs" id="myTab" role="tablist"> --}}
                                    {{-- <li class="nav-item">
                                        <a class="nav-link active" id="april-tab" data-toggle="tab"
                                            href="#april" role="tab" aria-controls="april"
                                            aria-selected="true">Factory 1</a>
                                    </li> --}}
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" id="may-tab" data-toggle="tab" href="#may"
                                            role="tab" aria-controls="may" aria-selected="false">Factory 2</a>
                                    </li> --}}
                                {{-- </ul> --}}

                                {{-- <div class="tab-content" id="myTabContent"> --}}

                                {{-- <div class="tab-pane fade show active" id="april" role="tabpanel" --}}
                                {{-- aria-labelledby="april-tab"> --}}

                                    <div class="text-left mt-4 d-flex flex-row">
                                        <div class="form-group ml-3 col-2">
                                            <label><strong>Fiscal Year :</strong></label>
                                            <select class="form-control select2bs4 selectYearWater" name="fiscal_year_value"
                                                id="selFiscalYearWater" style="width: 100%;">
                                                <!-- Code generated -->
                                            </select>
                                        </div>

                                        <div class="form-group ml-3 col-2">
                                            <label><strong>Month :</strong></label>
                                            <select class="form-control select2bs4 selectMonthWater" name="month_value"
                                                id="selMonthWater" style="width: 100%;">
                                                <option value="0" disabled selected>Select Month</option>
                                                <option value="" >All</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>

                                        <div class="form-group ml-3 col-2">
                                            <label><strong>Factory :</strong></label>
                                            <select class="form-control select2bs4 selectFactory" name="month_value"
                                                id="selFactory" style="width: 100%;">
                                                <option value="0" disabled selected>Select Factory</option>
                                                <option value="">All</option>
                                                <option value="1">Factory 1</option>
                                                <option value="2">Factory 2</option>
                                            </select>
                                        </div>
                                       
                                        <div style="margin-left: auto">

                                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalWaterTarget"
                                                id="btnShowWaterTarget"><i class="fa fa-plus fa-md"></i> Add Monthly
                                                Target</button> &nbsp;

                                            {{-- <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#modalEnergyConsumption" id="btnShowEnergyActual"><i
                                                    class="fa fa-plus fa-md"></i> Add Actual Consumption</button> --}}
                                        </div>
                                    </div><br>

                                    <div class="table-responsive">
                                        <table id="tblWaterConsumption"
                                            class="table table-md table-bordered table-striped table-hover text-center"
                                            style="width: 100%;">
                                            <thead>
                                                <tr>
                                                   
                                                    <th>Month</th>
                                                    <th>Fiscal Year</th>
                                                    <th>Year</th>
                                                    <th>Factory</th>
                                                    <th class="text-white" style="background-color: rgb(21, 163, 245);">Target</th>
                                                    <th class="text-white" style="background-color: rgb(9, 189, 33);">Actual</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                {{-- </div> --}}

                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

     <!-- ADD ENERGY MONTHLY TARGET -->
     <div class="modal fade" data-backdrop="static" id="modalWaterTarget">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title" id="h4WaterConsumptionChangeTitle"></h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal"
                        aria-label="Close" id="closeModalAddId">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddWaterTarget">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="fiscal_year" id="fiscalYearId"
                                        style="width: 100%;" readonly> {{-- CURRENT FISCAL YEAR ID --}}
                                    <input type="hidden" class="form-control" name="water_id" id="waterId"
                                        style="width: 100%;" readonly> {{-- ENERGY CONSUMPTION ID --}}
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Factory</label>
                                    <select class="form-control select2bs4 selectFactory" type="text" name="factory"
                                        id="txtSelectAddFactory" style="width: 100%;">
                                        <option value="0" disabled selected>Select Factory</option>
                                        <option value="1">Factory 1</option>
                                        <option value="2">Factory 2</option>
                                        <
                                    </select>
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
                                    <label>Water Consumption Target</label>
                                    <input type="number" class="form-control" step="any" name="water_target" id="txtAddWaterTarget">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="submit" id="btnAddWaterTarget" class="btn btn-primary"><i
                                id="iBtnAddWaterTargetIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- ADD ENERGY MONTHLY TARGET END -->


    <!-- ADD ENERGY MONTHLY CONSUMPTION -->
    <div class="modal fade" data-backdrop="static" id="modalWaterConsumption">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title" id="h4WaterConsumptionActualChangeTitle"></h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal"
                        aria-label="Close" id="closeModalAddId">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddWaterActual">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="fiscal_year" id="txtFiscalYearId"
                                        style="width: 100%;" readonly> {{-- CURRENT FISCAL YEAR ID --}}
                                    <input type="hidden" class="form-control" name="water_id" id="txtEnergyId"
                                        style="width: 100%;" readonly> {{-- ENERGY CONSUMPTION ID --}}
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Factory</label>
                                    <select class="form-control select2bs4 selectFactory" type="text" name="factory"
                                        id="txtSelectAddFactory" style="width: 100%;">
                                        <option value="0" disabled selected>Select Factory</option>
                                        <option value="1">Factory 1</option>
                                        <option value="2">Factory 2</option>
                                        <
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Month</label>
                                    <select class="form-control select2bs4 selectMonth" type="text" name="month"
                                        id="txtSelectAddWaterConsumption" style="width: 100%;">
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
                                    <label>Water Consumption Actual</label>
                                    <input type="text" class="form-control" name="water_consumption" id="txtAddWaterConsumption">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="submit" id="btnAddWaterConsumption" class="btn btn-primary"><i
                                id="iBtnAddWaterConsumptionIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- ADD ENERGY MONTHLY CONSUMPTION -->
@endsection

@section('js_content')

    <script type="text/javascript">
        $(document).ready(function() {

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            GetFiscalYear();
            // GetMonthsFilter($('.selectMonthWater'));
            GetFiscalYearFilter($('.selectYearWater'));


            $("#selFactory").on('change', function() {
                dataTableWaterConsumptions.column(3).search($(this).val()).draw();
            });

            $("#selMonthWater").on('change', function() {
                dataTableWaterConsumptions.column(0).search($(this).val()).draw();
            });

            $("#selFiscalYearWater").on('change', function() {
                dataTableWaterConsumptions.column(1).search($(this).val()).draw();
            });

            //===== DATATABLES OF ENERGY CONSUMPTION ================
            var dataTableWaterConsumptions = $("#tblWaterConsumption").DataTable({
                "processing": false,
                "serverSide": true,
                "responsive": true,
                // // "scrollX": true,
                "ajax": {
                    url: "view_water_consumption",
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
                        "data": "factory",
                        render: function(data) {
                        return "Factory " + data
                    },
                        // orderable: false
                    },
                    {
                        "data": "target",
                        // "render": $.fn.dataTable.render.number(',', 2, ''),
                        orderable: false
                    },
                    {
                        "data": "actual",
                        // "render": $.fn.dataTable.render.number(',', 2, ''),
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
                    [0, 'asc'],
                    [3, 'asc'],
                    [1, 'desc']
                ]
                // "bSort": false,
            });
            //===== DATATABLES OF ENERGY CONSUMPTION END ================


            $('#btnShowWaterTarget').on('click', function(e) {
                // console.log('test');
       
                $('input[name="water_id"]', $("#formAddWaterTarget")).val('');
                $('input[name="water_target"]', $("#formAddWaterTarget")).val('');
                $('select[name="month"]', $("#formAddWaterTarget")).val(0).trigger('change');
                $('select[name="factory"]', $("#formAddWaterTarget")).val(0).trigger('change');
                $('#h4WaterConsumptionChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Water Consumption Target');

                $('select[name="month"]', $("#formAddWaterTarget")).prop('disabled', false);
                $('select[name="factory"]', $("#formAddWaterTarget")).prop('disabled', false);
                // $('select[name="factory"]', $("#formAddWaterTarget")).val(0).trigger('change');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');
            });




            //====== ADD ENERGY CONSUMPTION TARGET ======
            function AddWaterConsumptionTarget() {
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
                    url: "insert_water_target",
                    method: "post",
                    data: $('#formAddWaterTarget').serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $("#iBtnAddWaterTargetIcon").addClass('fa fa-spinner fa-pulse');
                        $("#btnAddWaterTarget").prop('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response['validation'] == 'hasError') {
                            toastr.error('Saving failed!');

                            if (response['error']['factory'] === undefined) {
                                $("#txtSelectAddFactory").removeClass('is-invalid');
                                $("#txtSelectAddFactory").attr('title', '');
                            } else {
                                $("#txtSelectAddFactory").addClass('is-invalid');
                                $("#txtSelectAddFactory").attr('title', response['error']['factory']);
                            }


                            if (response['error']['month'] === undefined) {
                                $("#txtSelectAddMonth").removeClass('is-invalid');
                                $("#txtSelectAddMonth").attr('title', '');
                            } else {
                                $("#txtSelectAddMonth").addClass('is-invalid');
                                $("#txtSelectAddMonth").attr('title', response['error']['month']);
                            }


                            if (response['error']['water_target'] === undefined) {
                                $("#txtAddWaterTarget").removeClass('is-invalid');
                                $("#txtAddWaterTarget").attr('title', '');
                            } else {
                                $("#txtAddWaterTarget").addClass('is-invalid');
                                $("#txtAddWaterTarget").attr('title', response['error']['water_target']);
                            }
                        } else if (response['result'] == 1) {
                            $("#modalWaterTarget").modal('hide');

                            dataTableWaterConsumptions.draw(); // reload the tables after insertion
                            toastr.success('Save success!');
                        } else if (response['result'] == 2) {
                            toastr.warning( 'You already have a record for this month, please edit');
                        }

                        $("#iBtnAddWaterTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddWaterTarget").removeAttr('disabled');
                        $("#iBtnAddWaterTargetIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        $("#iBtnAddWaterTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddWaterTarget").removeAttr('disabled');
                        $("#iBtnAddWaterTargetIcon").addClass('fa fa-check');
                    }
                });
            }

            function AddWaterConsumptionActual() {
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
                    url: "insert_water_actual",
                    method: "post",
                    data: $('#formAddWaterActual').serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $("#iBtnAddWaterActualIcon").addClass('fa fa-spinner fa-pulse');
                        $("#btnAddWaterActual").prop('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response['validation'] == 'hasError') {
                            toastr.error('Saving failed!');

                            if (response['error']['water_consumption'] === undefined) {
                                $("#txtAddWaterActual").removeClass('is-invalid');
                                $("#txtAddWaterActual").attr('title', '');
                            } else {
                                $("#txtAddWaterActual").addClass('is-invalid');
                                $("#txtAddWaterActual").attr('title', response['error']['water_consumption']);
                            }
                        } else if (response['result'] == 1) {
                            $("#modalWaterConsumption").modal('hide');

                            dataTableWaterConsumptions.draw(); // reload the tables after insertion
                            toastr.success('Save success!');
                        } else if (response['result'] == 2) {
                            toastr.warning( 'You already have a record for this month, please edit');
                        }

                        $("#iBtnAddWaterActualIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddWaterActual").removeAttr('disabled');
                        $("#iBtnAddWaterActualIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        $("#iBtnAddWaterActualIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddWaterActual").removeAttr('disabled');
                        $("#iBtnAddWaterActualIcon").addClass('fa fa-check');
                    }
                });
            }

            function GetWaterTargetById(targetId) {
                $.ajax({
                    url: "get_water_target_by_id",
                    method: "get",
                    data: {
                        targetId: targetId,
                    },
                    dataType: "json",
                    success: function(response) {
                        let formAddWaterTarget = $('#formAddWaterTarget');
                        // let formAddEnergyActual = $('#formAddEnergyActual');
                        let waterTargetDetails = response['result'];
                        if (waterTargetDetails.length > 0) {
                            $('select[name="month"]', formAddWaterTarget).val(waterTargetDetails[0].month).trigger('change');
                            $('select[name="factory"]', formAddWaterTarget).val(waterTargetDetails[0].factory).trigger('change');
                            $('select[name="factory"]', formAddWaterActual).val(waterTargetDetails[0].factory).trigger('change');
                            $('select[name="month"]', formAddWaterActual).val(waterTargetDetails[0].month).trigger('change');

                            $("#txtAddWaterTarget").val(waterTargetDetails[0].target);
                            $("#txtAddWaterConsumption").val(waterTargetDetails[0].actual);

                            // $("#txtAddEnergyConsumption").val(energyTargetDetails[0].actual);
                            
                        } else {
                            toastr.warning('No record found!');
                        }
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    },
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


            $("#formAddWaterTarget").submit(function(event) {
                event.preventDefault(); // to stop the form submission
                $('select[name="month"]', $("#formAddWaterTarget")).prop('disabled', false);
                $('select[name="factory"]', $("#formAddWaterTarget")).prop('disabled', false);
                AddWaterConsumptionTarget();
            });

            //===== EDIT WATER CONSUMPTION =====
            $("#tblWaterConsumption").on('click', '.actionEditWaterConsumptionTarget', function() {
                let id = $(this).attr('water-id');

                $("input[name='water_id'", $("#formAddWaterTarget")).val(id);
                $('#h4WaterConsumptionChangeTitle').html('<i class="fas fa-edit"></i>&nbsp;&nbsp; Edit Water Consumption Target');
                $('select[name="month"]', $("#formAddWaterTarget")).prop('disabled', true);
                $('select[name="factory"]', $("#formAddWaterTarget")).prop('disabled', true);


                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetWaterTargetById(id);
            });

            $('#tblWaterConsumption').on('click', '.actionAddWaterConsumption', function() {
                let id = $(this).attr('water-id');

                $('select[name="month"]', $("#formAddWaterActual")).prop('disabled', true);
                $('select[name="factory"]', $("#formAddWaterActual")).prop('disabled', true);
                // $('select[name="factory"]', $("#formAddWaterActual")).val(0).trigger('change');
                $('input[name="water_id"]', $("#formAddWaterActual")).val(id);

                $('input[name="water_consumption"]', $("#formAddWaterActual")).val('');
                $('#h4WaterConsumptionActualChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Water Consumption Actual');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetWaterTargetById(id);
            });

            $("#formAddWaterActual").submit(function(event) {
                event.preventDefault(); // to stop the form submission
                $('select[name="month"]', $("#formAddWaterActual")).prop('disabled', false);
                $('select[name="factory"]', $("#formAddWaterActual")).prop('disabled', false);
                AddWaterConsumptionActual();
            });

            $('#tblWaterConsumption').on('click', '.actionEditWaterConsumption', function() {
                let id = $(this).attr('water-id');

                $('select[name="month"]', $("#formAddWaterActual")).prop('disabled', true);
                $('select[name="factory"]', $("#formAddWaterActual")).prop('disabled', true);
                // $('select[name="factory"]', $("#formAddWaterActual")).val(0).trigger('change');
                $('input[name="water_id"]', $("#formAddWaterActual")).val(id);

                $('input[name="water_consumption"]', $("#formAddWaterActual")).val('');
                $('#h4WaterConsumptionActualChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Edit Water Consumption Actual');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetWaterTargetById(id);
            });
        });
    </script>
@endsection
