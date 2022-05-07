<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');
Route::get('/crm',  'App\Http\Controllers\crm\DashboardController@dashboard')->name('crm.dashboard.index')->middleware(['auth','can:isAllow']);

//Route::get('/crm/dashboard',  'App\Http\Controllers\crm\DashboardController@index')->name('crm.dashboard.index')->middleware(['auth','can:isAllow']);
Route::get('/crm/dashboard',  'App\Http\Controllers\crm\DashboardController@index')->name('crm.dashboard.dashboard')->middleware(['auth','can:isAllow']);

Route::resource('crm/account', 'App\Http\Controllers\crm\AccountController')->names([
    'index' => 'crm.account.index',
    'create' => 'crm.account.create',
    'store' => 'crm.account.store',
    'show' => 'crm.account.show',
    'edit' => 'crm.account.edit',
    'update' => 'crm.account.update',
   
])->middleware(['auth','can:isAllow']);

Route::resource('crm/agent', 'App\Http\Controllers\crm\AgentController')->names([
    'index' => 'crm.agent.index',
    'create' => 'crm.agent.create',
    'store' => 'crm.agent.store',
    'show' => 'crm.agent.show',
    'edit' => 'crm.agent.edit',
    'update' => 'crm.agent.update',
   
])->middleware(['auth','can:isAllow']);

Route::get('crm/account/destroy/{account}','App\Http\Controllers\crm\AccountController@destroy')->name('crm.account.destroy')->middleware('auth');
Route::get('crm/account/{account}/identification','App\Http\Controllers\crm\AccountController@identificationShow')->name('crm.account.identification.show')->middleware('auth');
Route::get('crm/account/{account}/identification','App\Http\Controllers\crm\AccountController@identificationShow')->name('crm.account.identification.show')->middleware('auth');
Route::get('crm/account/{account}/idfront','App\Http\Controllers\crm\AccountController@getIdFrontImage')->name('crm.account.identification.idfront')->middleware('auth');
Route::get('crm/account/{account}/idback','App\Http\Controllers\crm\AccountController@getIdBackImage')->name('crm.account.identification.idback')->middleware('auth');
Route::get('crm/account/{account}/approve','App\Http\Controllers\crm\AccountController@approveIdentification')->name('crm.account.identification.approve')->middleware('auth');

Route::resource('crm/balance', 'App\Http\Controllers\crm\BalanceController')->names([
    'index' => 'crm.balance.index',
    'create' => 'crm.balance.create',
    'store' => 'crm.balance.store',
    'show' => 'crm.balance.show',
    'edit' => 'crm.balance.edit',
    'update' => 'crm.balance.update',
    'destroy' => 'crm.balance.destroy',
])->middleware('auth');
Route::get('crm/balance/{balance}/approve','App\Http\Controllers\crm\BalanceController@approve')->name('crm.balance.approve')->middleware('auth');

Route::resource('crm/exchange', 'App\Http\Controllers\crm\ExchangeController')->names([
    'index' => 'crm.exchange.index',
    'create' => 'crm.exchange.create',
    'store' => 'crm.exchange.store',
    'show' => 'crm.exchange.show',
    'edit' => 'crm.exchange.edit',
    'update' => 'crm.exchange.update',
    'destroy' => 'crm.exchange.destroy',
])->middleware('auth');
Route::resource('crm/symbol', 'App\Http\Controllers\crm\SymbolController')->names([
    'index' => 'crm.symbol.index',
    'create' => 'crm.symbol.create',
    'store' => 'crm.symbol.store',
    'show' => 'crm.symbol.show',
    'edit' => 'crm.symbol.edit',
    'update' => 'crm.symbol.update',
    'destroy' => 'crm.symbol.destroy',
])->middleware('auth');
Route::resource('crm/wallet_symbol', 'App\Http\Controllers\crm\WalletSymbolController')->names([
    'index' => 'crm.wallet_symbol.index',
    'create' => 'crm.wallet_symbol.create',
    'store' => 'crm.wallet_symbol.store',
    'show' => 'crm.wallet_symbol.show',
    'edit' => 'crm.wallet_symbol.edit',
    'update' => 'crm.wallet_symbol.update',
    'destroy' => 'crm.wallet_symbol.destroy',
])->middleware('auth');
Route::resource('crm/trading_volume', 'App\Http\Controllers\crm\TradingVolumeController')->names([
    'index' => 'crm.trading_volume.index',
    'create' => 'crm.trading_volume.create',
    'store' => 'crm.trading_volume.store',
    'show' => 'crm.trading_volume.show',
    'edit' => 'crm.trading_volume.edit',
    'update' => 'crm.trading_volume.update',
    'destroy' => 'crm.trading_volume.destroy',
])->middleware('auth');
Route::resource('crm/level', 'App\Http\Controllers\crm\LevelController')->names([
    'index' => 'crm.level.index',
    'create' => 'crm.level.create',
    'store' => 'crm.level.store',
    'show' => 'crm.level.show',
    'edit' => 'crm.level.edit',
    'update' => 'crm.level.update',
    'destroy' => 'crm.level.destroy',
])->middleware('auth');

Route::resource('crm/order', 'App\Http\Controllers\crm\OrderController')->names([
    'index' => 'crm.order.index',
    'create' => 'crm.order.create',
    'store' => 'crm.order.store',
    'show' => 'crm.order.show',
    'edit' => 'crm.order.edit',
    'update' => 'crm.order.update',
    'destroy' => 'crm.order.destroy',
])->middleware('auth');
Route::get('crm/order/{account}/show','App\Http\Controllers\crm\OrderController@indexForUser')->name('crm.order.show.user')->middleware('auth');
Route::post('crm/order/{order}/spread','App\Http\Controllers\crm\OrderController@storeSpread')->name('crm.order.store.spread')->middleware('auth');
Route::resource('crm/comment', 'App\Http\Controllers\crm\CommentController')->names([
    'index' => 'crm.comment.index',
    'create' => 'crm.comment.create',
    'store' => 'crm.comment.store',
    'show' => 'crm.comment.show',
    'edit' => 'crm.comment.edit',
    'update' => 'crm.comment.update',
    'destroy' => 'crm.comment.destroy',
])->middleware('auth');
Route::get('crm/comment/{user}/destroy/all','App\Http\Controllers\crm\CommentController@destroyAll')->name('crm.comment.destroy.all');
Route::resource('crm/task', 'App\Http\Controllers\crm\TaskController')->names([
    'index' => 'crm.task.index',
    'create' => 'crm.task.create',
    'store' => 'crm.task.store',
    'show' => 'crm.task.show',
    'edit' => 'crm.task.edit',
    'update' => 'crm.task.update',
    'destroy' => 'crm.task.destroy',
])->middleware('auth');
Route::resource('crm/email', 'App\Http\Controllers\crm\EmailController')->names([
    'index' => 'crm.email.index',
    'create' => 'crm.email.create',
    'store' => 'crm.email.store',
    'show' => 'crm.email.show',
    'edit' => 'crm.email.edit',
    'update' => 'crm.email.update',
    'destroy' => 'crm.email.destroy',
])->middleware('auth');
Route::resource('crm/group', 'App\Http\Controllers\crm\GroupController')->names([
    'index' => 'crm.group.index',
    'create' => 'crm.group.create',
    'store' => 'crm.group.store',
    'show' => 'crm.group.show',
    'edit' => 'crm.group.edit',
    'update' => 'crm.group.update',
    'destroy' => 'crm.group.destroy',
])->middleware('auth');




Route::get('/wsctest',  'App\Http\Controllers\WalletSymbolController@index')->name('wallet.symbol.index')->middleware('auth');
Route::get('/crm/leads',  'App\Http\Controllers\crm\AccountController@leads')->middleware('auth')->name('crm.leads.index');
Route::get('crm/leads/destroy/{account}','App\Http\Controllers\crm\AccountController@destroyleads')->name('crm.leads.destroy')->middleware('auth');
Route::get('/crm/leads/create',  'App\Http\Controllers\crm\AccountController@leadsCreate')->middleware('auth')->name('crm.leads.create');
Route::get('/crm/leads/edit/{lead}',  'App\Http\Controllers\crm\AccountController@leadsEdit')->middleware('auth')->name('crm.leads.edit');
Route::post('/crm/leads/store',  'App\Http\Controllers\crm\AccountController@leadsStore')->middleware('auth')->name('crm.leads.store');
Route::post('/crm/leads/upload',  'App\Http\Controllers\crm\AccountController@leadsUpload')->middleware('auth')->name('crm.leads.upload');
Route::get('/crm/deposits',  'App\Http\Controllers\crm\AccountController@deposits')->middleware('auth');

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
   // return view('dashboard');
//})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/wallet', function () {
    return view('wallet');
})->name('wallet');
Route::middleware(['auth:sanctum', 'verified'])->get('/orders', function () {
    return view('orders');
})->name('orders');
Route::middleware(['auth:sanctum', 'verified'])->get('/trade', function () {
    return view('trade');
})->name('trade');
Route::middleware(['auth:sanctum', 'verified'])->get('/identification', function () {
    return view('identification');
})->name('identification');
Route::middleware(['auth:sanctum', 'verified'])->get('/add-balance', function () {
    return view('addBalance');
})->name('addBalance');
Route::middleware(['auth:sanctum', 'verified'])->get('/education', function () {
    return view('education');
})->name('education.show');
// Route::middleware(['auth:sanctum', 'verified'])->get('/calendar', function () {
//     return view('calendar');
// })->name('calendar.show');

Route::group(['prefix' => 'employee','middleware'=>'auth','as'=>'employee.'], function () {
    Route::get('leads','App\Http\Controllers\EmployeeUser\EmployeeLeadController@leads')->name('leads');
    // Route::get('users','App\Http\Controllers\EmployeeUser\EmployeeLeadController@users')->name('users');
    // Route::get('deposits','App\Http\Controllers\EmployeeUser\EmployeeLeadController@deposits')->name('deposits');
    Route::get('create/{userId}','App\Http\Controllers\EmployeeUser\EmployeeLeadController@create')->name('create');
    Route::post('update/{leadId}','App\Http\Controllers\EmployeeUser\EmployeeLeadController@updateStatus')->name('update_lead_status');
    Route::get('show/{leadId}','App\Http\Controllers\EmployeeUser\EmployeeLeadController@show')->name('lead.show');
    Route::post('save','App\Http\Controllers\EmployeeUser\EmployeeLeadController@save')->name('save');
});



Route::group(['prefix' => 'affiliate','middleware'=>'auth','as'=>'affiliate.'], function () {
    Route::get('/index','App\Http\Controllers\AffiliateUser\AffiliateController@index')->name('index');
    Route::get('/leads','App\Http\Controllers\AffiliateUser\AffiliateController@leads')->name('leads');
    Route::get('/users','App\Http\Controllers\AffiliateUser\AffiliateController@users')->name('users');
    Route::get('/deposits','App\Http\Controllers\AffiliateUser\AffiliateController@deposits')->name('deposits');

});

Route::get('newlook','App\Http\Controllers\TestController@index');
// Route::view('hi','employee.userform');


// for api
// for affliate user of employee role
// Route::get('lead','App\Http\Controllers\EmployeeUser\EmployeeLeadController@getLead')->name('user.all.lead');
// end

