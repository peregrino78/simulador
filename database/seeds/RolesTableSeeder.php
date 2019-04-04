<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    /**
	     * Add Roles
	     *
	     */
    	if (Role::where('name', '=', 'Master')->first() === null) {
	        $adminRole = Role::create([
	            'name' => 'Master',
	            'slug' => 'master',
	            'description' => 'Master Role',
	            'level' => 5,
        	]);
	    }

    	if (Role::where('name', '=', 'Administrator')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Administrator',
	            'slug' => 'Administrator',
	            'description' => 'Administrator Role',
	            'level' => 4,
	        ]);
		}

		if (Role::where('name', '=', 'Moderator')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Moderator',
	            'slug' => 'Moderator',
	            'description' => 'Moderator Role',
	            'level' => 3,
	        ]);
	    }
		
		if (Role::where('name', '=', 'Editor')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Editor',
	            'slug' => 'Editor',
	            'description' => 'Editor Role',
	            'level' => 2,
	        ]);
	    }

    	if (Role::where('name', '=', 'User')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'User',
	            'slug' => 'User',
	            'description' => 'User Role',
	            'level' => 1,
	        ]);
	    }

    }

}
