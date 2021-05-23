<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->comment('نام');
            $table->string('lastName',255)->comment('نام خانوادگی');
            $table->string('email',255)->unique()->comment('ایمیل');
            $table->string('phone',11)->nullable()->comment('شماره تلفن همراه');
            $table->string('password',255)->comment('رمزعبور');

            $table->string('code',255)->nullable()->comment('کد (احراز)');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
