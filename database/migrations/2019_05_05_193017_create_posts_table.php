<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('tag_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('image')->nullable();
            $table->string('image_caption')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });

        Schema::table('comments', function($table) {
            //if 'categories'  table  exists
            if(Schema::hasTable('categories'))
            {
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');;
            }
            //if 'tags'  table  exists
            if(Schema::hasTable('tags'))
            {
                $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');;
            }
            //if 'users'  table  exists
            if(Schema::hasTable('users'))
            {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
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
        Schema::dropIfExists('posts');
    }
}
