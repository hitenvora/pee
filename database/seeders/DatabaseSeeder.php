<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
        ]);

        $this->call([
            GroupMasterSeeder::class,
        ]);

        $this->call([
            StateSeeder::class,
        ]);

        $this->call([
            HSNCodeSeeder::class,
        ]);

        $this->call([
            AccountMasterSeeder::class,
        ]);

        $this->call([
            CustomerSeeder::class,
        ]);

        $this->call([
            SupplierSeeder::class,
        ]);

        $this->call([
            BankAccountSeeder::class,
        ]);

        $this->call([
            FixedAssetsSeeder::class,
        ]);

        $this->call([
            YearMasterSeeder::class,
        ]);
    }
}
