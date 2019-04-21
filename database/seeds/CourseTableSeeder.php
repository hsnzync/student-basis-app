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
                'subject_id' => 9,
                'is_active' => true,
                'is_completed' => false,
                'is_unlocked' => true,
                'slug' => 'course-1',
                'title' => 'My First Course',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
            ],
            [
                'subject_id' => 9,
                'is_active' => true,
                'is_completed' => false,
                'is_unlocked' => false,
                'slug' => 'course-2',
                'title' => 'My Second Course',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
            ],
        ]);
    }
}
