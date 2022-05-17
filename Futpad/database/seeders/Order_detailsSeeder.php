<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Order_detailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        $order_details = [
            [
                'order_id'      =>  1,
                'product_id'    =>  2,
                'price'         =>  8,
                'quantity'      =>  2, 
                
            ],
            [
                'order_id'      =>  1,
                'product_id'    =>  4,
                'price'         =>  5,
                'quantity'      =>  3,
            ],
            [
                'order_id'      =>  1,
                'product_id'    =>  6,
                'price'         =>  2,
                'quantity'      =>  1,
            ]
        ];
        DB::table('order_details')->insert($order_details);
    }
}
