<?php

use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject')->insert([
            [
                'programme_id' => 4,
                'is_active' => true,
                'slug' => 'subject-1',
                'title' => 'Subject 1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
            ],
            [
                'programme_id' => 6,
                'is_active' => true,
                'slug' => 'subject-2',
                'title' => 'Subject 1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
            ]
        ]);
    }
}
