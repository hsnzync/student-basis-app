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
                'title' => 'Mediatechnologie',
                'slug' => 'mediatechnologie'
            ],
            [
                'school_id' => 1,
                'title' => 'Communicatie',
                'slug' => 'communicatie'
            ],
            [
                'school_id' => 2,
                'title' => 'Integrale Veiligheid',
                'slug' => 'integrale-veiligheid'
            ],
            [
                'school_id' => 2,
                'title' => 'Stedenbouwkunde',
                'slug' => 'stedenbouwkunde'
            ]
        ]);
    }
}
