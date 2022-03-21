<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use DataTables;
use Carbon\Carbon;
use App\WaterConsumption;
use App\FiscalYear;

class WaterConsumptionController extends Controller
{
    public function insert_water_target(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        if (!isset($request->water_id)) {
            $rules = [
                'factory' => 'required',
                'month' => 'required',
                'water_target' => 'required'
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                if (WaterConsumption::where('fiscal_year_id', $request->fiscal_year)->where('month', $request->month)->where('factory', $request->factory)->exists()) {
                    return response()->json(['result' => "2"]);
                } else {
                    $insert_water_target = [
                        'month' => $request->month,
                        'target' => $request->water_target,
                        'fiscal_year_id' => $request->fiscal_year,
                        'factory' => $request->factory,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'created_at' => date('Y-m-d H:i:s'),
                    ];

                    WaterConsumption::insert(
                        $insert_water_target
                    );
                    return response()->json(['result' => "1"]);
                }
            } else {
                return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
            }
        } else {
            $rules = [
                'factory' => 'required',
                'month' => 'required',
                'water_target' => 'required'
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                $update_water_target = [
                    'month' => $request->month,
                    'target' => $request->water_target,
                    'fiscal_year_id' => $request->fiscal_year,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                if (isset($request->water_id)) {
                    WaterConsumption::where('id', $request->water_id)->update(
                        $update_water_target
                    );
                }
                return response()->json(['result' => "1"]);
            } else {
                return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
            }
        }
    }

    public function view_water_consumption() {
        $water_consumptions = WaterConsumption::with(['fiscal_year_id'])->get();

        return DataTables::of($water_consumptions)
            ->addColumn('month', function ($water_consumption) {
                $result = '';

                if ($water_consumption->month == 1) {
                    $result .= '<tr value="10">January<input class="month_name" type="hidden" style="width:0%;" value="10"> </tr>';
                } elseif ($water_consumption->month == 2) {
                    $result .= '<tr value="11">February<input class="month_name" type="hidden" style="width:0%;" value="11"> </tr>';
                } elseif ($water_consumption->month == 3) {
                    $result .= '<tr value="12">March<input class="month_name" type="hidden" style="width:0%;" value="12"> </tr>';
                } elseif ($water_consumption->month == 4) {
                    $result .= '<tr value="1">April<input class="month_name" type="hidden" style="width:0%;" value="1"> </tr>';
                } elseif ($water_consumption->month == 5) {
                    $result .= '<tr value="2">May<input class="month_name" type="hidden" style="width:0%;" value="2"> </tr>';
                } elseif ($water_consumption->month == 6) {
                    $result .= '<tr value="3">June<input class="month_name" type="hidden" style="width:0%;" value="3"> </tr>';
                } elseif ($water_consumption->month == 7) {
                    $result .= '<tr value="4">July<input class="month_name" type="hidden" style="width:0%;" value="4"> </tr>';
                } elseif ($water_consumption->month == 8) {
                    $result .= '<tr value="5">August<input class="month_name" type="hidden" style="width:0%;" value="5"> </tr>';
                } elseif ($water_consumption->month == 9) {
                    $result .= '<tr value="6">September<input class="month_name" type="hidden" style="width:0%;" value="6"> </tr>';
                } elseif ($water_consumption->month == 10) {
                    $result .= '<tr value="7">October<input class="month_name" type="hidden" style="width:0%;" value="7"> </tr>';
                } elseif ($water_consumption->month == 11) {
                    $result .= '<tr value="8">November<input class="month_name" type="hidden" style="width:0%;" value="8"> </tr>';
                } elseif ($water_consumption->month == 12) {
                    $result .= '<tr value="9">December<input class="month_name" type="hidden" style="width:0%;" value="9"> </tr>';
                }

                return $result;
            })
            ->addColumn('year', function ($water_consumption) {
                $result = Carbon::parse($water_consumption->created_at)->year;

                return $result;
            })
            ->addColumn('action', function ($water_consumption) {
                $result = '';

                $result = '<center><div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Action">
                    <i class="fas fa-cog"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdownCustom">'; // dropdown-menu start
                $result .= '<button class="dropdown-item text-center actionEditWaterConsumptionTarget" type="button" water-id="' . $water_consumption->id . '" data-toggle="modal" data-target="#modalWaterTarget" data-keyboard="false">Edit Target</button>';
                    if ($water_consumption->actual == null) {
                      
                        $result .= '<button class="dropdown-item text-center actionAddWaterConsumption" type="button" water-id="' . $water_consumption->id . '"  data-toggle="modal" data-target="#modalWaterConsumption" data-keyboard="false">Add Actual</button>';

                    } else {
                        $result .= '<button class="dropdown-item text-center actionEditWaterConsumption" type="button" water-id="' . $water_consumption->id . '" data-toggle="modal" data-target="#modalWaterConsumption" data-keyboard="false">Edit Actual</button>';
                    }
                    $result .= '</div>'; // dropdown-menu end
                    $result .= '</div>'; // div end
                    
                    '</center>';
                return $result;
            })
            ->addColumn('status', function ($water_consumption) {
                $result = '';
                $water_target = $water_consumption->target;
                $water_actual = $water_consumption->actual;


                if ($water_actual == NULL) {
                    $result .= '<center><span class="badge badge-pill badge-secondary">No Actual Consumption Data</span></center>';

                } elseif($water_actual > $water_target) {
                    $result .= '<center><span class="badge badge-pill badge-danger">Off Target</span></center>';
                 
                } else if ($water_actual == $water_target) {
                    $result .= '<center><span class="badge badge-pill badge-primary">On Target</span></center>';

                } else if ($water_actual < $water_target) {
                    $result .= '<center><span class="badge badge-pill badge-success">Under</span></center>';

                } 

                return $result;
            })
            ->rawColumns(['month', 'year', 'action', 'status']) // to format the added columns(status & action) as html format
            ->make(true);
    }

    public function get_water_target_by_id(Request $request) {
            $water_target_details = WaterConsumption::where('id', $request->targetId)->get();
            return response()->json(['result' => $water_target_details]);
    }

    public function insert_water_actual(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

            $rules = [
                'water_consumption' => 'required'
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                $update_water_actual = [
                    'actual' => $request->water_consumption,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                    WaterConsumption::where('id', $request->water_id)->update(
                        $update_water_actual
                    );
            
                return response()->json(['result' => "1"]);
            } else {
                return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
            }
    }


    public function get_current_water_data(Request $request) {

    }
}
