<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketDepartmentUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_department_user', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('ticket_department_id');
            $table->string('role', 20)->nullable();
            $table->primary(['user_id', 'ticket_department_id']);
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('ticket_department_id')->references('id')->on('ticket_departments')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_department_user');
    }
}
