<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $roleAdmin = Role::create(["name"    =>  "ADMIN"]);

        // Permission::create([
        //     "name"  =>  "VER SEGURIDAD"
        // ])->syncRoles($roleAdmin);

        // User::create([
        //     'name'=> 'ADMINISTRADOR',
        //     'username'=> 'ADMIN',
        //     'email'=> 'admin@yahoo.com',
        //     'password'=> bcrypt('123456789')
        // ])->assignRole($roleAdmin);
        
        $roleUser = Role::create(["name"    =>  "USER"]);
        $user = User::find(1);
        $user->assignRole($roleUser);
    }
}
