<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HallOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hall_owner')->insert([
            [
                'id' => 1,
                'name' => 'Suleman Shah',
                'phone_No' => '+921234567890',
                'address' => 'Rahatabad St 10',
            ],
            [
                'id' => 2,
                'name' => 'Shayan Khan',
                'phone_No' => '+921234567890',
                'address' => 'Phase 5 Hayatabad',
            ],
        ]);
    }
}
