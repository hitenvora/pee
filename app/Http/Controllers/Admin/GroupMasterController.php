<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GroupMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class GroupMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.group-master');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert(Request $request)
    {
        if ($request->group_id == '') {
            $rules = [
                'name' => 'required',
                'is_active' => 'required',
            ];
        } else {
            $rules = [
                'name' => 'required',
            ];
        }
        $this->validate($request, $rules);

        if ($request->group_id != '') {
            $groupMaster = GroupMaster::find($request->group_id);
            if (!$groupMaster) {
                return response()->json(['status' => 400, 'msg' => 'Group Master details not found!']);
            }
            $groupMaster->updated_by = Auth::user()->id;
            $groupMaster->is_active = $request->is_active;
        } else {
            $groupMaster = new GroupMaster();
            $groupMaster->created_by = Auth::user()->id;
        }
        $groupMaster->name = $request->input('name');
        $groupMaster->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_group(Request $request)
    {
        $getGroupMaster = GroupMaster::orderBy('id')->get();

        foreach ($getGroupMaster as $key => $record) {
            $id = $record->id;
            if ($record->is_active == 0)
                $getGroupMaster[$key]['active_button'] = '<span class="badge bg-warning">In Active</span>';
            else
                $getGroupMaster[$key]['active_button'] = '<span class="badge bg-success">Active</span>';
            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editGroupMaster(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $getGroupMaster[$key]['action'] =  $action;
        }
        return DataTables::of($getGroupMaster)
            ->addIndexColumn()
            ->rawColumns(['action', 'active_button'])
            ->make(true);
    }

    public function group_edit($id)
    {
        $getGroupMaster = GroupMaster::where('id', '=', $id)->first();
        if ($getGroupMaster) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $getGroupMaster]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $getGroupMaster = GroupMaster::find($id);
        $getGroupMaster->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
