<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            [
                'name' => 'Author 1',
                'email' => 'author1@example.com',
            ],
            [
                'name' => 'Author 2',
                'email' => 'author2@example.com',
            ],
        ]);
    }
}
