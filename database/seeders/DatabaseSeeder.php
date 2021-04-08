<?php

namespace Database\Seeders;

use App\Models\BillingPeriod;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $billingPeriods = [
            ['period' => 'rocne', 'months' => 12],
            ['period' => 'polrocne', 'months' => 6],
            ['period' => 'stvrtrocne', 'months' => 3],
            ['period' => 'mesacne', 'months' => 1]
        ];
        BillingPeriod::insertOnDuplicateKey($billingPeriods);
    }
}
