<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountMaster;
use App\Models\ProductMaster;
use App\Models\PurchaseEmptyBottles;
use App\Models\StockMaster;
use App\Models\YearMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class PurchaseEmptyBottlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $yearName = YearMaster::orderBy('id')->get();
        $accountName = AccountMaster::where('group_master_id', 1)->orderBy('name')->get();
        $productName = ProductMaster::orderBy('id')->get();

        return view('admin.purchase_empty_bottles', compact('yearName', 'accountName', 'productName'));
    }

    public function insert(Request $request)
    {
        $rules = [
            // 'year_master_id' => 'required',
            'company' => 'required',
            'product' => 'required',
            'num_of_bottle' => 'required',
            'rate_per_bottle' => 'required',
            'net_pay_amount' => 'required',
        ];
        $this->validate($request, $rules);

        if ($request->purchase_empty_bottle_id != '') {
            $purchaseEmptyBottles = PurchaseEmptyBottles::find($request->purchase_empty_bottle_id);
            if (!$purchaseEmptyBottles) {
                return response()->json(['status' => 400, 'msg' => 'Purchase entry not found!']);
            }
        } else {
            $purchaseEmptyBottles = new PurchaseEmptyBottles();
            $year_master_id = Session::get('year_master_id');
            $purchaseEmptyBottles->year_master_id = $year_master_id;
            $purchaseEmptyBottles->account_master_id = $request->input('company');
            $purchaseEmptyBottles->product_master_id = $request->input('product');
            $purchaseEmptyBottles->num_of_bottle = $request->input('num_of_bottle');
            $purchaseEmptyBottles->rate_per_bottle = $request->input('rate_per_bottle');
            $purchaseEmptyBottles->net_pay_amount = $request->input('net_pay_amount');
            $purchaseEmptyBottles->remarks = $request->input('remarks');
            $purchaseEmptyBottles->save();
            // update stock entry
            if($purchaseEmptyBottles){
                $StockMaster = StockMaster::where('company_id', $purchaseEmptyBottles->account_master_id)
                                ->where('product_master_id', $purchaseEmptyBottles->product_master_id)->first();
                if($StockMaster){
                    $StockMaster->num_of_empty_bottle = $StockMaster->num_of_empty_bottle + $purchaseEmptyBottles->num_of_bottle;
                    $StockMaster->updated_by = Auth::user()->id;
                } else {
                    $StockMaster = new StockMaster();
                    $StockMaster->company_id = $purchaseEmptyBottles->account_master_id;
                    $StockMaster->product_master_id = $purchaseEmptyBottles->product_master_id;
                    $StockMaster->num_of_empty_bottle = $purchaseEmptyBottles->num_of_bottle;
                    $StockMaster->created_by = Auth::user()->id;
                }
                $StockMaster->save();
            }
        }

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function get_purchase_empty(Request $request)
    {
        $getPurchaseEmpty = PurchaseEmptyBottles::orderBy('id')->get();
        foreach ($getPurchaseEmpty as $key => $record) {
            $id = $record->id;
            $getPurchaseEmpty[$key]['year_name_view'] = $record->year_name->name;
            $getPurchaseEmpty[$key]['account_name_view'] = $record->account_name->name;
            $getPurchaseEmpty[$key]['product_name_view'] = $record->product_name->name;

            // $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editEmptyBottles(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action = '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $getPurchaseEmpty[$key]['action'] = $action;
        }
        return DataTables::of($getPurchaseEmpty)
            ->addIndexColumn()
            ->rawColumns(['action', 'year_name_view', 'account_name_view', 'product_name_view'])
            ->make(true);
    }

    public function purchase_empty_edit($id)
    {
        $getPurchaseEmptyBottle = PurchaseEmptyBottles::where('id', '=', $id)->first();
        if ($getPurchaseEmptyBottle) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $getPurchaseEmptyBottle]);
        }
        return response()->json(['status' => '200', 'msg' => 'failed'], 400);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $purchaseEmptyBottles = PurchaseEmptyBottles::find($id);
        
        // update stock entry
        if($purchaseEmptyBottles){
            $StockMaster = StockMaster::where('company_id', $purchaseEmptyBottles->account_master_id)
                            ->where('product_master_id', $purchaseEmptyBottles->product_master_id)->first();
            if($StockMaster){
                $StockMaster->num_of_empty_bottle = $StockMaster->num_of_empty_bottle - $purchaseEmptyBottles->num_of_bottle;
                $StockMaster->updated_by = Auth::user()->id;
                $StockMaster->save();
            }
        }

        $purchaseEmptyBottles->delete();
        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
