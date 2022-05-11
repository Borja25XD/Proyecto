<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PitchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pitches = [
            [
                'status' => 'available',
            ],
            [
                'status' => 'available'
            ],
            [
                'status' => 'unavailable'
            ]
        ];
        DB::table('pitches')->insert($pitches);
    }
}
