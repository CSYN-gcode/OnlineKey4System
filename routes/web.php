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


Route::get('/energy_consumption', function () {
    return view('energy_consumption');
})->name('energy_consumption');


Route::get('/water_consumption', function () {
    return view('water_consumption');
})->name('water_consumption');


Route::get('/paper_consumption', function () {
    return view('paper_consumption');
})->name('paper_consumption');



// Route::get('/get_chart_data', 'ChartController@get_chart_data');

//===== FISCAL YEAR CONTROLLER ======
Route::get('/get_fiscal_year', 'FiscalYearController@get_fiscal_year')->name('get_fiscal_year');


//===== ENERGY CONSUMPTION CONTROLLER ======
Route::post('/insert_energy_target', 'EnergyConsumptionController@insert_energy_target')->name('insert_energy_target');
Route::post('/insert_energy_actual', 'EnergyConsumptionController@insert_energy_actual')->name('insert_energy_actual');
Route::get('/view_energy_consumption', 'EnergyConsumptionController@view_energy_consumption')->name('view_energy_consumption');
Route::get('/get_energy_target_by_id', 'EnergyConsumptionController@get_energy_target_by_id')->name('get_energy_target_by_id');
Route::get('/get_months_for_filter', 'EnergyConsumptionController@get_months_for_filter')->name('get_months_for_filter');
Route::get('/get_fiscal_year_for_filter', 'EnergyConsumptionController@get_fiscal_year_for_filter')->name('get_fiscal_year_for_filter');
Route::get('/get_current_energy_data', 'EnergyConsumptionController@get_current_energy_data')->name('get_current_energy_data');


//===== WATER CONSUMPTION CONTROLLER ======
Route::post('/insert_water_target', 'WaterConsumptionController@insert_water_target')->name('insert_water_target');
Route::post('/insert_water_actual', 'WaterConsumptionController@insert_water_actual')->name('insert_water_actual');
Route::get('/view_water_consumption', 'WaterConsumptionController@view_water_consumption')->name('view_water_consumption');
Route::get('/get_water_target_by_id', 'WaterConsumptionController@get_water_target_by_id')->name('get_water_target_by_id');
Route::get('/get_current_water_data', 'WaterConsumptionController@get_current_water_data')->name('get_current_water_data');


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



// USER CONTROLLER
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