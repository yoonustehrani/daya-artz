<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_inputs', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('form_id')->references('id')->on('forms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('order')->default(0);
            $table->string('label');
            $table->string('type');
            $table->string('default')->nullable();
            $table->string('placeholder')->nullable();
            $table->json('details')->nullable();
            $table->boolean('required')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_inputs');
    }
}
