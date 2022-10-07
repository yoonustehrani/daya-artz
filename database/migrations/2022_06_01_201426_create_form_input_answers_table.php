<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormInputAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_input_answers', function (Blueprint $table) {
            $table->foreignId('input_id')->references('id')->on('form_inputs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('answer_id')->references('id')->on('form_answers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('value');
            $table->primary(['input_id', 'answer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_input_answers');
    }
}
