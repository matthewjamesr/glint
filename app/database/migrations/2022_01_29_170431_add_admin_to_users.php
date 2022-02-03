<?php

use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class AddAdminToUsers extends Database
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        static::$capsule::schema()->table("users", function (Blueprint $table) {
            $column = static::$capsule::schema()->hasColumn("users", "admin_level");
            
            if ($column) {
                $table->integer("admin_level")->default(0)->change();
            } else {
                $table->integer("admin_level")->default(0);
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