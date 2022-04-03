<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zeus_model_relations', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [
                'belongsTo',
                'belongsToMany',
                'hasOne',
                'hasMany',
                'morphOne',
                'morphMany'
            ]); // TODO : enum
            $table->foreignUuid('model_type_id');
            $table->foreignUuid('target_model_type');
            $table->string('local_method');
            // $table->string('target_model');
            // $table->string('target_method')->nullable();
            // $table->string('target_route')->nullable();
            // $table->enum('loading_method', [

            // ]);
            // $table->json('details');

            $table->foreign('model_type_id')
                ->references('id')
                ->on('zeus_model_types')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('target_model_type')
                ->references('id')
                ->on('zeus_model_types')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zeus_model_relations');
    }
}
