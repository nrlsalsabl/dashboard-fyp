<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     */
    public function run(): void
    {
        // app()[PermissionRegistrar::class]->forgetCachedPermisions();

        $permissions = ['view spendings', 'create spendings', 'edit spendings', 'delete spendings', 'view earnings', 'create earnings', 'edit earnings', 'delete earnings', 'view users', 'create users', 'edit users', 'delete users', 'view data', 'create data', 'edit data', 'delete data', 'import data', 'export data', 'view dashboard'];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminPermissions = ['view data', 'create data', 'edit data'];
        $role1 = Role::create(['name' => 'admin']);
        foreach ($adminPermissions as $permission) {
            $role1->givePermissionTo($permission);
        }

        $superAdminPermissions = ['view dashboard', 'view spendings', 'create spendings', 'view earnings', 'create earnings', 'view users', 'create users', 'view data', 'create data', 'edit data', 'edit data'];
        $role2 = Role::create(['name' => 'super-admin']);
        foreach ($superAdminPermissions as $permission) {
            $role2->givePermissionTo($permission);
        }

        $role3 = Role::create(['name' => 'master']);
        
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'photo' => 'images/default-profile-picture.jpg'
        ]);
        $user->assignRole($role1);

        $user = User::factory()->create([
            'name' => 'super admin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'photo' => 'images/default-profile-picture.jpg'
        ]);
        $user->assignRole($role2);

        $user = User::factory()->create();
        $user->assignRole($role3);
    }
}
