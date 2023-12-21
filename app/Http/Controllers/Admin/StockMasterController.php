<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountMaster;
use App\Models\CustomerStockMaster;
use App\Models\GroupMaster;
use App\Models\Order;
use App\Models\OrderStock;
use App\Models\ProductMaster;
use App\Models\StockMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class StockMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.stock-list');
    }

    public function customer_stock_list()
    {
        return view('admin.customer-stock-list');
    }

    public function getList(Request $request)
    {
        $StockMaster = StockMaster::orderBy('id')->get();

        foreach ($StockMaster as $key => $record) {
            $StockMaster[$key]['company_name'] =  $record->company->name;
            $StockMaster[$key]['product_name'] =  $record->product_master->name;
            $StockMaster[$key]['total_bottle'] =  $record->num_of_filled_bottle + $record->num_of_empty_bottle;
        }
        return DataTables::of($StockMaster)
            ->addIndexColumn()
            ->rawColumns(['company_name', 'product_name', 'total_bottle'])
            ->make(true);
    }

    public function getCustomerList(Request $request)
    {
        $StockMaster = CustomerStockMaster::orderBy('id')->get();

        foreach ($StockMaster as $key => $record) {
            $StockMaster[$key]['customer_name'] =  $record->customer->name;
            $StockMaster[$key]['company_name'] =  $record->company->name;
            $StockMaster[$key]['product_name'] =  $record->product_master->name;
        }
        return DataTables::of($StockMaster)
            ->addIndexColumn()
            ->rawColumns(['company_name', 'product_name', 'customer_name'])
            ->make(true);
    }

    public function orderStockList()
    {
        $accountName = AccountMaster::where('group_master_id', 1)->orderBy('name')->get();
        $productName = ProductMaster::orderBy('id')->get();
        $orders = Order::orderBy('id', 'desc')->get();
        return view('admin.order-stock-list', compact('orders', 'accountName', 'productName'));
    }

    public function getOrderStockList(Request $request)
    {
        $StockMaster = OrderStock::orderBy('id')->get();

        foreach ($StockMaster as $key => $record) {
            $id = $record->id;
            $StockMaster[$key]['order_date'] =  $record->order->order_date;
            $StockMaster[$key]['company_name'] =  $record->company->name;
            $StockMaster[$key]['product_name'] =  $record->product_master->name;
            $StockMaster[$key]['number_of_bottle_order'] =  $record->order->number_of_bottle;
            $StockMaster[$key]['number_of_bottle_received'] =  $record->number_of_bottle_received;
            // $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editEmptyBottles(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action = '<button type="button" class="btn btn-danger btn-sm" onclick="deleteData(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $StockMaster[$key]['action'] = $action;
        }
        return DataTables::of($StockMaster)
            ->addIndexColumn()
            ->rawColumns(['order_date', 'company_name', 'product_name', 'total_bottle', 'action'])
            ->make(true);
    }

    public function getOrderDetails($id)
    {
        $getOrder = Order::where('id', '=', $id)->first();
        if ($getOrder) {
            $getOrder['order_date'] = date('Y-m-d', strtotime($getOrder['order_date']));
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $getOrder]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function insertOrderStock(Request $request)
    {
        $rules = [
            'order_date' => 'required',
            'order_received_date' => 'required|date',
            'number_of_bottle_received' => 'required',
            'remarks' => 'nullable',
        ];
        $this->validate($request, $rules);

        if ($request->order_stock_id != '') {
            $purchaseEmptyBottles = OrderStock::find($request->order_stock_id);
            if (!$purchaseEmptyBottles) {
                return response()->json(['status' => 400, 'msg' => 'Order stock details not found!']);
            }
        } else {
            $order = Order::find($request->order_date);
            if (!$order) {
                return response()->json(['status' => 400, 'msg' => 'Order details not found!']);
            }
            $OrderStock = new OrderStock();
            $year_master_id = Session::get('year_master_id');
            $OrderStock->year_master_id = $year_master_id;
            $OrderStock->order_id = $order->id;
            $OrderStock->order_received_date = date('Y-m-d', strtotime($request->order_received_date)) . ' ' . date('H:i:s');
            $OrderStock->company_id = $order->company_id;
            $OrderStock->product_master_id = $order->product_master_id;
            $OrderStock->number_of_bottle_received = $request->input('number_of_bottle_received');
            $OrderStock->remarks = $request->input('remarks');
            $OrderStock->created_by = Auth::user()->id;
            $OrderStock->save();
            // update stock entry
            if ($OrderStock) {
                $StockMaster = StockMaster::where('company_id', $order->company_id)
                    ->where('product_master_id', $order->product_master_id)->first();
                if ($StockMaster) {
                    $StockMaster->num_of_empty_bottle = $StockMaster->num_of_empty_bottle - $OrderStock->number_of_bottle_received;
                    $StockMaster->num_of_filled_bottle = $StockMaster->num_of_filled_bottle + $OrderStock->number_of_bottle_received;
                    $StockMaster->updated_by = Auth::user()->id;
                } else {
                    $StockMaster = new StockMaster();
                    $StockMaster->company_id = $order->company_id;
                    $StockMaster->product_master_id = $order->product_master_id;
                    $StockMaster->num_of_empty_bottle = $OrderStock->number_of_bottle_received;
                    $StockMaster->created_by = Auth::user()->id;
                }
                $StockMaster->save();
            }
        }

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function deleteOrderStock(Request $request)
    {
        $id = $request->input('id');
        $OrderStock = OrderStock::find($id);

        // update stock entry
        if ($OrderStock) {
            $order = Order::find($OrderStock->order_id);
            if (!$order) {
                return response()->json(['status' => 400, 'msg' => 'Order details not found!']);
            }
            $StockMaster = StockMaster::where('company_id', $order->company_id)
                ->where('product_master_id', $order->product_master_id)->first();
            if ($StockMaster) {
                $StockMaster->num_of_empty_bottle = $StockMaster->num_of_empty_bottle + $OrderStock->number_of_bottle_received;
                $StockMaster->num_of_filled_bottle = $StockMaster->num_of_filled_bottle - $OrderStock->number_of_bottle_received;
                $StockMaster->updated_by = Auth::user()->id;
                $StockMaster->save();
            }
        }

        $OrderStock->delete();
        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
