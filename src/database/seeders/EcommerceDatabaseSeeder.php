<?php

use Illuminate\Database\Seeder;
use Boldstellar\Ecommerce\database\seeds\CartBreadSeeder;

class EcommerceDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CartBreadSeeder::class);
    }
}
