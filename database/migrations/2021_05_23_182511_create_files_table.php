<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id()->comment('ردیف');
            $table->unsignedBigInteger('user_id')->nullable()->comment('ردیف کاربر');
            $table->integer('type_id')->default(0)->comment('ردیف جدول');
            $table->string('type')->nullable()->comment('نام جدول');
            $table->string('url',255)->comment('آدرس');
            $table->string('name',255)->comment('نام');
            $table->string('extend',255)->comment('پسوند');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
