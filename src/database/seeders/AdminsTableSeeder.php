<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'email' => 'admin@example.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'email' => 'test@example.com',
                'password' => bcrypt('test1234'),
            ],
            [
                'email' => 'user@example.com',
                'password' => bcrypt('user1234'),
            ],
            [
                'email' => 'email@example.com',
                'password' => bcrypt('email123'),
            ],
            [
                'email' => 'dmain@example.com',
                'password' => bcrypt('dmain123'),
            ],
        ]);
    }
}
