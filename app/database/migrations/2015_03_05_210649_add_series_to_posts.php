<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeriesToPosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('posts', function($table) {
			$table->integer('series_id')->unsigned()->nullable();
			$table->foreign('series_id')->references('id')->on('series');
			$table->integer('order')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts', function($table) {
			$table->dropColumn('order');
			$table->dropForeign('posts_series_id_foreign');
		});
	}

}
