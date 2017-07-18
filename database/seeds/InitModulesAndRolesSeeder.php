<?php

use Illuminate\Database\Seeder;

class InitModulesAndRolesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(BasicModulesTableSeeder::class);
		//$this->call(BasicPermissionsTableSeeder::class);
		//$this->call(BasicRolesTableSeeder::class);
		//$this->call(BasicPermissionRoleTableSeeder::class);
		//$this->call(BasicRoleUserTableSeeder::class);
	}
}
