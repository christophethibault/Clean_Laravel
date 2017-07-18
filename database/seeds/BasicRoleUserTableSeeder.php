<?php

use Illuminate\Database\Seeder;
use \App\Role;

class BasicRoleUserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
//		DB::statement('ALTER TABLE users AUTO_INCREMENT = 1;');

		DB::statement('ALTER TABLE role_user AUTO_INCREMENT = 1;');

		$roleAdministrateur = Role::where('name', 'admin')->first()->id;
		$roleSuperviseur = Role::where('name', 'superviseur')->first()->id;
		$roleOperationnelRH = Role::where('name', 'operationnel_rh')->first()->id;
		$roleOperationnelGestionnaire = Role::where('name', 'operationnel_gestionnaire')->first()->id;
		$roleReponsable = Role::where('name', 'responsable')->first()->id;
		$rolePlanificateur = Role::where('name', 'planificateur')->first()->id;

		$idAdministrateur = DB::table('users')->insertGetId(
			array('civilite' => '1',
			      'nom'      => 'Utilisateur',
			      'prenom'   => 'Administrateur',
			      'email'    => 'administrateur@kompetentia.fr',
			      'login'    => 'admin',
			      'password' => Hash::make('admin')));

		DB::table('role_user')->insert(
			[
				'user_id' => $idAdministrateur,
				'role_id' => $roleAdministrateur,
			]);
		DB::table('role_user')->insert(
			[
				'user_id' => $idAdministrateur,
				'role_id' => $roleSuperviseur,
			]);

		$idSuperviseur = DB::table('users')->insertGetId(
			array('civilite' => '2',
			      'nom'      => 'Utilisateur',
			      'prenom'   => 'Superviseur RH',
			      'email'    => 'superviseurrh@kompetentia.fr',
			      'login'    => 'superviseurrh',
			      'password' => Hash::make('superviseurrh')));


		DB::table('role_user')->insert(
			[
				'user_id' => $idSuperviseur,
				'role_id' => $roleSuperviseur,
			]);


		$idOperationnelRH = DB::table('users')->insertGetId(
			array('civilite' => '2',
			      'nom'      => 'Utilisateur',
			      'prenom'   => 'Opérationnel RH',
			      'email'    => 'operationnelrh@kompetentia.fr',
			      'login'    => 'operationnel_rh',
			      'password' => Hash::make('operationnel_rh')));

		DB::table('role_user')->insert(
			[
				'user_id' => $idOperationnelRH,
				'role_id' => $roleOperationnelRH,
			]);

		$idOperationnelGestionnaire = DB::table('users')->insertGetId(
			array('civilite' => '2',
			      'nom'      => 'Utilisateur',
			      'prenom'   => 'Opérationnel Gestionnaire',
			      'email'    => 'operationnelgestionnaire@kompetentia.fr',
			      'login'    => 'operationnel_gestionnaire',
			      'password' => Hash::make('operationnel_gestionnaire')));

		DB::table('role_user')->insert(
			[
				'user_id' => $idOperationnelGestionnaire,
				'role_id' => $roleOperationnelGestionnaire,
			]);

		$idResponsable = DB::table('users')->insertGetId(
			array('civilite' => '2',
			      'nom'      => 'Utilisateur',
			      'prenom'   => 'Responsable Offre de Formation',
			      'email'    => 'responsable@kompetentia.fr',
			      'login'    => 'responsable',
			      'password' => Hash::make('responsable')));

		DB::table('role_user')->insert(
			[
				'user_id' => $idResponsable,
				'role_id' => $roleReponsable,
			]);

		$idPlanificateur = DB::table('users')->insertGetId(
			array('civilite' => '2',
			      'nom'      => 'Utilisateur',
			      'prenom'   => 'Planificateur',
			      'email'    => 'planificateur@kompetentia.fr',
			      'login'    => 'planificateur',
			      'password' => Hash::make('planificateur')));

		DB::table('role_user')->insert(
			[
				'user_id' => $idPlanificateur,
				'role_id' => $rolePlanificateur,
			]);

		$idAmine = DB::table('users')->insertGetId(
			array('civilite' => '1',
			      'nom'      => 'Amine',
			      'prenom'   => 'Amine',
			      'email'    => 'amine@email.fr',
			      'login'    => 'amine',
			      'password' => Hash::make('amine')));

		DB::table('role_user')->insert(
			[
				'user_id' => $idAmine,
				'role_id' => $roleAdministrateur,
			]);

		$idMarine = DB::table('users')->insertGetId(
			array('civilite' => '2',
			      'nom'      => 'Marine',
			      'prenom'   => 'Marine',
			      'email'    => 'marine@email.fr',
			      'login'    => 'marine',
			      'password' => Hash::make('marine')));


		DB::table('role_user')->insert(
			[
				'user_id' => $idMarine,
				'role_id' => $roleAdministrateur,
			]);

		$idZineb = DB::table('users')->insertGetId(
			array('civilite' => '2',
			      'nom'      => 'Zineb',
			      'prenom'   => 'Zineb',
			      'email'    => 'zineb@email.fr',
			      'login'    => 'zineb',
			      'password' => Hash::make('zineb')));

		DB::table('role_user')->insert(
			[
				'user_id' => $idZineb,
				'role_id' => $roleAdministrateur,
			]);

		$idNadine = DB::table('users')->insertGetId(
			array('civilite' => '2',
			      'nom'      => 'Nadine',
			      'prenom'   => 'Nadine',
			      'email'    => 'nadine@email.fr',
			      'login'    => 'nadine',
			      'password' => Hash::make('nadine')));


		DB::table('role_user')->insert(
			[
				'user_id' => $idNadine,
				'role_id' => $roleAdministrateur,
			]);

	}
}
