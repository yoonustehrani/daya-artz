<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignUuid('order_id');
            $table->foreignId('service_id')->nullable();
            $table->foreignId('plan_id')->nullable();
            $table->foreignUuid('company_id')->nullable();
            $table->foreignId('offer_id')->nullable();
            $table->string('status');
            $table->text('status_info')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('total')->default(0);
            $table->timestamp('due_date')->nullable();
            $table->softDeletes();
            $table->timestamp('finished_at')->nullable();
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('service_id')->references('id')->on('services')->nullOnDelete()->cascadeOnUpdate();
            // $table->foreign('company_id')->references('id')->on('companies')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
