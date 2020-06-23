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
                'first_name'        => 'Superadmin',
                'last_name'         => 'Doe',
                'short_name'        => 'SD',
                'email'             => 'super@admin.com',
                'password'          => bcrypt('1234567890'),
                'experience_points' => null,
                'student_number'    => null
            ],
            [
                'first_name'        => 'Frans',
                'last_name'         => 'Kooij',
                'short_name'        => 'FK',
                'email'             => 'frans.kooij@hotmail.com',
                'password'          => bcrypt('1234567890'),
                'experience_points' => null,
                'student_number'    => null
            ],
            [
                'first_name'        => 'Hasan',
                'last_name'         => 'Ozaynaci',
                'short_name'        => 'HO',
                'email'             => 'hsnzync@hotmail.com',
                'password'          => bcrypt('1234567890'),
                'experience_points' => 150,
                'student_number'    => '0892980'
            ],
        ]);
    }
}
