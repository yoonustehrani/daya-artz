<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZeusRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zeus_role_user', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('role_id');
            $table->primary(['user_id', 'role_id']);
            $table->foreign('user_id')->references('id')->on('zeus_users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('role_id')->references('id')->on('zeus_roles')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zeus_role_user');
    }
}
