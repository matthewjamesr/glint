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
            $column = static::$capsule::schema()->hasColumn("users", "verify_code");
            
            if ($column) {
                $table->string("verify_code")->change();
                $table->integer("verify_code_sent")->default(0)->change();
            } else {
                $table->string("verify_code");
                $table->integer("verify_code_sent")->default(0);
            }
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
