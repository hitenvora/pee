<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\State;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{
    public function index()
    {
        $state = State::orderBy('id')->get();
        $company = Company::orderBy('id')->get();
        return view('admin.company', compact('state', 'company'));
    }

    public function insert(Request $request)
    {
        if ($request->company_id == '') {
            $rules = [
                'company_name' => 'required',
                'gst_no' => 'required',
                'mobile' => 'required|numeric|min:10',
                'contact_person_name' => 'required',
                'city' => 'required',
                'state_id' => 'required',
                'address' => 'nullable',
                'pin_code' => 'nullable|numeric|digits:6',
            ];
        } else {
            $rules = [
                'company_name' => 'required',
                'gst_no' => 'required',
                'mobile' => 'required|numeric|min:10',
                'contact_person_name' => 'required',
                'city' => 'required',
                'state_id' => 'required',
                'address' => 'nullable',
                'pin_code' => 'nullable|numeric|digits:6',
            ];
        }
        $this->validate($request, $rules);

        if ($request->company_id != '') {
            $company = Company::find($request->company_id);
            if (!$company) {
                return response()->json(['status' => 400, 'msg' => 'Company details not found!']);
            }
        } else {
            $company = new Company();
        }
        $company->company_name = $request->input('company_name');
        $company->gst_no = $request->input('gst_no');
        $company->mobile = $request->input('mobile');
        $company->contact_person_name = $request->input('contact_person_name');
        $company->city = $request->input('city');
        $company->state_id = $request->input('state_id');
        $company->address = $request->input('address');
        $company->pin_code = $request->input('pin_code');
        $company->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_company(Request $request)
    {
        $get_company = Company::orderBy('id', 'desc')->get();

        foreach ($get_company as $key => $record) {
            $get_company[$key]['state_name'] =  $record->state->name;
            $id = $record->id;
            $action = '<button type="button" class="btn btn-primary btn-sm mr-1" onclick="editCompany(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $get_company[$key]['action'] =  $action;
        }
        return DataTables::of($get_company)
            ->addIndexColumn()
            ->rawColumns(['action', 'state_name'])
            ->make(true);
    }

    public function company_edit($id)
    {
        $get_company = Company::where('id', '=', $id)->first();
        if ($get_company) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $get_company]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function update(Request $request)
    {
        $rules = [
            'company_name' => 'required',
            'gst_no' => 'required',
            'mobile' => 'required|numeric|min:10',
            'contact_person_name' => 'required',
            'city' => 'required',
            'state_id' => 'required',
            'address' => 'nullable',
            'pin_code' => 'nullable|numeric|min:6',
        ];

        $this->validate($request, $rules);

        $company = Company::find($request->input('id'));
        $company->company_name = $request->input('company_name');
        $company->gst_no = $request->input('gst_no');
        $company->mobile = $request->input('mobile');
        $company->contact_person_name = $request->input('contact_person_name');
        $company->city = $request->input('city');
        $company->state_id = $request->input('state_id');
        $company->address = $request->input('address');
        $company->pin_code = $request->input('pin_code');
        $company->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $company = Company::find($id);
        $company->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
