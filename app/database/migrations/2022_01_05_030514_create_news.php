<?php

use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateNews extends Database
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable("news")) :
            static::$capsule::schema()->create("news", function (Blueprint $table) {
                $table->increments("id");
                $table->integer("author");
                $table->string("title");
                $table->text("description");
                $table->string("type");
                $table->string("country");
                $table->text("markdown")->nullable();
                $table->text("processed_html")->nullable();
                $table->text("video_url")->nullable();
                $table->timestamps();
            });
        endif;

        // you can now build your migrations with schemas
        // Schema::build(static::$capsule, dirname(__DIR__) . "/Schema/news.json");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        static::$capsule::schema()->dropIfExists("news");
    }
}
