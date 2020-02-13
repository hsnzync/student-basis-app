<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            [
                'email'             => 'super@admin.com',
                'password'          => bcrypt('0000'),
                'experience_points' => 100
            ],
        ]);
    }
}
