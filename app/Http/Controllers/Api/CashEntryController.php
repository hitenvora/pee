<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AccountCashEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CashEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AccountCashEntry = AccountCashEntry::with('customer', 'account')->get()->map(function ($CashEntryList, $key) {
            return [
                'id' => $CashEntryList->id,
                'customer_name' => $CashEntryList->customer->name,
                'account_name' => $CashEntryList->account->name,
                'amount' => $CashEntryList->amount,
                'remarks' => $CashEntryList->remarks,
            ];
        });
        return response()->json([
            'status' => 200,
            'data' => $AccountCashEntry,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        if ($request->cash_manage_id != '') {
            $accountCashManage = AccountCashEntry::find($request->cash_manage_id);
            if (!$accountCashManage) {
                return response()->json(['status' => 400, 'msg' => 'Account Cash Entry details not found!']);
            }
            $accountCashManage->created_by_supplier = $request->auth_user_id;
        } else {
            $accountCashManage = new AccountCashEntry();
            $accountCashManage->created_by_supplier = $request->auth_user_id;
        }
        $accountCashManage->customer_id = $request->input('customer_id');
        $accountCashManage->account_master_id = $request->input('account_master_id');
        $accountCashManage->amount = $request->input('amount');
        $accountCashManage->is_credit = $request->input('is_credit');
        $accountCashManage->remarks = $request->input('remarks');
        $accountCashManage->save();

        return response()->json([
            'status' => 200,
            'message' => 'Cash Entry added successfully',
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
