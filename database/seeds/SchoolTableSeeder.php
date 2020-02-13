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
                'title'     => 'Wolfert College',
                'slug'      => 'wolfert-college',
                'location'  => 'Rotterdam',
                'is_active' => true
            ],
            [
                'title'     => 'Lentiz Geuzencollege',
                'slug'      => 'lentiz-geuzencollege',
                'location'  => 'Maassluis',
                'is_active' => true
            ],
        ]);
    }
}
