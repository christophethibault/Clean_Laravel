<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BasicModulesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('ALTER TABLE modules AUTO_INCREMENT = 1;');

		DB::table('modules')->insert([
			/**
			 * Diplome
			 */
			[
				'name'         => 'diplome',
				'display_name' => 'Diplome',
				'description'  => 'Diplome',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			], // ID = 1
			/**
			 * Etablissement
			 */
			[
				'name'         => 'of',
				'display_name' => 'Établissement',
				'description'  => 'Établissement',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			], // ID = 2
			/*
			* Formation
			*/
			[
				'name'         => 'formation',
				'display_name' => 'Formation',
				'description'  => 'Formation',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 3
			/*
			* Session
			*/
			[
				'name'         => 'session',
				'display_name' => 'Session',
				'description'  => 'Session',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 4
			/**
			 * Compte Client
			 */
			[
				'name'         => 'compteClient',
				'display_name' => 'Compte Client',
				'description'  => 'Compte Client',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 5
			/*
			 * Mission
			 */
			[
				'name'         => 'mission',
				'display_name' => 'Mission',
				'description'  => 'Mission',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 6
			/*
			* Candidat
			*/
			[
				'name'         => 'candidat',
				'display_name' => 'Candidat',
				'description'  => 'Candidat',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 7
			/*
			* Planification
			*/
			[
				'name'         => 'planification',
				'display_name' => 'Planification',
				'description'  => 'Planification',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 8
			/*
			* Contractualisationn
			*/
			[
				'name'         => 'contractualisation',
				'display_name' => 'Contractualisationn',
				'description'  => 'Contractualisationn',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 9
			/*
			 * Administration
			 */
			[
				'name'         => 'administration',
				'display_name' => 'Administration',
				'description'  => 'Administration',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 10
		]);

		DB::table('modules')->insert([
			/*
			* Utilisateur
			*/
			[
				'name'         => 'utilisateur',
				'display_name' => 'Utilisateur',
				'description'  => 'Utilisateur',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now(),
				'parent_id'    => 10
			],// ID = 11
			/*
			* Rôle
			*/
			[
				'name'         => 'role',
				'display_name' => 'Rôle',
				'description'  => 'Rôle',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now(),
				'parent_id'    => 10
			],// ID = 12
			/*
			* Permission
			*/
			[
				'name'         => 'permission',
				'display_name' => 'Permission',
				'description'  => 'Permission',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now(),
				'parent_id'    => 10
			],// ID = 13
			/*
			 * Sourcing
			*/
			[
				'name'         => 'sourcing',
				'display_name' => 'Sourcing',
				'description'  => 'Sourcing',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now(),
				'parent_id'    => 6
			],// ID = 14
			/*
			 * Candidature
			*/
			[
				'name'         => 'candidature',
				'display_name' => 'Candidature',
				'description'  => 'Candidature',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now(),
				'parent_id'    => 6
			],// ID = 15

		]);
	}
}
