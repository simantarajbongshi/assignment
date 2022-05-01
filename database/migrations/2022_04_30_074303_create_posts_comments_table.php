<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_comments', function (Blueprint $table) {
            $table->id();
            $table->string('post_id')->index();
            $table->unsignedBigInteger('commented_user_id');
            $table->text('comment');
            $table->boolean('status')->default(0);           
            $table->timestamps();
            $table->string('crea_user')->nullable();
            $table->string('mod_user')->nullable();

            $table->foreign('commented_user_id')->references('id')->on('users');
            $table->foreign('post_id')->references('post_id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_comments');
    }
}
