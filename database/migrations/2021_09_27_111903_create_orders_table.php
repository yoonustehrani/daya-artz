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
            $table->uuid('id')->primary();
            $table->enum('type', ['manual','automate']);
            $table->enum('method', [
                'quick-order',
                'professional',
                'tele-order',
                'telegram-bot',
                'messanger'
            ]);
            $table->string('code', 12);
            $table->string('status');
            $table->text('status_info')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignUuid('company_id')->nullable();
            $table->foreignId('offer_id')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->json('details');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('company_id')->references('id')->on('companies')->nullOnDelete()->cascadeOnUpdate();
            // $table->foreign('offer_id')->references('id')->on('offers')->nullOnDelete()->cascadeOnUpdate();
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
