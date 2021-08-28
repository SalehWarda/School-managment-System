<?php

namespace Database\Seeders;

use App\Models\Admin;
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

        Admin::create([

            'email' => 'salehwarda6@gmail.com',
            'name' =>'Saleh AbuWarda',
            'password'=> bcrypt("sa403737570sa")
        ]);


        // \App\Models\User::factory(10)->create();
        $this->call(BloodDatabaseSeeder::class);
        $this->call(NationaltileDatabaseSeeder::class);
        $this->call(ReligionsDatabaseSeeder::class);
        $this->call(GenderDatabaseSeeder::class);
        $this->call(SpecializationDatabaseSeeder::class);


    }
}
