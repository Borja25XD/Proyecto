<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookings = [
            [
                'pitch_id' => 1,
                'date' => '2022-04-30', 
                'hour' => '9',
                'owner_name' => 'Pepe',
                'owner_email' => 'pepe@pepe.com'

            ],
            [
                'pitch_id' => 2,
                'date' => '2022-04-30', 
                'hour' => '9',
                'owner_name' => 'Pepe',
                'owner_email' => 'pepe@pepe.com'
            ],
            [
                'pitch_id' => 2,
                'date' => '2022-04-30', 
                'hour' => '10',
                'owner_name' => 'Pepe',
                'owner_email' => 'pepe@pepe.com'
            ]
        ];
        DB::table('bookings')->insert($bookings);
    }
}
