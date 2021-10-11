<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code');
            $table->string('title', 80);
            $table->unsignedInteger('ticket_department_id')->nullable();
            $table->enum('status', [
                'open',
                'on hold',
                'in progress',
                'awaiting reply',
                'reviewd',
                'closed'
            ]);
            $table->timestamp('closed_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('ticket_department_id')->references('id')->on('ticket_departments')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
