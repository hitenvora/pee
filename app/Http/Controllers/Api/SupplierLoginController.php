<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SupplierLoginController extends Controller
{
    use Authenticatable;

    public function login(Request $request)
    {
        $supplier = Supplier::where('user_name', $request->user_name)->where('password', $request->password)->first();
        if ($supplier) {
            if ($supplier->is_active == 0) {
                return response()->json(['message' => 'Supplier not Active'], 200);
            }
            if (Auth::guard('supplier')->loginUsingId($supplier->id)) {
                $token = Str::random(15);
                $supplier->auth_token = $token;
                $supplier->save();
                return response()->json([
                    'message' => 'Login successful',
                    'status' => 200,
                    'supplier' => $supplier
                ], 200);
            }
            return response()->json(['message' => 'Unauthorized'], 401);
        } else {
            return response()->json(['message' => 'Username Password Invalid'], 401);
        }
    }

    public function logout(Request $request)
    {
        $token = Supplier::where('auth_token', $request->auth_token)->first();
        if ($token) {
            $token->auth_token = '';
            $token->save();
            return response()->json([
                'message' => 'You are Logout',
                'status' => 200,
            ], 200);
        } else {
            return response()->json(['message' => 'You are Auth Token is Null'], 200);
        }
    }
}
