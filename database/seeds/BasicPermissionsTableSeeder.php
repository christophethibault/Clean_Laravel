<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Module;

class BasicPermissionsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('ALTER TABLE permissions AUTO_INCREMENT = 1;');

		$moduleDiplome = Module::where('name', 'diplome')->first()->id;
		$moduleOf = Module::where('name', 'of')->first()->id;
		$moduleFormation = Module::where('name', 'formation')->first()->id;
		$moduleSession = Module::where('name', 'session')->first()->id;
		$moduleCompteClient = Module::where('name', 'compteClient')->first()->id;
		$moduleMission = Module::where('name', 'mission')->first()->id;
		$moduleCandidat = Module::where('name', 'candidat')->first()->id;
		$modulePlanification = Module::where('name', 'planification')->first()->id;
		$moduleContractualisation = Module::where('name', 'contractualisation')->first()->id;
		$moduleAdministration = Module::where('name', 'administration')->first()->id;
		$moduleUtilisateur = Module::where('name', 'utilisateur')->first()->id;
		$moduleRole = Module::where('name', 'role')->first()->id;
		$modulePermission = Module::where('name', 'permission')->first()->id;
		$moduleSourcing = Module::where('name', 'sourcing')->first()->id;
		$moduleCandidature = Module::where('name', 'candidature')->first()->id;

		DB::table('permissions')->insert([
			/**
			 * Diplome
			 */
			[
				'name'         => 'diplome-read',
				'display_name' => 'Diplome - Droit de lecture',
				'description'  => 'Diplome - Droit de lecture',
				'module_id'    => $moduleDiplome,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			], // ID = 1
			[
				'name'         => 'diplome-write',
				'display_name' => 'Diplome - Droit d\'écriture',
				'description'  => 'Diplome - Droit d\'écriture',
				'module_id'    => $moduleDiplome,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 2

			/**
			 * Etablissement
			 */
			[
				'name'         => 'of-read',
				'display_name' => 'Établissement - Droit de lecture',
				'description'  => 'Établissement - Droit de lecture',
				'module_id'    => $moduleOf,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 3
			[
				'name'         => 'of-write',
				'display_name' => 'Établissement - Droit d\'écriture',
				'description'  => 'Établissement - Droit d\'écriture',
				'module_id'    => $moduleOf,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 4

			/*
			* Formation
			*/
			[
				'name'         => 'formation-read',
				'display_name' => 'Formation - Droit de lecture',
				'description'  => 'Formation - Droit de lecture',
				'module_id'    => $moduleFormation,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 5
			[
				'name'         => 'formation-write',
				'display_name' => 'Formation - Droit d\'écriture',
				'description'  => 'Formation - Droit d\'écriture',
				'module_id'    => $moduleFormation,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 6

			/**
			 * Session
			 */
			[
				'name'         => 'session-read',
				'display_name' => 'Session - Droit de lecture',
				'description'  => 'Session - Droit de lecture',
				'module_id'    => $moduleSession,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 7
			[
				'name'         => 'session-write',
				'display_name' => 'Session - Droit d\'écriture',
				'description'  => 'Session - Droit d\'écriture',
				'module_id'    => $moduleSession,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 8

			/**
			 * Compte Client
			 */
			[
				'name'         => 'compteClient-read',
				'display_name' => 'Compte Client - Droit de lecture',
				'description'  => 'Compte Client - Droit de lecture',
				'module_id'    => $moduleCompteClient,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 9
			[
				'name'         => 'compteClient-write',
				'display_name' => 'Compte Client - Droit d\'écriture',
				'description'  => 'Compte Client - Droit d\'écriture',
				'module_id'    => $moduleCompteClient,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 10

			/*
			 * Mission
			 */
			[
				'name'         => 'mission-read',
				'display_name' => 'Mission - Droit de lecture',
				'description'  => 'Mission - Droit de lecture',
				'module_id'    => $moduleMission,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 11
			[
				'name'         => 'mission-write',
				'display_name' => 'Mission - Droit d\'écriture',
				'description'  => 'Mission - Droit d\'écriture',
				'module_id'    => $moduleMission,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 12

			/**
			 * Candidat
			 */
			[
				'name'         => 'candidat-read',
				'display_name' => 'Candidat - Droit de lecture',
				'description'  => 'Candidat - Droit de lecture',
				'module_id'    => $moduleCandidat,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],
			// ID = 13
			[
				'name'         => 'candidat-write',
				'display_name' => 'Candidat - Droit d\'écriture',
				'description'  => 'Candidat - Droit d\'écriture',
				'module_id'    => $moduleCandidat,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 14

			/**
			 * Planification
			 */
			[
				'name'         => 'planification-read',
				'display_name' => 'Planification - Droit de lecture',
				'description'  => 'Planification - Droit de lecture',
				'module_id'    => $modulePlanification,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],
			// ID = 15
			[
				'name'         => 'planification-write',
				'display_name' => 'Planification - Droit d\'écriture',
				'description'  => 'Planification - Droit d\'écriture',
				'module_id'    => $modulePlanification,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 16

			/**
			 * Contractualisation
			 */
			[
				'name'         => 'contractualisation-read',
				'display_name' => 'Contractalisation - Droit de lecture',
				'description'  => 'Contractalisation - Droit de lecture',
				'module_id'    => $moduleContractualisation,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],
			// ID = 17
			[
				'name'         => 'contractualisation-write',
				'display_name' => 'Contractalisation - Droit d\'écriture',
				'description'  => 'Contractalisation - Droit d\'écriture',
				'module_id'    => $moduleContractualisation,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 18

			/*
			 * Administration
			 */
			[
				'name'         => 'administration-read',
				'display_name' => 'Administration - Droit de lecture',
				'description'  => 'Administration - Droit de lecture',
				'module_id'    => $moduleAdministration,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 19
			[
				'name'         => 'administration-write',
				'display_name' => 'Administration -Droit d\'écriture',
				'description'  => 'Administration -Droit d\'écriture',
				'module_id'    => $moduleAdministration,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 20

			/*
			* Utilisateur
			*/
			[
				'name'         => 'utilisateur-read',
				'display_name' => 'Utilisateur - Droit de lecture',
				'description'  => 'Utilisateur - Droit de lecture',
				'module_id'    => $moduleUtilisateur,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 21
			[
				'name'         => 'utilisateur-write',
				'display_name' => 'Utilisateur - Droit d\'écriture',
				'description'  => 'Utilisateur - Droit d\'écriture',
				'module_id'    => $moduleUtilisateur,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 22

			/*
			* Rôle
			*/
			[
				'name'         => 'role-read',
				'display_name' => 'Rôle - Droit de lecture',
				'description'  => 'Rôle - Droit de lecture',
				'module_id'    => $moduleRole,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 23
			[
				'name'         => 'role-write',
				'display_name' => 'Rôle Droit d\'écriture',
				'description'  => 'Rôle Droit d\'écriture',
				'module_id'    => $moduleRole,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 24

			/*
			* Permission
			*/
			[
				'name'         => 'permission-read',
				'display_name' => 'Permission - Droit de lecture',
				'description'  => 'Permission - Droit de lecture',
				'module_id'    => $modulePermission,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 25
			[
				'name'         => 'permission-write',
				'display_name' => 'Permission - Droit d\'écriture',
				'description'  => 'Permission - Droit d\'écriture',
				'module_id'    => $modulePermission,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 26

			/*
			* Sourcing
			*/
			[
				'name'         => 'sourcing-read',
				'display_name' => 'Sourcing - Droit de lecture',
				'description'  => 'Sourcing - Droit de lecture',
				'module_id'    => $moduleSourcing,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 27
			[
				'name'         => 'sourcing-write',
				'display_name' => 'Sourcing - Droit d\'écriture',
				'description'  => 'Sourcing - Droit d\'écriture',
				'module_id'    => $moduleSourcing,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 28

			/*
			* Candidature
			*/
			[
				'name'         => 'candidature-read',
				'display_name' => 'Candidat - Droit de lecture',
				'description'  => 'Candidat - Droit de lecture',
				'module_id'    => $moduleCandidature,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 27
			[
				'name'         => 'candidature-write',
				'display_name' => 'Candidat - Droit d\'écriture',
				'description'  => 'Candidat - Droit d\'écriture',
				'module_id'    => $moduleCandidature,
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],// ID = 28


		]);

	}
}
