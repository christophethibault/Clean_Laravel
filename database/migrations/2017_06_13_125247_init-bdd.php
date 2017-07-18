<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitBdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Create table for storing langs
	    Schema::dropIfExists('languages');
	    Schema::create('languages', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name', 100);
		    $table->string('shortname', 5);
		    $table->softDeletes();
	    });

	    DB::table('languages')->insert(
	    	array(
			    array('name'=>'Français','shortname'=>'FR'),
			    array('name'=>'English','shortname'=>'EN'),
			    array('name'=>'Italiano','shortname'=>'ITA'),
			    array('name'=>'Portugues','shortname'=>'PT'),
			    array('name'=>'Espanol','shortname'=>'ES'),
		    )
	    );

	    // Create table for storing users
	    Schema::dropIfExists('users');
	    Schema::create('users', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('civilite')->unsigned()->default(0);
		    $table->string('firstname', 100);
		    $table->string('lastname', 100);
		    $table->string('email', 255);
		    $table->string('login', 50)->unique();
		    $table->string('password', 255);
		    $table->integer('language_id')->unsigned();
		    $table->foreign('language_id')->references('id')->on('languages')
			    ->onUpdate('cascade')->onDelete('cascade');

		    $table->rememberToken();
		    $table->softDeletes();
		    $table->timestamps();
	    });

	    DB::table('users')->insert(
		    array('civilite' => '1',
			    'firstname'      => 'Admin',
			    'lastname'   => 'Admin',
			    'email'    => 'admin@crazylog.fr',
			    'login'    => 'admin',
			    'password' => Hash::make('admin'),
			    'language_id' => 1,
		    )
	    );

	    // Create table for storing roles
	    Schema::dropIfExists('roles');
	    Schema::create('roles', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name')->unique();
		    $table->string('display_name')->nullable();
		    $table->string('description')->nullable();
		    $table->timestamps();
		    $table->softDeletes();
	    });

	    // Create table for associating roles to users (Many-to-Many)
	    Schema::dropIfExists('role_user');
	    Schema::create('role_user', function (Blueprint $table) {
		    $table->integer('user_id')->unsigned();
		    $table->integer('role_id')->unsigned();

		    $table->foreign('user_id')->references('id')->on('users')
			    ->onUpdate('cascade')->onDelete('cascade');
		    $table->foreign('role_id')->references('id')->on('roles')
			    ->onUpdate('cascade')->onDelete('cascade');

		    $table->primary(['user_id', 'role_id']);
	    });

	    // Create table for storing permissions
	    Schema::dropIfExists('permissions');
	    Schema::create('permissions', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name')->unique();
		    $table->string('display_name')->nullable();
		    $table->string('description')->nullable();
		    $table->integer('module_id')->unsigned();
		    $table->foreign('module_id')->references('id')->on('modules')
			    ->onUpdate('cascade')->onDelete('cascade');
		    $table->timestamps();
		    $table->softDeletes();
	    });

	    // Create table for associating permissions to roles (Many-to-Many)
	    Schema::dropIfExists('permission_role');
	    Schema::create('permission_role', function (Blueprint $table) {
		    $table->integer('permission_id')->unsigned();
		    $table->integer('role_id')->unsigned();

		    $table->foreign('permission_id')->references('id')->on('permissions')
			    ->onUpdate('cascade')->onDelete('cascade');
		    $table->foreign('role_id')->references('id')->on('roles')
			    ->onUpdate('cascade')->onDelete('cascade');

		    $table->primary(['permission_id', 'role_id']);
	    });

	    // Create table for storing adresses
	    Schema::dropIfExists('adresses');
	    Schema::create('adresses', function (Blueprint $table) {
		    $table->increments('id');
		    $table->boolean('default')->default(false);
		    $table->string('lib', 50)->default('');
		    $table->string('num', 10)->default('');
		    $table->string('voie', 255)->default('');
		    $table->string('complement', 255)->default('');
		    $table->string('code_postal', 5)->default('');
		    $table->morphs('adressable');
		    $table->timestamps();
		    $table->softDeletes();
	    });

	    // Create table for storing phones
	    Schema::dropIfExists('phones');
	    Schema::create('phones', function (Blueprint $table) {
		    $table->increments('id');
		    $table->boolean('default')->default(false);
		    $table->string('lib', 50)->default('');
		    $table->string('tel', 20)->default('');
		    $table->morphs('telable');
		    $table->timestamps();
		    $table->softDeletes();
	    });

	    // Create table for storing emails
	    Schema::dropIfExists('emails');
	    Schema::create('emails', function (Blueprint $table) {
		    $table->increments('id');
		    $table->boolean('default')->default(false);
		    $table->string('lib', 50)->default('');
		    $table->string('email', 255)->default('');
		    $table->morphs('emailable');
		    $table->timestamps();
		    $table->softDeletes();
	    });


	    // Create table for storing modules
	    Schema::create('modules', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('code', 20)->unique();
		    $table->string('name')->nullable();
		    $table->string('description')->nullable();
		    $table->integer('parent_id')->unsigned()->index()->nullable(true);
		    $table->timestamps();
		    $table->softDeletes();
		    $table->foreign('parent_id')->references('id')->on('modules')->onDelete('set null');
	    });

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

	    Schema::dropIfExists('role_user');
	    Schema::dropIfExists('permission_role');
	    Schema::dropIfExists('modules');
	    Schema::dropIfExists('langs');
	    Schema::dropIfExists('languages');
	    Schema::dropIfExists('users');
	    Schema::dropIfExists('roles');
	    Schema::dropIfExists('permissions');
	    Schema::dropIfExists('adresses');
	    Schema::dropIfExists('phones');
	    Schema::dropIfExists('emails');

	    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
