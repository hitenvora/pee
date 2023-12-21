<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\AccountCashEntry;
use App\Models\AccountMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SupplierCashEntryController extends Controller
{
    public function index()
    {
        $customer = AccountMaster::where('group_master_id', 2)->where('is_active', 1)->orderBy('id')->get();
        $account = AccountMaster::where('group_master_id', 5)->where('is_active', 1)->orderBy('id')->get();

        return view('supplier.supplier-cash-manage', compact('customer', 'account'));
    }

    public function insert(Request $request)
    {
        if ($request->cash_manage_id == '') {
            $rules = [
                'customer_id' => 'required',
                'account_master_id' => 'required',
                'amount' => 'required',
                'is_credit' => 'required',
            ];
        } else {
            $rules = [
                'customer_id' => 'required',
                'account_master_id' => 'required',
                'amount' => 'required',
                'is_credit' => 'required',
            ];
        }
        $this->validate($request, $rules);

        if ($request->cash_manage_id != '') {
            $accountCashManage = AccountCashEntry::find($request->cash_manage_id);
            if (!$accountCashManage) {
                return response()->json(['status' => 400, 'msg' => 'Account Cash Entry details not found!']);
            }
            $accountCashManage->created_by_supplier = Auth::user()->id;
        } else {
            $accountCashManage = new AccountCashEntry();
            $accountCashManage->created_by_supplier = Auth::user()->id;
        }
        $accountCashManage->customer_id = $request->input('customer_id');
        $accountCashManage->account_master_id = $request->input('account_master_id');
        $accountCashManage->amount = $request->input('amount');
        $accountCashManage->is_credit = $request->input('is_credit');
        $accountCashManage->remarks = $request->input('remarks');
        $accountCashManage->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_supplier_cash_entry(Request $request)
    {
        $getAccountCashManage = AccountCashEntry::orderBy('id', 'desc')->get();

        foreach ($getAccountCashManage as $key => $record) {
            $getAccountCashManage[$key]['customer_name'] =  $record->customer->name;
            $getAccountCashManage[$key]['account_name'] =  $record->account->name;
            $getAccountCashManage[$key]['date'] = date('d-m-Y', strtotime($record->create_date));
            $id = $record->id;
            if ($record->is_credit == 1) {
                $getAccountCashManage[$key]['credit'] = $record->amount;
                $getAccountCashManage[$key]['debit'] = '-';
            } else {
                $getAccountCashManage[$key]['debit'] = $record->amount;
                $getAccountCashManage[$key]['credit'] = '-';
            }
        }
        return DataTables::of($getAccountCashManage)
            ->addIndexColumn()
            ->rawColumns(['customer_name', 'account_name', 'active_button', 'date', 'credit', 'debit'])
            ->make(true);
    }
}
