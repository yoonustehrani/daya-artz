<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(false);
            $table->string('title');
            $table->foreignId('user_id');
            $table->bigInteger('amount');
            $table->foreignId('discount_id')->nullable();
            $table->foreignId('offer_id')->nullable();
            $table->foreignUuid('order_id');
            $table->timestamp('expires_at')->nullable();
            // $table->unsignedInteger('payment_rule_id');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
