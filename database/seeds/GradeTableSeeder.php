<?php

use Illuminate\Database\Seeder;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grade')->insert([
            [
                'title' => 'VMBO',
                'slug' => 'vmbo',
                'is_active' => true
            ],
            [
                'title' => 'HAVO',
                'slug' => 'havo',
                'is_active' => true
            ],
            [
                'title' => 'VWO',
                'slug' => 'vwo',
                'is_active' => true
            ]
        ]);
    }
}
