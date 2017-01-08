<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRevendedorasRg extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('revendedoras', function(Blueprint $table)
		{
			$table->string('rg', 30)->change();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('revendedoras', function(Blueprint $table)
		{
            $table->string('rg', 15)->change();
		});
	}

}
