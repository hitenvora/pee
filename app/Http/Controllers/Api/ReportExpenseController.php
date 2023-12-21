<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            [
                'month' => 'Jan 2023',
                'amount' => '12000',
            ],
            [
                'month' => 'Feb 2023',
                'amount' => '20000',
            ],
            [
                'month' => 'Jun 2023',
                'amount' => '35000',
            ],
            [
                'month' => 'Oct 2023',
                'amount' => '10500',
            ],
            [
                'month' => 'Dec 2023',
                'amount' => '25000',
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
