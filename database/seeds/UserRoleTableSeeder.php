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
        $role_id = Role::whereSlug('superadmin')->first()->id;
        $user_id = User::first()->id;

        DB::table('user_role')->insert([
            [
                'user_id' => $user_id,
                'role_id' => $role_id
            ],
        ]);
    }
}
