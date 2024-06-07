<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'product_name' => 'Acer Swift 2021',
            'desc' => 'ini descripsi',
            'price' => '5.000.000',
            'specification' => 'ini spesifikasi',
            'processor_id' => 2,
            'brand_id' => 2,
            'warranty' => 'Y',
            'img' => '121344.jpg',
            'upload_date' => Carbon::parse('2021-03-30'),

        ]);
    }
}
