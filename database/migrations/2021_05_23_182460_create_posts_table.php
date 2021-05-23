<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->comment('ردیف');
            $table->unsignedBigInteger('user_id')->nullable()->comment('ردیف کاربر');
            $table->unsignedBigInteger('category_id')->nullable()->comment('ردیف دسته');
            $table->string('title',255)->comment('تیتر');
            $table->longText('description')->nullable()->comment('توضیحات');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
