<?php

namespace App\Http\Controllers;

use App\Models\YearMaster;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    use Authenticatable;

    public function showLoginForm()
    {
        $YearMaster = YearMaster::where('is_active', 1)->orderBy('start_date', 'desc')->get();
        return view('admin.login', compact('YearMaster'));
    }

    public function login(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
            'year' => 'required',
        ];
        $this->validate($request, $rules);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            Session::put('year_master_id', $request->year);
            return redirect()->route('index');
        }

        return back()->withErrors(['error' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
