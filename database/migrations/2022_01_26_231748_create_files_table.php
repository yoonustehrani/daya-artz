<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('path');
            $table->string('thumbnail_path')->nullable();
            $table->boolean('external')->default(false);
            $table->string('name');
            $table->string('ext');
            $table->enum('type', ['image', 'video', 'audio', 'other']);
            $table->softDeletes();
            $table->timestamps();
        });
        // Schema::create('fileables', function (Blueprint $table) {
        //     $table->foreignUuid('file_id');
        //     $table->morphs('fileable');
        //     $table->json('details');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
        // Schema::dropIfExists('fileables');
    }
}