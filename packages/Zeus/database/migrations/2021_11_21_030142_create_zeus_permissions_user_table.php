<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZeusPermissionsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zeus_permission_user', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('permission_id');
            $table->primary(['user_id', 'permission_id']);
            $table->foreign('user_id')->references('id')->on('zeus_users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('permission_id')->references('id')->on('zeus_permissions')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zeus_permission_user');
    }
}
