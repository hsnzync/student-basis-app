<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\School;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_school = School::whereSlug('wolfert-college')->first()->id;

        DB::table('user')->insert([
            [
                'first_name'        => 'Superadmin',
                'last_name'         => 'Doe',
                'short_name'        => 'SD',
                'email'             => 'my@superadmin.com',
                'password'          => bcrypt('0000'),
                'experience_points' => null,
                'student_number'    => null
            ],
            [
                'first_name'        => 'Frans',
                'last_name'         => 'Kooij',
                'short_name'        => 'FK',
                'email'             => 'frans.kooij@hotmail.com',
                'password'          => bcrypt('0000'),
                'experience_points' => null,
                'student_number'    => null
            ],
            [
                'first_name'        => 'Hasan',
                'last_name'         => 'Ozaynaci',
                'short_name'        => 'HO',
                'email'             => 'hsnzync_@hotmail.com',
                'password'          => bcrypt('0000'),
                'experience_points' => 150,
                'student_number'    => '0892980',
                'school_id'         => default_school
            ],
        ]);
    }
}
