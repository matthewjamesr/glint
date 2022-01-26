<?php

use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;
use Leaf\Schema;

class CreateAddDefaultFullnameValueToUsersTables extends Database {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()  {
         if (!static::$capsule::schema()->hasTable("users")):
         	static::$capsule::schema()->update("users", function (Blueprint $table) {
         		$table->string('fullname')->nullable();
         	});
        endif;

        // you can now build your migrations with schemas
        //Schema::build(static::$capsule, dirname(__DIR__) . "/Schema/users.json");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		static::$capsule::schema()->dropIfExists("users");
	}
}
