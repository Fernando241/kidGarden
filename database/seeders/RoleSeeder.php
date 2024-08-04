<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name'=> 'SuperAdmin']);
        $role2 = Role::create(['name'=> 'Administrador']);
        $role3 = Role::create(['name'=> 'Docente']);
        $role4 = Role::create(['name'=> 'Acudiente']);

        Permission::create(['name' => 'usuarios'])->assignRole($role1);
        Permission::create(['name' => 'valores.edit'])->assignRole($role1);
        Permission::create(['name' => 'valores.create'])->assignRole($role1);
        Permission::create(['name' => 'bancos'])->assignRole([$role1]);
        
        Permission::create(['name' => 'solicitudes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'estudiantes'])->syncRoles([$role1, $role2, ]);
        Permission::create(['name' => 'cursos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'docentes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'matriculas'])->syncRoles([$role1, $role2]);

    }
}
