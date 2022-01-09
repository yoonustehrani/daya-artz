<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [
                'manual',
                'automate'
            ]);
            // $table->string('method');
            $table->enum('method', [
                'fast order',
                'professional',
                'tele-order',
                'telegram bot',
                'messanger'
            ]);
            $table->string('status', 20); // ->default(''); TO BE DESCUSSED
            $table->text('status_info')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->foreignId('offer_id')->nullable();
            // $table->timestamp('opened_at')->nullable();
            // $table->unsignedInteger('opened_by')->nullable();
            $table->json('details');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('company_id')->references('id')->on('companies')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('offer_id')->references('id')->on('offers')->nullOnDelete()->cascadeOnUpdate();
            // $table->foreign('opened_by')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
