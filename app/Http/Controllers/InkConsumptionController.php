<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Collection;
use App\RapidXUser;
use App\RapidXDepartment;
use App\User;

use DataTables;
use Carbon\Carbon;
use App\InkConsumption;
use App\FiscalYear;

class InkConsumptionController extends Controller 
{
    public function insert_ink_target(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        // $ink_target = explode(',', $request->ink_target);
        // $ink_target_int = (int)implode('', $ink_target);

        if (!isset($request->ink_id)) {
            $rules = [
                'department' => 'required',
                'month' => 'required',
                'ink_target' => 'required'
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                if (InkConsumption::where('fiscal_year_id', $request->fiscal_year)->where('month', $request->month)->where('department', $request->department)->exists()) {
                    return response()->json(['result' => "2"]);
                } else {
                    $insert_ink_target = [
                        'month' => $request->month,
                        // 'target' => $ink_target_int,
                        'target' => $request->ink_target,
                        'fiscal_year_id' => $request->fiscal_year,
                        'department' => $request->department,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'created_at' => date('Y-m-d H:i:s'),
                    ];

                    InkConsumption::insert(
                        $insert_ink_target
                    );
                    return response()->json(['result' => "1"]);
                }
            } else {
                return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
            }
        } else {
            $rules = [
                'department' => 'required',
                'month' => 'required',
                'ink_target' => 'required'
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                $update_ink_target = [
                    'month' => $request->month,
                    'target' => $request->ink_target,
                    'fiscal_year_id' => $request->fiscal_year,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $picked_data = InkConsumption::where('id', $request->ink_id)->get();
                $picked_month = $picked_data[0]->month;

                if (isset($request->ink_id)) {
                    if (InkConsumption::where('fiscal_year_id', $request->fiscal_year)->where('department', $request->department)->where('month', $request->month)->exists() && $request->month != $picked_month) {
                        return response()->json(['result' => 0]);
                    }else{
                        InkConsumption::where('id', $request->ink_id)->update($update_ink_target);
                        return response()->json(['result' => "1"]);
                    }
                }

            } else {
                return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
            }
        }
    }

    public function insert_ink_actual(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        if (!isset($request->ink_consumption_id)) {

        // $ink_actual = explode(',', $request->ink_consumption);
        // $ink_actual_int = (int)implode('', $ink_actual);

            $rules = [
                'department' => 'required',
                'month_consumption' => 'required',
                'ink_consumption' => 'required',
                'reason' => 'required'
            ];

            $validator = Validator::make($data, $rules);

            // $picked_data = InkConsumption::where('fiscal_year_id', $request->fiscal_year_consumption)->where('month', $request->month_consumption)->where('department', $request->department)->get();
            // $picked_id = $picked_data[0]->id;
            // return $picked_id;

            if ($validator->passes()) {
                if (InkConsumption::where('fiscal_year_id', $request->fiscal_year_consumption)->where('month', $request->month_consumption)->where('department', $request->department)->whereNotNull('actual')->exists()) {
                    return response()->json(['result' => "2"]);
                }
                else if(InkConsumption::where('fiscal_year_id', $request->fiscal_year_consumption)->where('month', $request->month_consumption)->where('department', $request->department)->where('target', null)->exists()){
                    return response()->json(['result' => "3"]);
                }
                // else if(InkConsumption::where('id','!=', $picked_id)->exists()){
                //     return response()->json(['result' => "4"]);
                // }
                else if(InkConsumption::where('fiscal_year_id', $request->fiscal_year_consumption)->where('month', $request->month_consumption)->where('department', $request->department)->whereNull('actual')->exists()){
                    $update_ink_actual = [
                        'actual' => $request->ink_consumption,
                        'reason' => $request->reason,
                        'updated_at' => date('Y-m-d H:i:s')
                    ];

                    InkConsumption::where('fiscal_year_id', $request->fiscal_year_consumption)->where('month', $request->month_consumption)->where('department', $request->department)->update($update_ink_actual);

                    return response()->json(['result' => "1"]);
                }
                else{
                    return response()->json(['result' => "3"]);
                }

            } else {
                return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
            }

        } else {
            $rules = [
                // 'department' => 'required',
                'month_consumption' => 'required',
                'ink_consumption' => 'required',
                'reason' => 'required'
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                $update_ink_actual = [
                    // 'month' => $request->month_consumption,
                    'actual' => $request->ink_consumption,
                    'reason' => $request->reason,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $picked_data = InkConsumption::where('id', $request->ink_consumption_id)->get();
                $picked_month = $picked_data[0]->month;

                // return $picked_month;

                if (isset($request->ink_consumption_id)) {
                    if (InkConsumption::where('department', $request->department)->where('month', $request->month_consumption)->exists() && $request->month_consumption != $picked_month) {
                        return response()->json(['result' => 0]);
                    }else{
                        InkConsumption::where('id', $request->ink_consumption_id)->update($update_ink_actual);
                        return response()->json(['result' => "1"]);
                    }
                }

            } else {
                return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
            }
        }
    }

    //====== VIEW DATATABLE FOR INK CONSUMPTION ========
    public function view_ink_consumption_sg() {
        session_start();

        $rapidx_user_details = RapidXUser::where('id', $_SESSION['rapidx_user_id'])->get();
        $rapidx_user_id = $rapidx_user_details[0]->id;
        $rapidx_dept_id = $rapidx_user_details[0]->department_id;

        $user_details = User::where('rapidx_id', $_SESSION['rapidx_user_id'])->get();
        $user_level_id = $user_details[0]->user_level_id;

        // // test
        // $rapidx_dept_id = 3;

        // department id from rapidx
        $BOD = RapidXDepartment::where('department_name', 'like', 'Board of Directors%')->pluck('department_id')->toArray();
        $IAS = RapidXDepartment::where('department_name', 'like', 'IAS%')->pluck('department_id')->toArray();
        $FIN = RapidXDepartment::where('department_name', 'like', 'FIN%')->pluck('department_id')->toArray();
        $HRD = RapidXDepartment::where('department_name', 'like', 'HRD%')->pluck('department_id')->toArray();
        $ESS = RapidXDepartment::where('department_name', 'like', 'ESS%')->pluck('department_id')->toArray();
        $LOG = RapidXDepartment::where('department_name', 'like', 'LOG%')->pluck('department_id')->toArray();
        $FAC = RapidXDepartment::where('department_name', 'like', 'FAC%')->pluck('department_id')->toArray();
        $ISS = RapidXDepartment::where('department_name', 'like', 'ISS%')->pluck('department_id')->toArray();
        $QAD = RapidXDepartment::where('department_name', 'like', 'QAD%')->pluck('department_id')->toArray();
        $EMS = RapidXDepartment::where('department_name', 'like', 'EMS%')->pluck('department_id')->toArray();

        if(in_array($rapidx_dept_id, $BOD)){
            $dep = 1;
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->where('department', $dep)->where('logdel', 0)->get();
        }
        else if(in_array($rapidx_dept_id, $IAS) && $user_level_id == 1 ){
            $dep = 2;
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->where('department', $dep)->where('logdel', 0)->get();
        }
        else if(in_array($rapidx_dept_id, $FIN) && $user_level_id == 1){
            $dep = 3;
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->where('department', $dep)->where('logdel', 0)->get();
        }
        else if(in_array($rapidx_dept_id, $HRD) && $user_level_id == 1){
            $dep = 4;
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->where('department', $dep)->where('logdel', 0)->get();
        }
        else if(in_array($rapidx_dept_id, $ESS) && $user_level_id == 1){
            $dep = 5;
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->where('department', $dep)->where('logdel', 0)->get();
        }
        else if(in_array($rapidx_dept_id, $LOG) && $user_level_id == 1){
            $dep = 6;
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->where('department', $dep)->where('logdel', 0)->get();
        }
        else if(in_array($rapidx_dept_id, $FAC) && $user_level_id == 1){
            $dep = 7;
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->where('department', $dep)->where('logdel', 0)->get();
        }
        else if(in_array($rapidx_dept_id, $ISS) && $user_level_id == 1){
            $dep = 8;
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->where('department', $dep)->where('logdel', 0)->get();
        }
        else if(in_array($rapidx_dept_id, $QAD) && $user_level_id == 1){
            $dep = 9;
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->where('department', $dep)->where('logdel', 0)->get();
        }
        else if(in_array($rapidx_dept_id, $EMS) && $user_level_id == 1){
            $dep = 10;
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->where('department', $dep)->where('logdel', 0)->get();
        }
        else if($user_level_id == 4 || $user_level_id == 3 || $user_level_id == 2){
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->whereBetween('department', [1, 10])->where('logdel', 0)->get();
        }
        // $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->whereBetween('department', [1, 10])->get();
        // $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->get();
        return DataTables::of($ink_consumptions)
            ->addColumn('month', function ($ink_consumption) {
                $result = '';

                if ($ink_consumption->month == 1) {
                    $result .= '<tr value="10">January<input class="month_name" type="hidden" style="width:0%;" value="10"> </tr>';
                } elseif ($ink_consumption->month == 2) {
                    $result .= '<tr value="11">February<input class="month_name" type="hidden" style="width:0%;" value="11"> </tr>';
                } elseif ($ink_consumption->month == 3) {
                    $result .= '<tr value="12">March<input class="month_name" type="hidden" style="width:0%;" value="12"> </tr>';
                } elseif ($ink_consumption->month == 4) {
                    $result .= '<tr value="1">April<input class="month_name" type="hidden" style="width:0%;" value="1"> </tr>';
                } elseif ($ink_consumption->month == 5) {
                    $result .= '<tr value="2">May<input class="month_name" type="hidden" style="width:0%;" value="2"> </tr>';
                } elseif ($ink_consumption->month == 6) {
                    $result .= '<tr value="3">June<input class="month_name" type="hidden" style="width:0%;" value="3"> </tr>';
                } elseif ($ink_consumption->month == 7) {
                    $result .= '<tr value="4">July<input class="month_name" type="hidden" style="width:0%;" value="4"> </tr>';
                } elseif ($ink_consumption->month == 8) {
                    $result .= '<tr value="5">August<input class="month_name" type="hidden" style="width:0%;" value="5"> </tr>';
                } elseif ($ink_consumption->month == 9) {
                    $result .= '<tr value="6">September<input class="month_name" type="hidden" style="width:0%;" value="6"> </tr>';
                } elseif ($ink_consumption->month == 10) {
                    $result .= '<tr value="7">October<input class="month_name" type="hidden" style="width:0%;" value="7"> </tr>';
                } elseif ($ink_consumption->month == 11) {
                    $result .= '<tr value="8">November<input class="month_name" type="hidden" style="width:0%;" value="8"> </tr>';
                } elseif ($ink_consumption->month == 12) {
                    $result .= '<tr value="9">December<input class="month_name" type="hidden" style="width:0%;" value="9"> </tr>';
                }
                return $result;
            })
            ->addColumn('year', function ($ink_consumption) {
                $result = Carbon::parse($ink_consumption->created_at)->year;

                return $result;
            })
            ->addColumn('action', function ($ink_consumption) {
                $result = '';

                $result = '<center><div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Action">
                    <i class="fas fa-cog"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdownCustom">'; // dropdown-menu start
                $result .= '<button class="dropdown-item text-center actionEditInkConsumptionTarget" type="button" ink-id="' . $ink_consumption->id . '" data-toggle="modal" data-target="#modalInkTarget" data-keyboard="false">Edit Target</button>';
                    if ($ink_consumption->actual == null) {

                        $result .= '<button class="dropdown-item text-center actionAddInkConsumption" type="button" ink-id="' . $ink_consumption->id . '"  data-toggle="modal" data-target="#modalInkConsumption" data-keyboard="false">Add Actual</button>';

                    } else {
                        $result .= '<button class="dropdown-item text-center actionEditInkConsumption" type="button" ink-id="' . $ink_consumption->id . '" data-toggle="modal" data-target="#modalInkConsumption" data-keyboard="false">Edit Actual</button>';
                    }
                    $result .= '</div>'; // dropdown-menu end
                    $result .= '</div>'; // div end

                    '</center>';
                return $result;
            })
            ->addColumn('status', function ($ink_consumption) {
                $result = '';
                $ink_target = $ink_consumption->target;
                $ink_actual = $ink_consumption->actual;


                if ($ink_actual === NULL) {
                    $result .= '<center><span class="badge badge-pill badge-secondary">No Actual Consumption Data</span></center>';

                } elseif($ink_actual > $ink_target) {
                    $result .= '<center><span class="badge badge-pill badge-danger">Off Target</span></center>';

                } else if ($ink_actual == $ink_target) {
                    $result .= '<center><span class="badge badge-pill badge-primary">On Target</span></center>';

                } else if ($ink_actual < $ink_target) {
                    $result .= '<center><span class="badge badge-pill badge-success">Under</span></center>';

                }

                return $result;
            })
            ->rawColumns(['month', 'year', 'action', 'status']) // to format the added columns(status & action) as html format
            ->make(true);
    }
    //====== VIEW DATATABLE FOR INK CONSUMPTION SG END ========


    //====== VIEW DATATABLE FOR INK CONSUMPTION PRODUCTION ========
    public function view_ink_consumption_prod() {
        session_start();

        $rapidx_user_details = RapidXUser::where('id', $_SESSION['rapidx_user_id'])->get();
        $rapidx_user_id = $rapidx_user_details[0]->id;
        $rapidx_dept_id = $rapidx_user_details[0]->department_id;

        $user_details = User::where('rapidx_id', $_SESSION['rapidx_user_id'])->get();
        $user_level_id = $user_details[0]->user_level_id;

        // // test
        // $rapidx_dept_id = 14;

        // department id from rapidx
        $ts_department = RapidXDepartment::where('department_name', 'like', 'TS%')->pluck('department_id')->toArray();
        $cn_department = RapidXDepartment::where('department_name', 'like', 'CN%')->pluck('department_id')->toArray();
        $yf_department = RapidXDepartment::where('department_name', 'like', 'YF%')->pluck('department_id')->toArray();
        $pps_department = RapidXDepartment::where('department_name', 'like', 'PPS%')->pluck('department_id')->toArray();

        if(in_array($rapidx_dept_id, $ts_department) && $user_level_id == 1 ){
            $dep = 11;
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->where('department', $dep)->where('logdel', 0)->get();
        }
        else if(in_array($rapidx_dept_id, $cn_department) && $user_level_id == 1){
            $dep = 12;
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->where('department', $dep)->where('logdel', 0)->get();
        }
        else if(in_array($rapidx_dept_id, $yf_department) && $user_level_id == 1){
            $dep = 13;
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->where('department', $dep)->where('logdel', 0)->get();
        }
        else if(in_array($rapidx_dept_id, $pps_department) && $user_level_id == 1){
            $dep = 14;
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->where('department', $dep)->where('logdel', 0)->get();
        }
        else if($user_level_id == 4 || $user_level_id == 3 || $user_level_id == 2){
            $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->whereBetween('department', [11, 14])->where('logdel', 0)->get();
        }

        // $ink_consumptions = InkConsumption::with(['fiscal_year_id'])->get();
        return DataTables::of($ink_consumptions)

            ->addColumn('month', function ($ink_consumption) {
                $result = '';

                if ($ink_consumption->month == 1) {
                    $result .= '<tr value="10">January<input class="month_name" type="hidden" style="width:0%;" value="10"> </tr>';
                } elseif ($ink_consumption->month == 2) {
                    $result .= '<tr value="11">February<input class="month_name" type="hidden" style="width:0%;" value="11"> </tr>';
                } elseif ($ink_consumption->month == 3) {
                    $result .= '<tr value="12">March<input class="month_name" type="hidden" style="width:0%;" value="12"> </tr>';
                } elseif ($ink_consumption->month == 4) {
                    $result .= '<tr value="1">April<input class="month_name" type="hidden" style="width:0%;" value="1"> </tr>';
                } elseif ($ink_consumption->month == 5) {
                    $result .= '<tr value="2">May<input class="month_name" type="hidden" style="width:0%;" value="2"> </tr>';
                } elseif ($ink_consumption->month == 6) {
                    $result .= '<tr value="3">June<input class="month_name" type="hidden" style="width:0%;" value="3"> </tr>';
                } elseif ($ink_consumption->month == 7) {
                    $result .= '<tr value="4">July<input class="month_name" type="hidden" style="width:0%;" value="4"> </tr>';
                } elseif ($ink_consumption->month == 8) {
                    $result .= '<tr value="5">August<input class="month_name" type="hidden" style="width:0%;" value="5"> </tr>';
                } elseif ($ink_consumption->month == 9) {
                    $result .= '<tr value="6">September<input class="month_name" type="hidden" style="width:0%;" value="6"> </tr>';
                } elseif ($ink_consumption->month == 10) {
                    $result .= '<tr value="7">October<input class="month_name" type="hidden" style="width:0%;" value="7"> </tr>';
                } elseif ($ink_consumption->month == 11) {
                    $result .= '<tr value="8">November<input class="month_name" type="hidden" style="width:0%;" value="8"> </tr>';
                } elseif ($ink_consumption->month == 12) {
                    $result .= '<tr value="9">December<input class="month_name" type="hidden" style="width:0%;" value="9"> </tr>';
                }
                return $result;
            })
            ->addColumn('year', function ($ink_consumption) {
                $result = Carbon::parse($ink_consumption->created_at)->year;

                return $result;
            })
            ->addColumn('action', function ($ink_consumption) {
                $result = '';

                $result = '<center><div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Action">
                    <i class="fas fa-cog"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdownCustom">'; // dropdown-menu start
                $result .= '<button class="dropdown-item text-center actionEditInkConsumptionTarget" type="button" ink-id="' . $ink_consumption->id . '" data-toggle="modal" data-target="#modalInkTarget" data-keyboard="false">Edit Target</button>';
                    if ($ink_consumption->actual == null) {

                        $result .= '<button class="dropdown-item text-center actionAddInkConsumption" type="button" ink-id="' . $ink_consumption->id . '"  data-toggle="modal" data-target="#modalInkConsumption" data-keyboard="false">Add Actual</button>';

                    } else {
                        $result .= '<button class="dropdown-item text-center actionEditInkConsumption" type="button" ink-id="' . $ink_consumption->id . '" data-toggle="modal" data-target="#modalInkConsumption" data-keyboard="false">Edit Actual</button>';
                    }
                    $result .= '</div>'; // dropdown-menu end
                    $result .= '</div>'; // div end

                    '</center>';
                return $result;
            })
            ->addColumn('status', function ($ink_consumption) {
                $result = '';
                $ink_target = $ink_consumption->target;
                $ink_actual = $ink_consumption->actual;


                if ($ink_actual === NULL) {
                    $result .= '<center><span class="badge badge-pill badge-secondary">No Actual Consumption Data</span></center>';

                } elseif($ink_actual > $ink_target) {
                    $result .= '<center><span class="badge badge-pill badge-danger">Off Target</span></center>';

                } else if ($ink_actual == $ink_target) {
                    $result .= '<center><span class="badge badge-pill badge-primary">On Target</span></center>';

                } else if ($ink_actual < $ink_target) {
                    $result .= '<center><span class="badge badge-pill badge-success">Under</span></center>';

                }

                return $result;
            })
            ->rawColumns(['month', 'year', 'action', 'status']) // to format the added columns(status & action) as html format
            ->make(true);
    }
    //====== VIEW DATATABLE FOR INK CONSUMPTION PRODUCTION END ========

    public function get_ink_target_by_id(Request $request) {
        $ink_target_details = InkConsumption::where('id', $request->targetId)->get();
        return response()->json(['result' => $ink_target_details]);
    }

    public function get_months_for_filter() {
        $months = InkConsumption::all();

        return response()->json(['month' => $months]);
    }

    public function get_fiscal_year_for_filter() {
        $years = FiscalYear::all();
        $year = FiscalYear::where('fiscal_year', '!=', 2020)->get();
        // $current_year = FiscalYear::where('logdel', '=', 0)->get();

        return response()->json(['year' => $years, 'years' =>$year]);
    }

    //INK BOD FOR DASHBOARD
    public function get_current_ink_data_bod(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 1 (BOD) ======//
            $ink_consumption_bod = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '1')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_bod, 'currentYear' => $current_fy_year]);

        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $ink_consumption_bod = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '1')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_bod, 'currentYear' => $current_fy_year]);
        }
    }
    //INK BOD FOR DASHBOARD END

    //INK IAS FOR DASHBOARD
    public function get_current_ink_data_ias(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 2 (IAS) ======//
            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '2')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);

        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '2')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);
        }
    }
    //INK IAS FOR DASHBOARD END

    //INK FIN FOR DASHBOARD
    public function get_current_ink_data_fin(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 3 (FIN) ======//
            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '3')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);

        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '3')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);
        }
    }
    //INK FIN FOR DASHBOARD END

    //INK FIN FOR DASHBOARD
    public function get_current_ink_data_hrd(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 4 (HRD) ======//
            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '4')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);

        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '4')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);
        }
    }
    //INK FIN FOR DASHBOARD END

    //INK FIN FOR DASHBOARD
    public function get_current_ink_data_ess(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 5 (ESS) ======//
            $ink_consumption_ess = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '5')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ess, 'currentYear' => $current_fy_year]);

        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $ink_consumption_ess = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '5')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ess, 'currentYear' => $current_fy_year]);
        }
    }
    //INK FIN FOR DASHBOARD END

    //INK FIN FOR DASHBOARD
    public function get_current_ink_data_log(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 6 (LOG) ======//
            $ink_consumption_log = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '6')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_log, 'currentYear' => $current_fy_year]);

        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $ink_consumption_log = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '6')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_log, 'currentYear' => $current_fy_year]);
        }
    }
    //INK FIN FOR DASHBOARD END

    //INK FIN FOR DASHBOARD
    public function get_current_ink_data_fac(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 7 (FAC) ======//
            $ink_consumption_fac = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '7')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_fac, 'currentYear' => $current_fy_year]);

        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $ink_consumption_fac = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '7')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_fac, 'currentYear' => $current_fy_year]);
        }
    }
    //INK FIN FOR DASHBOARD END

    //INK FIN FOR DASHBOARD
    public function get_current_ink_data_iss(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 8 (ISS) ======//
            $ink_consumption_iss = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '8')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_iss, 'currentYear' => $current_fy_year]);

        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $ink_consumption_iss = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '8')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_iss, 'currentYear' => $current_fy_year]);
        }
    }
    //INK FIN FOR DASHBOARD END

    //INK FIN FOR DASHBOARD
    public function get_current_ink_data_qad(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 9 (QAD) ======//
            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '9')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);

        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '9')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);
        }
    }
    //INK FIN FOR DASHBOARD END

    //INK FIN FOR DASHBOARD
    public function get_current_ink_data_ems(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 10 (EMS) ======//
            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '10')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);

        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '10')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);
        }
    }
    //INK FIN FOR DASHBOARD END


    //INK FIN FOR DASHBOARD
    public function get_current_ink_data_ts(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 11 (TS) ======//
            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '11')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);

        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '11')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);
        }
    }
    //INK FIN FOR DASHBOARD END

    //INK FIN FOR DASHBOARD
    public function get_current_ink_data_cn(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 12 (CN) ======//
            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '12')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);

        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '12')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);
        }
    }
    //INK FIN FOR DASHBOARD END

    //INK FIN FOR DASHBOARD
    public function get_current_ink_data_yf(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 13 (YF) ======//
            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '13')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);

        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '13')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);
        }
    }
    //INK FIN FOR DASHBOARD END


    //INK FIN FOR DASHBOARD
    public function get_current_ink_data_pps(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        if($request->fiscal_year == null) {
            $current_fy = FiscalYear::where('logdel', 0)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            //===== Column department == 14 (PPs) ======//
            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '14')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);

        } else {
            $current_fy = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->get();

            $current_fy_id = $current_fy[0]->id;
            $current_fy_year = $current_fy[0]->fiscal_year;

            $ink_consumption_ias = InkConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('department', '14')->where('logdel', 0)
            ->get();

           return response()->json(['result' => $ink_consumption_ias, 'currentYear' => $current_fy_year]);
        }
    }
    //INK FIN FOR DASHBOARD END

}
