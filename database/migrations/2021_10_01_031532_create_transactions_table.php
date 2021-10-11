<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('amount');
            $table->enum('status', [
                'validated',
                'approved',
                'canceled',
                'pending'
            ])->default('pending');
            $table->string('transaction_id');
            $table->string('provider');
            $table->unsignedInteger('user_id');
            $table->uuid('bill_id');
            $table->json('details')->nullable();  
            $table->timestamps();
            $table->foreign('bill_id')->references('id')->on('bills')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
