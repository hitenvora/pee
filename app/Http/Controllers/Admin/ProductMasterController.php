<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountMaster;
use App\Models\ProductMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ProductMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accountMaster = AccountMaster::where('group_master_id', 1)->orderBy('name')->get();
        return view('admin.product-master', compact('accountMaster'));
    }

    public function insert(Request $request)
    {
        if ($request->product_master_id == '') {
            $rules = [
                'name' => 'required',
                'account_master_id' => 'required',
                'product_weight' => 'required',
                'is_active' => 'required',
            ];
        } else {
            $rules = [
                'name' => 'required',
                'account_master_id' => 'required',
                'product_weight' => 'required',
            ];
        }
        $this->validate($request, $rules);

        if ($request->product_master_id != '') {
            $productMaster = ProductMaster::find($request->product_master_id);
            if (!$productMaster) {
                return response()->json(['status' => 400, 'msg' => 'Product Master details not found!']);
            }
            $productMaster->updated_by = Auth::user()->id;
            $productMaster->is_active = $request->is_active;
        } else {
            $productMaster = new ProductMaster();
            $productMaster->created_by = Auth::user()->id;
        }
        $productMaster->name = $request->input('name');
        $productMaster->account_master_id = $request->input('account_master_id');
        $productMaster->product_weight = $request->input('product_weight');
        $productMaster->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_product_master(Request $request)
    {
        $getProductMaster = ProductMaster::orderBy('id', 'desc')->get();

        foreach ($getProductMaster as $key => $record) {
            $getProductMaster[$key]['account_name'] =  $record->account_master->name;
            $id = $record->id;
            if ($record->is_active == 0) {
                $getProductMaster[$key]['active_button'] = '<span class="badge bg-warning">In Active</span>';
            } else {
                $getProductMaster[$key]['active_button'] = '<span class="badge bg-success">Active</span>';
            }
            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editProductMaster(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $getProductMaster[$key]['action'] =  $action;
        }
        return DataTables::of($getProductMaster)
            ->addIndexColumn()
            ->rawColumns(['action', 'account_name', 'active_button',])
            ->make(true);
    }

    public function product_edit($id)
    {
        $getProductMaster = ProductMaster::where('id', '=', $id)->first();
        if ($getProductMaster) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $getProductMaster]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function get_product_by_company($id)
    {
        $getProductMaster = ProductMaster::where('account_master_id', $id)->get();
        if ($getProductMaster) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $getProductMaster]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

        public function delete(Request $request)
        {
            $id =  $request->input('id');
            $getProductMaster = ProductMaster::find($id);
            $getProductMaster->delete();

            return response()->json(['status' => '200', 'msg' => 'success']);
        }
}
