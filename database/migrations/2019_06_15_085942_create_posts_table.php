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
            $table->bigIncrements('id');
            $table->string('title', 256);
            $table->string('slug', 100);
            $table->text('body');
            $table->string('image');
            $table->integer('post_by');
            $table->foreign('post_by')->references('id')->on('admin')->onupdte('cascade')->ondelte('cascade');
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onupdte('cascade')->ondelte('cascade');
            $table->boolean('status')->default(0);
            $table->timestamps();
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
