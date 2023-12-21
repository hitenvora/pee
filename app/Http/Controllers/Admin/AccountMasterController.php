<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountMaster;
use App\Models\GroupMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AccountMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accountMaster = GroupMaster::orderBy('id')->get();
        return view('admin.account-master', compact('accountMaster'));
    }

    public function insert(Request $request)
    {
        if ($request->account_master_id == '') {
            $rules = [
                'name' => 'required',
                'is_active' => 'required',
                'group_master_id' => 'required',
                'opening_balance' => 'required',
                'credit_limit' => 'required',
                'is_credit' => 'required',
                'address' => 'required',
                'city' => 'required',
                'gst_no' => 'required',
                'contact_person' => 'required',
                'mobile_no' => 'required|numeric|digits:10',
            ];
        } else {
            $rules = [
                'name' => 'required',
                'group_master_id' => 'required',
                'opening_balance' => 'required',
                'credit_limit' => 'required',
                'is_credit' => 'required',
                'address' => 'required',
                'city' => 'required',
                'gst_no' => 'required',
                'contact_person' => 'required',
                'mobile_no' => 'required|numeric|digits:10',
            ];
        }
        $this->validate($request, $rules);

        if ($request->account_master_id != '') {
            $accountMaster = AccountMaster::find($request->account_master_id);
            if (!$accountMaster) {
                return response()->json(['status' => 400, 'msg' => 'Account Master details not found!']);
            }
            $accountMaster->updated_by = Auth::user()->id;
            $accountMaster->is_active = $request->is_active;
        } else {
            $accountMaster = new AccountMaster();
            $accountMaster->created_by = Auth::user()->id;
        }
        $accountMaster->name = $request->input('name');
        $accountMaster->group_master_id = $request->input('group_master_id');
        $accountMaster->opening_balance = $request->input('opening_balance');
        $accountMaster->credit_limit = $request->input('credit_limit');
        $accountMaster->is_credit = $request->input('is_credit');
        $accountMaster->address = $request->input('address');
        $accountMaster->city = $request->input('city');
        $accountMaster->gst_no = $request->input('gst_no');
        $accountMaster->contact_person = $request->input('contact_person');
        $accountMaster->mobile_no = $request->input('mobile_no');
        $accountMaster->user_name = $request->input('user_name');
        $accountMaster->password = $request->input('password');
        $accountMaster->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_account_master(Request $request)
    {
        $getAccountMaster = AccountMaster::orderBy('id', 'desc')->get();

        foreach ($getAccountMaster as $key => $record) {
            $getAccountMaster[$key]['group_name'] =  $record->group_master->name;
            $id = $record->id;
            if ($record->is_active == 0) {
                $getAccountMaster[$key]['active_button'] = '<span class="badge bg-warning">In Active</span>';
            } else {
                $getAccountMaster[$key]['active_button'] = '<span class="badge bg-success">Active</span>';
            }
            if ($record->is_credit == 0) {
                $getAccountMaster[$key]['credit_button'] = '<span class="badge bg-warning">Debit</span>';
            } else {
                $getAccountMaster[$key]['credit_button'] = '<span class="badge bg-success">Credit</span>';
            }
            $action = '<button type="button" class="btn btn-primary btn-sm mr-1" onclick="editAccountMaster(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $getAccountMaster[$key]['action'] =  $action;
        }
        return DataTables::of($getAccountMaster)
            ->addIndexColumn()
            ->rawColumns(['action', 'group_name', 'active_button', 'credit_button'])
            ->make(true);
    }

    public function account_edit($id)
    {
        $getAccountMaster = AccountMaster::where('id', '=', $id)->first();
        if ($getAccountMaster) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $getAccountMaster]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $getAccountMaster = AccountMaster::find($id);
        $getAccountMaster->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
