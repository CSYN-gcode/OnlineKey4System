<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard-energy', function () {
    return view('dashboard-energy');
})->name('dashboard-energy');

Route::get('/dashboard-water', function () {
    return view('dashboard-water');
})->name('dashboard-water');

Route::get('/dashboard-ink', function () {
    return view('dashboard-ink');
})->name('dashboard-ink');

Route::get('/dashboard-paper', function () {
    return view('dashboard-paper');
})->name('dashboard-paper');

Route::get('/energy_consumption', function () {
    return view('energy_consumption');
})->name('energy_consumption');

Route::get('/water_consumption', function () {
    return view('water_consumption');
})->name('water_consumption');

Route::get('/paper_consumption', function () {
    return view('paper_consumption');
})->name('paper_consumption');

Route::get('/ink_consumption_sg', function () {
    return view('ink_consumption_sg');
})->name('ink_consumption_sg');

Route::get('/ink_consumption_prod', function () {
    return view('ink_consumption_prod');
})->name('ink_consumption_prod');

Route::get('/ink_consumption', function () {
    return view('ink_consumption');
})->name('ink_consumption');

Route::get('/fiscal_year', function () {
    return view('fiscal_year');
})->name('fiscal_year');

Route::get('/reports', function () {
    return view('reports');
})->name('reports');

Route::get('/reports1', function () {
    return view('reports_1');
})->name('reports_1');

Route::get('/email_content', function () {
    return view('email_content');
})->name('email_content');

Route::get('/email_completed_data_content', function () {
    return view('email_completed_data_content');
})->name('email_completed_data_content');

Route::get('/user_management', function () {
    return view('user_management');
})->name('user_management');

// Automailer
Route::get('/auto_mailer', function () {
    return view('auto_mailer');
})->name('auto_mailer');

// Route::get('/get_chart_data', 'ChartController@get_chart_data');

// User Controller
Route::post('/add_user', 'UserController@add_user');
Route::post('/deactivate_user', 'UserController@deactivate_user');
Route::post('/activate_user', 'UserController@activate_user');
Route::post('edit_user', 'UserController@edit_user');
Route::get('get_user_levels', 'UserController@get_user_levels');
Route::get('/view_users', 'UserController@view_users');
Route::get('/get_id_edit_user', 'UserController@get_id_edit_user');
Route::get('/get_user_details', 'UserController@get_user_details');
Route::get('/get_users_by_stat', 'UserController@get_users_by_stat');
// Route::get('/get_UserDepartment', 'UserController@get_UserDepartment');
Route::get('/get_user_level', 'UserController@get_user_level');
Route::get('/get_department', 'UserController@get_department');
Route::get('/get_department_for_ink', 'UserController@get_department_for_ink');

//test
Route::get('/send_mail', 'MailController@send_mail');
Route::get('/send_mail_completed_data', 'MailController@send_mail_completed_data');

//===== FISCAL YEAR CONTROLLER ======
Route::get('/get_fiscal_year', 'FiscalYearController@get_fiscal_year')->name('get_fiscal_year');
Route::get('/transition_fy', 'FiscalYearController@transition_fy')->name('transition_fy');
Route::get('/get_current_fy', 'FiscalYearController@get_current_fy')->name('get_current_fy');


//===== ENERGY CONSUMPTION CONTROLLER ======
Route::post('/insert_energy_yearly_target', 'EnergyConsumptionController@insert_energy_yearly_target')->name('insert_energy_yearly_target');
Route::post('/insert_energy_target', 'EnergyConsumptionController@insert_energy_target')->name('insert_energy_target');
Route::post('/insert_energy_actual', 'EnergyConsumptionController@insert_energy_actual')->name('insert_energy_actual');
Route::get('/view_energy_consumption', 'EnergyConsumptionController@view_energy_consumption')->name('view_energy_consumption');
Route::get('/get_energy_target_by_id', 'EnergyConsumptionController@get_energy_target_by_id')->name('get_energy_target_by_id');
Route::get('/get_months_for_filter', 'EnergyConsumptionController@get_months_for_filter')->name('get_months_for_filter');
Route::get('/get_fiscal_year_for_filter', 'EnergyConsumptionController@get_fiscal_year_for_filter')->name('get_fiscal_year_for_filter');
Route::get('/get_current_energy_data', 'EnergyConsumptionController@get_current_energy_data')->name('get_current_energy_data');
Route::get('/get_fiscal_year_target', 'EnergyConsumptionController@get_fiscal_year_target')->name('get_fiscal_year_target');

//test
// Route::get('/get_energy_fy_target', 'EnergyConsumptionController@get_energy_fy_target')->name('get_energy_fy_target');

//===== WATER CONSUMPTION CONTROLLER ======
Route::post('/insert_water_yearly_target', 'WaterConsumptionController@insert_water_yearly_target')->name('insert_water_yearly_target');
Route::post('/insert_water_target', 'WaterConsumptionController@insert_water_target')->name('insert_water_target');
Route::post('/insert_water_actual', 'WaterConsumptionController@insert_water_actual')->name('insert_water_actual');
Route::get('/view_water_consumption', 'WaterConsumptionController@view_water_consumption')->name('view_water_consumption');
Route::get('/get_water_target_by_id', 'WaterConsumptionController@get_water_target_by_id')->name('get_water_target_by_id');
Route::get('/get_current_water_data', 'WaterConsumptionController@get_current_water_data')->name('get_current_water_data');
Route::get('/get_fiscal_year_target', 'WaterConsumptionController@get_fiscal_year_target')->name('get_fiscal_year_target');
//test
// Route::get('/get_water_fy_target', 'WaterConsumptionController@get_water_fy_target')->name('get_water_fy_target');

//===== PAPER CONSUMPTION CONTROLLER ======
Route::post('/insert_paper_target', 'PaperConsumptionController@insert_paper_target')->name('insert_paper_target');
Route::post('/insert_paper_actual', 'PaperConsumptionController@insert_paper_actual')->name('insert_paper_actual');
Route::get('/get_current_paper_data', 'PaperConsumptionController@get_current_paper_data')->name('get_current_paper_data');
Route::get('/view_paper_consumption', 'PaperConsumptionController@view_paper_consumption')->name('view_paper_consumption');
Route::get('/get_paper_target_by_id', 'PaperConsumptionController@get_paper_target_by_id')->name('get_paper_target_by_id');
Route::get('/get_current_paper_data_ts', 'PaperConsumptionController@get_current_paper_data_ts')->name('get_current_paper_data_ts');
Route::get('/get_current_paper_data_cn', 'PaperConsumptionController@get_current_paper_data_cn')->name('get_current_paper_data_cn');
Route::get('/get_current_paper_data_yf', 'PaperConsumptionController@get_current_paper_data_yf')->name('get_current_paper_data_yf');
Route::get('/get_current_paper_data_pps', 'PaperConsumptionController@get_current_paper_data_pps')->name('get_current_paper_data_pps');

//===== USER CONTROLLER ======
Route::get('/get_user_department', 'UserController@get_user_department')->name('get_user_department');

//===== INK CONSUMPTION CONTROLLER ======
Route::get('/view_ink_consumption_sg', 'InkConsumptionController@view_ink_consumption_sg')->name('view_ink_consumption_sg');
Route::get('/view_ink_consumption_prod', 'InkConsumptionController@view_ink_consumption_prod')->name('view_ink_consumption_prod');
Route::post('/insert_ink_target', 'InkConsumptionController@insert_ink_target')->name('insert_ink_target');
Route::post('/insert_ink_actual', 'InkConsumptionController@insert_ink_actual')->name('insert_ink_actual');
Route::get('/get_ink_target_by_id', 'InkConsumptionController@get_ink_target_by_id')->name('get_ink_target_by_id');
//DASHBOARD
Route::get('/get_current_ink_data_bod', 'InkConsumptionController@get_current_ink_data_bod')->name('get_current_ink_data_bod');
Route::get('/get_current_ink_data_ias', 'InkConsumptionController@get_current_ink_data_ias')->name('get_current_ink_data_ias');
Route::get('/get_current_ink_data_fin', 'InkConsumptionController@get_current_ink_data_fin')->name('get_current_ink_data_fin');
Route::get('/get_current_ink_data_hrd', 'InkConsumptionController@get_current_ink_data_hrd')->name('get_current_ink_data_hrd');
Route::get('/get_current_ink_data_ess', 'InkConsumptionController@get_current_ink_data_ess')->name('get_current_ink_data_ess');
Route::get('/get_current_ink_data_log', 'InkConsumptionController@get_current_ink_data_log')->name('get_current_ink_data_log');
Route::get('/get_current_ink_data_fac', 'InkConsumptionController@get_current_ink_data_fac')->name('get_current_ink_data_fac');
Route::get('/get_current_ink_data_iss', 'InkConsumptionController@get_current_ink_data_iss')->name('get_current_ink_data_iss');
Route::get('/get_current_ink_data_qad', 'InkConsumptionController@get_current_ink_data_qad')->name('get_current_ink_data_qad');
Route::get('/get_current_ink_data_ems', 'InkConsumptionController@get_current_ink_data_ems')->name('get_current_ink_data_ems');
Route::get('/get_current_ink_data_ts', 'InkConsumptionController@get_current_ink_data_ts')->name('get_current_ink_data_ts');
Route::get('/get_current_ink_data_cn', 'InkConsumptionController@get_current_ink_data_cn')->name('get_current_ink_data_cn');
Route::get('/get_current_ink_data_yf', 'InkConsumptionController@get_current_ink_data_yf')->name('get_current_ink_data_yf');
Route::get('/get_current_ink_data_pps', 'InkConsumptionController@get_current_ink_data_pps')->name('get_current_ink_data_pps');

// Route::get('/get_all_target_papers', 'InkConsumptionController@get_all_target_papers')->name('get_all_target_papers');
// Route::get('/get_fy_for_overall_target', 'InkConsumptionController@get_fy_for_overall_target');

//USER CONTROLLER
// Route::post('/sign_in', 'UserController@sign_in')->name('sign_in');
// Route::post('/sign_out', 'UserController@sign_out')->name('sign_out');
// Route::post('/change_pass', 'UserController@change_pass')->name('change_pass');
// Route::post('/change_user_stat', 'UserController@change_user_stat')->name('change_user_stat');
// Route::get('/view_users', 'UserController@view_users');
// Route::post('/add_user', 'UserController@add_user');
// Route::get('/get_user_by_id', 'UserController@get_user_by_id');
// Route::get('/get_user_list', 'UserController@get_user_list');
// Route::get('/get_user_by_batch', 'UserController@get_user_by_batch');
// Route::get('/get_user_by_stat', 'UserController@get_user_by_stat');
// Route::post('/edit_user', 'UserController@edit_user');
// Route::post('/reset_password', 'UserController@reset_password');
// Route::get('/generate_user_qrcode', 'UserController@generate_user_qrcode');
// Route::post('/import_user', 'UserController@import_user');

Route::get('/export/{month}', 'ExportController@excel')->name('export');
Route::get('/export_test', 'ExportController@past_fy_excel')->name('export_test');
Route::post('/insert_action_plan', 'ExportController@insert_action_plan')->name('insert_action_plan');
Route::get('/get_action_plan_by_id', 'ExportController@get_action_plan_by_id')->name('get_action_plan_by_id');
Route::get('/view_action_plan', 'ExportController@view_action_plan')->name('view_action_plan');
// Route::get('/export_past_fy', 'ExportController@past_fy_excel')->name('export_past_fy');
Route::get('/export_past_fy/{fyId}', 'ExportController@past_fy_excel')->name('export_past_fy');

// PAST FY SELECTOR
Route::get('/get_past_fy', 'ExportController@get_past_fy');

