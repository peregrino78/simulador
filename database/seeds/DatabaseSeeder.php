<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ConfigsTableseeder::class);

        $this->call(OperationTypesTableSeeder::class);
        $this->call(statesTableSeeder::class);
        $this->call(citiesTableSeeder::class);
    }
}
