<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
               ['name' => 'admin'],
               ['name' => 'moderator']
            ]
        );

        DB::table('abilities')->insert(
            [
                ['name' => 'edit'],
            ]
        );

        DB::table('ability_role')->insert(
            [
                [
                    'role_id' => 1,
                    'ability_id' => 1
                ],
                [
                    'role_id' => 2,
                    'ability_id' => 1
                ],
            ]
        );
    }
}
