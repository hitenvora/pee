<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyMaster;
use App\Models\HSNCode;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyName = CompanyMaster::orderBy('id')->get();
        $hsnCode = HSNCode::orderBy('id')->get();
        return view('admin.product', compact('companyName', 'hsnCode'));
    }

    public function insert(Request $request)
    {

        $rules = [
            'product_name' => 'required',
            'company_master_id' => 'required',
            'hsn_code_id' => 'required',
            'gst' => 'required',
            'opening_stock' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->product_id != '') {
            $product = Product::find($request->product_id);
            if (!$product) {
                return response()->json(['status' => 400, 'msg' => 'Product details not found!']);
            }
        } else {
            $product = new Product();
        }
        $product->product_name = $request->input('product_name');
        $product->company_master_id = $request->input('company_master_id');
        $product->hsn_code_id = $request->input('hsn_code_id');
        $product->gst = $request->input('gst');
        $product->opening_stock = $request->input('opening_stock');
        $product->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_product(Request $request)
    {
        $get_product = Product::orderBy('id', 'desc')->get();

        foreach ($get_product as $key => $record) {
            $get_product[$key]['company_name_view'] =  $record->company_name->company_name;
            $get_product[$key]['hsn_code_view'] =  $record->hsn_code->hsn_code;
            $id = $record->id;
            $action = '<button type="button" class="btn btn-primary btn-sm mr-1" onclick="editProduct(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $get_product[$key]['action'] =  $action;
        }
        return DataTables::of($get_product)
            ->addIndexColumn()
            ->rawColumns(['action', 'company_name_view', 'hsn_code_view'])
            ->make(true);
    }

    public function product_edit($id)
    {
        $get_product = Product::where('id', '=', $id)->first();
        if ($get_product) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $get_product]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function update(Request $request)
    {
        $rules = [
            'product_name' => 'required',
            'company_master_id' => 'required',
            'hsn_code_id' => 'required',
            'gst' => 'required',
            'opening_stock' => 'required',
        ];

        $this->validate($request, $rules);

        $product = Product::find($request->input('id'));
        $product->product_name = $request->input('product_name');
        $product->company_master_id = $request->input('company_master_id');
        $product->hsn_code_id = $request->input('hsn_code_id');
        $product->gst = $request->input('gst');
        $product->opening_stock = $request->input('opening_stock');
        $product->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function delete(Request $request)
        {
            $id =  $request->input('id');
            $product = Product::find($id);
            $product->delete();

            return response()->json(['status' => '200', 'msg' => 'success']);
        }
}
