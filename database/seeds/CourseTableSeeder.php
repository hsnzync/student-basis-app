<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course')->insert([
            [
                'subject_id' => 1,
                'is_unlocked' => true,
                'slug' => 'introductie',
                'title' => 'Introductie',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'points' => 30
            ],
            [
                'subject_id' => 1,
                'is_unlocked' => false,
                'slug' => 'theorie',
                'title' => 'Theorie',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'points' => 70
            ],
            [
                'subject_id' => 2,
                'is_unlocked' => false,
                'slug' => 'introductie',
                'title' => 'Introductie',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'points' => 20
            ],
        ]);
    }
}
