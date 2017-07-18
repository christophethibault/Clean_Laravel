<?php

use Illuminate\Database\Seeder;
use \App\Role;
use \App\User;
use \App\Permission;

class BasicPermissionRoleTableSeeder extends Seeder
{


	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('ALTER TABLE permission_role AUTO_INCREMENT = 1;');


		$accesRORW = array(21, 22, 23, 24, 25, 26);
		$sourcingRORW = array(27, 28);
		$candidatureRORW = array(29, 30);
		$sourcingCandidatureRORW = array_merge($sourcingRORW, $candidatureRORW);

		$excludeAdministrateur = array();
		$excludeSuperviseur = array_merge(array(2, 4, 6, 11, 12, 16, 17, 18, 19, 20, 29, 30), $accesRORW);
		$excludeOperationnelRh = array_merge(array_merge(array(2, 4, 6, 8, 10, 12, 14, 17, 18, 19, 20), $sourcingCandidatureRORW), $accesRORW);
		$excludeOperationnelGestionnaire = array_merge(array(13), $excludeOperationnelRh);
		$excludeResponsable = array_merge(array_merge(array(11, 12, 14, 16, 19, 20), $sourcingCandidatureRORW), $accesRORW);
		$excludePlanificateur = array_merge(array_merge(array(1, 2, 3, 4, 5, 6, 7, 8, 10, 14, 17, 18, 19, 20), $sourcingCandidatureRORW), $accesRORW);

		$maxPermissionId = \App\Permission::max('id');

		$roleAdministrateur = Role::where('name', 'admin')->first()->id;
		$roleSuperviseur = Role::where('name', 'superviseur')->first()->id;
		$roleOperationnelRH = Role::where('name', 'operationnel_rh')->first()->id;
		$roleOperationnelGestionnaire = Role::where('name', 'operationnel_gestionnaire')->first()->id;
		$roleReponsable = Role::where('name', 'responsable')->first()->id;
		$rolePlanificateur = Role::where('name', 'planificateur')->first()->id;

		/**
		 * $roleAdministrateur
		 */
		for ($i = 1; $i <= $maxPermissionId; $i++) {
			if (in_array($i, $excludeAdministrateur)) continue;
			DB::table('permission_role')->insert(
				[
					'permission_id' => $i,
					'role_id'       => $roleAdministrateur,
				]);
		}

		/**
		 * Responsable
		 */
		for ($i = 1; $i <= $maxPermissionId; $i++) {
			if (in_array($i, $excludeSuperviseur)) continue;
			DB::table('permission_role')->insert(
				[
					'permission_id' => $i,
					'role_id'       => $roleSuperviseur,
				]);
		}

		/**
		 * Operateur
		 */
		for ($i = 1; $i <= $maxPermissionId; $i++) {
			if (in_array($i, $excludeOperationnelRh)) continue;
			DB::table('permission_role')->insert(
				[
					'permission_id' => $i,
					'role_id'       => $roleOperationnelRH,
				]);
		}

		/**
		 * $roleOperationnelGestionnaire
		 */
		for ($i = 1; $i <= $maxPermissionId; $i++) {
			if (in_array($i, $excludeOperationnelGestionnaire)) continue;
			DB::table('permission_role')->insert(
				[
					'permission_id' => $i,
					'role_id'       => $roleOperationnelGestionnaire,
				]);
		}

		/**
		 * $roleReponsable
		 */
		for ($i = 1; $i <= $maxPermissionId; $i++) {
			if (in_array($i, $excludeResponsable)) continue;
			DB::table('permission_role')->insert(
				[
					'permission_id' => $i,
					'role_id'       => $roleReponsable,
				]);
		}

		/**
		 * $rolePlanificateur
		 */
		for ($i = 1; $i <= $maxPermissionId; $i++) {
			if (in_array($i, $excludePlanificateur)) continue;
			DB::table('permission_role')->insert(
				[
					'permission_id' => $i,
					'role_id'       => $rolePlanificateur,
				]);
		}

		/**
		 * Superviseur Entreprise
		 */
		$role_superviseur_entreprise = Role::where('name', Role::SUPERVISEUR_ENTREPRISE)->firstOrFail();
		$role_superviseur_entreprise->permissions()->sync([
			Permission::CANDIDATURE_READ,
			Permission::CANDIDAT_READ,
			Permission::PLANIFICATION_READ,
			Permission::PLANIFICATION_WRITE,
			Permission::MISSION_READ,
		]);

		/**
		 * valideur Entreprise
		 */
		$role_valideur_entreprise = Role::where('name', Role::VALIDEUR_ENTREPRISE)->firstOrFail();
		$role_valideur_entreprise->permissions()->sync([
			Permission::CANDIDATURE_READ,
			Permission::CANDIDAT_READ,
			Permission::PLANIFICATION_READ,
			Permission::PLANIFICATION_WRITE,
			Permission::MISSION_READ,
		]);
	}
}
