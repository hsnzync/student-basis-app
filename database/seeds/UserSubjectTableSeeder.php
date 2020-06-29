<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Status;

class UserSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user = User::where('id', 3)->first()->id;
        $status_available = Status::whereSlug('available')->first()->id;
        $status_in_progress = Status::whereSlug('in-progress')->first()->id;
        $status_done = Status::whereSlug('done')->first()->id;

        DB::table('user_subject')->insert([
            [
                'user_id'       => $default_user,
                'subject_id'    => 1,
                'status_id'     => $status_available,
                'is_completed'  => false
            ],
            [
                'user_id'       => $default_user,
                'subject_id'    => 2,
                'status_id'     => $status_in_progress,
                'is_completed'  => false
            ],
            [
                'user_id'       => $default_user,
                'subject_id'    => 3,
                'status_id'     => $status_done,
                'is_completed'  => true
            ],
            [
                'user_id'       => $default_user,
                'subject_id'    => 4,
                'status_id'     => $status_available,
                'is_completed'  => false
            ],
            [
                'user_id'       => $default_user,
                'subject_id'    => 5,
                'status_id'     => $status_available,
                'is_completed'  => false
            ],
            [
                'user_id'       => $default_user,
                'subject_id'    => 6,
                'status_id'     => $status_in_progress,
                'is_completed'  => true
            ]
        ]);
    }
}
