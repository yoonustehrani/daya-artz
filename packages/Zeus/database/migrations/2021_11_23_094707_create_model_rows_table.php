<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zeus_model_rows', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('model_type_id');
            $table->foreignId('model_relation_id')->nullable();
            $table->uuid('parent_id')->nullable();
            $table->string('title');
            $table->string('field')->nullable();
            $table->string('type');
            $table->enum('required', ['create', 'edit', 'both'])->nullable();
            $table->string('group')->nullable();
            $table->string('placeholder', 80)->nullable();
            $table->text('default_value')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('dynamic')->default(false);
            $table->boolean('browse')->default(true);
            $table->boolean('view')->default(true);
            $table->boolean('create')->default(false);
            $table->boolean('edit')->default(false);
            $table->boolean('trash')->default(false);
            $table->json('details');
            $table->timestamps();
            $table->foreign('model_type_id')->references('id')->on('zeus_model_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('model_relation_id')->references('id')->on('zeus_model_relations')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zeus_model_rows');
    }
}
