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
        if($request->fiscal_year == null){
            $get_current_fiscal_year = FiscalYear::where('logdel', 0)
            ->first();

            $current_fy = $get_current_fiscal_year->fiscal_year;
            $current_fy_id = $get_current_fiscal_year->id;
            
           
            //========
            $april_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 4)
            ->sum('target');

            $april_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 4)
            ->sum('actual');

            $icon_april = '';
            if($april_water_consumption_target > $april_water_consumption_actual) {
                $icon_april .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($april_water_consumption_target == $april_water_consumption_actual) {
                $icon_april .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($april_water_consumption_target < $april_water_consumption_actual) {
                $icon_april .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $may_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 5)
            ->sum('target');

            $may_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 5)
            ->sum('actual');

            $icon_may = '';
            if($may_water_consumption_target > $may_water_consumption_actual) {
                $icon_may .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($may_water_consumption_target == $may_water_consumption_actual) {
                $icon_may .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($may_water_consumption_target < $may_water_consumption_actual) {
                $icon_may .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $june_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 6)
            ->sum('target');

            $june_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 6)
            ->sum('actual');

            $icon_june = '';
            if($june_water_consumption_target > $june_water_consumption_actual) {
                $icon_june .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($june_water_consumption_target == $june_water_consumption_actual) {
                $icon_june .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($june_water_consumption_target < $june_water_consumption_actual) {
                $icon_june .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $july_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 7)
            ->sum('target');

            $july_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 7)
            ->sum('actual');

            $icon_july = '';
            if($july_water_consumption_target > $july_water_consumption_actual) {
                $icon_july .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($july_water_consumption_target == $july_water_consumption_actual) {
                $icon_july .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($july_water_consumption_target < $july_water_consumption_actual) {
                $icon_july .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $august_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 8)
            ->sum('target');

            $august_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 8)
            ->sum('actual');

            $icon_august = '';
            if($august_water_consumption_target > $august_water_consumption_actual) {
                $icon_august .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($august_water_consumption_target == $august_water_consumption_actual) {
                $icon_august .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($august_water_consumption_target < $august_water_consumption_actual) {
                $icon_august .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $september_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 9)
            ->sum('target');

            $september_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 9)
            ->sum('actual');

            $icon_september = '';
            if($september_water_consumption_target > $september_water_consumption_actual) {
                $icon_september .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($september_water_consumption_target == $september_water_consumption_actual) {
                $icon_september .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($september_water_consumption_target < $september_water_consumption_actual) {
                $icon_september .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $october_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 10)
            ->sum('target');

            $october_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 10)
            ->sum('actual');

            $icon_october = '';
            if($october_water_consumption_target > $october_water_consumption_actual) {
                $icon_october .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($october_water_consumption_target == $october_water_consumption_actual) {
                $icon_october .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($october_water_consumption_target < $october_water_consumption_actual) {
                $icon_october .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $november_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 11)
            ->sum('target');

            $november_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 11)
            ->sum('actual');

            $icon_november = '';
            if($november_water_consumption_target > $november_water_consumption_actual) {
                $icon_november .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($november_water_consumption_target == $november_water_consumption_actual) {
                $icon_november .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($november_water_consumption_target < $november_water_consumption_actual) {
                $icon_november .= '<i class="fas fa-arrow-up text-red"></i>';
            }

            //========
            $december_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 12)
            ->sum('target');

            $december_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 12)
            ->sum('actual');

            $icon_december = '';
            if($december_water_consumption_target > $december_water_consumption_actual) {
                $icon_december .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($december_water_consumption_target == $december_water_consumption_actual) {
                $icon_december .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($december_water_consumption_target < $december_water_consumption_actual) {
                $icon_december .= '<i class="fas fa-arrow-up text-red"></i>';
            }

            
            //========
            $january_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 1)
            ->sum('target');

            $january_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 1)
            ->sum('actual');

            $icon_january = '';
            if($january_water_consumption_target > $january_water_consumption_actual) {
                $icon_january .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($january_water_consumption_target == $january_water_consumption_actual) {
                $icon_january .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($january_water_consumption_target < $january_water_consumption_actual) {
                $icon_january .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $february_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 2)
            ->sum('target');

            $february_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 2)
            ->sum('actual');

            $icon_february = '';
            if($february_water_consumption_target > $february_water_consumption_actual) {
                $icon_february .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($february_water_consumption_target == $february_water_consumption_actual) {
                $icon_february .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($february_water_consumption_target < $february_water_consumption_actual) {
                $icon_february .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $march_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 3)
            ->sum('target');

            $march_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 3)
            ->sum('actual');

            $icon_march = '';
            if($march_water_consumption_target > $march_water_consumption_actual) {
                $icon_march .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($march_water_consumption_target == $march_water_consumption_actual) {
                $icon_march .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($march_water_consumption_target < $march_water_consumption_actual) {
                $icon_march .= '<i class="fas fa-arrow-up text-red"></i>';
            }
        } else {
            $get_current_fiscal_year = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->first();

            $current_fy = $get_current_fiscal_year->fiscal_year;
            $current_fy_id = $get_current_fiscal_year->id;
            
           
            //========
            $april_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 4)
            ->sum('target');

            $april_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 4)
            ->sum('actual');

            $icon_april = '';
            if($april_water_consumption_target > $april_water_consumption_actual) {
                $icon_april .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($april_water_consumption_target == $april_water_consumption_actual) {
                $icon_april .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($april_water_consumption_target < $april_water_consumption_actual) {
                $icon_april .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $may_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 5)
            ->sum('target');

            $may_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 5)
            ->sum('actual');

            $icon_may = '';
            if($may_water_consumption_target > $may_water_consumption_actual) {
                $icon_may .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($may_water_consumption_target == $may_water_consumption_actual) {
                $icon_may .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($may_water_consumption_target < $may_water_consumption_actual) {
                $icon_may .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $june_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 6)
            ->sum('target');

            $june_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 6)
            ->sum('actual');

            $icon_june = '';
            if($june_water_consumption_target > $june_water_consumption_actual) {
                $icon_june .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($june_water_consumption_target == $june_water_consumption_actual) {
                $icon_june .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($june_water_consumption_target < $june_water_consumption_actual) {
                $icon_june .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $july_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 7)
            ->sum('target');

            $july_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 7)
            ->sum('actual');

            $icon_july = '';
            if($july_water_consumption_target > $july_water_consumption_actual) {
                $icon_july .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($july_water_consumption_target == $july_water_consumption_actual) {
                $icon_july .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($july_water_consumption_target < $july_water_consumption_actual) {
                $icon_july .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $august_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 8)
            ->sum('target');

            $august_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 8)
            ->sum('actual');

            $icon_august = '';
            if($august_water_consumption_target > $august_water_consumption_actual) {
                $icon_august .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($august_water_consumption_target == $august_water_consumption_actual) {
                $icon_august .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($august_water_consumption_target < $august_water_consumption_actual) {
                $icon_august .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $september_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 9)
            ->sum('target');

            $september_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 9)
            ->sum('actual');

            $icon_september = '';
            if($september_water_consumption_target > $september_water_consumption_actual) {
                $icon_september .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($september_water_consumption_target == $september_water_consumption_actual) {
                $icon_september .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($september_water_consumption_target < $september_water_consumption_actual) {
                $icon_september .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $october_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 10)
            ->sum('target');

            $october_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 10)
            ->sum('actual');

            $icon_october = '';
            if($october_water_consumption_target > $october_water_consumption_actual) {
                $icon_october .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($october_water_consumption_target == $october_water_consumption_actual) {
                $icon_october .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($october_water_consumption_target < $october_water_consumption_actual) {
                $icon_october .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $november_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 11)
            ->sum('target');

            $november_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 11)
            ->sum('actual');

            $icon_november = '';
            if($november_water_consumption_target > $november_water_consumption_actual) {
                $icon_november .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($november_water_consumption_target == $november_water_consumption_actual) {
                $icon_november .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($november_water_consumption_target < $november_water_consumption_actual) {
                $icon_november .= '<i class="fas fa-arrow-up text-red"></i>';
            }

            //========
            $december_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 12)
            ->sum('target');

            $december_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 12)
            ->sum('actual');

            $icon_december = '';
            if($december_water_consumption_target > $december_water_consumption_actual) {
                $icon_december .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($december_water_consumption_target == $december_water_consumption_actual) {
                $icon_december .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($december_water_consumption_target < $december_water_consumption_actual) {
                $icon_december .= '<i class="fas fa-arrow-up text-red"></i>';
            }

            
            //========
            $january_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 1)
            ->sum('target');

            $january_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 1)
            ->sum('actual');

            $icon_january = '';
            if($january_water_consumption_target > $january_water_consumption_actual) {
                $icon_january .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($january_water_consumption_target == $january_water_consumption_actual) {
                $icon_january .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($january_water_consumption_target < $january_water_consumption_actual) {
                $icon_january .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $february_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 2)
            ->sum('target');

            $february_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 2)
            ->sum('actual');

            $icon_february = '';
            if($february_water_consumption_target > $february_water_consumption_actual) {
                $icon_february .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($february_water_consumption_target == $february_water_consumption_actual) {
                $icon_february .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($february_water_consumption_target < $february_water_consumption_actual) {
                $icon_february .= '<i class="fas fa-arrow-up text-red"></i>';
            }


            //========
            $march_water_consumption_target = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 3)
            ->sum('target');

            $march_water_consumption_actual = WaterConsumption::where('fiscal_year_id', $current_fy_id)
            ->where('month', 3)
            ->sum('actual');

            $icon_march = '';
            if($march_water_consumption_target > $march_water_consumption_actual) {
                $icon_march .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($march_water_consumption_target == $march_water_consumption_actual) {
                $icon_march .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($march_water_consumption_target < $march_water_consumption_actual) {
                $icon_march .= '<i class="fas fa-arrow-up text-red"></i>';
            }
        }

          
          return response()->json([
            'currentYear' => $current_fy,
            'iconApril' => $icon_april,
            'iconMay' => $icon_may,
            'iconJune' => $icon_june,
            'iconJuly' => $icon_july,
            'iconAugust' => $icon_august,
            'iconSeptember' => $icon_september,
            'iconOctober' => $icon_october,
            'iconNovember' => $icon_november,
            'iconDecember' => $icon_december,
            'iconJanuary' => $icon_january,
            'iconFebruary' => $icon_february,
            'iconMarch' => $icon_march,
            'aprilWaterTarget' => $april_water_consumption_target,
            'aprilWaterActual' => $april_water_consumption_actual,
            'mayWaterTarget' => $may_water_consumption_target,
            'mayWaterActual' => $may_water_consumption_actual,
            'juneWaterTarget' => $june_water_consumption_target,
            'juneWaterActual' => $june_water_consumption_actual,
            'julyWaterTarget' => $july_water_consumption_target,
            'julyWaterActual' => $july_water_consumption_actual,
            'augustWaterTarget' => $august_water_consumption_target,
            'augustWaterActual' => $august_water_consumption_actual,
            'septemberWaterTarget' => $september_water_consumption_target,
            'septemberWaterActual' => $september_water_consumption_actual,
            'octoberWaterTarget' => $october_water_consumption_target,
            'octoberWaterActual' => $october_water_consumption_actual,
            'novemberWaterTarget' => $november_water_consumption_target,
            'novemberWaterActual' => $november_water_consumption_actual,
            'decemberWaterTarget' => $december_water_consumption_target,
            'decemberWaterActual' => $december_water_consumption_actual,
            'januaryWaterTarget' => $january_water_consumption_target,
            'januaryWaterActual' => $january_water_consumption_actual,
            'februaryWaterTarget' => $february_water_consumption_target,
            'februaryWaterActual' => $february_water_consumption_actual,
            'marchWaterTarget' => $march_water_consumption_target,
            'marchWaterActual' => $march_water_consumption_actual,
          ]);
    }
}
