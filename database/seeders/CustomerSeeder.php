<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert([
            [
                'id' => 1,
                'name' => 'Test User',
                'no_of_halls_booked' => 0,
                'phone_No' => '+921234567890',
                'address' => 'Rahatabad St 10',
            ],
        ]);
    }
}
