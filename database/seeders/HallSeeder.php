<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hall')->insert([
            [
                'id' => 1,
                'name' => 'Grand Ballroom',
                'location' => 'Downtown',
                'owner_id' => 1,
                'booking_price' => 5000,
                'capacity' => 200,
                'is_available' => true,
                'hall_type' => 'Wedding',
            ],
            [   'id' => 2,
                'name' => 'Conference Hall',
                'location' => 'Uptown',
                'owner_id' => 2,
                'booking_price' => 3000,
                'capacity' => 150,
                'is_available' => true,
                'hall_type' => 'Conference',
            ],
        ]);
    }
    
    
        
    
    
    
    
    


}
