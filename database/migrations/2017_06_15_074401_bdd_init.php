<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class BddInit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    DB::statement('SET FOREIGN_KEY_CHECKS = 0');

	    // Create table for storing status
	    Schema::dropIfExists('status');
	    Schema::create('status', function (Blueprint $table) {
	    	// Columns
		    $table->increments('id');
		    $table->string('name', 255)->nullable(false);
		    $table->morphs('statusable');
		    // Additionnals columns
		    $table->timestamps();
		    $table->softDeletes();
	    });

	    // Create table for storing tags
	    Schema::dropIfExists('tags');
	    Schema::create('tags', function (Blueprint $table) {
		    // Columns
		    $table->increments('id');
		    $table->string('name', 255)->nullable(false);
		    // $table->morphs('tagable');
		    // Additionnals columns
		    $table->timestamps();
		    $table->softDeletes();
	    });

	    // Create table for storing projects
	    Schema::dropIfExists('projects');
	    Schema::create('projects', function (Blueprint $table) {
	    	// Columns
		    $table->increments('id');
		    $table->string('shortname', 100)->nullable(false);
		    $table->string('name', 255)->nullable(false);
		    $table->text('description')->nullable(true);
		    $table->integer('fmeca_treshold')->unsigned()->nullable(true);
		    $table->string('lcn_base', 10)->nullable(true);
		    // Foreigns key
		    $table->integer('language_id')->unsigned()->nullable(false);
		    // More
		    $table->timestamps();
		    $table->softDeletes();
		    // Constraints
		    $table->foreign('language_id')->references('id')->on('languages');
	    });

	    // Create table for storing efps
	    Schema::dropIfExists('efps');
	    Schema::create('efps', function (Blueprint $table) {
		    // Columns
		    $table->increments('id');
		    $table->text('data')->nullable(true);
		    // Foreigns key
		    $table->integer('project_id')->unsigned()->nullable(false);
		    // Additionnal columns
		    $table->timestamps();
		    $table->softDeletes();
		    // Constraints
		    $table->foreign('project_id')->references('id')->on('projects');
	    });


	    // Create table for storing documenttypes, documentprovisioners, documentformats
	    $tables = array('types', 'provisioners', 'formats');
	    foreach ($tables AS $tableName) {
		    Schema::dropIfExists($tableName);
		    Schema::create($tableName, function (Blueprint $table) {
			    // Columns
			    $table->increments('id');
			    $table->string('name', 255)->nullable(false);
			    $table->string('shortname', 100)->nullable(false);
			    // Additionnal columns
			    $table->timestamps();
			    $table->softDeletes();
		    });
	    }

	    // Create table for storing documents
	    Schema::dropIfExists('documents');
	    Schema::create('documents', function (Blueprint $table) {
		    // Columns
		    $table->increments('id');
		    $table->string('name', 255)->nullable(false);
		    $table->string('storageName', 100)->unique()->nullable(false);
		    $table->text('description')->nullable(true);
		    $table->string('extension', 5)->nullable(true);
		    $table->string('lib', 255)->nullable(false);
		    $table->string('path', 255)->unique()->nullable(false);
		    $table->integer('version')->unsigned()->nullable(false);
		    $table->string('reference', 100)->nullable(false);
		    // Foreigns key
		    $table->integer('type_id')->unsigned()->nullable(false);
		    $table->integer('provisioner_id')->unsigned()->nullable(false);
		    $table->integer('format_id')->unsigned()->nullable(false);
		    $table->integer('language_id')->unsigned()->nullable(false);
		    // Additionnal columns
		    $table->timestamps();
		    $table->softDeletes();
		    // Constraints
		    $table->unique(['reference', 'name', 'type_id']);
		    $table->foreign('type_id')->references('id')->on('types');
		    $table->foreign('provisioner_id')->references('id')->on('provisioners');
		    $table->foreign('format_id')->references('id')->on('formats');
		    $table->foreign('language_id')->references('id')->on('languages');
	    });

	    // Create table for storing nodes
	    Schema::dropIfExists('nodes');
	    Schema::create('nodes', function (Blueprint $table) {
		    // Columns
		    $table->increments('id');
		    $table->string('reference', 100)->nullable(false);
		    $table->string('name', 255)->nullable(false);
		    $table->string('pid', 100)->nullable(false);
		    $table->text('description')->nullable(true);
		    // Additionnal columns
		    $table->timestamps();
		    $table->softDeletes();
	    });

	    // Create table for storing trees
	    Schema::dropIfExists('trees');
	    Schema::create('trees', function (Blueprint $table) {
	    	// Columns
		    $table->increments('id');
		    $table->integer('lft')->nullable()->index();
		    $table->integer('rgt')->nullable()->index();
		    $table->integer('depth')->nullable();
		    $table->string('name', 255)->nullable(false);
		    // Foreign keys
		    $table->integer('project_id')->unsigned()->nullable(false);
		    $table->integer('tree_id')->unsigned()->nullable(true)->index();
		    $table->integer('node_id')->unsigned()->nullable(true);
		    // Additionnal columns
		    $table->timestamps();
		    $table->softDeletes();
		    // Constraints
		    $table->foreign('project_id')->references('id')->on('projects');
		    $table->foreign('tree_id')->references('id')->on('trees');
		    $table->foreign('node_id')->references('id')->on('nodes');
	    });


	    // Init modules level 0
	    DB::statement('ALTER TABLE modules AUTO_INCREMENT = 1;');
	    DB::table('modules')->insert([
		    /**
		     * Admin
		     */
		    [
			    'code' => 'ADMIN',
			    'name' => 'Administration',
			    'description'  => 'Module d\'administration',
			    'created_at'   => Carbon::now(),
			    'updated_at'   => Carbon::now()
		    ], // ID = 1

		    /**
		     * Projects
		     */
		    [
			    'code' => 'PROJECTS',
			    'name' => 'Projets',
			    'description'  => 'Module projet',
			    'created_at'   => Carbon::now(),
			    'updated_at'   => Carbon::now()
		    ], // ID = 2
		    /**
		     * Documents
		     */
		    [
			    'code' => 'DOCUMENTS',
			    'name' => 'Documents',
			    'description'  => 'Module documents',
			    'created_at'   => Carbon::now(),
			    'updated_at'   => Carbon::now()
		    ], // ID = 3
		]);

	    // Init module ADMIN
	    DB::table('modules')->insert([
		    /**
		     * Roles
		     */
		    [
			    'code' => 'ROLES',
			    'name' => 'Rôles',
			    'description'  => 'Gestion des rôles',
			    'parent_id'    => 1,
			    'created_at'   => Carbon::now(),
			    'updated_at'   => Carbon::now()
		    ],
		    /**
		     * Users
		     */
		    [
			    'code' => 'USERS',
			    'name' => 'Utilisateurs',
			    'description'  => 'Gestion des utilisateurs',
			    'parent_id'    => 1,
			    'created_at'   => Carbon::now(),
			    'updated_at'   => Carbon::now()
		    ],
		    /**
		     * Permissions
		     */
		    [
			    'code' => 'PERMISSIONS',
			    'name' => 'Permissions',
			    'description'  => 'Gestion des permissions',
			    'parent_id'    => 1,
			    'created_at'   => Carbon::now(),
			    'updated_at'   => Carbon::now()
		    ], // ID = 3
	    ]);

	    // Play seed
	    //Artisan::call('db:seed', array('--class' => 'InitModulesAndRolesSeeder'));

	    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

	    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
	    $tables = array('status','tags','projects','efps'
	        ,'types','provisioners','formats','documents','trees');
	    foreach ($tables AS $tableName) {
		    Schema::dropIfExists($tableName);
	    }


	    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
