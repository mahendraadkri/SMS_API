<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class message extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bulk_sms')->insert([

            ['number' => '9865321456', 'message' => 'Hello! This is a test message.', 'created_at' => now(), 'updated_at' => now()],

            ['number' => '9876543210', 'message' => 'This is another test message.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
