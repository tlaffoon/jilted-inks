<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
		    $table->increments('id');
		    $table->string('username')->unique();
		    $table->string('name');
		    $table->string('email', 200)->unique();
		    $table->string('password', 255);
		    $table->rememberToken();
		    $table->timestamps();

		    $table->integer('role_id')->unsigned()->default(1);
		    $table->foreign('role_id')->references('id')->on('roles');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
