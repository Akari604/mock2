<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_statuses')->insert([
            [
                'status' => '1',
            ],
            [
                'status' => '2',
            ],
            [
                'status' => '3',
            ],
            [
                'status' => '4',
            ],
        ]);
    }
}
