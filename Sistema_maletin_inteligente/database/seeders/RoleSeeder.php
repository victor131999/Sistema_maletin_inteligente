<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Fase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Role1= Role::create(['name'=>'Coordinador']);
        $Role2= Role::create(['name'=>'Rehabilitador']);

        Permission::create(['name'=>'/register'])->assignRole($Role1);
        //Para relacionar mas roles a un permiso es: syncRoles([$Role1,Role2]);
    }
}
