<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->timestamps();
        });

        Schema::table('comments', function($table) {
            //if 'posts'  table  exists
            if(Schema::hasTable('posts'))
            {
                $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');;
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
        Schema::dropIfExists('comments');
    }
}
