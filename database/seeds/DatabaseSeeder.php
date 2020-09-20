<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        app() [PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'Create Product Post']);
        Permission::create(['name' => 'Edit Product Post']);
        Permission::create(['name' => 'Delete Product Post']);
        Permission::create(['name' => 'Publish Product Post']);
        Permission::create(['name' => 'Unpublish Product Post']);

        $role1 = Role::create(['name' => 'Super Admin']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Writer']);

        $role1->givePermissionTo('Create Product Post');
        $role1->givePermissionTo('Edit Product Post');
        $role1->givePermissionTo('Delete Product Post');
        $role1->givePermissionTo('Publish Product Post');
        $role1->givePermissionTo('Unpublish Product Post');

        $role2->givePermissionTo('Create Product Post');
        $role2->givePermissionTo('Edit Product Post');
        $role2->givePermissionTo('Publish Product Post');
        $role2->givePermissionTo('Unpublish Product Post');

        $role3->givePermissionTo('Create Product Post');
        $role3->givePermissionTo('Edit Product Post');

        $user = Factory(User::class)->create([
            'name' => 'Super Admin',
            'user_name' => 'sadmin',
            'email' => 'admin@salaa.vn',
        ]);

        $user2 = Factory(User::class)->create([
            'name' => 'Admin',
            'user_name' => 'admin',
            'email' => 'user@salaa.vn'
        ]);

        $user->assignRole($role1);
        $user2->assignRole($role2);
    }
}
