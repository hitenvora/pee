<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YearMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class YearMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.year-master');
    }

    public function insert(Request $request)
    {
        if ($request->year_id == '') {
            $rules = [
                'name' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'is_active' => 'required',
            ];
        } else {
            $rules = [
                'name' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ];
        }
        $this->validate($request, $rules);

        if ($request->year_id != '') {
            $yearMaster = YearMaster::find($request->year_id);
            if (!$yearMaster) {
                return response()->json(['status' => 400, 'msg' => 'Year Master details not found!']);
            }
            $yearMaster->updated_by = Auth::user()->id;
            $yearMaster->is_active = $request->is_active;
        } else {
            $yearMaster = new YearMaster();
            $yearMaster->created_by = Auth::user()->id;
        }
        $yearMaster->name = $request->input('name');
        $yearMaster->start_date = $request->input('start_date');
        $yearMaster->end_date = $request->input('end_date');
        $yearMaster->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_year(Request $request)
    {
        $getYearMaster = YearMaster::orderBy('id')->get();

        foreach ($getYearMaster as $key => $record) {
            $id = $record->id;
            if ($record->is_active == 0) {
                $getYearMaster[$key]['active_button'] = '<span class="badge bg-warning">In Active</span>';
            } else {
                $getYearMaster[$key]['active_button'] = '<span class="badge bg-success">Active</span>';
            }
            $getYearMaster[$key]['start_date_view'] = date('d-m-Y', strtotime($record->start_date));
            $getYearMaster[$key]['end_date_view'] = date('d-m-Y', strtotime($record->end_date));
            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editYearMaster(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $getYearMaster[$key]['action'] =  $action;
        }
        return DataTables::of($getYearMaster)
            ->addIndexColumn()
            ->rawColumns(['action', 'active_button', 'start_date_view', 'end_date_view'])
            ->make(true);
    }

    public function year_edit($id)
    {
        $getYearMaster = YearMaster::where('id', '=', $id)->first();
        if ($getYearMaster) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $getYearMaster]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $getYearMaster = YearMaster::find($id);
        $getYearMaster->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
