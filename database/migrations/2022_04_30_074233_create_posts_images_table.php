<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_images', function (Blueprint $table) {
            $table->id();
            $table->string('post_id')->index();
            $table->string('post_image_name')->nullable();
            $table->string('post_image_path')->nullable();
            $table->timestamps();
            $table->string('crea_user')->nullable();
            $table->string('mod_user')->nullable();


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
        Schema::dropIfExists('posts_images');
    }
}
