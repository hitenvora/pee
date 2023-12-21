<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountMaster;
use App\Models\CustomerProductDiscount;
use App\Models\ProductMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CustomerProductDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accountName = AccountMaster::where('group_master_id', 2)->orderBy('id')->get();
        $productName = ProductMaster::where('is_active', 1)->orderBy('id')->get();

        return view('admin.customer-product-discount', compact('productName', 'accountName'));
    }

    public function insert(Request $request)
    {
        // return $request->all();
        $rules = [
            'account_master_id' => 'required',
            'discount.*' => 'required',
        ];
        // if ($request->product_master_id == '') {
        //     $rules = [
        //         'account_master_id' => 'required',
        //         'discount' => 'required',
        //     ];
        // } else {
        //     $rules = [
        //         'account_master_id' => 'required',
        //         'discount' => 'required',
        //     ];
        // }
        $this->validate($request, $rules);

        // if ($request->product_discount_id != '') {
        //     $productDiscount = CustomerProductDiscount::find($request->product_discount_id);
        //     if (! $productDiscount) {
        //         return response()->json(['status' => 400, 'msg' => 'Product Discount  not found!']);
        //     }
        // } else {
        //     $productDiscount = new CustomerProductDiscount();
        // }
        // $productDiscount->account_master_id = $request->input('account_master_id');
        // $productDiscount->product_master_id = $request->input('product_master_id');
        // $productDiscount->discount = $request->input('discount');
        // $productDiscount->save();
        $account_master_id = $request->input('account_master_id');

        foreach ($request->discount as $productId => $discount) {
            // $CustomerProductDiscount = new CustomerProductDiscount();
            // $CustomerProductDiscount->account_master_id = $request->input('account_master_id');
            // $CustomerProductDiscount->product_master_id = $productId;
            // $CustomerProductDiscount->discount = $discount;
            // $CustomerProductDiscount->save();
            CustomerProductDiscount::updateOrCreate(
                ['account_master_id' => $account_master_id, 'product_master_id' => $productId],
                ['discount' => $discount]
            );
        }

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function get_product_discount(Request $request)
    {
        // $getProductDiscount = CustomerProductDiscount::groupBy('account_master_id')->get();
        $getProductDiscount = CustomerProductDiscount::with('account_name')->groupBy('account_master_id')->select('account_master_id', DB::raw('count(*) as total'))->get();

        // return $getProductDiscount;

        foreach ($getProductDiscount as $key => $record) {
            $id = $record->id;
            $getProductDiscount[$key]['account_name_view'] = $record->account_name->name;
            // $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editProductDiscount('.$record->account_master_id.')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action = '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $record->account_master_id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $getProductDiscount[$key]['action'] = $action;
        }

        return DataTables::of($getProductDiscount)
            ->addIndexColumn()
            ->rawColumns(['action', 'account_name_view'])
            ->make(true);
    }

    public function product_discount_edit($id)
    {
        $productDiscountMaster = CustomerProductDiscount::where('account_master_id', $id)->get();
        if ($productDiscountMaster) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $productDiscountMaster]);
        }

        return response()->json(['status' => '200', 'msg' => 'failed'], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        CustomerProductDiscount::where('account_master_id', $id)->delete();
        // $getProductDiscount->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
