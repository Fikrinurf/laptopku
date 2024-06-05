<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Zaky Maruf',
            'email' => 'marufzaky@gmail.com',
            'password' => '123456',
            'address' => 'Japara',
            'role' => 'buyer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
