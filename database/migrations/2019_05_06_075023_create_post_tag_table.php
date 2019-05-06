<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tag_id')->nullable();
            $table->unsignedInteger('post_id')->nullable();
            $table->timestamps();
        });

        Schema::table('post_tag', function($table) {

            //if 'tags'  table  exists
            if(Schema::hasTable('tags'))
            {
                $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');;
            }
            //if 'posts'  table  exists
            if(Schema::hasTable('posts'))
            {
                $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');;
            }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
