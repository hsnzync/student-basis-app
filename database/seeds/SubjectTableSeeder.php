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
                'title'         => 'Wiskunde',
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug'          => 'wiskunde',
            ],
            [
                'title'         => 'Maatschappijleer',
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug'          => 'maatschappijleer',
            ],
            [
                'title'         => 'Economie',
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug'          => 'economie',
            ],
            [
                'title'         => 'Aardrijkskunde',
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug'          => 'aardrijkskunde',
            ]
        ]);
    }
}
