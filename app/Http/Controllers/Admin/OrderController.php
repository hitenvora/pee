<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountMaster;
use App\Models\GSTMaster;
use App\Models\HSNCode;
use App\Models\Order;
use App\Models\ProductMaster;
use App\Models\YearMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $yearMaster = YearMaster::orderBy('id')->get();
        $accountMaster = AccountMaster::where('group_master_id', 1)->orderBy('name')->get();
        $productMaster = ProductMaster::orderBy('id')->get();
        $hsnCode = HSNCode::orderBy('id')->get();
        $gstMaster = GSTMaster::orderBy('id')->get();
        return view('admin.orders', compact('yearMaster', 'accountMaster', 'productMaster', 'hsnCode', 'gstMaster'));
    }

    public function insert(Request $request)
    {
        // return $request->all();
        if ($request->order_id == '') {
            $rules = [
                'company' => 'required',
                'product' => 'required',
                'order_date' => 'required|date',
                'number_of_bottle' => 'required',
                'company_rate_per_kg' => 'required',
                'weight_for_single_bottle' => 'required',
                'discount_1' => 'required',
                'discount_2' => 'required',
                'discount_3' => 'required',
                'hsn_code' => 'required',
                'gst_percentage' => 'required',
                'net_payable_amount' => 'required',
                'total_payment' => 'required',
                'is_active' => 'required',
            ];
        } else {
            $rules = [
                'company' => 'required',
                'product' => 'required',
                'order_date' => 'required|date',
                'number_of_bottle' => 'required',
                'company_rate_per_kg' => 'required',
                'weight_for_single_bottle' => 'required',
                'discount_1' => 'required',
                'discount_2' => 'required',
                'discount_3' => 'required',
                'hsn_code' => 'required',
                'gst_percentage' => 'required',
                'net_payable_amount' => 'required',
                'total_payment' => 'required',
            ];
        }
        $this->validate($request, $rules);

        if ($request->order_id != '') {
            $order = Order::find($request->order_id);
            if (!$order) {
                return response()->json(['status' => 400, 'msg' => 'Product Master details not found!']);
            }
            $order->updated_by = Auth::user()->id;
            $order->is_active = $request->is_active;
        } else {
            $order = new Order();
            $order->created_by = Auth::user()->id;
        }
        $year_master_id = Session::get('year_master_id');
        $order->year_master_id = $year_master_id;
        $order->company_id = $request->input('company');
        $order->product_master_id = $request->input('product');
        $order->number_of_bottle = $request->input('number_of_bottle');
        $order->weight_for_single_bottle = $request->input('weight_for_single_bottle');
        $order->bottle_rate_per_kg = $request->input('company_rate_per_kg');
        $order->order_date = $request->input('order_date');
        $order->discount_1 = $request->input('discount_1');
        $order->discount_2 = $request->input('discount_2');
        $order->discount_3 = $request->input('discount_3');
        $order->hsn_master_id = $request->input('hsn_code');
        $order->gst_master_id = $request->input('gst_percentage');
        $order->net_payable_amount = $request->input('net_payable_amount');
        $order->total_payment = $request->input('total_payment');
        $order->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_order(Request $request)
    {
        $getOrder = Order::orderBy('id', 'desc')->get();

        foreach ($getOrder as $key => $record) {
            $getOrder[$key]['year_name'] =  $record->year_master->name;
            $getOrder[$key]['account_name'] =  $record->account_master->name;
            $getOrder[$key]['product_name'] =  $record->product_master->name;
            $getOrder[$key]['hsn_code_name'] =  $record->hsn_code->hsn_code;
            $getOrder[$key]['gst'] =  $record->gst_master->percentage;
            $getOrder[$key]['order_date'] = date('d-m-Y', strtotime($record->order_date));
            $id = $record->id;
            if ($record->is_active == 0) {
                $getOrder[$key]['active_button'] = '<span class="badge bg-warning">In Active</span>';
            } else {
                $getOrder[$key]['active_button'] = '<span class="badge bg-success">Active</span>';
            }
            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editOrder(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $getOrder[$key]['action'] =  $action;
        }
        return DataTables::of($getOrder)
            ->addIndexColumn()
            ->rawColumns(['action', 'year_name', 'account_name', 'product_name', 'hsn_code_name', 'gst', 'order_date', 'active_button'])
            ->make(true);
    }

    public function order_edit($id)
    {
        $getOrder = Order::where('id', '=', $id)->first();
        if ($getOrder) {
            $getOrder['order_date'] = date('Y-m-d', strtotime($getOrder['order_date']));
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $getOrder]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $getOrder = Order::find($id);
        $getOrder->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
