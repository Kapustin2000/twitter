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
         //$this->call(RolesSeeder::class);

        factory(App\Models\User::class, 5)->create()->each(function($user) {
            $user->tweets()->saveMany(factory(App\Models\Tweet::class, 10)->make());

            $user->views()->saveMany(factory(App\Models\Traffic::class, 10)->make());

            $user->followers()->sync(
                 App\Models\User::all()->random(3)->pluck('id')
            );

            $user->follows()->sync(
                App\Models\User::all()->random(3)->pluck('id')
            );
        });
        
    }
}
