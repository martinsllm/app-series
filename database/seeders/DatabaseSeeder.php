<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Permission::firstOrCreate(['name' => 'add series']);
        Permission::firstOrCreate(['name' => 'edit series']);
        Permission::firstOrCreate(['name' => 'remove series']);

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo(['add series', 'edit series', 'remove series']);

        $userRole = Role::firstOrCreate(['name' => 'user']);
        $userRole->givePermissionTo(['add series']);

        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $user = User::factory(10)->create();
        $user->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
