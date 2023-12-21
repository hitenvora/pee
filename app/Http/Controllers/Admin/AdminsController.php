<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminsController extends Controller
{
    public function index()
    {
        return view('admin.admins-master');
    }

    public function insert(Request $request)
    {
        if ($request->admin_id == '') {
            $rules = [
                'name' => 'required',
                'username' => 'required|unique:admins,username',
                'password' => 'required|min:8',
            ];
        } else {
            $rules = [

                'name' => 'required',
                'username' => 'required|unique:admins,username',
                'is_active' => 'required',
            ];
        }
        $this->validate($request, $rules);

        if ($request->admin_id != '') {
            $adminMaster = Admin::find($request->admin_id);
            if (!$adminMaster) {
                return response()->json(['status' => 400, 'msg' => 'Admin Master details not found!']);
            }
            $adminMaster->updated_by = Auth::user()->id;
            $adminMaster->is_active = $request->is_active;
        } else {
            $adminMaster = new Admin();
            $adminMaster->created_by = Auth::user()->id;
        }
        $adminMaster->name = $request->input('name');
        $adminMaster->username = $request->input('username');
        $adminMaster->password = Hash::make($request->password);

        $adminMaster->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_admin(Request $request)
    {
        $getAdminMaster = Admin::orderBy('id')->get();

        foreach ($getAdminMaster as $key => $record) {
            $id = $record->id;

            if ($record->is_active == 0) {
                $getAdminMaster[$key]['active_button'] = '<span class="badge bg-warning">In Active</span>';
            } else {
                $getAdminMaster[$key]['active_button'] = '<span class="badge bg-success">Active</span>';
            }
            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editadminMaster(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            // $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata('.$id.')" title="Delete"><i class="fa fa-trash"></i></button>';
            $getAdminMaster[$key]['action'] = $action;
        }

        return DataTables::of($getAdminMaster)
            ->addIndexColumn()
            ->rawColumns(['action', 'active_button'])
            ->make(true);
    }

    public function admin_edit($id)
    {
        $getAdminMaster = Admin::where('id', '=', $id)->first();
        if ($getAdminMaster) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $getAdminMaster]);
        }

        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }
}
