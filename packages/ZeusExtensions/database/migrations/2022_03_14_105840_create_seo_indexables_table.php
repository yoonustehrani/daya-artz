<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoIndexablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_indexables', function (Blueprint $table) {
            $table->id();
            $table->morphs('indexable');
            $table->text('description')->nullable();
            $table->string('primary_keyword');
            $table->integer('primary_keyword_score');
            $table->integer('readability_score');
            $table->integer('link_count')->default(0);
            $table->integer('reading_time');
            // meta robots
            $table->text('robots');
            // open graph
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->text('og_image_src')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_indexables');
    }
}