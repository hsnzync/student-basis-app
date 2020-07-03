<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user = User::where('id', 3)->first()->id;

        DB::table('user_course')->insert([
            [
                'user_id'       => $default_user,
                'course_id'     => 1,
                'is_completed'  => true
            ],
            [
                'user_id'       => $default_user,
                'course_id'     => 2,
                'is_completed'  => true
            ],
            [
                'user_id'       => $default_user,
                'course_id'     => 3,
                'is_completed'  => true
            ],
            [
                'user_id'       => $default_user,
                'course_id'     => 4,
                'is_completed'  => false
            ],
            [
                'user_id'       => $default_user,
                'course_id'     => 5,
                'is_completed'  => true
            ],
            [
                'user_id'       => $default_user,
                'course_id'     => 6,
                'is_completed'  => false
            ],
            [
                'user_id'       => $default_user,
                'course_id'     => 7,
                'is_completed'  => false
            ]
        ]);
    }
}
