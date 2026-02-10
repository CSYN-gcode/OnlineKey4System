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
                            {{-- <!-- <li class="breadcrumb-item"><a href="{{ route('energy_consumption') }}">Energy Consumption</a></li> --> --}}
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

                                        {{-- <div class="form-group ml-3 col-2">
                                            <label><strong>Factory :</strong></label>
                                            <select class="form-control select2bs4 selectFactory" name="month_value"
                                                id="selFactory" style="width: 100%;">
                                                <option value="0" disabled selected>Select Factory</option>
                                                <option value="">All</option>
                                                <option value="1">Factory 1</option>
                                                <option value="2">Factory 2</option>
                                            </select>
                                        </div> --}}
                                       {{-- Spacing --}}
                                    {{-- <div class="form-group ml-3 col-2">
                                        //CURRENT FISCAL YEAR ID
                                        <input type="hidden" class="form-control" name="fiscal_year" id="fiscalYearId1" value="{{ $fiscal_year_id }}" style="width: 100%;" readonly> 
                                        
                                        <label><strong>Current FY | Yearly Target :</strong></label>
                                        @if (isset($yearly_target)) 
                                            @php
                                            $val = $yearly_target;
                                            @endphp
                                        @else
                                            @php
                                             $val = 'NO DATA, PLEASE INSERT!';
                                            @endphp
                                        @endif
                                        <input type="text" class="form-control" style="width: 100%;" value="{{ $val }}" readonly>
                                    </div> --}}
                                
                                    <div style="margin-left: auto">

                                        {{-- @if (isset($fiscal_year_id)) 
                                            <button class="btn btn-warning" data-toggle="modal" data-target="#modalYearlyTarget"
                                            id="btnShowEditWaterYearlyTarget"><i class="fa fa-plus fa-md"></i> Edit Fiscal Year
                                            Target</button> &nbsp;
                                        @else
                                            <button class="btn btn-success" data-toggle="modal" data-target="#modalYearlyTarget"
                                            id="btnShowAddWaterYearlyTarget"><i class="fa fa-plus fa-md"></i> Add Fiscal Year
                                            Target</button> &nbsp;
                                        @endif --}}
                                        
                                        &nbsp;
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalWaterTarget"
                                                id="btnShowWaterTarget"><i class="fa fa-plus fa-md"></i> Add Monthly Target</button> &nbsp;

                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalWaterConsumption"
                                                id="btnShowWaterActual"><i class="fa fa-plus fa-md"></i> Add Actual Consumption</button> &nbsp;

                                    </div>

                                    </div><br>

                                    <div class="table-responsive" style="overflow: scroll; height: 500px;" >
                                        <table id="tblWaterConsumption"
                                            class="table table-md table-bordered table-striped table-hover text-center"
                                            style="width: 100%;">
                                            <thead>
                                                <tr>
                                                   
                                                    <th>Month</th>
                                                    <th>Fiscal Year</th>
                                                    <th>Year</th>
                                                    <th class="text-white" style="background-color: rgb(21, 163, 245); 200px;">Target</th>
                                                    {{-- <th>Factory 1 - Actual</th> --}}
                                                    <th style="width: 170px;">Factory 1 - Actual</th>
                                                    <th style="width: 170px;">Factory 1 - Manpower</th>
                                                    <th style="width: 170px;">Factory 2 - Actual</th>
                                                    <th style="width: 170px;">Factory 2 - Manpower</th>
                                                    <th class="text-white" style="background-color: rgb(12, 238, 12); 200px;">Actual</th>
                                                    <th style="width: 200px;">Status</th>
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

     <!-- ADD WATER MONTHLY TARGET -->
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
    </div> <!-- ADD WATER MONTHLY TARGET END -->


    <!-- ADD WATER MONTHLY CONSUMPTION -->
    <div class="modal fade" data-backdrop="static" id="modalWaterConsumption">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title" id="ActualWaterConsumptionChangeTitle"></h4>
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
                                    <input type="hidden" class="form-control" name="water_id" id="txtWaterId"
                                        style="width: 100%;" readonly> {{-- ENERGY CONSUMPTION ID --}}
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

                            <h5>Factory 1</h5>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Water Consumption</label>
                                    <input type="text" class="form-control" name="water_consumption_factory_1" id="txtAddWaterConsumptionFactory1"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Manpower</label>
                                    <input type="text" class="form-control" name="manpower_factory_1" id="txtAddManpowerFactory1"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            

                            <h5>Factory 2</h5>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Water Consumption</label>
                                    <input type="text" class="form-control" name="water_consumption_factory_2" id="txtAddWaterConsumptionFactory2"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Manpower</label>
                                    <input type="text" class="form-control" name="manpower_factory_2" id="txtAddManpowerFactory2"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
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
    </div> <!-- ADD WATER MONTHLY CONSUMPTION -->
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


            // $("#selFactory").on('change', function() {
            //     dataTableWaterConsumptions.column(3).search($(this).val()).draw();
            // });

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
                        "data": "target",
                        orderable: false,
                        bSort: false
                    },
                    {
                        "data": "factory_1_actual",
                        // "render": $.fn.dataTable.render.number(',', 2, ''),
                        "render": $.fn.dataTable.render.number( '\,', '.', 2, '' ),
                        orderable: false
                    },
                    {
                        "data": "factory_1_manpower",
                        // "render": $.fn.dataTable.render.number(',', 2, ''),
                        "render": $.fn.dataTable.render.number( '\,', '.', 2, '' ),
                        orderable: false
                    },
                    {
                        "data": "factory_2_actual",
                        // "render": $.fn.dataTable.render.number(',', 2, ''),
                        "render": $.fn.dataTable.render.number( '\,', '.', 2, '' ),
                        orderable: false
                    },
                    {
                        "data": "factory_2_manpower",
                        // "render": $.fn.dataTable.render.number(',', 2, ''),
                        "render": $.fn.dataTable.render.number( '\,', '.', 2, '' ),
                        orderable: false
                    },
                    {
                        "data": "actual",
                        "render": $.fn.dataTable.render.number( '\,', '.', 2, '' ),
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
                // $('select[name="factory"]', $("#formAddWaterTarget")).val(0).trigger('change');
                $('#h4WaterConsumptionChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Water Consumption Target');

                $('select[name="month"]', $("#formAddWaterTarget")).prop('disabled', false);
                // $('select[name="factory"]', $("#formAddWaterTarget")).prop('disabled', false);
                // $('select[name="factory"]', $("#formAddWaterTarget")).val(0).trigger('change');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');
            });


            $('#btnShowWaterActual').on('click', function(e) {
                // console.log('test');
       
                $('input[name="water_id"]', $("#formAddWaterActual")).val('');
                $('select[name="month"]', $("#formAddWaterActual")).val(0).trigger('change');
                $('input[name="water_consumption_factory_1"]', $("#formAddWaterActual")).val('');
                $('input[name="manpower_factory_1"]', $("#formAddWaterActual")).val('');
                $('input[name="water_consumption_factory_2"]', $("#formAddWaterActual")).val('');
                $('input[name="manpower_factory_2"]', $("#formAddWaterActual")).val('');
                $('#ActualWaterConsumptionChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Water Consumption Actual');

                $('select[name="month"]', $("#formAddWaterActual")).prop('disabled', false);
                // $('select[name="factory"]', $("#formAddWaterActual")).prop('disabled', false);
                // $('select[name="factory"]', $("#formAddWaterActual")).val(0).trigger('change');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');
            });

            $("#modalYearlyTarget").on('hidden.bs.modal', function () {
                // console.log('Reload');
                setInterval('location.reload()', 2000);
                    });

            $('#btnShowEditWaterYearlyTarget').on('click', function(e) {
                
                // $('select[name="month"]', $("#formAddWaterYearlyTarget")).val(0).trigger('change');
                // // $('select[name="month"]', $("#formAddWaterYearlyTarget")).val(0).trigger('change');
                // $('select[name="month"]', $("#formAddWaterYearlyTarget")).prop('disabled', false);

                // $('#h4EnergyConsumptionChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Energy Consumption Target');
                
                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');
                $.ajax({
                    url: "get_fiscal_year_target",
                    method: "get",
                    data: $('#formAddWaterYearlyTarget').serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        // $("#iBtnAddWaterYearlyTargetIcon").addClass('fa fa-spinner fa-pulse');
                        // $("#btnAddWaterYearlyTarget").prop('disabled', 'disabled');
                    },
                    success: function(response) {
                        console.log(response['water']);
                        $('input[name="fiscal_year"]', $("#formAddWaterYearlyTarget")).val(response['water'][0]['fiscal_year_id']);
                        $('input[name="yearly_target_id"]', $("#formAddWaterYearlyTarget")).val(response['water'][0]['id']);
                        $('input[name="yearly_target"]', $("#formAddWaterYearlyTarget")).val(response['water'][0]['yearly_target']);
                        // $("#iBtnAddWaterYearlyTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        // $("#btnAddWaterYearlyTarget").removeAttr('disabled');
                        // $("#iBtnAddWaterYearlyTargetIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        $("#iBtnAddWaterYearlyTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddWaterYearlyTarget").removeAttr('disabled');
                        $("#iBtnAddWaterYearlyTargetIcon").addClass('fa fa-check');
                    }
                });
            });

            $('#btnShowAddWaterYearlyTarget').on('click', function(e) {
                
                // $('select[name="month"]', $("#formAddEnergyYearlyTarget")).val(0).trigger('change');
                // // $('select[name="month"]', $("#formAddEnergyYearlyTarget")).val(0).trigger('change');
                // $('select[name="month"]', $("#formAddEnergyYearlyTarget")).prop('disabled', false);

                // $('#h4EnergyConsumptionChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Energy Consumption Target');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');
                $.ajax({
                    url: "get_fiscal_year_target",
                    method: "get",
                    data: $('#formAddWaterYearlyTarget').serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        // $("#iBtnAddWaterYearlyTargetIcon").addClass('fa fa-spinner fa-pulse');
                        // $("#btnAddWaterYearlyTarget").prop('disabled', 'disabled');
                    },
                    success: function(response) {
                        // console.log(response['water']);
                        $('input[name="fiscal_year"]', $("#formAddWaterYearlyTarget")).val(response['fiscal_year'][0]['id']);
                        $('input[name="yearly_target_id"]', $("#formAddWaterYearlyTarget")).val(response['water'][0]['id']);
                        // $('input[name="yearly_target"]', $("#formAddWaterYearlyTarget")).val(response['water'][0]['yearly_target']);
                        // $("#iBtnAddWaterYearlyTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        // $("#btnAddWaterYearlyTarget").removeAttr('disabled');
                        // $("#iBtnAddWaterYearlyTargetIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        $("#iBtnAddWaterYearlyTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddWaterYearlyTarget").removeAttr('disabled');
                        $("#iBtnAddWaterYearlyTargetIcon").addClass('fa fa-check');
                    }
                });
            });

            //====== ADD ENERGY CONSUMPTION YEARLY TARGET ======
            function AddWaterYearlyTarget() {
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
                    url: "insert_water_yearly_target",
                    method: "post",
                    data: $('#formAddWaterYearlyTarget').serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $("#iBtnAddWaterYearlyTargetIcon").addClass('fa fa-spinner fa-pulse');
                        $("#btnAddWaterYearlyTarget").prop('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response['validation'] == 'hasError') {
                            toastr.error('Saving failed!');

                            if (response['error']['yearly_target'] === undefined) {
                                $("#txtAddWaterYearlyTarget").removeClass('is-invalid');
                                $("#txtAddWaterYearlyTarget").attr('title', '');
                            } else {
                                $("#txtAddWaterYearlyTarget").addClass('is-invalid');
                                $("#txtAddWaterYearlyTarget").attr('title', response['error']['yearly_target']);
                            }
                        } else if (response['result'] == 1) {
                            $("#modalYearlyTarget").modal('hide');

                            dataTableWaterConsumptions.draw(); // reload the tables after insertion
                            toastr.success('Save success!');
                            // setInterval('location.reload()', 3000);
                        } else if (response['result'] == 2) {
                            toastr.warning( 'You already have a record for this month, please edit');
                        }

                        $("#iBtnAddWaterYearlyTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddWaterYearlyTarget").removeAttr('disabled');
                        $("#iBtnAddWaterYearlyTargetIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        $("#iBtnAddWaterYearlyTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddWaterYearlyTarget").removeAttr('disabled');
                        $("#iBtnAddWaterYearlyTargetIcon").addClass('fa fa-check');
                    }
                });
            }

            //energy yearly target form on click
            $("#formAddWaterYearlyTarget").submit(function(event) {
                event.preventDefault(); // to stop the form submission
                $('select[name="yearly_target_id"]', $("#formAddWaterYearlyTarget")).prop('disabled', false);
                AddWaterYearlyTarget();
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

                            // if (response['error']['factory'] === undefined) {
                            //     $("#txtSelectAddFactory").removeClass('is-invalid');
                            //     $("#txtSelectAddFactory").attr('title', '');
                            // } else {
                            //     $("#txtSelectAddFactory").addClass('is-invalid');
                            //     $("#txtSelectAddFactory").attr('title', response['error']['factory']);
                            // }


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
                        }else if (response['result'] == 0) {
                            toastr.warning( 'You already have a record for this month!');
                        } else if (response['result'] == 1) {
                            $("#modalWaterTarget").modal('hide');

                            dataTableWaterConsumptions.draw(); // reload the tables after insertion
                            toastr.success('Save success!');
                        } else if (response['result'] == 2) {
                            toastr.warning( 'You already have a record for this month!');
                        }else if (response['result'] == 3) {
                            toastr.warning( 'You have no target for this month, please put target first!');
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

                            if (response['error']['water_consumption_factory_1'] === undefined) {
                                $("#txtAddWaterConsumptionFactory1").removeClass('is-invalid');
                                $("#txtAddWaterConsumptionFactory1").attr('title', '');
                            } else {
                                $("#txtAddWaterConsumptionFactory1").addClass('is-invalid');
                                $("#txtAddWaterConsumptionFactory1").attr('title', response['error']['water_consumption_factory_1']);
                            }

                            if (response['error']['manpower_factory_1'] === undefined) {
                                $("#txtAddManpowerFactory1").removeClass('is-invalid');
                                $("#txtAddManpowerFactory1").attr('title', '');
                            } else {
                                $("#txtAddManpowerFactory1").addClass('is-invalid');
                                $("#txtAddManpowerFactory1").attr('title', response['error']['manpower_factory_1']);
                            }

                            if (response['error']['water_consumption_factory_2'] === undefined) {
                                $("#txtAddWaterConsumptionFactory2").removeClass('is-invalid');
                                $("#txtAddWaterConsumptionFactory2").attr('title', '');
                            } else {
                                $("#txtAddWaterConsumptionFactory2").addClass('is-invalid');
                                $("#txtAddWaterConsumptionFactory2").attr('title', response['error']['water_consumption_factory_2']);
                            }

                            if (response['error']['manpower_factory_2'] === undefined) {
                                $("#txtAddManpowerFactory2").removeClass('is-invalid');
                                $("#txtAddManpowerFactory2").attr('title', '');
                            } else {
                                $("#txtAddManpowerFactory2").addClass('is-invalid');
                                $("#txtAddManpowerFactory2").attr('title', response['error']['manpower_factory_2']);
                            }

                        } else if (response['result'] == 0) {
                            toastr.warning( 'You already have a record for this month!');
                        }else if (response['result'] == 1) {
                            $("#modalWaterConsumption").modal('hide');

                            dataTableWaterConsumptions.draw(); // reload the tables after insertion
                            toastr.success('Save success!');
                        } else if (response['result'] == 2) {
                            toastr.warning( 'You already have a record for this month!');
                        }
                        else if (response['result'] == 3) {
                            toastr.warning( 'You have no target for this month, please put target first!');
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
                            // $('select[name="factory"]', formAddWaterTarget).val(waterTargetDetails[0].factory).trigger('change');
                            // $('select[name="factory"]', formAddWaterActual).val(waterTargetDetails[0].factory).trigger('change');
                            $('select[name="month"]', formAddWaterActual).val(waterTargetDetails[0].month).trigger('change');

                            $("#txtAddWaterTarget").val(waterTargetDetails[0].target);
                            $("#txtAddWaterConsumptionFactory1").val(waterTargetDetails[0].factory_1_actual );
                            $("#txtAddManpowerFactory1").val(waterTargetDetails[0].factory_1_manpower );
                            $("#txtAddWaterConsumptionFactory2").val(waterTargetDetails[0].factory_2_actual );
                            $("#txtAddManpowerFactory2").val(waterTargetDetails[0].factory_2_manpower );

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
                // $('select[name="factory"]', $("#formAddWaterTarget")).prop('disabled', false);
                AddWaterConsumptionTarget();
            });

            //===== EDIT WATER CONSUMPTION =====
            $("#tblWaterConsumption").on('click', '.actionEditWaterConsumptionTarget', function() {
                let id = $(this).attr('water-id');

                $("input[name='water_id'", $("#formAddWaterTarget")).val(id);
                $('#h4WaterConsumptionChangeTitle').html('<i class="fas fa-edit"></i>&nbsp;&nbsp; Edit Water Consumption Target');
                $('select[name="month"]', $("#formAddWaterTarget")).prop('disabled', false);
                // $('select[name="factory"]', $("#formAddWaterTarget")).prop('disabled', true);


                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetWaterTargetById(id);
            });

            $('#tblWaterConsumption').on('click', '.actionAddWaterConsumption', function() {
                let id = $(this).attr('water-id');

                $('select[name="month"]', $("#formAddWaterActual")).prop('disabled', true);
                // $('select[name="factory"]', $("#formAddWaterActual")).prop('disabled', true);
                // $('select[name="factory"]', $("#formAddWaterActual")).val(0).trigger('change');
                $('input[name="water_id"]', $("#formAddWaterActual")).val(id);

                $('input[name="water_consumption_factory_1"]', $("#formAddWaterActual")).val('');
                $('input[name="water_consumption_factory_2"]', $("#formAddWaterActual")).val('');
                $('input[name="manpower_factory_1"]', $("#formAddWaterActual")).val('');
                $('input[name="manpower_factory_2"]', $("#formAddWaterActual")).val('');
                $('#ActualWaterConsumptionChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Water Consumption Actual');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetWaterTargetById(id);
            });

            $("#formAddWaterActual").submit(function(event) {
                event.preventDefault(); // to stop the form submission
                $('select[name="month"]', $("#formAddWaterActual")).prop('disabled', false);
                // $('select[name="factory"]', $("#formAddWaterActual")).prop('disabled', false);
                AddWaterConsumptionActual();
            });

            $('#tblWaterConsumption').on('click', '.actionEditWaterConsumption', function() {
                let id = $(this).attr('water-id');

                $('select[name="month"]', $("#formAddWaterActual")).prop('disabled', false);
                // $('select[name="factory"]', $("#formAddWaterActual")).prop('disabled', true);
                // $('select[name="factory"]', $("#formAddWaterActual")).val(0).trigger('change');
                $('input[name="water_id"]', $("#formAddWaterActual")).val(id);

                
                $('input[name="water_consumption_factory_1"]', $("#formAddWaterActual")).val('');
                $('input[name="water_consumption_factory_2"]', $("#formAddWaterActual")).val('');
                $('input[name="manpower_factory_1"]', $("#formAddWaterActual")).val('');
                $('input[name="manpower_factory_2"]', $("#formAddWaterActual")).val('');
                $('#ActualWaterConsumptionChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Edit Water Consumption Actual');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetWaterTargetById(id);
            });
        });
    </script>
@endsection
