<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZeusUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zeus_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('active')->default(false);
            $table->string('first_name', 40)->nullable();
            $table->string('last_name', 40)->nullable();
            $table->foreignId('role_id')->nullable();
            $table->string('password');
            $table->enum('lang', ['fa', 'en'])->default('en');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('zeus_roles')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zeus_users');
    }
}
