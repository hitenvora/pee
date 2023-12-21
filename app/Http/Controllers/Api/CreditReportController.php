<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreditReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            [
                'month' => 'Jan 2023',
                'amount' => '1000',
            ],
            [
                'month' => 'Feb 2023',
                'amount' => '2000',
            ],
            [
                'month' => 'Jun 2023',
                'amount' => '3000',
            ],
            [
                'month' => 'Oct 2023',
                'amount' => '1500',
            ],
        ];

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
