<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exchange;
class ExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Creating Exchange names
        Exchange::insert(
        	['name' => 'Coin gecko', 'created_at' => now(), 'updated_at' => now()]
		);
    }
}
