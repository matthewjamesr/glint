<?php

use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateCountries extends Database
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable("countries")) :
            static::$capsule::schema()->create("countries", function (Blueprint $table) {
                $table->increments("id");
                $table->timestamps();
                $table->string('country');
                $table->string('country_flag_path');
            });
        endif;

        // you can now build your migrations with schemas
        // Schema::build(static::$capsule, dirname(__DIR__) . "/Schema/countries.json");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        static::$capsule::schema()->dropIfExists("countries");
    }
}
