<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountCashEntry;
use App\Models\AccountMaster;
use App\Models\Admin;
use App\Models\CustomerProductDiscount;
use App\Models\GroupMaster;
use App\Models\GSTMaster;
use App\Models\HSNCode;
use App\Models\ProductMaster;
use App\Models\PurchaseEmptyBottles;
use App\Models\YearMaster;

class MasterFormController extends Controller
{
    public function index()
    {
        $year_master = YearMaster::count();
        $hsn_master = HSNCode::count();
        $gst_master = GSTMaster::count();
        $group_master = GroupMaster::count();
        $account_master = AccountMaster::count();
        $product_master = ProductMaster::count();
        $empty_botel = PurchaseEmptyBottles::count();
        $customer_product_discount = CustomerProductDiscount::count();
        $admin_master = Admin::count();

        return view('admin.master-form', compact('year_master', 'hsn_master', 'gst_master', 'group_master', 'account_master', 'product_master', 'empty_botel', 'customer_product_discount', 'admin_master'));
    }

    public function account_master_form()
    {
        $cash_entry = AccountCashEntry::count();
        return view('admin.account-master-form', compact('cash_entry'));
    }
}
