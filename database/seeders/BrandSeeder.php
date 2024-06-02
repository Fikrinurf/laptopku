<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('brands')->insert([
            'brand_name' => 'Acer',
            'country' => 'Taiwan',
            'founder' => 'Stan Shih, Carolyn Yeh',
            'founded_place' => 'Hsinchu, Taiwan',
            'founded_date' => Carbon::parse('2021-03-30'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
