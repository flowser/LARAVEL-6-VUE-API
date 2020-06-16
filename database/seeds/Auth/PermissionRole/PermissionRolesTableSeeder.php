<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRolesTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        Permission::create(['name' => 'View']);
        Permission::create(['name' => 'Create']);
        Permission::create(['name' => 'Edit']);
        Permission::create(['name' => 'Delete']);
        Permission::create(['name' => 'Disable']);


        // Create Roles
        //   organisation
        $superadmin    = Role::create(['name' => 'Superadmin']);
        $admin         = Role::create(['name' => 'Admin']);
        $client        = Role::create(['name' => 'Client']);

        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $superadmin->givePermissionTo(
            'View',
            'Create',
            'Edit',
            'Delete',
            'Disable'
        );
        //admin
        $admin->givePermissionTo(
            'View',
            'Create',
            'Edit',
            'Delete',
            'Disable'
        );
        $this->enableForeignKeys();
    }
}
