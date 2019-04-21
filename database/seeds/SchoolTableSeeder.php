<?php

use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school')->insert([
            [
                'is_active' => true,
                'title' => 'Rotterdam University of Applied Sciences',
                'location' => 'Rotterdam',
                'slug' => 'hro'
            ],
            [
                'is_active' => true,
                'title' => 'University of Amsterdam',
                'location' => 'Amsterdam',
                'slug' => 'uva'
            ],
        ]);
    }
}
