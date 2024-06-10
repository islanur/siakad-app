<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage courses']);
        Permission::create(['name' => 'view grades']);
        Permission::create(['name' => 'edit grades']);
        Permission::create(['name' => 'publish announcements']);
        Permission::create(['name' => 'view schedules']);
        Permission::create(['name' => 'edit schedules']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        Role::create(['name' => 'ketua']);
        Role::create(['name' => 'kaprodi']);
        Role::create(['name' => 'baak']);
        Role::create(['name' => 'staf']);
        Role::create(['name' => 'guest']);

        $dosen = Role::create(['name' => 'dosen']);
        $dosen->givePermissionTo(['view grades', 'edit grades', 'view schedules']);

        $mahasiswa = Role::create(['name' => 'mahasiswa']);
        $mahasiswa->givePermissionTo(['view grades', 'view schedules']);
    }
}
