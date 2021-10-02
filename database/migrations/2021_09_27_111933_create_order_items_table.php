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
            $table->foreignId('order_id');
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('service_plan_id');
            $table->unsignedInteger('company_id')->nullable();
            $table->string('status', 20); // TO BE DISCUSSED
            $table->text('status_info')->nullable();
            $table->bigInteger('price');
            $table->timestamp('expires_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('service_id')->references('id')->on('services')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('service_plan_id')->references('id')->on('service_plans')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('company_id')->references('id')->on('companies')->nullOnDelete()->cascadeOnUpdate();
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
