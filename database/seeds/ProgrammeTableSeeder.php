<?php

use Illuminate\Database\Seeder;
use App\Models\School;

class ProgrammeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hro_id = School::whereSlug('hogeschool-rotterdam')->first()->id;
        $inh_id = School::whereSlug('hogeschool-inholland')->first()->id;

        DB::table('programme')->insert([
            [
                'school_id' => $hro_id,
                'title' => 'Mediatechnologie',
                'slug' => 'mediatechnologie'
            ],
            [
                'school_id' => $hro_id,
                'title' => 'Communicatie',
                'slug' => 'communicatie'
            ],
            [
                'school_id' => $inh_id,
                'title' => 'Integrale Veiligheid',
                'slug' => 'integrale-veiligheid'
            ],
            [
                'school_id' => $inh_id,
                'title' => 'Stedenbouwkunde',
                'slug' => 'stedenbouwkunde'
            ]
        ]);
    }
}
