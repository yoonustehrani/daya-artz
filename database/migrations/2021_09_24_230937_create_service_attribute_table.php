<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_attribute', function (Blueprint $table) {
            $table->foreignId('service_id');
            $table->foreignId('attribute_id');
            $table->foreign('service_id')->references('id')->on('services')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('attribute_id')->references('id')->on('attributes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('page')->default(1);
            $table->integer('order')->default(1);
            $table->primary(['service_id', 'attribute_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_attribute');
    }
}
