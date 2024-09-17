<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // update atau create role-----------------------------
        $roleSuperAdmin = Role::updateOrCreate(
            ['name' => 'superAdmin'],
            ['name' => 'superAdmin']
        );

        $roleAdmin = Role::updateOrCreate(
            ['name' => 'admin'],
            ['name' => 'admin']
        );

        $roleInvestor = Role::updateOrCreate(
            ['name' => 'investor'],
            ['name' => 'investor']
        );

        $roleUmkm = Role::updateOrCreate(
            ['name' => 'umkm'],
            ['name' => 'umkm']
        );

        //halaman----------------------------------------
        $permission = Permission::updateOrCreate(
            ['name' => 'view_masterAdmin'],
            ['name' => 'view_masterAdmin']
        );

        $permission2 = Permission::updateOrCreate(
            ['name' => 'view_admin'],
            ['name' => 'view_admin']
        );

        $permission3 = Permission::updateOrCreate(
            ['name' => 'view_umkm'],
            ['name' => 'view_umkm']
        );

        $permission4 = Permission::updateOrCreate(
            ['name' => 'view_investor'],
            ['name' => 'view_investor']
        );



        //akses------------------------------------------------------------
        $roleSuperAdmin->givePermissionTo([$permission, $permission2, $permission3, $permission4]);
        $roleAdmin->givePermissionTo([$permission2, $permission4]);
        $roleUmkm->givePermissionTo($permission3);
        $roleUmkm->givePermissionTo($permission3);
        $roleInvestor->givePermissionTo($permission4);



        // user db---------------------------------------------------
        $user  = User::find(1);
        $user2 = User::find(2);
        $user3 = User::find(3);
        $user4 = User::find(4);

        $user->assignRole(['superAdmin']);
        $user2->assignRole(['admin']);
        $user3->assignRole(['umkm']);//ini diambil dari name di variabel roleUmkm
        $user4->assignRole(['investor']);

    }
}
