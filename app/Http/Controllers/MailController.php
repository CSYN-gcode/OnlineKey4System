<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\RapidXUserAccess;
use App\AutoMailer;
use App\User;
// use App\RapidXUser;
use App\FiscalYear;
use Carbon\Carbon;
use App\EnergyConsumption;
use App\WaterConsumption;
use App\InkConsumption;
use App\PaperConsumption;
// use App\MonthlyUsedPaper;
// use App\Department;
// use App\TotalUsedPaper;

class MailController extends Controller
{

    public function send_mail()
    {
        date_default_timezone_set('Asia/Manila');
        session_start();

        // $monthNow = Carbon::now()->format('F');

        $get_current_fiscal_year = FiscalYear::where('logdel', 0)
            ->get();

        $current_fy_id = $get_current_fiscal_year[0]->id;


          $date_now = Carbon::now()->format('d');
        //   return $date_now;
        if ($date_now == 01 || $date_now == 02 || $date_now == 03 || $date_now == 04 || $date_now == 05) {

            // get current month in String format
            // $monthNow = Carbon::now()->subMonth()->format('F');

            $monthNow = Carbon::now()->subMonth()->month;
            $nextMonth = Carbon::now()->month;
        } else {
            $monthNow = Carbon::now()->month;
            $nextMonth = Carbon::now()->addMonth()->month;
        }

        // $recipients_id = RapidXUserAccess::where('module_id', 16)->pluck('user_id');
        // $departments_id = array();
        // test email
        // for($i = 1; $i <= 14; $i++){
        //     if(InkConsumption::where('month', $monthNow)->where('fiscal_year_id', $current_fy_id)->where('department', $i)->whereNotNull('actual')->exists()){
        //         $count_ink_updated_for_the_month = 0;
        //         $departments_id[] = $count_ink_updated_for_the_month;
        //     }
        //     else{
        //         $count_ink_updated_for_the_month = $i;
        //         $departments_id[] = $count_ink_updated_for_the_month;
        //     }
            // $count_ink_updated_for_the_month = 
        // }
        // return $departments_id;

        

        $departments_id = array();

        $count_ink_updated_for_the_month = InkConsumption::where('month', $monthNow)
            ->where('fiscal_year_id', $current_fy_id)
            ->whereNotNull('actual')
            ->orderBy('department')
            ->get('department')
            ->unique('department');

        for ($i = 0; $i < count($count_ink_updated_for_the_month); $i++) {
            $departments_id[] = $count_ink_updated_for_the_month[$i]->department;
        }

        for($i = 1; $i <= 4; $i++){
            if(PaperConsumption::where('month', $monthNow)->where('fiscal_year_id', $current_fy_id)->where('department', $i)->whereNotNull('actual')->exists())
            {
                // department_id -> $i + 10 is for the department_id to be the same as the user`s department_id
                $count_paper_updated_for_the_month = $i + 10;
                $departments_id[] = $count_paper_updated_for_the_month;
            }
        }

        if(EnergyConsumption::where('month', $monthNow)->where('fiscal_year_id', $current_fy_id)->where('logdel', 0)->whereNotNull('actual')->exists()){
            $count_energy_updated_for_the_month = 30;
            $departments_id[] = $count_energy_updated_for_the_month;
        }

        if(WaterConsumption::where('month', $monthNow)->where('fiscal_year_id', $current_fy_id)->where('logdel', 0)->whereNotNull('factory_1_actual')->whereNotNull('factory_2_actual')->exists()){
            $count_water_updated_for_the_month = 30;
            $departments_id[] = $count_water_updated_for_the_month;
        }

        // $email_recipients_id = User::whereNotIn('department', $departments_id)->whereBetween('user_level_id', [1, 3])->where('status', 0)->get()->pluck('rapidx_id');
        $email_recipients_id = User::whereNotIn('department', $departments_id)->whereBetween('user_level_id', [1, 3])->where('status', 0)->get()->pluck('rapidx_id');

        $email_recipients = AutoMailer::whereIn('id', $email_recipients_id)->get()->pluck('email')->toArray();
        // $email_recipients = AutoMailer::whereIn('id', 461)->get()->pluck('email')->toArray();
        // return $email_recipients;

        // $recipients = User::whereNotIn('department_id', $departments_id)
        // ->where('status', 0)
        // ->get()->pluck('email')->toArray();
        // return $email_recipients;

        $data = array('' => "");

            Mail::send('email_content', $data, function ($message) use ($email_recipients) {
                $message->to($email_recipients)
                // $message->to('cdcasuyon@pricon.ph')
                    ->subject('EMAIL REMINDER FOR UPDATING MONTHLY RESOURCES CONSUMPTION')
                    ->from('issinfoservice@pricon.ph', 'Monthly Consumption Monitoring Reminder')
                    ->bcc('cdcasuyon@pricon.ph');
            });
    }

    public function send_mail_completed_data()
    {
        date_default_timezone_set('Asia/Manila');
        session_start();

        // $monthNow = Carbon::now()->format('F');

        $get_current_fiscal_year = FiscalYear::where('logdel', 0)
            ->get();

        $current_fy_id = $get_current_fiscal_year[0]->id;


          $date_now = Carbon::now()->format('d');
        //   return $date_now;
        if ($date_now == 01 || $date_now == 02 || $date_now == 03 || $date_now == 04 || $date_now == 05) {

            // get current month in String format
            // $monthNow = Carbon::now()->subMonth()->format('F');

            $monthNow = Carbon::now()->subMonth()->month;
            $nextMonth = Carbon::now()->format('n');
        } else {
            $monthNow = Carbon::now()->format('n');
            $nextMonth = Carbon::now()->addMonth()->format('n');
        }
// return $nextMonth;
        // $recipients_id = RapidXUserAccess::where('module_id', 16)->pluck('user_id');
        // $departments_id = array();
        // test email
        // for($i = 1; $i <= 14; $i++){
        //     if(InkConsumption::where('month', $monthNow)->where('fiscal_year_id', $current_fy_id)->where('department', $i)->whereNotNull('actual')->exists()){
        //         $count_ink_updated_for_the_month = 0;
        //         $departments_id[] = $count_ink_updated_for_the_month;
        //     }
        //     else{
        //         $count_ink_updated_for_the_month = $i;
        //         $departments_id[] = $count_ink_updated_for_the_month;
        //     }
            // $count_ink_updated_for_the_month = 
        // }
        // return $departments_id;

        // $departments_id = array();

        // $count_ink_updated_for_the_month = InkConsumption::where('month', $monthNow)
        //     ->where('fiscal_year_id', $current_fy_id)
        //     ->whereNotNull('actual')
        //     ->orderBy('department')
        //     ->get()
        //     ->unique('department');

        // for ($i = 0; $i < count($count_ink_updated_for_the_month); $i++) {
        //     $departments_id[] = $count_ink_updated_for_the_month[$i]->department;
        // }

        // for($i = 1; $i <= 4; $i++){
           $paper_actual_null_count  =  PaperConsumption::where('month', $monthNow)->where('fiscal_year_id', $current_fy_id)->where('logdel', 0)->whereNull('actual')->count();
           $energy_actual_null_count =  EnergyConsumption::where('month', $monthNow)->where('fiscal_year_id', $current_fy_id)->where('logdel', 0)->whereNull('actual')->count();
           $water_actual_null_count =  WaterConsumption::where('month', $monthNow)->where('fiscal_year_id', $current_fy_id)->where('logdel', 0)->whereNull('factory_1_actual')->whereNull('factory_2_actual')->count();
           $ink_actual_null_count =  InkConsumption::where('month', $monthNow)->where('fiscal_year_id', $current_fy_id)->where('logdel', 0)->whereNull('actual')->count();
        //    return $test3;

            if($paper_actual_null_count == 0 && $energy_actual_null_count == 0 && $water_actual_null_count == 0 && $ink_actual_null_count == 0){

                $email_recipients_id = User::whereBetween('user_level_id', [3, 4])->where('status', 0)->get()->pluck('rapidx_id')->toArray();
                $email_recipients = AutoMailer::whereIn('id', $email_recipients_id)->get()->pluck('email')->toArray();

                // return $email_recipients;

                $data = array('' => "");

                    Mail::send('email_completed_data_content', $data, function ($message) use ($email_recipients) {
                        $message->to($email_recipients)
                            ->subject('EMAIL REMINDER FOR COMPLETED MONTHLY RESOURCES CONSUMPTION DATA')
                            ->from('issinfoservice@pricon.ph', 'Monthly Consumption Monitoring Reminder');
                            // ->bcc('cdcasuyon@pricon.ph');
                    });
            }else{
                return 'report not yet completed';
            }
    }
}
