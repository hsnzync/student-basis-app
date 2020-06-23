<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course')->insert([
            [
                'subject_id' => 1,
                'slug' => 'wiskunde-basis',
                'title' => 'Wiskunde basis',
                'points' => 150
            ],
            [
                'subject_id' => 1,
                'slug' => 'breuken',
                'title' => 'Breuken',
                'points' => 100
            ],
            [
                'subject_id' => 1,
                'slug' => 'procenten',
                'title' => 'Procenten',
                'points' => 120
            ],
            [
                'subject_id' => 2,
                'slug' => 'introductie',
                'title' => 'Introductie',
                'points' => 100
            ],
            [
                'subject_id' => 2,
                'slug' => 'kennis-van-zaken',
                'title' => 'Kennis van zaken',
                'points' => 120
            ],
            [
                'subject_id' => 3,
                'slug' => 'begroting',
                'title' => 'Begroting',
                'points' => 200
            ],
        ]);
    }
}
