<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin_role_id = Role::whereSlug('superadmin')->first()->id;
        $teacher_role_id = Role::whereSlug('teacher')->first()->id;
        $student_role_id = Role::whereSlug('student')->first()->id;

        DB::table('user_role')->insert([
            [
                'user_id' => 1,
                'role_id' => $superadmin_role_id
            ],
            [
                'user_id' => 2,
                'role_id' => $teacher_role_id
            ],
            [
                'user_id' => 3,
                'role_id' => $student_role_id
            ]
        ]);
    }
}
