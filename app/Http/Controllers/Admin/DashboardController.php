<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountMaster;
use App\Models\CustomerProductDiscount;
use App\Models\CustomerStockMaster;
use App\Models\GroupMaster;
use App\Models\GSTMaster;
use App\Models\HSNCode;
use App\Models\ProductMaster;
use App\Models\PurchaseEmptyBottles;
use App\Models\StockMaster;
use App\Models\YearMaster;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $year_master_id = Session::get('year_master_id');
        $yearCurrent = YearMaster::find($year_master_id);
        Session::put('year_master', $yearCurrent->name);

        $num_of_empty_bottle = StockMaster::sum('num_of_empty_bottle');
        $num_of_filled_bottle = StockMaster::sum('num_of_filled_bottle');
        $num_of_bottle = CustomerStockMaster::sum('num_of_bottle');
        $totalFilledBottle = $num_of_filled_bottle;
        $totalEmptyBottle = $num_of_empty_bottle + $num_of_bottle;
        $totalBottle = $num_of_empty_bottle + $num_of_filled_bottle + $num_of_bottle;
        $year_master = YearMaster::count();
        // $company_master = CompanyMaster::count();
        $company_master = 0;
        $hsn_master = HSNCode::count();
        $gst_master = GSTMaster::count();
        $group_master = GroupMaster::count();
        $account_master = AccountMaster::count();
        $product_master = ProductMaster::count();
        $empty_botel = PurchaseEmptyBottles::count();
        $customer_product_discount = CustomerProductDiscount::count();

        return view('admin.index', compact('totalBottle', 'totalFilledBottle', 'totalEmptyBottle', 'year_master', 'company_master', 'hsn_master', 'gst_master', 'group_master', 'account_master', 'product_master', 'empty_botel', 'customer_product_discount'));
    }
}
