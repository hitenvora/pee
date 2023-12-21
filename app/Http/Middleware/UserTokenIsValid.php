<?php

namespace App\Http\Middleware;

use App\Models\AccountMaster;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $header = $request->header('Authorization');
        if ($header == '') {
            return response()->json([
                'message' => 'Invalid authorization header',
                'status' => 498,
            ], 498);
        }
        $AccountMaster = AccountMaster::where('auth_token', $header)->first();
        if (!$AccountMaster) {
            return response()->json([
                'message' => 'Invalid authorization header',
                'status' => 498,
            ], 498);
        }
        $request->auth_user_id = $AccountMaster->id;
        return $next($request);
    }
}
