<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            [
                'name' => 'Beschikbaar',
                'slug' => 'available'
            ],
            [
                'name' => 'Bezig',
                'slug' => 'in-progress'
            ],
            [
                'name' => 'Voltooid',
                'slug' => 'done'
            ]
        ]);
    }
}
