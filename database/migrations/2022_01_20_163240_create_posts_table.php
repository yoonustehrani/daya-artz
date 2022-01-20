<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title', 60);
            $table->string('slug')->unique();
            $table->string('image_url')->nullable();
            $table->string('image_alt')->nullable();
            $table->tinyText('description');
            $table->text('body');
            $table->string('reading_time')->nullable();
            $table->foreignId('author_id')->nullable();
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('users')->nullOnDelete()->cascadeOnUpdate();
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
