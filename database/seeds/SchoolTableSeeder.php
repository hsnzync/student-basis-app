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
                'title' => 'Hogeschool Rotterdam',
                'location' => 'Rotterdam',
            ],
            [
                'title' => 'Hogeschool Inholland',
                'location' => 'Rotterdam',
            ],
        ]);
    }
}
