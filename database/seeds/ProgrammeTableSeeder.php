<?php

use Illuminate\Database\Seeder;

class ProgrammeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programme')->insert([
            [
                'school_id' => 1,
                'title' => 'HRO Programme 1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug' => 'hro-programme-1'
            ],
            [
                'school_id' => 1,
                'title' => 'HRO Programme 2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug' => 'hro-programme-2'
            ],
            [
                'school_id' => 2,
                'title' => 'UVA Programme 1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug' => 'uva-programme-1'
            ],
            [
                'school_id' => 2,
                'title' => 'UVA Programme 2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
                'slug' => 'uva-programme-2'
            ]
        ]);
    }
}
