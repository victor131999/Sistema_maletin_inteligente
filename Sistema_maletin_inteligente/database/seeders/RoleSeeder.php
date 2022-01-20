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

        Permission::create(['name'=>'/'])->assignRole($Role1);

        Permission::create(['name'=>'users.index'])->assignRole($Role1);
        Permission::create(['name'=>'users.create'])->assignRole($Role1);
        Permission::create(['name'=>'users.edit'])->assignRole($Role1);
        Permission::create(['name'=>'users.destroy'])->assignRole($Role1);

        Permission::create(['name'=>'actividad.index'])->syncRoles([$Role1,$Role2]);
        Permission::create(['name'=>'actividad.create'])->syncRoles([$Role1,$Role2]);
        Permission::create(['name'=>'actividad.edit'])->syncRoles([$Role1]);
        Permission::create(['name'=>'actividad.destroy'])->syncRoles([$Role1]);

        Permission::create(['name'=>'anciano.index'])->syncRoles([$Role1,$Role2]);
        Permission::create(['name'=>'anciano.create'])->syncRoles([$Role1,$Role2]);
        Permission::create(['name'=>'anciano.edit'])->syncRoles([$Role1,$Role2]);
        Permission::create(['name'=>'anciano.destroy'])->syncRoles([$Role1]);


        //Para relacionar mas roles a un permiso es: syncRoles([$Role1,$Role2]);
    }
}
