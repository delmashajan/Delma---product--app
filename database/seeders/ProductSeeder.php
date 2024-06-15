<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            
            [
                'category_id'=>'1',
                'name' => 'Mobile',
                'description' => 'Used for Calling , texting'
            ],
            [
                'category_id'=>'1',
                'name' => 'Laptop',
                'description' => 'laptop is a very good prodduct'
            ],

    ]);
    }
}
