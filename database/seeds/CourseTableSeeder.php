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
                'slug' => 'wiskunde-basis',
                'title' => 'Wiskunde basis',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'points' => 15
            ],
            [
                'subject_id' => 1,
                'is_unlocked' => false,
                'slug' => 'wiskunde-breuken',
                'title' => 'Wiskunde breuken',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'points' => 30
            ],
            [
                'subject_id' => 2,
                'is_unlocked' => false,
                'slug' => 'wiskunde-decimalen',
                'title' => 'Wiskunde decimalen',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'points' => 30
            ],
        ]);
    }
}
