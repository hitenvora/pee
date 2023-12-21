<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('account_masters')->insert([
            [
                'name' => 'Go Gas',
                'group_master_id' => '1',
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
                'name' => 'Bharat Gas',
                'group_master_id' => '1',
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
                'name' => 'Reliance',
                'group_master_id' => '1',
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
                'name' => 'Indane',
                'group_master_id' => '1',
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
                'name' => 'Other',
                'group_master_id' => '1',
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
