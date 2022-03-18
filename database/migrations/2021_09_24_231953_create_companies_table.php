<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('title_en')->nullable();
            $table->string('phone_number', 13)->nullable();
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->enum('market_type', ['classic', 'modern']);
            $table->foreignId('user_id');
            $table->foreignId('business_type_id')->nullable();
            $table->foreignId('product_type_id')->nullable();
            $table->text('intro');
            $table->json('details')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreign('business_type_id')->references('id')->on('definitions')->nullOnDelete()->cascadeOnUpdate();
            // $table->foreign('product_type_id')->references('id')->on('definitions')->nullOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
