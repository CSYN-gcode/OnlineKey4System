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
                                <h4>User Management</h4>
                            </div>

                            <div class="card-body">
                                <div class="text-right mt-3">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddUser"
                                        id="addUserModalbtn"><i class="fa fa-plus fa-md"></i> Add Staff</button>
                                </div><br>
                                <div class="table responsive">
                                    <table id="usersTable"
                                        class="table table-sm table-bordered table-striped table-hover display nowrap text-center"
                                        style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th style="display: none">Department_Name</th>
                                                <th>Department</th>
                                                <th>User Level</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- ADD USER MODAL START -->
    <div class="modal fade" id="modalAddUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title"><i class="fa fa-user"></i>&nbsp;&nbsp;Add Staff</h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="addUserForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                {{-- <div class="form-group">
                                    <input type="text" class="form-control" name="rapidx_user_id" id="RapidxUserId" style="width: 100%;" readonly>
                                </div> --}}
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <select class="form-control select2bs4" id="selAddUserAccessUserId"
                                    name="user_id" style="width: 100%;">
                                    <option disabled selected>-- Select User --</option>
                                    <!-- <option disabled selected>-- Select User --</option> <option value="AL">Alabama</option> -->
                                    <!-- <option value="WY">Wyoming</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><strong>Department :</strong></label>
                                    <select class="form-control select2bs4 selectDepartment" name="department_id"
                                        id="selDepartment" style="width: 100%;">
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
                                        <option value="11">TS</option>
                                        <option value="12">CN</option>
                                        <option value="13">YF</option>
                                        <option value="14">PPS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>User Level</label>
                                    <select class="form-control select2bs4 selectUserLevel" name="userLevel"
                                        id="selAddUserLevelId" style="width: 100%;">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnAddUser" class="btn btn-primary"><i id="btnAddUserIcon"
                                class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ADD USER MODAL END -->

    <!-- DEACTIVATE USER MODAL START -->
    <div class="modal fade" id="modalDeactivateUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title"><i class="fa fa-user"></i>&nbsp;&nbsp;Deactivate Staff</h4>
                    <button type="button" style="color: #fff" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="deactivateUserForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">
                            <label class="text-secondary mt-2">Are you sure you want to deactivate this user?</label>
                            <input type="hidden" class="form-control" name="user_id" id="deactivateUserID">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnDeactivateUser" class="btn btn-primary"><i id="deactivateIcon"
                                class="fa fa-check"></i> Deactivate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- DEACTIVATE USER MODAL END -->

    <!-- ACTIVATE USER MODAL START -->
    <div class="modal fade" id="modalActivateUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title"><i class="fa fa-user"></i>&nbsp;&nbsp;Activate Staff</h4>
                    <button type="button" style="color: #fff" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="activateUserForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">
                            <label class="text-secondary mt-2">Activate this user?</label>
                            <input type="hidden" class="form-control" name="user_id" id="activateUserID">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnActivateUser" class="btn btn-primary"><i id="activateIcon"
                                class="fa fa-check"></i> Activate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ACTIVATE USER MODAL END -->

    <!-- EDIT USER MODAL START -->
    <div class="modal fade" id="modalEditUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title"><i class="fa fa-user"></i>&nbsp;&nbsp;Edit Staff</h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="editUserForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="txtEditUserAccessId" name="user_access_id">
                                    <label for="projectinput1">User</label>
                                    <select class="form-control" id="selEditUserAccessUserId" name="user_id"
                                    style="width: 100%;">
                                    <option disabled selected>-- Select User --</option>
                                    <!-- <option value="AL">Alabama</option> -->
                                    <!-- <option value="WY">Wyoming</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><strong>Department :</strong></label>
                                    <input type="text" style="height: 30px" class="form-control" id="txtEditUserDepartmentId" readonly>
                                    <select class="form-control select2bs4 selectDepartment" name="department_id"
                                        id="selDepartment" style="width: 100%;">
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
                                        <option value="11">TS</option>
                                        <option value="12">CN</option>
                                        <option value="13">YF</option>
                                        <option value="14">PPS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>User Level</label>
                                    <label for="projectinput1">User Level</label>
                                    <select class="form-control" id="selEditUserLevelId" name="user_level_id">
                                        <option disabled selected>-- Select User Level --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnEditUser" class="btn btn-primary"><i id="btnEditUserIcon"
                                class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- EDIT USER MODAL END -->

@endsection


{{-- JS CONTENT --}}
@section('js_content')
    <script type="text/javascript">

        $(document).ready(function () {

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        // GetUserDetails();

        GetUsersByStat(1, $("#selAddUserAccessUserId"));
        GetUserLevel(1, $("#selAddUserLevelId"));

        GetUsersByStat(1, $("#selEditUserAccessUserId"));
        // GetUserDepartment(1, $("#selEditUserDepartmentId"));
        GetUserLevel(1, $("#selEditUserLevelId"));


        function GetUsersByStat(userStat, cboElement) {
            let result = '<option value="0" disabled selected>--Select User--</option>';
            $.ajax({
                url: 'get_users_by_stat',
                method: 'get',
                data: {
                    'user_stat': userStat
                },
                dataType: 'json',
                beforeSend: function() {
                    result = '<option value="0" disabled selected>--Loading--</option>';
                    cboElement.html(result);
                },
                success: function(JsonObject) {
                    if (JsonObject['users'].length > 0) {
                        result = '<option value="0" disabled selected>--Select User--</option>';
                        for (let index = 0; index < JsonObject['users'].length; index++) {
                            result += '<option value="' + JsonObject['users'][index].id + '">' + JsonObject[
                                'users'][index].name + '</option>';
                        }
                    } else {
                        result = '<option value="0" selected disabled> -- No record found -- </option>';
                    }
                    cboElement.html(result);
                    $("#selAddUserAccessUserId").select2();
                },
                error: function(data, xhr, status) {
                    result = '<option value="0" selected disabled> -- Reload Again -- </option>';
                    cboElement.html(result);
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }

        // function GetUserDepartment(userStat, cboElement) {
        //     let result = '<option value="0" disabled selected>--Select User--</option>';
        //     $.ajax({
        //         url: 'get_UserDepartment',
        //         method: 'get',
        //         data: {
        //             'user_stat': userStat
        //         },
        //         dataType: 'json',
        //         beforeSend: function() {
        //             result = '<option value="0" disabled selected>--Loading--</option>';
        //             cboElement.html(result);
        //         },
        //         success: function(JsonObject) {
        //             if (JsonObject['users'].length > 0) {
        //                 result = '<option value="0" disabled selected>--Select Department--</option>';
        //                 for (let index = 0; index < JsonObject['users'].length; index++) {
        //                     result += '<option value="' + JsonObject['users'][index].id + '">' + JsonObject[
        //                         'users'][index].name + '</option>';
        //                 }
        //             } else {
        //                 result = '<option value="0" selected disabled> -- No record found -- </option>';
        //             }
        //             cboElement.html(result);
        //             $("#selAddUserAccessUserId").select2();
        //         },
        //         error: function(data, xhr, status) {
        //             result = '<option value="0" selected disabled> -- Reload Again -- </option>';
        //             cboElement.html(result);
        //             console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        //         }
        //     });
        // }

        function GetUserLevel(userLevelStat, cboElement) {
            let result = '<option value="0" selected disabled> -- Select User Level -- </option>';
            $.ajax({
                url: 'get_user_level',
                method: 'get',
                data: {
                    'user_level_stat': userLevelStat
                },
                dataType: 'json',
                beforeSend: function () {
                    result = '<option value="0" selected disabled> -- Loading -- </option>';
                    cboElement.html(result);
                },
                success: function (JsonObject) {
                    // alert(JSON.stringify(JsonObject));
                    // alert(JsonObject['user_levels'][0].module_id);
                    if (JsonObject['user_levels'].length > 0) {
                        result = '<option value="0" selected disabled> -- Select User Level -- </option>';
                        for (let index = 0; index < JsonObject['user_levels'].length; index++) {
                            result += '<option value="' + JsonObject['user_levels'][index].user_level_id + '">' + JsonObject['user_levels'][index].user_level_name + '</option>';
                        }
                    }
                    else {
                        result = '<option value="0" selected disabled> -- No record found -- </option>';
                    }

                    cboElement.html(result);
                    // $('#').select2();

                },
                error: function (data, xhr, status) {
                    result = '<option value="0" selected disabled> -- Reload Again -- </option>';
                    cboElement.html(result);
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }

        // ADD USER
        $("#addUserForm").submit(function(event) {
            event.preventDefault(); // to stop the form submission
            AddUser();
        });

        // $('#addUserModalbtn').on('click', function(e) {
        //         console.log('qwe');
        //         $('select[name="user_id"]', $("#addUserForm")).val('');
        //         $('select[name="userLevel"]', $("#addUserForm")).val('');
        //     });

        $("#addUserModalbtn").click(function() {
            $("#idname").removeClass('is-invalid');
            $("#idname").attr('title', '');
            $("#idemail").removeClass('is-invalid');
            $("#idemail").attr('title', '');
            $("#idusername").removeClass('is-invalid');
            $("#idusername").attr('title', '');
            $("#selDepartmentId").removeClass('is-invalid');
            $("#selDepartmentId").attr('title', '');
            $("#selUserLevelId").removeClass('is-invalid');
            $("#selUserLevelId").attr('title', '');
            $("#idname").focus();
        });
        // ADD USER END

            //===== DATATABLES OF INK FIN CONSUMPTION ================
            dataTableusersTable = $("#usersTable").DataTable({
                "processing": false,
                "serverSide": true,
                "responsive": true,
                "ajax": {
                    url: "view_users",
                },
                "columns": [
                {
                    "data": "name",
                },
                {
                    "data": "department_name",
                    visible: false,
                },
                {
                    "data": "department",
                        render: function(data) {
                            if(data == 0){
                                return '--undefined--'
                            }
                            else if(data == 1){
                                return 'BOD/SEC'
                            }
                            else if(data == 2){
                                return 'IAS'
                            }
                            else if(data == 3){
                                return 'FIN'
                            }
                            else if(data == 4){
                                return 'HRD'
                            }
                            else if(data == 5){
                                return 'ESS'
                            }
                            else if(data == 6){
                                return 'LOG'
                            }
                            else if(data == 7){
                                return 'FAC'
                            }
                            else if(data == 8){
                                return 'ISS'
                            }
                            else if(data == 9){
                                return 'QAD'
                            }
                            else if(data == 10){
                                return 'EMS'
                            }
                            else if(data == 11){
                                return 'TS'
                            }
                            else if(data == 12){
                                return 'CN'
                            }
                            else if(data == 13){
                                return 'YF'
                            }
                            else if(data == 14){
                                return 'PPS'
                            }
                        }
                },
                {
                    "data": "user_level",
                },
                {
                    "data": "status",
                    orderable: false
                },
                {
                    "data": "action",
                    orderable: false,
                    searchable: false
                }
            ],
                "order": [0, 'desc']
            });


        // DEACTIVATE USER
        $(document).on('click', '.actionDeactivateUser', function() {

            let userId = $(this).attr('user-id');

            $("#deactivateUserID").val(userId);
        });
        $("#deactivateUserForm").submit(function(event) {
            event.preventDefault();
            DeactivateUser();
        });
        // DEACTIVATE USER END

        // ACTIVATE USER
        $(document).on('click', '.actionActivateUser', function() {

            let userId = $(this).attr('user-id');

            $("#activateUserID").val(userId);
        });

        $("#activateUserForm").submit(function(event) {
            event.preventDefault();
            ActivateUser();
        });
        // ACTIVATE USER END

        // EDIT USER
        $(document).on('click', '.actionEditUser', function() {

            let userId = $(this).attr('user-id');
            $("#txtEditUserAccessId").val(userId);
            GetUserId(userId);

            $("#selEditUserAccessUserId").removeClass('is-invalid');
            $("#selEditUserAccessUserId").attr('title', '');
            $("#selEditUserLevelId").removeClass('is-invalid');
            $("#selEditUserLevelId").attr('title', '');
            $("#selEditUserAccessUserId").focus();

            $("#selDepartment").val('');
        });

        $("#editUserForm").submit(function(event) {
            event.preventDefault(); // to stop the form submission
            EditUser();
        });
        // EDIT USER END
    });
    </script>
@endsection
