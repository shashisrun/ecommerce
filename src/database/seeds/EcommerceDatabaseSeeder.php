<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;
use Boldstellar\Ecommerce\database\seeds\CartBreadSeeder;

class EcommerceDatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__ . '/';
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('CartBreadSeeder');
    }
}
