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
                'programme_id' => 1,
                'title' => 'Design Patterns',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug' => 'design-patterns',
            ],
            [
                'programme_id' => 1,
                'title' => 'Serious Javascript',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug' => 'serieus-javascript',
            ],
            [
                'programme_id' => 2,
                'title' => 'Ondernemen',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug' => 'ondernemen',
            ],
            [
                'programme_id' => 3,
                'title' => 'Design Thinking',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug' => 'design thinking',
            ]
        ]);
    }
}
