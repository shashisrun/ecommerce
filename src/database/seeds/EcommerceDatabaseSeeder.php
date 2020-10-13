<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

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
        $this->seed(CartBreadSeed::class);
        $this->seed(ProductBreadSeed::class);
    }
}
