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
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'Kuningan',
                'role' => 'seller',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'buyer',
                'email' => 'buyer@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'Cirebon',
                'role' => 'buyer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];


        DB::table('users')->insert($data);
    }
}
