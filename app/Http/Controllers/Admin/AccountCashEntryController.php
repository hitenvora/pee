<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountCashEntry;
use App\Models\AccountMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AccountCashEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = AccountMaster::where('group_master_id', 2)->where('is_active', 1)->orderBy('id')->get();
        $account = AccountMaster::where('group_master_id', 5)->where('is_active', 1)->orderBy('id')->get();

        return view('admin.cash-manage', compact('customer', 'account'));
    }

    public function insert(Request $request)
    {
        if ($request->cash_manage_id == '') {
            $rules = [
                'customer_id' => 'required',
                'account_master_id' => 'required',
                'amount' => 'required',
                'is_credit' => 'required',
                'create_date' => 'required',
            ];
        } else {
            $rules = [
                'customer_id' => 'required',
                'account_master_id' => 'required',
                'amount' => 'required',
                'is_credit' => 'required',
                'create_date' => 'required',
            ];
        }
        $this->validate($request, $rules);

        if ($request->cash_manage_id != '') {
            $accountCashManage = AccountCashEntry::find($request->cash_manage_id);
            if (!$accountCashManage) {
                return response()->json(['status' => 400, 'msg' => 'Account Cash Entry details not found!']);
            }
            $accountCashManage->updated_by = Auth::user()->id;
        } else {
            $accountCashManage = new AccountCashEntry();
            $accountCashManage->created_by = Auth::user()->id;
        }
        $accountCashManage->customer_id = $request->input('customer_id');
        $accountCashManage->account_master_id = $request->input('account_master_id');
        $accountCashManage->amount = $request->input('amount');
        $accountCashManage->is_credit = $request->input('is_credit');
        $accountCashManage->remarks = $request->input('remarks');
        $accountCashManage->create_date = $request->input('create_date');
        $accountCashManage->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_account_cash_entry(Request $request)
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
            $action = '<button type="button" class="btn btn-primary btn-sm mr-1" onclick="editAccountCashManage(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $getAccountCashManage[$key]['action'] =  $action;
        }
        return DataTables::of($getAccountCashManage)
            ->addIndexColumn()
            ->rawColumns(['action', 'customer_name', 'account_name', 'active_button', 'date', 'credit', 'debit'])
            ->make(true);
    }

    public function account_cash_entry_edit($id)
    {
        $getAccountCashManage = AccountCashEntry::where('id', '=', $id)->first();
        if ($getAccountCashManage) {
            $getAccountCashManage['date'] = date('Y-m-d', strtotime($getAccountCashManage['create_date']));
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $getAccountCashManage]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $getAccountCashManage = AccountCashEntry::find($id);
        $getAccountCashManage->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
