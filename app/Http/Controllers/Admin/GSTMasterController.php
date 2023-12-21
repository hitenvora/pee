<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GSTMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class GSTMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.gst-master');
    }

    public function insert(Request $request)
    {
        if ($request->gst_id == '') {
            $rules = [
                'percentage' => 'required',
                'c_gst' => 'required',
                's_gst' => 'required',
                'i_gst' => 'required',
                'is_active' => 'required',
            ];
        } else {
            $rules = [
                'percentage' => 'required',
                'c_gst' => 'required',
                's_gst' => 'required',
                'i_gst' => 'required',
            ];
        }
        $this->validate($request, $rules);

        if ($request->gst_id != '') {
            $gstMaster = GSTMaster::find($request->gst_id);
            if (!$gstMaster) {
                return response()->json(['status' => 400, 'msg' => 'GST Master details not found!']);
            }
            $gstMaster->updated_by = Auth::user()->id;
            $gstMaster->is_active = $request->is_active;
        } else {
            $gstMaster = new GSTMaster();
            $gstMaster->created_by = Auth::user()->id;
        }
        $gstMaster->percentage = $request->input('percentage');
        $gstMaster->c_gst = $request->input('c_gst');
        $gstMaster->s_gst = $request->input('s_gst');
        $gstMaster->i_gst = $request->input('i_gst');
        $gstMaster->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_gst(Request $request)
    {
        $getGstMaster = GSTMaster::orderBy('id')->get();

        foreach ($getGstMaster as $key => $record) {
            $id = $record->id;
            if ($record->is_active == 0) {
                $getGstMaster[$key]['active_button'] = '<span class="badge bg-warning">In Active</span>';
            } else {
                $getGstMaster[$key]['active_button'] = '<span class="badge bg-success">Active</span>';
            }
            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editGSTMaster(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $getGstMaster[$key]['action'] =  $action;
        }
        return DataTables::of($getGstMaster)
            ->addIndexColumn()
            ->rawColumns(['action', 'active_button'])
            ->make(true);
    }

    public function gst_edit($id)
    {
        $getGstMaster = GSTMaster::where('id', '=', $id)->first();
        if ($getGstMaster) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $getGstMaster]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $getGstMaster = GSTMaster::find($id);
        $getGstMaster->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
