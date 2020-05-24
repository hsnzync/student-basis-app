<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            SchoolTableSeeder::class,
            SubjectTableSeeder::class,
            CourseTableSeeder::class,
            RoleTableSeeder::class,
            UserRoleTableSeeder::class
        ]);
    }
}
