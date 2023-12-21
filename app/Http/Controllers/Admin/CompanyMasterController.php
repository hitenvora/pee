<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyMaster;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CompanyMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.company-master');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert(Request $request)
    {
        if ($request->company_id == '') {
            $rules = [
                'name' => 'required',
            ];
        } else {
            $rules = [
                'name' => 'required',
            ];
        }
        $this->validate($request, $rules);

        if ($request->company_master_id != '') {
            $companyMaster = CompanyMaster::find($request->company_master_id);
            if (!$companyMaster) {
                return response()->json(['status' => 400, 'msg' => 'Company Master details not found!']);
            }
        } else {
            $companyMaster = new CompanyMaster();
        }
        $companyMaster->company_name = $request->input('name');
        $companyMaster->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function get_company_master(Request $request)
    {
        $getcompanyMaster = CompanyMaster::orderBy('id')->get();

        foreach ($getcompanyMaster as $key => $record) {
            $id = $record->id;
            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editCompanyMaster(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $getcompanyMaster[$key]['action'] =  $action;
        }
        return DataTables::of($getcompanyMaster)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyMaster $companyMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $CompanyMaster = CompanyMaster::where('id', '=', $id)->first();
        if ($CompanyMaster) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $CompanyMaster]);
        }
        return response()->json(['status' => '200', 'msg' => 'failed'], 400);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyMaster $companyMaster)
    {
        //
    }


    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $get_hsnCode = CompanyMaster::find($id);
        $get_hsnCode->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
