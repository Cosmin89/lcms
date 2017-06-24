<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'subscriber';
        $role_user->description = 'A simple user';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'admin';
        $role_user->description = 'An administrator';
        $role_user->save();
    }
}
