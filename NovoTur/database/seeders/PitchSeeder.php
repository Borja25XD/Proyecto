<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PitchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pitchs = [
            [
                'status' => 'free'
            ],
            [
                'status' => 'taken'
            ],
            [
                'status' => 'unavailable'
            ]
        ];
        DB::table('pitchs')->insert($pitchs);
    }
}
