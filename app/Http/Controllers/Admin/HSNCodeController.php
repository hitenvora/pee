<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HSNCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class HSNCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.hsn-code');
    }

    public function insert(Request $request)
    {
        if ($request->hsn_code_id == '') {
            $rules = [
                'hsn_code' => 'required',
                'is_active' => 'required',
            ];
        } else {
            $rules = [
                'hsn_code' => 'required',
            ];
        }
        $this->validate($request, $rules);

        if ($request->hsn_code_id != '') {
            $hsnCode = HSNCode::find($request->hsn_code_id);
            if (!$hsnCode) {
                return response()->json(['status' => 400, 'msg' => 'HSN Code details not found!']);
            }
            $hsnCode->updated_by = Auth::user()->id;
            $hsnCode->is_active = $request->is_active;
        } else {
            $hsnCode = new HSNCode();
            $hsnCode->created_by = Auth::user()->id;
        }
        $hsnCode->hsn_code = $request->input('hsn_code');
        $hsnCode->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_hsn_code(Request $request)
    {
        $get_hsnCode = HSNCode::orderBy('id')->get();
        foreach ($get_hsnCode as $key => $record) {
            $id = $record->id;
            if ($record->is_active == 0)
                $get_hsnCode[$key]['active_button'] = '<span class="badge bg-warning">In Active</span>';
            else
                $get_hsnCode[$key]['active_button'] = '<span class="badge bg-success">Active</span>';
            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editHSNCode(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $get_hsnCode[$key]['action'] =  $action;
        }
        return DataTables::of($get_hsnCode)
            ->addIndexColumn()
            ->rawColumns(['action', 'active_button'])
            ->make(true);
    }

    public function hsn_code_edit($id)
    {
        $get_hsnCode = HSNCode::where('id', '=', $id)->first();
        if ($get_hsnCode) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $get_hsnCode]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $get_hsnCode = HSNCode::find($id);
        $get_hsnCode->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
