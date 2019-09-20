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
                'title'     => 'Hogeschool Rotterdam',
                'slug'      => 'hogeschool-rotterdam',
                'location'  => 'Rotterdam',
                'is_active' => true
            ],
            [
                'title'     => 'Hogeschool Inholland',
                'slug'      => 'hogeschool-inholland',
                'location'  => 'Rotterdam',
                'is_active' => true
            ],
        ]);
    }
}
