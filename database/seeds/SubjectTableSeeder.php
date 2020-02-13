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
                'grade_id' => 1,
                'title' => 'Wiskunde',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug' => 'wiskunde',
            ],
            [
                'grade_id' => 1,
                'title' => 'Maatschappijleer',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug' => 'maatschappijleer',
            ],
            [
                'grade_id' => 2,
                'title' => 'Economie',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug' => 'economie',
            ],
            [
                'grade_id' => 3,
                'title' => 'Aardrijkskunde',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug' => 'aardrijkskunde',
            ]
        ]);
    }
}
