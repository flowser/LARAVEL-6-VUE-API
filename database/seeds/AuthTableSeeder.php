<?php



use Illuminate\Database\Seeder;

class AuthTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $this->truncateMultiple([
            config('permission.table_names.model_has_permissions'),
            config('permission.table_names.model_has_roles'),
            config('permission.table_names.role_has_permissions'),
            config('permission.table_names.permissions'),
            config('permission.table_names.roles'),
            'users',

        ]);


        $this->call(PermissionRolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CountiesTableSeeder::class);
        $this->call(ConstituenciesTableSeeder::class);
        $this->call(WardsTableSeeder::class);
        $this->call(PostalcodesTableSeeder::class);
        $this->call(GendersTableSeeder::class);
        $this->enableForeignKeys();
    }
}
