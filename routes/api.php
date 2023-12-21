<?php

use App\Http\Controllers\Api\AddSellController;
use App\Http\Controllers\Api\CashEntryController;
use App\Http\Controllers\Api\CreditReportController;
use App\Http\Controllers\Api\MasterController;
use App\Http\Controllers\Api\SupplierLoginController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderStockController;
use App\Http\Controllers\Api\ReportExpenseController;
use App\Http\Controllers\Api\StockMasterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Supplier login
Route::post('login', [SupplierLoginController::class, 'login']);
Route::post('logout', [SupplierLoginController::class, 'logout']);


Route::group(['middleware' => ['authApi']], function () {
    Route::get('get-company-list', [MasterController::class, 'getCompanyList']);
    Route::get('get-product-list', [MasterController::class, 'getProductList']);
    Route::get('get-customer-list', [MasterController::class, 'getCustomerList']);
    Route::get('get-hsn-code-list', [MasterController::class, 'getHsnCodeList']);
    Route::get('get-gst-list', [MasterController::class, 'getGstList']);
    Route::get('get-account-list', [MasterController::class, 'getAccountList']);

    Route::get('get-orders', [OrderController::class, 'getOrders']);
    Route::get('get-order-details/{id}', [OrderController::class, 'getOrderDetails']);

    Route::get('order-stock-list', [OrderStockController::class, 'index']);
    Route::post('order-stock-add', [OrderStockController::class, 'store']);

    Route::post('add-sell', [AddSellController::class, 'store']);
    Route::get('add-sell', [AddSellController::class, 'index']);

    Route::get('get-cash-entry', [CashEntryController::class, 'index']);
    Route::post('add-cash-entry', [CashEntryController::class, 'store']);

    Route::get('get-total-bottle', [StockMasterController::class, 'index']);

    Route::get('get-credit-report', [CreditReportController::class, 'index']);

    Route::get('get-report-expense', [ReportExpenseController::class, 'index']);
});
