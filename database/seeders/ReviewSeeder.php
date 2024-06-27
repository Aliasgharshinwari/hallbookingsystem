<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review')->insert([
            [
                'id' => 1,
                'customer_id' => 1,
                'hall_id' => 1,
                'title' => 'Great Experience',
                'body' => 'The hall was excellent and the service was great.',
            ],
          
        ]);
    }
}
