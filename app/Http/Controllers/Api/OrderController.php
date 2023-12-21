<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStock;
use App\Models\Supplier;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders(Request $request)
    {
        $Orders = Order::select('id', 'order_date')->where('is_active', 1)->get();
        if ($Orders->count() > 0) {
            return response()->json([
                'message' => 'Order list',
                'status' => 200,
                'data' => $Orders,
            ], 200);
        } else {
            return response()->json(['message' => 'No orders found!'], 400);
        }
    }

    public function getOrderDetails($id, Request $request)
    {
        // return $request->auth_user_id;
        $OrderDetails = Order::select('id', 'order_date', 'number_of_bottle', 'company_id', 'product_master_id')
            ->with('account_master', 'product_master')
            ->where('id', $id)
            ->where('is_active', 1)->first();
        if ($OrderDetails) {
            return response()->json([
                'message' => 'Order details',
                'status' => 200,
                'data' => $OrderDetails,
            ], 200);
        } else {
            return response()->json(['message' => 'No orders found!'], 400);
        }
    }
}
