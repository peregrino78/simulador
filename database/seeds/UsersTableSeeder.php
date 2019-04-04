<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$userRole 			= Role::where('name', '=', 'User')->first();
		$adminRole 			= Role::where('name', '=', 'Administrator')->first();
		$masterRole 		= Role::where('name', '=', 'Master')->first();
		$permissions 		= Permission::all();

  	    /**
  	     * Add Users
  	     *
	       */
        if (User::where('email', '=', 'master@admin.com')->first() === null) {

	        $newUser = User::create([
	            'name' => 'Master',
	            'email' => 'master@admin.com',
	            'password' => bcrypt('password'),
	        ]);

	        $newUser->attachRole($masterRole);
    			foreach ($permissions as $permission) {
    				$newUser->attachPermission($permission);
    			}

        }

        if (User::where('email', '=', 'admin@admin.com')->first() === null) {

	        $newUser = User::create([
	            'name' => 'Admin',
	            'email' => 'admin@admin.com',
	            'password' => bcrypt('password'),
	        ]);

	        $newUser;
	        $newUser->attachRole($adminRole);

		}
		
		if (User::where('email', '=', 'user@admin.com')->first() === null) {

	        $newUser = User::create([
	            'name' => 'User',
	            'email' => 'user@user.com',
	            'password' => bcrypt('password'),
	        ]);

	        $newUser;
	        $newUser->attachRole($userRole);

        }

    }
}
