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
                'hex' => '#D37B7B',
                'points' => 150
            ],
            [
                'subject_id' => 1,
                'slug' => 'breuken',
                'title' => 'Breuken',
                'hex' => '#7BAED3',
                'points' => 100
            ],
            [
                'subject_id' => 1,
                'slug' => 'procenten',
                'title' => 'Procenten',
                'hex' => '#7BD3A9',
                'points' => 120
            ],
            [
                'subject_id' => 2,
                'slug' => 'introductie',
                'title' => 'Introductie',
                'hex' => '#D3D07B',
                'points' => 100
            ],
            [
                'subject_id' => 2,
                'slug' => 'kennis-van-zaken',
                'title' => 'Kennis van zaken',
                'hex' => '#AD7BD3',
                'points' => 120
            ],
            [
                'subject_id' => 3,
                'slug' => 'begroting',
                'title' => 'Begroting',
                'hex' => '#9AA39C',
                'points' => 200
            ],
        ]);
    }
}
