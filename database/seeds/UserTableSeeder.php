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
                'username' => 'superadmin',
                'student_number' => null,
                'email' => 'admin@hotmail.com',
                'level' => 0,
                'role' => 0,
                'password' => bcrypt('0000'),
            ]
        ]);
    }
}
