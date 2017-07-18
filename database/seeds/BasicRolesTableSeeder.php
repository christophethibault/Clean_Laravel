<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use \App\Role;

class BasicRolesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('ALTER TABLE roles AUTO_INCREMENT = 1;');

		DB::table('roles')->insert([
			/**
			 * Administrateur
			 */
			[
				'id'           => 1,
				'name'         => 'admin',
				'display_name' => 'Administrateur',
				'description'  => 'Administrateur',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],
			/**
			 * Superviseur
			 */
			[
				'id'           => 2,
				'name'         => 'superviseur',
				'display_name' => 'Superviseur RH',
				'description'  => 'Supervise l\'ensemble des opérations',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],
			/**
			 * Opérationnel RH
			 */
			[
				'id'           => 3,
				'name'         => 'operationnel_rh',
				'display_name' => 'Opérationnel RH',
				'description'  => 'Chargé de relation Ressource Humaine',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],
			/**
			 * Opérationnel gestionnaire
			 */
			[
				'id'           => 4,
				'name'         => 'operationnel_gestionnaire',
				'display_name' => 'Opérationnel gestionnaire',
				'description'  => 'Chargé de la gestion opérationnel',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],
			/**
			 * Responsable Offre de Formation
			 */
			[
				'id'           => 5,
				'name'         => 'responsable',
				'display_name' => 'Responsable Offre de Formation',
				'description'  => 'Responsable Offre de Formation',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],
			/**
			 * Planificateur
			 */
			[
				'id'           => 6,
				'name'         => 'planificateur',
				'display_name' => 'Planificateur',
				'description'  => 'Chargé de la planification',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],
			/**
			 * Valideur entreprise
			 */
			[
				'id'           => 7,
				'name'         => Role::VALIDEUR_ENTREPRISE,
				'display_name' => 'Valideur Entreprise',
				'description'  => 'Chargé de la validation des candidats en Entreprise',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],
			/**
			 * Valideur entreprise
			 */
			[
				'id'           => 8,
				'name'         => Role::SUPERVISEUR_ENTREPRISE,
				'display_name' => 'Superviseur Entreprise',
				'description'  => 'Superviseur en Entreprise',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],
			/**
			 * Valideur entreprise
			 */
			[
				'id'		   => 9,
				'name'         => Role::CANDIDAT,
				'display_name' => 'Candidat',
				'description'  => 'Candidat',
				'created_at'   => Carbon::now(),
				'updated_at'   => Carbon::now()
			],
		]);
	}
}
