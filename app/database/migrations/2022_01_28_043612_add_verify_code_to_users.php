<?php

use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class AddVerifyCodeToUsers extends Database
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        static::$capsule::schema()->table("users", function (Blueprint $table) {
            $table->string("verify_code")->change();
        });

        // you can now build your migrations with schemas
        // Schema::build(static::$capsule, dirname(__DIR__) . "/Schema/users.json");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        static::$capsule::schema()->dropIfExists("users");
    }
}
