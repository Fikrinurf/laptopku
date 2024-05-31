<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProcessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('processors')->insert([
            'name' => 'Intel Core i9-11900K',
            'brand' => 'INTEL',
            'generation' => '11th',
            'core' => '8',
            'thread' => '16',
            'release_date' => Carbon::parse('2021-03-30'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
