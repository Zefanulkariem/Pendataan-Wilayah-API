<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // update atau create role-----------------------------
        $roleMasterAdmin = Role::updateOrCreate(
            ['name' => 'Master Admin'],
            ['name' => 'Master Admin']
        );

        $roleAdmin = Role::updateOrCreate(
            ['name' => 'Admin'],
            ['name' => 'Admin']
        );

        $roleUmkm = Role::updateOrCreate(
            ['name' => 'Umkm'],
            ['name' => 'Umkm']
        );

        $roleInvestor = Role::updateOrCreate(
            ['name' => 'Investor'],
            ['name' => 'Investor']
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
        //buat akun master admin---------------------------------------
        $super_admin = User::firstOrCreate(
            ['email' => 'masteradmin@gmail.com'],
            [
                'name' => 'Master Admin',
                'email_verified_at' => now(),
                'password' => Hash::make('rahasia123'),
            ]
        );
        


        //akses------------------------------------------------------------
        $roleMasterAdmin->givePermissionTo([$permission, $permission2, $permission3, $permission4]);
        $roleAdmin->givePermissionTo($permission2);
        $roleUmkm->givePermissionTo($permission3);
        $roleInvestor->givePermissionTo($permission4);

        // user db---------------------------------------------------
        $user = User::find(1);

        $user->assignRole(['Master Admin']);

    }
}
