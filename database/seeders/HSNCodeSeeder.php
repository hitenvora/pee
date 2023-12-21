<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HSNCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hsn_codes')->insert([
            [
                'hsn_code' => '27111900',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'hsn_code' => '27111900',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'hsn_code' => '84729099',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
