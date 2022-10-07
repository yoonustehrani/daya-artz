<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zeus_model_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('namespace')->unique();
            $table->string('model_class');
            $table->string('slug')->unique();
            $table->string('name_singular');
            $table->string('name_plural');
            $table->string('controller')->nullable();
            $table->string('api_controller')->nullable();
            $table->string('policy')->nullable();
            $table->integer('pagination')->nullable();
            $table->boolean('soft_delete')->default(false);
            $table->json('details'); // 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zeus_model_types');
    }
}
