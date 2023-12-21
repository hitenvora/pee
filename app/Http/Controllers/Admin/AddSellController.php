<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountMaster;
use App\Models\AddSell;
use App\Models\CustomerStockMaster;
use App\Models\GSTMaster;
use App\Models\HSNCode;
use App\Models\ProductMaster;
use App\Models\StockMaster;
use App\Models\YearMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class AddSellController extends Controller
{
    public function index()
    {
        $yearMaster = YearMaster::orderBy('id')->get();
        $company = AccountMaster::where('group_master_id', 1)->orderBy('name')->get();
        $Customer = AccountMaster::where('group_master_id', 2)->orderBy('name')->get();
        $Supplier = AccountMaster::where('group_master_id', 3)->orderBy('name')->get();
        $productMaster = ProductMaster::orderBy('id')->get();
        $hsnCode = HSNCode::orderBy('id')->get();
        $gstMaster = GSTMaster::orderBy('id')->get();
        return view('admin.add-sell', compact('yearMaster', 'company', 'Supplier', 'Customer', 'productMaster', 'hsnCode', 'gstMaster'));
    }

    public function insert(Request $request)
    {
        $rules = [
            'company' => 'required',
            'product' => 'required',
            'customer' => 'required',
            'supplier' => 'required',
            'order_date' => 'required',
            // 'order_code' => 'required',
            'ch_number' => 'required',
            'filled_bottle_delivered' => 'required',
            'empty_bottle_received' => 'required',
            'rate_per_bottle' => 'required',
            'total_bottle' => 'required',
            'hsn_code' => 'required',
            'gst_percentage' => 'required',
            'net_payable_amount' => 'required',
            'total_payment' => 'required',
        ];
        $this->validate($request, $rules);

        if ($request->add_sell_id != '') {
            $addSell = AddSell::find($request->add_sell_id);
            if (!$addSell) {
                return response()->json(['status' => 400, 'msg' => 'Add Sell details not found!']);
            }
            $addSell->updated_by = Auth::user()->id;
            // $addSell->is_active = $request->is_active;
        } else {
            $addSell = new AddSell();
            $addSell->created_by = Auth::user()->id;
        }
        $year_master_id = Session::get('year_master_id');
        $addSell->year_master_id = $year_master_id;
        $addSell->company_id = $request->input('company');
        $addSell->product_master_id = $request->input('product');
        $addSell->customer_id = $request->input('customer');
        $addSell->supplier_id = $request->input('supplier');
        $addSell->order_date = $request->input('order_date');
        $addSell->order_code = $request->input('order_code');
        $addSell->ch_number = $request->input('ch_number');
        $addSell->filled_bottle_delivered = $request->input('filled_bottle_delivered');
        $addSell->empty_bottle_received = $request->input('empty_bottle_received');
        $addSell->total_bottle_stock_delivered_time = $request->input('total_bottle');
        $addSell->rate_per_bottle = $request->input('rate_per_bottle');
        $addSell->hsn_master_id = $request->input('hsn_code');
        $addSell->gst_master_id = $request->input('gst_percentage');
        $addSell->net_payable_amount = $request->input('net_payable_amount');
        $addSell->total_payment = $request->input('total_payment');
        $addSell->save();
        if ($addSell) {
            if ($request->add_sell_id != '') {
                $addSell = AddSell::find($request->add_sell_id);
                if (!$addSell) {
                    return response()->json(['status' => 400, 'msg' => 'Add Sell details not found!']);
                }
            } else {
                // add/update sell stock update
                // update stock master
                $StockMaster = StockMaster::where('company_id', $addSell->company_id)
                    ->where('product_master_id', $addSell->product_master_id)->first();
                if ($StockMaster) {
                    $StockMaster->num_of_filled_bottle = $StockMaster->num_of_filled_bottle - $addSell->filled_bottle_delivered;
                    $StockMaster->num_of_empty_bottle = $StockMaster->num_of_empty_bottle + $addSell->empty_bottle_received;
                    $StockMaster->updated_by = Auth::user()->id;
                    $StockMaster->save();
                }
                // update customer stock master
                $CustomerStockMaster = CustomerStockMaster::where('company_id', $addSell->company_id)
                    ->where('product_master_id', $addSell->product_master_id)->first();
                if ($CustomerStockMaster) {
                    $CustomerStockMaster->num_of_bottle = $CustomerStockMaster->num_of_bottle + ($addSell->filled_bottle_delivered - $addSell->empty_bottle_received);
                    $CustomerStockMaster->updated_by = Auth::user()->id;
                } else {
                    $CustomerStockMaster = new CustomerStockMaster();
                    $CustomerStockMaster->customer_id = $addSell->customer_id;
                    $CustomerStockMaster->company_id = $StockMaster->company_id;
                    $CustomerStockMaster->product_master_id = $StockMaster->product_master_id;
                    $CustomerStockMaster->num_of_bottle = $addSell->filled_bottle_delivered;
                    $CustomerStockMaster->created_by = Auth::user()->id;
                }
                $CustomerStockMaster->save();
            }
        }

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_add_sell(Request $request)
    {
        $getAddSell = AddSell::orderBy('id', 'desc')->get();

        foreach ($getAddSell as $key => $record) {
            $getAddSell[$key]['year_name'] =  $record->year_master->name;
            $getAddSell[$key]['company_name'] =  $record->company->name;
            $getAddSell[$key]['product_name'] =  $record->product_master->name;
            $getAddSell[$key]['hsn_code_name'] =  $record->hsn_code->hsn_code;
            $getAddSell[$key]['gst'] =  $record->gst_master->percentage;
            $getAddSell[$key]['order_date'] = date('d-m-Y', strtotime($record->order_date));
            $id = $record->id;
            if ($record->is_active == 0) {
                $getAddSell[$key]['active_button'] = '<span class="badge bg-warning">In Active</span>';
            } else {
                $getAddSell[$key]['active_button'] = '<span class="badge bg-success">Active</span>';
            }
            // $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editAddSell(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action = '<button type="button" class="btn btn-danger btn-sm" onclick="deleteData(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $getAddSell[$key]['action'] =  $action;
        }
        return DataTables::of($getAddSell)
            ->addIndexColumn()
            ->rawColumns(['action', 'year_name', 'company_name', 'product_name', 'hsn_code_name', 'gst', 'order_date', 'active_button'])
            ->make(true);
    }

    public function add_sell_edit($id)
    {
        $getAddSell = AddSell::where('id', '=', $id)->first();
        if ($getAddSell) {
            $getAddSell['order_date'] = date('Y-m-d', strtotime($getAddSell['order_date']));
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $getAddSell]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $addSell = AddSell::find($id);
        if (!$addSell) {
            return response()->json(['status' => 400, 'msg' => 'Add Sell details not found!']);
        }

        // add/update sell stock update
        // update stock master
        $StockMaster = StockMaster::where('company_id', $addSell->company_id)
            ->where('product_master_id', $addSell->product_master_id)->first();
        if ($StockMaster) {
            $StockMaster->num_of_filled_bottle = $StockMaster->num_of_filled_bottle + $addSell->filled_bottle_delivered;
            $StockMaster->num_of_empty_bottle = $StockMaster->num_of_empty_bottle - $addSell->empty_bottle_received;
            $StockMaster->updated_by = Auth::user()->id;
            $StockMaster->save();
        }
        // update customer stock master
        $CustomerStockMaster = CustomerStockMaster::where('company_id', $addSell->company_id)
            ->where('product_master_id', $addSell->product_master_id)->first();
        if ($CustomerStockMaster) {
            $CustomerStockMaster->num_of_bottle = $CustomerStockMaster->num_of_bottle - ($addSell->filled_bottle_delivered - $addSell->empty_bottle_received);
            $CustomerStockMaster->updated_by = Auth::user()->id;
        }
        $CustomerStockMaster->save();

        $addSell->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
