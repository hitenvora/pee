<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('account_masters')->insert([
            [
                'name' => 'Supplier 1',
                'group_master_id' => '3',
                'opening_balance' => '00',
                'credit_limit' => '00',
                'address' => 'surat',
                'city' => 'surat',
                'gst_no' => '123654',
                'contact_person' => 'abc',
                'mobile_no' => '1234567890',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Supplier 2',
                'group_master_id' => '3',
                'opening_balance' => '00',
                'credit_limit' => '00',
                'address' => 'surat',
                'city' => 'surat',
                'gst_no' => '123654',
                'contact_person' => 'abc',
                'mobile_no' => '1234567890',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
