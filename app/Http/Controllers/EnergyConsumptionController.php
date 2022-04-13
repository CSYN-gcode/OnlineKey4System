<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use DataTables;
use Carbon\Carbon;
use App\EnergyConsumption;
use App\FiscalYear;

class EnergyConsumptionController extends Controller
{
    public function insert_energy_target(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        $energy_target = explode(',', $request->energy_target);
        $energy_target_int = (int)implode('', $energy_target);


        if (!isset($request->energy_id)) {
            $rules = [
                'month' => 'required',
                'energy_target' => 'required'
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                if (EnergyConsumption::where('fiscal_year_id', $request->fiscal_year)->where('month', $request->month)->exists()) {
                    return response()->json(['result' => "2"]);
                } else {
                    $insert_energy_target = [
                        'month' => $request->month,
                        'target' => $energy_target_int,
                        'fiscal_year_id' => $request->fiscal_year,
                        'updated_at' => date('Y-m-d H:i:s'),
                        'created_at' => date('Y-m-d H:i:s'),
                    ];

                    EnergyConsumption::insert(
                        $insert_energy_target
                    );
                    return response()->json(['result' => "1"]);
                }
            } else {
                return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
            }
        } else {
            $rules = [
                'month' => 'required',
                'energy_target' => 'required'
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                $update_energy_target = [
                    'month' => $request->month,
                    'target' => $energy_target_int,
                    'fiscal_year_id' => $request->fiscal_year,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                if (isset($request->energy_id)) {
                    EnergyConsumption::where('id', $request->energy_id)->update(
                        $update_energy_target
                    );
                }
                return response()->json(['result' => "1"]);
            } else {
                return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
            }
        }
    }

    public function insert_energy_actual(Request $request) {
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        $energy_actual = explode(',', $request->energy_consumption);
        $energy_actual_int = (int)implode('', $energy_actual);

            $rules = [
               
                'energy_consumption' => 'required'
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->passes()) {
                $update_energy_actual = [
                    'actual' => $energy_actual_int,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                    EnergyConsumption::where('id', $request->energy_consumption_id)->update(
                        $update_energy_actual
                    );
            
                return response()->json(['result' => "1"]);
            } else {
                return response()->json(['validation' => "hasError", 'error' => $validator->messages()]);
            }
    }

    public function view_energy_consumption() {
        $energy_consumptions = EnergyConsumption::with(['fiscal_year_id'])->get();

        return DataTables::of($energy_consumptions)
            ->addColumn('month', function ($energy_consumption) {
                $result = '';

                if ($energy_consumption->month == 1) {
                    $result .= '<tr value="10">January<input class="month_name" type="hidden" style="width:0%;" value="10"> </tr>';
                } elseif ($energy_consumption->month == 2) {
                    $result .= '<tr value="11">February<input class="month_name" type="hidden" style="width:0%;" value="11"> </tr>';
                } elseif ($energy_consumption->month == 3) {
                    $result .= '<tr value="12">March<input class="month_name" type="hidden" style="width:0%;" value="12"> </tr>';
                } elseif ($energy_consumption->month == 4) {
                    $result .= '<tr value="1">April<input class="month_name" type="hidden" style="width:0%;" value="1"> </tr>';
                } elseif ($energy_consumption->month == 5) {
                    $result .= '<tr value="2">May<input class="month_name" type="hidden" style="width:0%;" value="2"> </tr>';
                } elseif ($energy_consumption->month == 6) {
                    $result .= '<tr value="3">June<input class="month_name" type="hidden" style="width:0%;" value="3"> </tr>';
                } elseif ($energy_consumption->month == 7) {
                    $result .= '<tr value="4">July<input class="month_name" type="hidden" style="width:0%;" value="4"> </tr>';
                } elseif ($energy_consumption->month == 8) {
                    $result .= '<tr value="5">August<input class="month_name" type="hidden" style="width:0%;" value="5"> </tr>';
                } elseif ($energy_consumption->month == 9) {
                    $result .= '<tr value="6">September<input class="month_name" type="hidden" style="width:0%;" value="6"> </tr>';
                } elseif ($energy_consumption->month == 10) {
                    $result .= '<tr value="7">October<input class="month_name" type="hidden" style="width:0%;" value="7"> </tr>';
                } elseif ($energy_consumption->month == 11) {
                    $result .= '<tr value="8">November<input class="month_name" type="hidden" style="width:0%;" value="8"> </tr>';
                } elseif ($energy_consumption->month == 12) {
                    $result .= '<tr value="9">December<input class="month_name" type="hidden" style="width:0%;" value="9"> </tr>';
                }
                return $result;
            })
            ->addColumn('year', function ($energy_consumption) {
                $result = Carbon::parse($energy_consumption->created_at)->year;

                return $result;
            })
            ->addColumn('action', function ($energy_consumption) {
                $result = '';

                $result = '<center><div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Action">
                    <i class="fas fa-cog"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdownCustom">'; // dropdown-menu start
                $result .= '<button class="dropdown-item text-center actionEditEnergyConsumptionTarget" type="button" energy-id="' . $energy_consumption->id . '" data-toggle="modal" data-target="#modalEnergyTarget" data-keyboard="false">Edit Target</button>';
                    if ($energy_consumption->actual == null) {
                      
                        $result .= '<button class="dropdown-item text-center actionAddEnergyConsumption" type="button" energy-id="' . $energy_consumption->id . '"  data-toggle="modal" data-target="#modalEnergyConsumption" data-keyboard="false">Add Actual</button>';

                    } else {
                        $result .= '<button class="dropdown-item text-center actionEditEnergyConsumption" type="button" energy-id="' . $energy_consumption->id . '" data-toggle="modal" data-target="#modalEnergyConsumption" data-keyboard="false">Edit Actual</button>';
                    }
                    $result .= '</div>'; // dropdown-menu end
                    $result .= '</div>'; // div end
                    
                    '</center>';
                return $result;
            })
            ->addColumn('status', function ($energy_consumption) {
                $result = '';
                $energy_target = $energy_consumption->target;
                $energy_actual = $energy_consumption->actual;


                if ($energy_actual == NULL) {
                    $result .= '<center><span class="badge badge-pill badge-secondary">No Actual Consumption Data</span></center>';

                } elseif($energy_actual > $energy_target) {
                    $result .= '<center><span class="badge badge-pill badge-danger">Off Target</span></center>';
                 
                } else if ($energy_actual == $energy_target) {
                    $result .= '<center><span class="badge badge-pill badge-primary">On Target</span></center>';

                } else if ($energy_actual < $energy_target) {
                    $result .= '<center><span class="badge badge-pill badge-success">Under</span></center>';

                } 

                return $result;
            })
            ->rawColumns(['month', 'year', 'action', 'status']) // to format the added columns(status & action) as html format
            ->make(true);
    }

    public function get_energy_target_by_id(Request $request) {
        $energy_target_details = EnergyConsumption::where('id', $request->targetId)->get();
        return response()->json(['result' => $energy_target_details]);
    }

    public function get_months_for_filter() {
        $months = EnergyConsumption::all();

        return response()->json(['month' => $months]);
    }

    public function get_fiscal_year_for_filter() {
        $years = FiscalYear::all();
        $year = FiscalYear::where('fiscal_year', '!=', 2020)->get();

        return response()->json(['year' => $years, 'years' =>$year]);
    }

    public function get_current_energy_data(Request $request) {

        if($request->fiscal_year == null){
            $get_current_fiscal_year = FiscalYear::where('logdel', 0)
            ->first();
            // $get_current_fiscal_year = DB::table('tbl_fiscal_years')->where('logdel', 0)->first();
    
            $current_fy = $get_current_fiscal_year->fiscal_year;
            $current_fy_id = $get_current_fiscal_year->id;
    
            $past_fy = $current_fy - 1;
            $past_fy_id = $current_fy_id - 1;
    
            // $year = EnergyConsumption::where('fiscal_year_id', $current_fy)
            // ->get();
    
            $march_energy_consumption_past_year = EnergyConsumption::where('month', 3)
            ->where('fiscal_year_id', $past_fy_id)
            ->get();
    
            $april_energy_consumption_current_year = EnergyConsumption::where('month', 4)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
    
            $may_energy_consumption_current_year = EnergyConsumption::where('month', 5)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
    
            $june_energy_consumption_current_year = EnergyConsumption::where('month', 6)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
    
            $july_energy_consumption_current_year = EnergyConsumption::where('month', 7)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
    
            $august_energy_consumption_current_year = EnergyConsumption::where('month', 8)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
                
            $september_energy_consumption_current_year = EnergyConsumption::where('month', 9)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
                
            $october_energy_consumption_current_year = EnergyConsumption::where('month', 10)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
    
            $november_energy_consumption_current_year = EnergyConsumption::where('month', 11)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
              
            $december_energy_consumption_current_year = EnergyConsumption::where('month', 12)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
            
            $january_energy_consumption_current_year = EnergyConsumption::where('month', 1)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
                
            $february_energy_consumption_current_year = EnergyConsumption::where('month', 2)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
                 
            $march_energy_consumption_current_year = EnergyConsumption::where('month', 3)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
            
            
            //======================================================== MARCH PAST YEAR
            $icon_past_march = '';
            $march_actual_past_fy = null;
            $march_target_past_fy = null;
    
            if(count($march_energy_consumption_past_year) != 0) {
            $march_target_past_fy = $march_energy_consumption_past_year[0]->target;
            $march_actual_past_fy = $march_energy_consumption_past_year[0]->actual;
    
            if($march_target_past_fy > $march_actual_past_fy) {
                $icon_past_march .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($march_target_past_fy == $march_actual_past_fy) {
                $icon_past_march .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($march_target_past_fy < $march_actual_past_fy) {
                $icon_past_march .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $march_target_past_fy =  number_format($march_target_past_fy);
            $march_actual_past_fy =  number_format($march_actual_past_fy);
            }   
    
            //======================================================== MARCH PAST YEAR
    
            //======================================================== APRIL CURRENT YEAR
            $icon_current_april = '';
            $april_target_current_fy = null;
            $april_actual_current_fy = null;
    
            if(count($april_energy_consumption_current_year) != 0) {
            $april_target_current_fy = $april_energy_consumption_current_year[0]->target;
            $april_actual_current_fy = $april_energy_consumption_current_year[0]->actual;
    
            if($april_target_current_fy > $april_actual_current_fy) {
                $icon_current_april .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($april_target_current_fy == $april_actual_current_fy) {
                $icon_current_april .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($april_target_current_fy < $april_actual_current_fy) {
                $icon_current_april .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $april_target_current_fy =  number_format($april_target_current_fy);
            $april_actual_current_fy =  number_format($april_actual_current_fy);
            }   
            //======================================================== APRIL CURRENT YEAR
    
    
            //======================================================== MAY CURRENT YEAR
            $icon_current_may = '';
            $may_target_current_fy = null;
            $may_actual_current_fy = null;
    
            if(count($may_energy_consumption_current_year) != 0) {
            $may_target_current_fy = $may_energy_consumption_current_year[0]->target;
            $may_actual_current_fy = $may_energy_consumption_current_year[0]->actual;
    
            if($may_target_current_fy > $may_actual_current_fy) {
                $icon_current_may .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($may_target_current_fy == $may_actual_current_fy) {
                $icon_current_may .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($may_target_current_fy < $may_actual_current_fy) {
                $icon_current_may .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $may_target_current_fy =  number_format($may_target_current_fy);
            $may_actual_current_fy =  number_format($may_actual_current_fy);
            }   
            //======================================================== MAY CURRENT YEAR
    
    
            //======================================================== JUNE CURRENT YEAR
            $icon_current_june = '';
            $june_target_current_fy = null;
            $june_actual_current_fy = null;
    
            if(count($june_energy_consumption_current_year) != 0) {
            $june_target_current_fy = $june_energy_consumption_current_year[0]->target;
            $june_actual_current_fy = $june_energy_consumption_current_year[0]->actual;
    
            if($june_target_current_fy > $june_actual_current_fy) {
                $icon_current_june .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($june_target_current_fy == $june_actual_current_fy) {
                $icon_current_june .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($june_target_current_fy < $june_actual_current_fy) {
                $icon_current_june .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $june_target_current_fy =  number_format($june_target_current_fy);
            $june_actual_current_fy =  number_format($june_actual_current_fy);
            }   
            //======================================================== JUNE CURRENT YEAR
    
    
            //======================================================== JULY CURRENT YEAR
            $icon_current_july = '';
            $july_target_current_fy = null;
            $july_actual_current_fy = null;
    
            if(count($july_energy_consumption_current_year) != 0) {
            $july_target_current_fy = $july_energy_consumption_current_year[0]->target;
            $july_actual_current_fy = $july_energy_consumption_current_year[0]->actual;
    
            if($july_target_current_fy > $july_actual_current_fy) {
                $icon_current_july .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($july_target_current_fy == $july_actual_current_fy) {
                $icon_current_july .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($july_target_current_fy < $july_actual_current_fy) {
                $icon_current_july .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $july_target_current_fy =  number_format($july_target_current_fy);
            $july_actual_current_fy =  number_format($july_actual_current_fy);
            }   
            //======================================================== JULY CURRENT YEAR
    
    
    
            //======================================================== AUGUST CURRENT YEAR
            $icon_current_august = '';
            $august_target_current_fy = null;
            $august_actual_current_fy = null;
    
            if(count($august_energy_consumption_current_year) != 0) {
            $august_target_current_fy = $august_energy_consumption_current_year[0]->target;
            $august_actual_current_fy = $august_energy_consumption_current_year[0]->actual;
    
            if($august_target_current_fy > $august_actual_current_fy) {
                $icon_current_august .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($august_target_current_fy == $august_actual_current_fy) {
                $icon_current_august .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($august_target_current_fy < $august_actual_current_fy) {
                $icon_current_august .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $august_target_current_fy =  number_format($august_target_current_fy);
            $august_actual_current_fy =  number_format($august_actual_current_fy);
            }   
            //======================================================== AUGUST CURRENT YEAR
    
    
            //======================================================== SEPTEMBER CURRENT YEAR
            $icon_current_september = '';
            $september_target_current_fy = null;
            $september_actual_current_fy = null;
    
            if(count($september_energy_consumption_current_year) != 0) {
            $september_target_current_fy = $september_energy_consumption_current_year[0]->target;
            $september_actual_current_fy = $september_energy_consumption_current_year[0]->actual;
    
            if($september_target_current_fy > $september_actual_current_fy) {
                $icon_current_september .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($september_target_current_fy == $september_actual_current_fy) {
                $icon_current_september .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($september_target_current_fy < $september_actual_current_fy) {
                $icon_current_september .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $september_target_current_fy =  number_format($september_target_current_fy);
            $september_actual_current_fy =  number_format($september_actual_current_fy);
            }   
            //======================================================== SEPTEMBER CURRENT YEAR
    
    
    
            //======================================================== OCTOBER CURRENT YEAR
            $icon_current_october = '';
            $october_target_current_fy = null;
            $october_actual_current_fy = null;
    
            if(count($october_energy_consumption_current_year) != 0) {
            $october_target_current_fy = $october_energy_consumption_current_year[0]->target;
            $october_actual_current_fy = $october_energy_consumption_current_year[0]->actual;
    
            if($october_target_current_fy > $october_actual_current_fy) {
                $icon_current_october .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($october_target_current_fy == $october_actual_current_fy) {
                $icon_current_october .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($october_target_current_fy < $october_actual_current_fy) {
                $icon_current_october .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $october_target_current_fy =  number_format($october_target_current_fy);
            $october_actual_current_fy =  number_format($october_actual_current_fy);
            }   
            //======================================================== OCTOBER CURRENT YEAR
    
    
    
            //======================================================== NOVEMBER CURRENT YEAR
            $icon_current_november = '';
            $november_target_current_fy = null;
            $november_actual_current_fy = null;
    
            if(count($november_energy_consumption_current_year) != 0) {
            $november_target_current_fy = $november_energy_consumption_current_year[0]->target;
            $november_actual_current_fy = $november_energy_consumption_current_year[0]->actual;
    
            if($november_target_current_fy > $november_actual_current_fy) {
                $icon_current_november .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($november_target_current_fy == $november_actual_current_fy) {
                $icon_current_november .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($november_target_current_fy < $november_actual_current_fy) {
                $icon_current_november .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $november_target_current_fy =  number_format($november_target_current_fy);
            $november_actual_current_fy =  number_format($november_actual_current_fy);
            }   
            //======================================================== NOVEMBER CURRENT YEAR
    
    
            //======================================================== DECEMBER CURRENT YEAR
            $icon_current_december = '';
            $december_target_current_fy = null;
            $december_actual_current_fy = null;
    
            if(count($december_energy_consumption_current_year) != 0) {
            $december_target_current_fy = $december_energy_consumption_current_year[0]->target;
            $december_actual_current_fy = $december_energy_consumption_current_year[0]->actual;
    
            if($december_target_current_fy > $december_actual_current_fy) {
                $icon_current_december .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($december_target_current_fy == $december_actual_current_fy) {
                $icon_current_december .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($december_target_current_fy < $december_actual_current_fy) {
                $icon_current_december .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $december_target_current_fy =  number_format($december_target_current_fy);
            $december_actual_current_fy =  number_format($december_actual_current_fy);
            }   
            //======================================================== DECEMBER CURRENT YEAR
    
    
            //======================================================== JANUARY CURRENT YEAR
            $icon_current_january = '';
            $january_target_current_fy = null;
            $january_actual_current_fy = null;
    
            if(count($january_energy_consumption_current_year) != 0) {
            $january_target_current_fy = $january_energy_consumption_current_year[0]->target;
            $january_actual_current_fy = $january_energy_consumption_current_year[0]->actual;
    
            if($january_target_current_fy > $january_actual_current_fy) {
                $icon_current_january .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($january_target_current_fy == $january_actual_current_fy) {
                $icon_current_january .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($january_target_current_fy < $january_actual_current_fy) {
                $icon_current_january .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $january_target_current_fy =  number_format($january_target_current_fy);
            $january_actual_current_fy =  number_format($january_actual_current_fy);
            }   
            //======================================================== JANUARY CURRENT YEAR
    
    
    
            //======================================================== FEBRUARY CURRENT YEAR
            $icon_current_february = '';
            $february_target_current_fy = null;
            $february_actual_current_fy = null;
    
            if(count($february_energy_consumption_current_year) != 0) {
            $february_target_current_fy = $february_energy_consumption_current_year[0]->target;
            $february_actual_current_fy = $february_energy_consumption_current_year[0]->actual;
    
            if($february_target_current_fy > $february_actual_current_fy) {
                $icon_current_february .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($february_target_current_fy == $february_actual_current_fy) {
                $icon_current_february .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($february_target_current_fy < $february_actual_current_fy) {
                $icon_current_february .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $february_target_current_fy =  number_format($february_target_current_fy);
            $february_actual_current_fy =  number_format($february_actual_current_fy);
            }   
            //======================================================== FEBRUARY CURRENT YEAR
    
    
    
            //======================================================== MARCH CURRENT YEAR
            $icon_current_march = '';
            $march_target_current_fy = null;
            $march_actual_current_fy = null;
    
            if(count($march_energy_consumption_current_year) != 0) {
            $march_target_current_fy = $march_energy_consumption_current_year[0]->target;
            $march_actual_current_fy = $march_energy_consumption_current_year[0]->actual;
    
            if($march_target_current_fy > $march_actual_current_fy) {
                $icon_current_march .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($march_target_current_fy == $march_actual_current_fy) {
                $icon_current_march .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($march_target_current_fy < $march_actual_current_fy) {
                $icon_current_march .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $march_target_current_fy =  number_format($march_target_current_fy);
            $march_actual_current_fy =  number_format($march_actual_current_fy);
            }   
            //======================================================== MARCH CURRENT YEAR
    

            $energy_consumption_current_year = EnergyConsumption::where('fiscal_year_id', $current_fy_id)
            ->get();

            
            return response()->json([
                'pastFY' => $past_fy,
                'currentFY' => $current_fy,
                'iconPastMarch' => $icon_past_march,
                'iconCurrentApril' => $icon_current_april,
                'iconCurrentMay' => $icon_current_may,
                'iconCurrentJune' => $icon_current_june,
                'iconCurrentJuly' => $icon_current_july,
                'iconCurrentAugust' => $icon_current_august,
                'iconCurrentSeptember' => $icon_current_september,
                'iconCurrentOctober' => $icon_current_october,
                'iconCurrentNovember' => $icon_current_november,
                'iconCurrentDecember' => $icon_current_december,
                'iconCurrentJanuary' => $icon_current_january,
                'iconCurrentFebruary' => $icon_current_february,
                'iconCurrentMarch' => $icon_current_march,
                'marchTargetPastFy' => $march_target_past_fy, 
                'marchActualPastFy' => $march_actual_past_fy,
                'aprilTargetCurrentFy' => $april_target_current_fy,
                'aprilActualCurrentFy' => $april_actual_current_fy,
                'mayTargetCurrentFy' => $may_target_current_fy,
                'mayActualCurrentFy' => $may_actual_current_fy,
                'juneTargetCurrentFy' => $june_target_current_fy,
                'juneActualCurrentFy' => $june_actual_current_fy,
                'julyTargetCurrentFy' => $july_target_current_fy,
                'julyActualCurrentFy' => $july_actual_current_fy,
                'augustTargetCurrentFy' => $august_target_current_fy,
                'augustActualCurrentFy' => $august_actual_current_fy,
                'septemberTargetCurrentFy' => $september_target_current_fy,
                'septemberActualCurrentFy' => $september_actual_current_fy,
                'octoberTargetCurrentFy' => $october_target_current_fy,
                'octoberActualCurrentFy' => $october_actual_current_fy,
                'novemberTargetCurrentFy' => $november_target_current_fy,
                'novemberActualCurrentFy' => $november_actual_current_fy,
                'decemberTargetCurrentFy' => $december_target_current_fy,
                'decemberActualCurrentFy' => $december_actual_current_fy,
                'januaryTargetCurrentFy' => $january_target_current_fy,
                'januaryActualCurrentFy' => $january_actual_current_fy,
                'februaryTargetCurrentFy' => $february_target_current_fy,
                'februaryActualCurrentFy' => $february_actual_current_fy,
                'marchTargetCurrentFy' => $march_target_current_fy,
                'marchActualCurrentFy' => $march_actual_current_fy,
                'energyConsumption' => $energy_consumption_current_year
            ]);
        }
        else {
            $get_current_fiscal_year = FiscalYear::where('fiscal_year', $request->fiscal_year)
            ->first();

            // $get_current_fiscal_year = DB::table('tbl_fiscal_years')->where('logdel', 0)->first();
            
            $current_fy = $get_current_fiscal_year->fiscal_year;
            $current_fy_id = $get_current_fiscal_year->id;
            
            $past_fy = $current_fy - 1;
            $past_fy_id = $current_fy_id - 1;
            
            $check_data = EnergyConsumption::where('fiscal_year_id', $current_fy_id)
            ->get();

           
            // $year = EnergyConsumption::where('fiscal_year_id', $current_fy)
            // ->get();
    
            $march_energy_consumption_past_year = EnergyConsumption::where('month', 3)
            ->where('fiscal_year_id', $past_fy_id)
            ->get();
    
            $april_energy_consumption_current_year = EnergyConsumption::where('month', 4)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
    
            $may_energy_consumption_current_year = EnergyConsumption::where('month', 5)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
    
            $june_energy_consumption_current_year = EnergyConsumption::where('month', 6)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
    
            $july_energy_consumption_current_year = EnergyConsumption::where('month', 7)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
    
            $august_energy_consumption_current_year = EnergyConsumption::where('month', 8)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
                
            $september_energy_consumption_current_year = EnergyConsumption::where('month', 9)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
                
            $october_energy_consumption_current_year = EnergyConsumption::where('month', 10)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
    
            $november_energy_consumption_current_year = EnergyConsumption::where('month', 11)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
              
            $december_energy_consumption_current_year = EnergyConsumption::where('month', 12)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
            
            $january_energy_consumption_current_year = EnergyConsumption::where('month', 1)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
                
            $february_energy_consumption_current_year = EnergyConsumption::where('month', 2)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
                 
            $march_energy_consumption_current_year = EnergyConsumption::where('month', 3)
            ->where('fiscal_year_id', $current_fy_id)
            ->get();
            
            
            //======================================================== MARCH PAST YEAR
            $icon_past_march = '';
            $march_actual_past_fy = null;
            $march_target_past_fy = null;
    
            if(count($march_energy_consumption_past_year) != 0) {
            $march_target_past_fy = $march_energy_consumption_past_year[0]->target;
            $march_actual_past_fy = $march_energy_consumption_past_year[0]->actual;
    
            if($march_target_past_fy > $march_actual_past_fy) {
                $icon_past_march .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($march_target_past_fy == $march_actual_past_fy) {
                $icon_past_march .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($march_target_past_fy < $march_actual_past_fy) {
                $icon_past_march .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $march_target_past_fy =  number_format($march_target_past_fy);
            $march_actual_past_fy =  number_format($march_actual_past_fy);
            }   
    
            //======================================================== MARCH PAST YEAR
    
            //======================================================== APRIL CURRENT YEAR
            $icon_current_april = '';
            $april_target_current_fy = null;
            $april_actual_current_fy = null;
    
            if(count($april_energy_consumption_current_year) != 0) {
            $april_target_current_fy = $april_energy_consumption_current_year[0]->target;
            $april_actual_current_fy = $april_energy_consumption_current_year[0]->actual;
    
            if($april_target_current_fy > $april_actual_current_fy) {
                $icon_current_april .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($april_target_current_fy == $april_actual_current_fy) {
                $icon_current_april .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($april_target_current_fy < $april_actual_current_fy) {
                $icon_current_april .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $april_target_current_fy =  number_format($april_target_current_fy);
            $april_actual_current_fy =  number_format($april_actual_current_fy);
            }   
            //======================================================== APRIL CURRENT YEAR
    
    
            //======================================================== MAY CURRENT YEAR
            $icon_current_may = '';
            $may_target_current_fy = null;
            $may_actual_current_fy = null;
    
            if(count($may_energy_consumption_current_year) != 0) {
            $may_target_current_fy = $may_energy_consumption_current_year[0]->target;
            $may_actual_current_fy = $may_energy_consumption_current_year[0]->actual;
    
            if($may_target_current_fy > $may_actual_current_fy) {
                $icon_current_may .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($may_target_current_fy == $may_actual_current_fy) {
                $icon_current_may .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($may_target_current_fy < $may_actual_current_fy) {
                $icon_current_may .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $may_target_current_fy =  number_format($may_target_current_fy);
            $may_actual_current_fy =  number_format($may_actual_current_fy);
            }   
            //======================================================== MAY CURRENT YEAR
    
    
            //======================================================== JUNE CURRENT YEAR
            $icon_current_june = '';
            $june_target_current_fy = null;
            $june_actual_current_fy = null;
    
            if(count($june_energy_consumption_current_year) != 0) {
            $june_target_current_fy = $june_energy_consumption_current_year[0]->target;
            $june_actual_current_fy = $june_energy_consumption_current_year[0]->actual;
    
            if($june_target_current_fy > $june_actual_current_fy) {
                $icon_current_june .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($june_target_current_fy == $june_actual_current_fy) {
                $icon_current_june .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($june_target_current_fy < $june_actual_current_fy) {
                $icon_current_june .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $june_target_current_fy =  number_format($june_target_current_fy);
            $june_actual_current_fy =  number_format($june_actual_current_fy);
            }   
            //======================================================== JUNE CURRENT YEAR
    
    
            //======================================================== JULY CURRENT YEAR
            $icon_current_july = '';
            $july_target_current_fy = null;
            $july_actual_current_fy = null;
    
            if(count($july_energy_consumption_current_year) != 0) {
            $july_target_current_fy = $july_energy_consumption_current_year[0]->target;
            $july_actual_current_fy = $july_energy_consumption_current_year[0]->actual;
    
            if($july_target_current_fy > $july_actual_current_fy) {
                $icon_current_july .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($july_target_current_fy == $july_actual_current_fy) {
                $icon_current_july .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($july_target_current_fy < $july_actual_current_fy) {
                $icon_current_july .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $july_target_current_fy =  number_format($july_target_current_fy);
            $july_actual_current_fy =  number_format($july_actual_current_fy);
            }   
            //======================================================== JULY CURRENT YEAR
    
    
    
            //======================================================== AUGUST CURRENT YEAR
            $icon_current_august = '';
            $august_target_current_fy = null;
            $august_actual_current_fy = null;
    
            if(count($august_energy_consumption_current_year) != 0) {
            $august_target_current_fy = $august_energy_consumption_current_year[0]->target;
            $august_actual_current_fy = $august_energy_consumption_current_year[0]->actual;
    
            if($august_target_current_fy > $august_actual_current_fy) {
                $icon_current_august .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($august_target_current_fy == $august_actual_current_fy) {
                $icon_current_august .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($august_target_current_fy < $august_actual_current_fy) {
                $icon_current_august .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $august_target_current_fy =  number_format($august_target_current_fy);
            $august_actual_current_fy =  number_format($august_actual_current_fy);
            }   
            //======================================================== AUGUST CURRENT YEAR
    
    
            //======================================================== SEPTEMBER CURRENT YEAR
            $icon_current_september = '';
            $september_target_current_fy = null;
            $september_actual_current_fy = null;
    
            if(count($september_energy_consumption_current_year) != 0) {
            $september_target_current_fy = $september_energy_consumption_current_year[0]->target;
            $september_actual_current_fy = $september_energy_consumption_current_year[0]->actual;
    
            if($september_target_current_fy > $september_actual_current_fy) {
                $icon_current_september .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($september_target_current_fy == $september_actual_current_fy) {
                $icon_current_september .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($september_target_current_fy < $september_actual_current_fy) {
                $icon_current_september .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $september_target_current_fy =  number_format($september_target_current_fy);
            $september_actual_current_fy =  number_format($september_actual_current_fy);
            }   
            //======================================================== SEPTEMBER CURRENT YEAR
    
    
    
            //======================================================== OCTOBER CURRENT YEAR
            $icon_current_october = '';
            $october_target_current_fy = null;
            $october_actual_current_fy = null;
    
            if(count($october_energy_consumption_current_year) != 0) {
            $october_target_current_fy = $october_energy_consumption_current_year[0]->target;
            $october_actual_current_fy = $october_energy_consumption_current_year[0]->actual;
    
            if($october_target_current_fy > $october_actual_current_fy) {
                $icon_current_october .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($october_target_current_fy == $october_actual_current_fy) {
                $icon_current_october .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($october_target_current_fy < $october_actual_current_fy) {
                $icon_current_october .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $october_target_current_fy =  number_format($october_target_current_fy);
            $october_actual_current_fy =  number_format($october_actual_current_fy);
            }   
            //======================================================== OCTOBER CURRENT YEAR
    
    
    
            //======================================================== NOVEMBER CURRENT YEAR
            $icon_current_november = '';
            $november_target_current_fy = null;
            $november_actual_current_fy = null;
    
            if(count($november_energy_consumption_current_year) != 0) {
            $november_target_current_fy = $november_energy_consumption_current_year[0]->target;
            $november_actual_current_fy = $november_energy_consumption_current_year[0]->actual;
    
            if($november_target_current_fy > $november_actual_current_fy) {
                $icon_current_november .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($november_target_current_fy == $november_actual_current_fy) {
                $icon_current_november .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($november_target_current_fy < $november_actual_current_fy) {
                $icon_current_november .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $november_target_current_fy =  number_format($november_target_current_fy);
            $november_actual_current_fy =  number_format($november_actual_current_fy);
            }   
            //======================================================== NOVEMBER CURRENT YEAR
    
    
            //======================================================== DECEMBER CURRENT YEAR
            $icon_current_december = '';
            $december_target_current_fy = null;
            $december_actual_current_fy = null;
    
            if(count($december_energy_consumption_current_year) != 0) {
            $december_target_current_fy = $december_energy_consumption_current_year[0]->target;
            $december_actual_current_fy = $december_energy_consumption_current_year[0]->actual;
    
            if($december_target_current_fy > $december_actual_current_fy) {
                $icon_current_december .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($december_target_current_fy == $december_actual_current_fy) {
                $icon_current_december .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($december_target_current_fy < $december_actual_current_fy) {
                $icon_current_december .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $december_target_current_fy =  number_format($december_target_current_fy);
            $december_actual_current_fy =  number_format($december_actual_current_fy);
            }   
            //======================================================== DECEMBER CURRENT YEAR
    
    
            //======================================================== JANUARY CURRENT YEAR
            $icon_current_january = '';
            $january_target_current_fy = null;
            $january_actual_current_fy = null;
    
            if(count($january_energy_consumption_current_year) != 0) {
            $january_target_current_fy = $january_energy_consumption_current_year[0]->target;
            $january_actual_current_fy = $january_energy_consumption_current_year[0]->actual;
    
            if($january_target_current_fy > $january_actual_current_fy) {
                $icon_current_january .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($january_target_current_fy == $january_actual_current_fy) {
                $icon_current_january .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($january_target_current_fy < $january_actual_current_fy) {
                $icon_current_january .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $january_target_current_fy =  number_format($january_target_current_fy);
            $january_actual_current_fy =  number_format($january_actual_current_fy);
            }   
            //======================================================== JANUARY CURRENT YEAR
    
    
    
            //======================================================== FEBRUARY CURRENT YEAR
            $icon_current_february = '';
            $february_target_current_fy = null;
            $february_actual_current_fy = null;
    
            if(count($february_energy_consumption_current_year) != 0) {
            $february_target_current_fy = $february_energy_consumption_current_year[0]->target;
            $february_actual_current_fy = $february_energy_consumption_current_year[0]->actual;
    
            if($february_target_current_fy > $february_actual_current_fy) {
                $icon_current_february .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($february_target_current_fy == $february_actual_current_fy) {
                $icon_current_february .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($february_target_current_fy < $february_actual_current_fy) {
                $icon_current_february .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $february_target_current_fy =  number_format($february_target_current_fy);
            $february_actual_current_fy =  number_format($february_actual_current_fy);
            }   
            //======================================================== FEBRUARY CURRENT YEAR
    
    
    
            //======================================================== MARCH CURRENT YEAR
            $icon_current_march = '';
            $march_target_current_fy = null;
            $march_actual_current_fy = null;
    
            if(count($march_energy_consumption_current_year) != 0) {
            $march_target_current_fy = $march_energy_consumption_current_year[0]->target;
            $march_actual_current_fy = $march_energy_consumption_current_year[0]->actual;
    
            if($march_target_current_fy > $march_actual_current_fy) {
                $icon_current_march .= '<i class="fas fa-arrow-down text-green"></i>';
            } elseif($march_target_current_fy == $march_actual_current_fy) {
                $icon_current_march .= '<i class="fa fa-minus text-blue"></i>';
            } elseif($march_target_current_fy < $march_actual_current_fy) {
                $icon_current_march .= '<i class="fas fa-arrow-up text-red"></i>';
            }
    
            $march_target_current_fy =  number_format($march_target_current_fy);
            $march_actual_current_fy =  number_format($march_actual_current_fy);
            }   
            //======================================================== MARCH CURRENT YEAR
    
            return response()->json([
                'chckData' => $check_data,
                'pastFY' => $past_fy,
                'currentFY' => $current_fy,
                'iconPastMarch' => $icon_past_march,
                'iconCurrentApril' => $icon_current_april,
                'iconCurrentMay' => $icon_current_may,
                'iconCurrentJune' => $icon_current_june,
                'iconCurrentJuly' => $icon_current_july,
                'iconCurrentAugust' => $icon_current_august,
                'iconCurrentSeptember' => $icon_current_september,
                'iconCurrentOctober' => $icon_current_october,
                'iconCurrentNovember' => $icon_current_november,
                'iconCurrentDecember' => $icon_current_december,
                'iconCurrentJanuary' => $icon_current_january,
                'iconCurrentFebruary' => $icon_current_february,
                'iconCurrentMarch' => $icon_current_march,
                'marchTargetPastFy' => $march_target_past_fy, 
                'marchActualPastFy' => $march_actual_past_fy,
                'aprilTargetCurrentFy' => $april_target_current_fy,
                'aprilActualCurrentFy' => $april_actual_current_fy,
                'mayTargetCurrentFy' => $may_target_current_fy,
                'mayActualCurrentFy' => $may_actual_current_fy,
                'juneTargetCurrentFy' => $june_target_current_fy,
                'juneActualCurrentFy' => $june_actual_current_fy,
                'julyTargetCurrentFy' => $july_target_current_fy,
                'julyActualCurrentFy' => $july_actual_current_fy,
                'augustTargetCurrentFy' => $august_target_current_fy,
                'augustActualCurrentFy' => $august_actual_current_fy,
                'septemberTargetCurrentFy' => $september_target_current_fy,
                'septemberActualCurrentFy' => $september_actual_current_fy,
                'octoberTargetCurrentFy' => $october_target_current_fy,
                'octoberActualCurrentFy' => $october_actual_current_fy,
                'novemberTargetCurrentFy' => $november_target_current_fy,
                'novemberActualCurrentFy' => $november_actual_current_fy,
                'decemberTargetCurrentFy' => $december_target_current_fy,
                'decemberActualCurrentFy' => $december_actual_current_fy,
                'januaryTargetCurrentFy' => $january_target_current_fy,
                'januaryActualCurrentFy' => $january_actual_current_fy,
                'februaryTargetCurrentFy' => $february_target_current_fy,
                'februaryActualCurrentFy' => $february_actual_current_fy,
                'marchTargetCurrentFy' => $march_target_current_fy,
                'marchActualCurrentFy' => $march_actual_current_fy,
            ]);
        }
    }   
}
