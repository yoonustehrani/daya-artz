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
            $table->nullableMorphs('ticketable');
            $table->string('tracking_code', 8)->unique();
            $table->string('title', 80);
            $table->foreignId('ticket_department_id')->nullable();
            $table->foreignId('user_id');
            $table->enum('status', [
                'open',
                'on-hold',
                'in-progress',
                'awaiting-reply',
                'reviewd',
                'closed'
            ]);
            $table->timestamp('closed_at')->nullable();
            $table->text('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('ticket_department_id')->references('id')->on('ticket_departments')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
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
