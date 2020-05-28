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
         $this->call(RolesSeeder::class);

        factory(App\Models\User::class, 5)->create()->each(function($user) {
            $user->tweets()->saveMany(factory(App\Models\Tweet::class, 10)->make());
        });
        
    }
}
