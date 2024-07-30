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

        Permission::create(['name' => 'panelAdmin'])->assignRole($role1);

        Permission::create(['name' => 'admin.users.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.update'])->assignRole($role1);

        Permission::create(['name' => 'solicitudes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Estudianes'])->syncRoles([$role1, $role2, ]);
        Permission::create(['name' => 'Cursos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Docentes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Matriculas'])->syncRoles([$role1, $role2]);

        
        
    }
}
