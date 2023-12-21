<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AccountMaster;
use App\Models\GSTMaster;
use App\Models\HSNCode;
use App\Models\ProductMaster;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function getCompanyList(Request $request)
    {
        $Company = AccountMaster::select('id', 'name')->where('group_master_id', 1)->get();
        if ($Company->count() > 0) {
            return response()->json([
                'message' => 'Company list',
                'status' => 200,
                'data' => $Company,
            ], 200);
        } else {
            return response()->json(['message' => 'Company Not found!'], 400);
        }
    }

    public function getProductList(Request $request)
    {
        $Product = ProductMaster::select('id', 'name')->get();
        if ($Product->count() > 0) {
            return response()->json([
                'message' => 'Product list',
                'status' => 200,
                'data' => $Product,
            ], 200);
        } else {
            return response()->json(['message' => 'Product Not found!'], 400);
        }
    }


    public function getCustomerList(Request $request)
    {
        $Customer = AccountMaster::select('id', 'name')->where('group_master_id', 2)->get();
        if ($Customer->count() > 0) {
            return response()->json([
                'message' => 'Customer list',
                'status' => 200,
                'data' => $Customer,
            ], 200);
        } else {
            return response()->json(['message' => 'Customer Not found!'], 400);
        }
    }

    public function getHsnCodeList(Request $request)
    {
        $HsnCode = HSNCode::select('id', 'hsn_code')->get();
        if ($HsnCode->count() > 0) {
            return response()->json([
                'message' => 'HSNCode list',
                'status' => 200,
                'data' => $HsnCode,
            ], 200);
        } else {
            return response()->json(['message' => 'HsnCode Not found!'], 400);
        }
    }

    public function getGstList(Request $request)
    {
        $Gst = GSTMaster::select('id', 'percentage')->get();
        if ($Gst->count() > 0) {
            return response()->json([
                'message' => 'Gst list',
                'status' => 200,
                'data' => $Gst,
            ], 200);
        } else {
            return response()->json(['message' => 'Gst Not found!'], 400);
        }
    }

    public function getAccountList(Request $request)
    {
        $Account = AccountMaster::select('id', 'name')->where('group_master_id', 5)->get();
        if ($Account->count() > 0) {
            return response()->json([
                'message' => 'Account list',
                'status' => 200,
                'data' => $Account,
            ], 200);
        } else {
            return response()->json(['message' => 'Account Not found!'], 400);
        }
    }
}
