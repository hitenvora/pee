<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AddSell;
use App\Models\CustomerStockMaster;
use App\Models\StockMaster;
use App\Models\YearMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddSellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AddSell = AddSell::with('year_master', 'company', 'product_master', 'hsn_code', 'gst_master')->get()->map(function ($AddSellList, $key) {
            return [
                'id' => $AddSellList->id,
                'year_name' => $AddSellList->year_master->name,
                'company_name' => $AddSellList->company->name,
                'product_name' => $AddSellList->product_master->name,
                'hsn_code' => $AddSellList->hsn_code->hsn_code,
                'gst' => $AddSellList->gst_master->percentage,
                'ch_number' => $AddSellList->ch_number,
                'filled_bottle_delivered' => $AddSellList->filled_bottle_delivered,
                'empty_bottle_received' => $AddSellList->empty_bottle_received,
                'rate_per_bottle' => $AddSellList->rate_per_bottle,
                'net_payable_amount' => $AddSellList->net_payable_amount,
                'total_payment' => $AddSellList->total_payment,
            ];
        });
        return response()->json([
            'status' => 200,
            'data' => $AddSell,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'company' => 'required',
            'product' => 'required',
            'customer' => 'required',
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
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            $response = [
                'status'  => 401,
                'message' => $errorMessage,
            ];
            return response()->json(
                $response,
            );
        }

        if ($request->add_sell_id != '') {
            $addSell = AddSell::find($request->add_sell_id);
            if (!$addSell) {
                return response()->json(['status' => 400, 'msg' => 'Add Sell details not found!']);
            }
            $addSell->updated_by = $request->auth_user_id;
        } else {
            $addSell = new AddSell();
            $addSell->created_by = $request->auth_user_id;
        }
        $YearMaster = YearMaster::orderBy('end_date', 'desc')->first();
        $addSell->year_master_id = $YearMaster->id;
        $addSell->order_date = date('Y-m-d H:i:s');
        $addSell->company_id = $request->input('company');
        $addSell->product_master_id = $request->input('product');
        $addSell->customer_id = $request->input('customer');
        $addSell->supplier_id = $request->auth_user_id;
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
                    $StockMaster->updated_by = $request->auth_user_id;
                    $StockMaster->save();
                }
                // update customer stock master
                $CustomerStockMaster = CustomerStockMaster::where('company_id', $addSell->company_id)
                    ->where('product_master_id', $addSell->product_master_id)->first();
                if ($CustomerStockMaster) {
                    $CustomerStockMaster->num_of_bottle = $CustomerStockMaster->num_of_bottle + ($addSell->filled_bottle_delivered - $addSell->empty_bottle_received);
                    $CustomerStockMaster->updated_by = $request->auth_user_id;
                } else {
                    $CustomerStockMaster = new CustomerStockMaster();
                    $CustomerStockMaster->customer_id = $addSell->customer_id;
                    $CustomerStockMaster->company_id = $addSell->company_id;
                    $CustomerStockMaster->product_master_id = $addSell->product_master_id;
                    $CustomerStockMaster->num_of_bottle = $addSell->filled_bottle_delivered;
                    $CustomerStockMaster->created_by = $request->auth_user_id;
                }
                $CustomerStockMaster->save();
            }
        }

        return response()->json([
            'status' => 200,
            'message' => 'Add Sell added successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
    public function destroy(string $id)
    {
        //
    }
}
