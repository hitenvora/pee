<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStock;
use App\Models\StockMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderList = OrderStock::with('order', 'company', 'product_master')->get()->map(function ($OrderStock, $key) {
            return [
                'id' => $OrderStock->id,
                'number_of_bottle_order' => $OrderStock->order->number_of_bottle,
                'number_of_bottle_received' => $OrderStock->number_of_bottle_received,
                'company_name' => $OrderStock->company->name,
                'product_name' => $OrderStock->product_master->name,
                'remarks' => $OrderStock->remarks,
            ];
        });
        return response()->json([
            'status' => 200,
            'orderList' => $orderList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $rules = [
            'order_date' => 'required',
            'number_of_bottle_received' => 'required',
            'remarks' => 'nullable',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            $response = [
                'status'  => 401,
                'message' => $errorMessage,
            ];
            return response()->json($response, 401);
        }

        if ($request->order_stock_id != '') {
            $purchaseEmptyBottles = OrderStock::find($request->order_stock_id);
            if (!$purchaseEmptyBottles) {
                return response()->json(['status' => 400, 'msg' => 'Order stock details not found!']);
            }
        } else {
            $order = Order::find($request->order_date);
            // return $order->year_master_id;
            if (!$order) {
                return response()->json(['status' => 400, 'msg' => 'Order details not found!']);
            }
            $OrderStock = new OrderStock();
            $OrderStock->year_master_id = $order->year_master_id;
            $OrderStock->order_id = $order->id;
            $OrderStock->order_received_date = date('Y-m-d H:i:s');
            $OrderStock->company_id = $order->company_id;
            $OrderStock->product_master_id = $order->product_master_id;
            $OrderStock->number_of_bottle_received = $request->input('number_of_bottle_received');
            $OrderStock->remarks = $request->input('remarks');
            $OrderStock->created_by = $request->auth_user_id;
            $OrderStock->save();
            // update stock entry
            if ($OrderStock) {
                $StockMaster = StockMaster::where('company_id', $order->company_id)
                    ->where('product_master_id', $order->product_master_id)->first();
                if ($StockMaster) {
                    $StockMaster->num_of_empty_bottle = $StockMaster->num_of_empty_bottle - $OrderStock->number_of_bottle_received;
                    $StockMaster->num_of_filled_bottle = $StockMaster->num_of_filled_bottle + $OrderStock->number_of_bottle_received;
                    $StockMaster->updated_by = $request->auth_user_id;
                } else {
                    $StockMaster = new StockMaster();
                    $StockMaster->company_id = $order->company_id;
                    $StockMaster->product_master_id = $order->product_master_id;
                    $StockMaster->num_of_empty_bottle = $OrderStock->number_of_bottle_received;
                    $StockMaster->created_by = $request->auth_user_id;
                }
                $StockMaster->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'New stock added successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'msg' => 'Failed to add stock!',
                ], 400);
            }
        }

        return response()->json([
            'status' => 200,
            'msg' => 'success',
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
