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

        //buat akun super admin---------------------------------------
        $super_admin = User::firstOrCreate([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'foto_profil' => null,
            'gender' => 'pria',
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Asia Afrika'
        ]);

        $sample_umkm = User::firstOrCreate([
            'name' => 'Sample UMKM',
            'email' => 'umkm@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'foto_profil' => null,
            'gender' => 'pria',
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Asia Afrika'
        ]);
        
        $sample_inves = User::firstOrCreate([
            'name' => 'Sample Investor',
            'email' => 'investor@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'foto_profil' => null,
            'gender' => 'pria',
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Asia Afrika'
        ]);


        //akses------------------------------------------------------------
        $roleMasterAdmin->givePermissionTo([$permission, $permission2, $permission3, $permission4]);
        $roleAdmin->givePermissionTo($permission2);
        $roleUmkm->givePermissionTo($permission3);
        $roleInvestor->givePermissionTo($permission4);

        // user db---------------------------------------------------
        $user = User::find(1);
        $user->assignRole(['Master Admin']);

        $user1 = User::find(2);
        $user1->assignRole(['Umkm']);

        $user2 = User::find(3);
        $user2->assignRole(['Investor']);

    }
}
