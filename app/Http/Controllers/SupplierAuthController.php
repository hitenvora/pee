<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierAuthController extends Controller
{

    use Authenticatable;

    public function showSupplierLoginForm()
    {
        return view('supplier.supplier-login');
    }

    public function login(Request $request)
    {
        $supplier = Supplier::where('user_name', $request->user_name)->where('password', $request->password)->first();
        if ($supplier) {
            if ($supplier->is_active == 0) {
                return redirect('supplier/login')->with('error', 'Your Supplier is Not Active!');
            }
            if (Auth::guard('supplier')->loginUsingId($supplier->id)) {
                return redirect()->route('supplier.dashboard');
            }
        }
    }

    public function logout()
    {
        Auth::guard('supplier')->logout();
        return redirect('/supplier/login');
    }
}
