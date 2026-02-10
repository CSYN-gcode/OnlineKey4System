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
@section('title', 'Ink Consumption')

@section('content_page')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ink Consumption - Support Group</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Ink Consumption - SG</li>
                            {{-- <!-- <li class="breadcrumb-item"><a href="{{ route('water_consumption') }}">Water Consumption</a></li> --> --}}
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
                                <h3 class="card-title">Ink Consumption</h3>
                            </div>
                            <div class="card-body">
                                <!-- {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
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
                                </ul> --}} -->

                                <!-- {{-- <div class="tab-content" id="myTabContent"> --}}

                                {{-- <div class="tab-pane fade show active" id="monthly-target" role="tabpanel" aria-labelledby="monthly-target-tab"> --}} -->
                                <div class="text-left mt-4 d-flex flex-row">
                                    <div class="form-group ml-3 col-2">
                                        <label><strong>Fiscal Year :</strong></label>
                                        <select class="form-control select2bs4 selectYearEnergy" name="fiscal_year"
                                            id="selFiscalYearEnergy" style="width: 100%;">
                                            <!-- Code generated -->
                                        </select>
                                    </div>

                                    {{-- <div class="form-group ml-3 col-2">
                                        <label><strong>Month :</strong></label>
                                        <select class="form-control select2bs4 selectMonthEnergy" name="month_value"
                                            id="selMonthEnergy" style="width: 100%;">
                                            <!-- Code generated -->
                                        </select>
                                    </div> --}}
                                    <div class="form-group ml-3 col-2">
                                        <label><strong>Month :</strong></label>
                                        <select class="form-control select2bs4 selectMonthInkSG" name="month_value"
                                            id="selMonthInkSG" style="width: 100%;">
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
                                        <label><strong>Department :</strong></label>
                                        <select class="form-control select2bs4 selectDepartment" name="department_value"
                                            id="selDepartment" style="width: 100%;">
                                            <option value="0" disabled selected>Select Department</option>
                                            <option value="">All</option>
                                            <option value="1">BOD</option>
                                            <option value="2">IAS</option>
                                            <option value="3">FIN</option>
                                            <option value="4">HRD</option>
                                            <option value="5">ESS</option>
                                            <option value="6">LOG</option>
                                            <option value="7">FAC</option>
                                            <option value="8">ISS</option>
                                            <option value="9">QAD</option>
                                            <option value="10">EMS</option>
                                        </select>
                                    </div>

                                    <div style="margin-left: auto">

                                        <button class="btn btn-primary ink_admin_addtarget" data-toggle="modal" data-target="#modalInkTargetForSemiAdmin"
                                            id="btnShowInkTargetSemiAdmin"><i class="fa fa-plus fa-md"></i>(admin) Add Monthly
                                            Target</button> &nbsp;

                                         <button class="btn btn-primary ink_admin_addactual" data-toggle="modal" data-target="#modalInkConsumptionForSemiAdmin" 
                                            id="btnShowInkActualSemiAdmin"><i class="fa fa-plus fa-md"></i>(admin) Add Actual Consumption</button>
 
                                        <button class="btn btn-primary ink_user_addtarget" data-toggle="modal" data-target="#modalInkTarget"
                                            id="btnShowInkTarget"><i class="fa fa-plus fa-md"></i> Add Monthly
                                            Target</button> &nbsp;

                                        <button class="btn btn-primary ink_user_addactual" data-toggle="modal"
                                            data-target="#modalInkConsumption" id="btnShowInkActual"><i
                                            class="fa fa-plus fa-md"></i> Add Actual Consumption</button>

                                    </div>
                                </div><br>

                                <div class="table-responsive" style="overflow: scroll; height: 500px;" >
                                    <table id="tblInkConsumption"
                                        class="table table-md table-bordered table-striped table-hover text-center"
                                        style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Month</th>
                                                <th>Fiscal Year</th>
                                                <th>Year</th>
                                                <th>Department</th>
                                                <th class="text-white" style="background-color: rgb(21, 163, 245);">Target</th>
                                                <th class="text-white" style="background-color: rgb(9, 189, 33);">Actual</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- {{-- </div> --}}

                                {{-- </div> --}} -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- =================================== HTML LAYOUT PART END ============================================== -->

    <!-- =================================== MODAL PART START ============================================== -->

    <!-- ADD INK MONTHLY TARGET -->
    <div class="modal fade" data-backdrop="static" id="modalInkTarget">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title" id="InkConsumptionChangeTitle"></h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal"
                        aria-label="Close" id="closeModalAddId">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddInkTarget">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">

                                    <input type="hidden" class="form-control" name="fiscal_year" id="fiscalYearId"
                                        style="width: 100%;" readonly> {{-- CURRENT FISCAL YEAR ID --}}
                                    <input type="hidden" class="form-control" name="ink_id" id="energyId"
                                        style="width: 100%;" readonly> {{-- ENERGY CONSUMPTION ID --}}
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control select2bs4 selectDepartment" type="text" name="department"
                                         style="width: 100%;">
                                        <option value="0" disabled selected>Select Department</option>
                                        <option value="1">BOD</option>
                                        <option value="2">IAS</option>
                                        <option value="3">FIN</option>
                                        <option value="4">HRD</option>
                                        <option value="5">ESS</option>
                                        <option value="6">LOG</option>
                                        <option value="7">FAC</option>
                                        <option value="8">ISS</option>
                                        <option value="9">QAD</option>
                                        <option value="10">EMS</option>
                                        
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
                                    <label>Energy Consumption Target</label>
                                    <input type="text" class="form-control" name="ink_target" id="txtAddInkTarget"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="submit" id="btnAddInkTarget" class="btn btn-primary"><i
                                id="iBtnAddInkTargetIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- ADD INK MONTHLY TARGET END -->


    <!-- ADD INK MONTHLY ACTUAL CONSUMPTION -->
    <div class="modal fade" data-backdrop="static" id="modalInkConsumption">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title" id="InkConsumptionActualChangeTitle"></h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal"
                        aria-label="Close" id="closeModalAddId">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddInkActual">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="fiscal_year_consumption" id="txtFiscalYearId"
                                        style="width: 100%;" readonly> {{-- CURRENT FISCAL YEAR ID --}}
                                    <input type="hidden" class="form-control" name="ink_consumption_id" id="txtInkId"
                                        style="width: 100%;" readonly> {{-- INK CONSUMPTION ID --}}
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control select2bs4 selectDepartment" type="text" name="department"
                                        id="txtSelectAddDepartment" style="width: 100%;">
                                        <option value="0" disabled selected>Select Department</option>
                                        <option value="1">BOD</option>
                                        <option value="2">IAS</option>
                                        <option value="3">FIN</option>
                                        <option value="4">HRD</option>
                                        <option value="5">ESS</option>
                                        <option value="6">LOG</option>
                                        <option value="7">FAC</option>
                                        <option value="8">ISS</option>
                                        <option value="9">QAD</option>
                                        <option value="10">EMS</option>
                                    </select>
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
                                    <label>Ink Consumption Actual</label>
                                    <input type="text" class="form-control" name="ink_consumption" id="txtAddInkConsumption"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="submit" id="btnAddInkConsumption" class="btn btn-primary"><i
                                id="ibtnAddInkConsumptionIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- ADD INK MONTHLY ACTUAL CONSUMPTION END -->

    <!-- =================================== MODAL PART END ============================================== -->

@endsection

    <!-- =================================== JS PART START ============================================== -->

@section('js_content')

    <script type="text/javascript">
        $(document).ready(function() {

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            GetFiscalYear();
            GetMonthsFilter($('.selectMonthEnergy'));
            GetFiscalYearFilter($('.selectYearEnergy'));

            $("#selDepartment").on('change', function() {
                // dataTableInkConsumptions.column(3).search($(this).val()).draw();
                var selectedValue = $(this).val();
                if (selectedValue) {
                    // var selectedValue = $(this).val();
                    dataTableInkConsumptions.column(3).search("^"+selectedValue+"$", true, false).draw();
                    
                } else {
                    dataTableInkConsumptions.column(3).search("").draw();
                }
            });    

            // $("#selMonthEnergy").on('change', function() {
            //     dataTableInkConsumptions.column(0).search($(this).val()).draw();
            // });

            $("#selMonthInkSG").on('change', function() {
                dataTableInkConsumptions.column(0).search($(this).val()).draw();
            });

            $("#selFiscalYearEnergy").on('change', function() {
                dataTableInkConsumptions.column(1).search($(this).val()).draw();
            });

            //===== DATATABLES OF ENERGY CONSUMPTION ================
            var dataTableInkConsumptions = $("#tblInkConsumption").DataTable({
                "processing": false,
                "serverSide": true,
                // "responsive": true,
                // "scrollY": true,
                "ajax": {
                    url: "view_ink_consumption_sg",
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
                        "data": "department",
                        render: function(data) {
                            if(data == 1) {
                                return 'BOD'
                            }
                            else if(data == 2) {
                                return 'IAS'
                            }
                            else if(data == 3) {
                                return 'FIN'
                            }
                            else if(data == 4) {
                                return 'HRD'
                            }
                            else if(data == 5) {
                                return 'ESS'
                            }
                            else if(data == 6) {
                                return 'LOG'
                            }
                            else if(data == 7) {
                                return 'FAC'
                            }
                            else if(data == 8) {
                                return 'ISS'
                            }
                            else if(data == 9) {
                                return 'QAD'
                            }
                            else if(data == 10){
                                return 'EMS'
                            }
                        }
                    },
                    {
                        "data": "target",
                        // "render": $.fn.dataTable.render.number(',', 2, ''),
                        "render": $.fn.dataTable.render.number( '\,', '.', 2, '' ),
                        orderable: false
                    },
                    {
                        "data": "actual",
                        // "render": $.fn.dataTable.render.number(',', 2, ''),
                        "render": $.fn.dataTable.render.number( '\,', '.', 2, '' ),
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


            $('#txtAddInkTarget, #txtAddInkConsumption').keyup(function(e) {
                if (e.which >= 37 && e.which <= 40) return;

                // $(this).val(function(index, value) {
                //     return value
                //         .replace(/\D/g, "")
                //         .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                // });
            });

            $('#btnShowInkTarget').on('click', function(e) {
                $('input[name="ink_id"]', $("#formAddInkTarget")).val('');
                $('input[name="ink_target"]', $("#formAddInkTarget")).val('');
                $('select[name="month"]', $("#formAddInkTarget")).val(0).trigger('change');
                $('select[name="department"]', $("#formAddInkTarget")).val(0).trigger('change');
                // $('select[name="month"]', $("#formAddInkTarget")).val(0).trigger('change');
                $('select[name="month"]', $("#formAddInkTarget")).prop('disabled', false);

                $('#InkConsumptionChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Energy Consumption Target');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');
            });


            //====== ADD ENERGY CONSUMPTION TARGET ======
            function AddInkConsumptionTarget() {
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
                    url: "insert_ink_target",
                    method: "post",
                    data: $('#formAddInkTarget').serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $("#iBtnAddInkTargetIcon").addClass('fa fa-spinner fa-pulse');
                        $("#btnAddInkTarget").prop('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response['validation'] == 'hasError') {
                            toastr.error('Saving failed!');

                            if (response['error']['department'] === undefined) {
                                $("#txtSelectAddDepartment").removeClass('is-invalid');
                                $("#txtSelectAddDepartment").attr('title', '');
                            } else {
                                $("#txtSelectAddDepartment").addClass('is-invalid');
                                $("#txtSelectAddDepartment").attr('title', response['error']['department']);
                            }

                            if (response['error']['month'] === undefined) {
                                $("#txtSelectAddMonth").removeClass('is-invalid');
                                $("#txtSelectAddMonth").attr('title', '');
                            } else {
                                $("#txtSelectAddMonth").addClass('is-invalid');
                                $("#txtSelectAddMonth").attr('title', response['error']['month']);
                            }

                            if (response['error']['ink_target'] === undefined) {
                                $("#txtAddInkTarget").removeClass('is-invalid');
                                $("#txtAddInkTarget").attr('title', '');
                            } else {
                                $("#txtAddInkTarget").addClass('is-invalid');
                                $("#txtAddInkTarget").attr('title', response['error']['ink_target']);
                            }
                        } else if (response['result'] == 1) {
                            $("#modalInkTarget").modal('hide');

                            dataTableInkConsumptions.draw(); // reload the tables after insertion
                            toastr.success('Save success!');
                        } else if (response['result'] == 2) {
                            toastr.warning( 'You already have a record for this month, please edit');
                        }

                        $("#iBtnAddInkTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddInkTarget").removeAttr('disabled');
                        $("#iBtnAddInkTargetIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        $("#iBtnAddInkTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddInkTarget").removeAttr('disabled');
                        $("#iBtnAddInkTargetIcon").addClass('fa fa-check');
                    }
                });
            }

            //====== ADD ENERGY CONSUMPTION ACTUAL ======
            function AddInkConsumptionActual() {
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
                    url: "insert_ink_actual",
                    method: "post",
                    data: $('#formAddInkActual').serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $("#ibtnAddInkConsumptionIcon").addClass('fa fa-spinner fa-pulse');
                        $("#btnAddInkConsumption").prop('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response['validation'] == 'hasError') {
                            toastr.error('Saving failed!');
                            if (response['error']['ink_consumption'] === undefined) {
                                $("#txtAddInkConsumption").removeClass('is-invalid');
                                $("#txtAddInkConsumption").attr('title', '');
                            } else {
                                $("#txtAddInkConsumption").addClass('is-invalid');
                                $("#txtAddInkConsumption").attr('title', response['error']['ink_consumption']);
                            }
                        } else if (response['result'] == 1) {
                            $("#modalInkConsumption").modal('hide');

                            dataTableInkConsumptions.draw(); // reload the tables after insertion
                            toastr.success('Save success!');
                        }
                   
                        $("#ibtnAddInkConsumptionIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddInkConsumption").removeAttr('disabled');
                        $("#ibtnAddInkConsumptionIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        $("#ibtnAddInkConsumptionIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddInkConsumption").removeAttr('disabled');
                        $("#ibtnAddInkConsumptionIcon").addClass('fa fa-check');
                    }
                });
            }

            function GetInkTargetById(targetId) {
                $.ajax({
                    url: "get_ink_target_by_id",
                    method: "get",
                    data: {
                        targetId: targetId,
                    },
                    dataType: "json",
                    success: function(response) {
                        let formAddInkTarget = $('#formAddInkTarget');
                        let formAddInkActual = $('#formAddInkActual');
                        let inkTargetDetails = response['result'];
                        if (inkTargetDetails.length > 0) {
                            $('select[name="month"]', formAddInkTarget).val(inkTargetDetails[0].month).trigger('change');
                            $('select[name="month_consumption"]', formAddInkActual).val(inkTargetDetails[0].month).trigger('change');
                            $('select[name="department"]', formAddInkTarget).val(inkTargetDetails[0].department).trigger('change');
                            $('select[name="department"]', formAddInkActual).val(inkTargetDetails[0].department).trigger('change');
                            $("#txtAddInkTarget").val(inkTargetDetails[0].target);
                            $("#txtAddInkConsumption").val(inkTargetDetails[0].actual);
                            
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

            //ADD INK TARGET FORM SUBMIT FUNCTION 
            $("#formAddInkTarget").submit(function(event) {
                event.preventDefault(); // to stop the form submission
                $('select[name="month"]', $("#formAddInkTarget")).prop('disabled', false);
                $('select[name="department"]', $("#formAddInkTarget")).prop('disabled', false);
                AddInkConsumptionTarget();
            });

            //===== EDIT INK CONSUMPTION TARGET =====
            $("#tblInkConsumption").on('click', '.actionEditInkConsumptionTarget', function() {
                let id = $(this).attr('ink-id');

                $("input[name='ink_id'", $("#formAddInkTarget")).val(id);
                $('#InkConsumptionChangeTitle').html('<i class="fas fa-edit"></i>&nbsp;&nbsp; Edit Ink Consumption Target');
                $('select[name="month"]', $("#formAddInkTarget")).prop('disabled', true);
                $('select[name="department"]', $("#formAddInkTarget")).prop('disabled', true);
                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetInkTargetById(id);
            });

            //===== ADD NEW INK ACTUAL CONSUMPTION  =====
            $('#tblInkConsumption').on('click', '.actionAddInkConsumption', function() {
                let id = $(this).attr('ink-id');

                $('select[name="month_consumption"]', $("#formAddInkActual")).prop('disabled', true);
                $('input[name="ink_consumption_id"]', $("#formAddInkActual")).val(id);
                $('input[name="ink_consumption"]', $("#formAddInkActual")).val('');
                $('select[name="department"]', $("#formAddInkActual")).prop('disabled', true);
                $('select[name="month_consumption"]', $("#formAddInkActual")).val(0).trigger('change');
                $('#InkConsumptionActualChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Ink Consumption Actual');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetInkTargetById(id);

            });
        
            $("#formAddInkActual").submit(function(event) {
                event.preventDefault(); // to stop the form submission
                $('select[name="month_consumption"]', $("#formAddInkActual")).prop('disabled', false);
                $('select[name="department"]', $("#formAddInkActual")).prop('disabled', false);
                AddInkConsumptionActual();
            });

            //===== EDIT INK ACTUAL CONSUMPTION =====
            $('#tblInkConsumption').on('click', '.actionEditInkConsumption', function() {
                let id = $(this).attr('ink-id');

                $('select[name="month_consumption"]', $("#formAddInkActual")).prop('disabled', true);
                $('select[name="department"]', $("#formAddInkActual")).prop('disabled', true);
                $('input[name="ink_consumption_id"]', $("#formAddInkActual")).val(id);
                $('#InkConsumptionActualChangeTitle').html('<i class="fas fa-edit"></i>&nbsp;&nbsp; Edit Ink Consumption Actual');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetInkTargetById(id);
            });
        

        });
    </script>
@endsection
