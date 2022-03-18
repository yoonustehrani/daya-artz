<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('code')->unique();
            $table->integer('value');
            $table->enum('value_type', ['amount', 'percentage']);
            $table->boolean('available_for_all')->default(false);
            $table->integer('attempts')->default(0);
            $table->integer('max_attempts');
            $table->integer('min_total')->nullable();
            $table->integer('max_total')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        // Schema::create('offerables', function (Blueprint $table) {
        //     $table->foreignId('offer_id');
            
        //     $table->foreign('offer_id')->references('id')->on('offers')->cascadeOnDelete()->cascadeOnUpdate();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
