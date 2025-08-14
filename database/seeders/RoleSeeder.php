<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
	public function run()
	{
    		// Create Roles
    		$admin = Role::create(['name' => 'Admin']);
    		$manager = Role::create(['name' => 'Manager']);
    		$staff = Role::create(['name' => 'Staff']);
    		$viewer = Role::create(['name' => 'Viewer']);

    		// Example Permissions
    		Permission::create(['name' => 'manage users']);
    		Permission::create(['name' => 'view reports']);
    		Permission::create(['name' => 'manage inventory']);
    		Permission::create(['name' => 'view inventory']);

    		// Assign Permissions
    		$admin->givePermissionTo(Permission::all());
    		$manager->givePermissionTo(['view reports', 'manage inventory']);
    		$staff->givePermissionTo(['manage inventory']);
    		$viewer->givePermissionTo(['view inventory']);

		// Assign Role
		$user = User::find(1); //First user
		if ($user){
		    $user->assignRole('Admin');
		}
	}
}
