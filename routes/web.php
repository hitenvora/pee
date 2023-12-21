<?php

use App\Http\Controllers\Admin\AccountCashEntryController;
use App\Http\Controllers\Admin\AccountMasterController;
use App\Http\Controllers\Admin\AddSellController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CompanyMasterController;
use App\Http\Controllers\Admin\CustomerProductDiscountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GasCompanyController;
use App\Http\Controllers\Admin\GroupMasterController;
use App\Http\Controllers\Admin\GSTMasterController;
use App\Http\Controllers\Admin\HSNCodeController;
use App\Http\Controllers\Admin\MasterFormController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductMasterController;
use App\Http\Controllers\Admin\PurchaseEmptyBottlesController;
use App\Http\Controllers\Admin\StockMasterController;
use App\Http\Controllers\Admin\YearMasterController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Supplier\SupplierCashEntryController;
use App\Http\Controllers\SupplierAuthController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Admin routes

// Admin Login
Route::get('/', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Supplier Login
Route::get('/supplier/login', [SupplierAuthController::class, 'showSupplierLoginForm'])->name('supplier.login');
Route::post('/supplier/login', [SupplierAuthController::class, 'login'])->name('supplier.login.submit');
Route::get('/supplier/logout', [SupplierAuthController::class, 'logout'])->name('supplier.logout');

Route::group(['middleware' => ['auth:supplier']], function () {
    Route::prefix('supplier')->group(function () {

        Route::get('dashboard', function () {
            return view('supplier.supplier-dashboard');
        })->name('supplier.dashboard');

        // Supplier Cash Entry
        Route::get('/supplier-cash-entry', [SupplierCashEntryController::class, 'index'])->name('supplier.supplier-cash-entry');
        Route::post('/insert-supplier-cash-entry', [SupplierCashEntryController::class, 'insert'])->name('supplier.insert_supplier-cash-entry');
        Route::post('/get-supplier-cash-entry', [SupplierCashEntryController::class, 'get_supplier_cash_entry'])->name('supplier.get_supplier-cash-entry');
    });
});

Route::group(['middleware' => ['auth:admin']], function () {
    Route::prefix('admin')->group(function () {

        Route::get('/index', [DashboardController::class, 'index'])->name('index');

        Route::get('/bharat-gas', [GasCompanyController::class, 'bharat_gas'])->name('bharat-gas');
        Route::get('/go-gas', [GasCompanyController::class, 'go_gas'])->name('go-gas');
        Route::get('/pure-gas', [GasCompanyController::class, 'pure_gas'])->name('pure-gas');
        Route::get('/hp-gas', [GasCompanyController::class, 'hp_gas'])->name('hp-gas');
        Route::get('/reliance-gas', [GasCompanyController::class, 'reliance_gas'])->name('reliance-gas');
        Route::get('/indian-gas', [GasCompanyController::class, 'indian_gas'])->name('indian-gas');
        Route::get('/other-gas', [GasCompanyController::class, 'other_gas'])->name('other-gas');

        Route::get('master-form', [MasterFormController::class, 'index'])->name('admin.master-form');
        Route::get('account-master-form', [MasterFormController::class, 'account_master_form'])->name('admin.account-master-form');

        // Group Master
        Route::get('/group-master', [GroupMasterController::class, 'index'])->name('admin.group-master');
        Route::post('/insert-group', [GroupMasterController::class, 'insert'])->name('admin.insert_group');
        Route::post('/get-group', [GroupMasterController::class, 'get_group'])->name('admin.get_group');
        Route::get('/group-edit/{id}', [GroupMasterController::class, 'group_edit'])->name('admin.group_edit');
        Route::post('/delete-group', [GroupMasterController::class, 'delete'])->name('admin.delete_group');

        // HSN Code
        Route::get('/hsn-code', [HSNCodeController::class, 'index'])->name('admin.hsn-code');
        Route::post('/insert-hsn-code', [HSNCodeController::class, 'insert'])->name('admin.insert_hsn-code');
        Route::post('/get-hsn-code', [HSNCodeController::class, 'get_hsn_code'])->name('admin.get_hsn-code');
        Route::get('/hsn-code-edit/{id}', [HSNCodeController::class, 'hsn_code_edit'])->name('admin.hsn-code_edit');
        Route::post('/delete-hsn-code', [HSNCodeController::class, 'delete'])->name('admin.delete_hsn-code');

        // Company-master
        Route::get('/company-master', [CompanyMasterController::class, 'index'])->name('admin.company-master');
        Route::post('/insert-master', [CompanyMasterController::class, 'insert'])->name('admin.insert_company_master');
        Route::post('/get-master', [CompanyMasterController::class, 'get_company_master'])->name('admin.get_company_master');
        Route::get('/company-master-edit/{id}', [CompanyMasterController::class, 'edit'])->name('admin.company_master_edit');
        Route::post('/update-company-master', [CompanyMasterController::class, 'update'])->name('admin.update_company_master');
        Route::post('/delete-company-master', [CompanyMasterController::class, 'delete'])->name('admin.delete_company_master');

        // Company
        Route::get('/company', [CompanyController::class, 'index'])->name('admin.company');
        Route::post('/insert-company', [CompanyController::class, 'insert'])->name('admin.insert_company');
        Route::post('/get-company', [CompanyController::class, 'get_company'])->name('admin.get_company');
        Route::get('/company-edit/{id}', [CompanyController::class, 'company_edit'])->name('admin.company_edit');
        Route::post('/update-company', [CompanyController::class, 'update'])->name('admin.update_company');
        Route::post('/delete-company', [CompanyController::class, 'delete'])->name('admin.delete_company');

        // Product
        Route::get('/product', [ProductController::class, 'index'])->name('admin.product');
        Route::post('/insert-product', [ProductController::class, 'insert'])->name('admin.insert_product');
        Route::post('get-product', [ProductController::class, 'get_product'])->name('admin.get_product');
        Route::get('/product-edit/{id}', [ProductController::class, 'product_edit'])->name('admin.product_edit');
        Route::post('/update-product', [ProductController::class, 'update'])->name('admin.update_product');
        Route::post('/delete-product', [ProductController::class, 'delete'])->name('admin.delete_product');

        // Stock Master
        Route::get('/stock-list', [StockMasterController::class, 'index'])->name('stock-list');
        Route::get('/customer-stock-list', [StockMasterController::class, 'customer_stock_list'])->name('customer-stock-list');
        Route::post('/get-stock-list', [StockMasterController::class, 'getList'])->name('admin.get_stock_list');
        Route::post('/get-customer-stock-list', [StockMasterController::class, 'getCustomerList'])->name('admin.get_customer_stock_list');
        // Order Stock Received and Add to stock
        Route::get('/order-stock-list', [StockMasterController::class, 'orderStockList'])->name('order.stock.list');
        Route::post('/get-order-stock-list', [StockMasterController::class, 'getOrderStockList'])->name('admin.get_order_stock_list');
        Route::get('/get-order-details/{id}', [StockMasterController::class, 'getOrderDetails'])->name('admin.get_order_details');
        Route::post('/insert-order-stock', [StockMasterController::class, 'insertOrderStock'])->name('admin.insert_order_stock');
        Route::post('/delete-order-stock', [StockMasterController::class, 'deleteOrderStock'])->name('admin.delete_order_stock');

        // Year Master
        Route::get('/year-master', [YearMasterController::class, 'index'])->name('admin.year-master');
        Route::post('/insert-year', [YearMasterController::class, 'insert'])->name('admin.insert_year');
        Route::post('/get-year', [YearMasterController::class, 'get_year'])->name('admin.get_year');
        Route::get('/year-edit/{id}', [YearMasterController::class, 'year_edit'])->name('admin.year_edit');
        Route::post('/delete-year', [YearMasterController::class, 'delete'])->name('admin.delete_year');

        // GST Master
        Route::get('/gst-master', [GSTMasterController::class, 'index'])->name('admin.gst-master');
        Route::post('/insert-gst', [GSTMasterController::class, 'insert'])->name('admin.insert_gst');
        Route::post('/get-gst', [GSTMasterController::class, 'get_gst'])->name('admin.get_gst');
        Route::get('/gst-edit/{id}', [GSTMasterController::class, 'gst_edit'])->name('admin.gst_edit');
        Route::post('/delete-gst', [GSTMasterController::class, 'delete'])->name('admin.delete_gst');

        // Account Master
        Route::get('/account-master', [AccountMasterController::class, 'index'])->name('admin.account-master');
        Route::post('/insert-account-master', [AccountMasterController::class, 'insert'])->name('admin.insert_account_master');
        Route::post('/account-master', [AccountMasterController::class, 'get_account_master'])->name('admin.get_account_master');
        Route::get('/account-master-edit/{id}', [AccountMasterController::class, 'account_edit'])->name('admin.account_master_edit');
        Route::post('/delete-account-master', [AccountMasterController::class, 'delete'])->name('admin.delete_account_master');

        // Product Master
        Route::get('/product-master', [ProductMasterController::class, 'index'])->name('admin.product-master');
        Route::post('/insert-product-master', [ProductMasterController::class, 'insert'])->name('admin.insert_product_master');
        Route::post('/product-master', [ProductMasterController::class, 'get_product_master'])->name('admin.get_product_master');
        Route::get('/product-master-edit/{id}', [ProductMasterController::class, 'product_edit'])->name('admin.product_master_edit');
        Route::get('/get-product-by-company/{id}', [ProductMasterController::class, 'get_product_by_company'])->name('admin.get_product_by_company');
        Route::post('/delete-product-master', [ProductMasterController::class, 'delete'])->name('admin.delete_product_master');

        // Order
        Route::get('/order', [OrderController::class, 'index'])->name('admin.order');
        Route::post('/insert-order', [OrderController::class, 'insert'])->name('admin.insert_order');
        Route::post('/get-order', [OrderController::class, 'get_order'])->name('admin.get_order');
        Route::get('/order-edit/{id}', [OrderController::class, 'order_edit'])->name('admin.order_edit');
        Route::post('/delete-order', [OrderController::class, 'delete'])->name('admin.delete_order');

        //Purchase Empty Bottles
        Route::get('/empty-bottle', [PurchaseEmptyBottlesController::class, 'index'])->name('admin.purchase_empty_bottle');
        Route::post('/insert-empty-bottle', [PurchaseEmptyBottlesController::class, 'insert'])->name('admin.insert_purchase_empty_bottle');
        Route::post('/get-empty-bottle', [PurchaseEmptyBottlesController::class, 'get_purchase_empty'])->name('admin.get_purchase_empty_bottle');
        Route::get('/empty-bottle-edit/{id}', [PurchaseEmptyBottlesController::class, 'purchase_empty_edit'])->name('admin.purchase_empty_bottle_edit');
        Route::post('/delete-empty-bottle', [PurchaseEmptyBottlesController::class, 'destroy'])->name('admin.delete_purchase_empty_bottle');

        // Add Sell
        Route::get('/add-sell', [AddSellController::class, 'index'])->name('admin.add-sell');
        Route::post('/insert-add-sell', [AddSellController::class, 'insert'])->name('admin.insert_add-sell');
        Route::post('/get-add-sell', [AddSellController::class, 'get_add_sell'])->name('admin.get_add-sell');
        Route::get('/add-sell-edit/{id}', [AddSellController::class, 'add_sell_edit'])->name('admin.add-sell_edit');
        Route::post('/delete-add-sell', [AddSellController::class, 'delete'])->name('admin.delete_add-sell');

        //Customer Product Discount
        Route::get('/customer-product-discount', [CustomerProductDiscountController::class, 'index'])->name('admin.product-discount');
        Route::post('/insert-customer-product-discount', [CustomerProductDiscountController::class, 'insert'])->name('admin.insert_product_discount');
        Route::post('/get-customer-product-discount', [CustomerProductDiscountController::class, 'get_product_discount'])->name('admin.get_product_discount');
        Route::get('/product-discount-edit/{id}', [CustomerProductDiscountController::class, 'product_discount_edit'])->name('admin.product_discount_edit');
        Route::post('/update-customer-product-discount', [CustomerProductDiscountController::class, 'update'])->name('admin.update_product_discount');
        Route::post('/delete-customer-product-discount', [CustomerProductDiscountController::class, 'destroy'])->name('admin.delete_product_discount');

        // Account Cash Entry
        Route::get('/account-cash-entry', [AccountCashEntryController::class, 'index'])->name('admin.account-cash-entry');
        Route::post('/insert-account-cash-entry', [AccountCashEntryController::class, 'insert'])->name('admin.insert_account-cash-entry');
        Route::post('/get-account-cash-entry', [AccountCashEntryController::class, 'get_account_cash_entry'])->name('admin.get_account-cash-entry');
        Route::get('/account-cash-entry-edit/{id}', [AccountCashEntryController::class, 'account_cash_entry_edit'])->name('admin.account-cash-entry_edit');
        Route::post('/delete-account-cash-entry', [AccountCashEntryController::class, 'delete'])->name('admin.delete_account-cash-entry');

        // Admins Master
        Route::get('/admins-master', [AdminsController::class, 'index'])->name('admin.admins-master');
        Route::post('/insert-admins', [AdminsController::class, 'insert'])->name('admin.insert_admins');
        Route::post('/get-admins', [AdminsController::class, 'get_admin'])->name('admin.get_admins');
        Route::get('/admins-edit/{id}', [AdminsController::class, 'admin_edit'])->name('admin.admins_edit');
    });
});

// Auth::routes();
