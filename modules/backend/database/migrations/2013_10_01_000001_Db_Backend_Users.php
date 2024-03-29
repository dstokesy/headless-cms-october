<?php

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('backend_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('login')->unique('login_unique')->index('login_index');
            $table->string('email')->unique('email_unique');
            $table->string('password');
            $table->string('activation_code')->nullable()->index('act_code_index');
            $table->string('persist_code')->nullable();
            $table->string('reset_password_code')->nullable()->index('reset_code_index');
            $table->mediumText('permissions')->nullable();
            $table->boolean('is_activated')->default(0);
            $table->boolean('is_superuser')->default(false);
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('role_id')->unsigned()->nullable()->index('admin_role_index');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('backend_users');
    }
};
