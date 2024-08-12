<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin=Role::firstOrCreate([
            'name'=>'Admin'
        ]);
        $roleCoordinador=Role::firstOrCreate([
            'name'=>'Coordinador'
        ]);
        $roleProfesor=Role::firstOrCreate([
            'name'=>'Profesor'
        ]);

        Permission::firstOrCreate([
            'name'=>'crear malla'
        ]);
        Permission::firstOrCreate([
            'name'=>'ver malla'
        ]);

        $roleAdmin->givePermissionTo('crear malla');
        $roleAdmin->givePermissionTo('ver malla');        
        $roleProfesor->givePermissionTo('ver malla');
    }
}
