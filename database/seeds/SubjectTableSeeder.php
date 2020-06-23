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
                'slug'          => 'wiskunde',
            ],
            [
                'title'         => 'Maatschappijleer',
                'slug'          => 'maatschappijleer',
            ],
            [
                'title'         => 'Economie',
                'slug'          => 'economie',
            ],
            [
                'title'         => 'Aardrijkskunde',
                'slug'          => 'aardrijkskunde',
            ],
            [
                'title'         => 'Frans',
                'slug'          => 'frans',
            ],
            [
                'title'         => 'Sport & Welzijn',
                'slug'          => 'sport-en-welzijn',
            ]
        ]);
    }
}
