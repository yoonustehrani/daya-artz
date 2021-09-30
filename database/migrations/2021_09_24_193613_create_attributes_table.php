<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type', 15);
            $table->enum('group', ['form-field', 'add-on'])->default('form-field');
            $table->boolean('effects_on_price')->default(false);
            $table->integer('effect_value')->default(0);
            $table->enum('effect_type', ['price', 'percent', 'none'])->default('none');
            $table->json('details')->default(json_encode("[]"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributes');
    }
}
