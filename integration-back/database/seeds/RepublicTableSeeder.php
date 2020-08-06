<?php

use Illuminate\Database\Seeder;
use App\Republic;

class RepublicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (App\Republic::class, 5)->create();
    }
}
