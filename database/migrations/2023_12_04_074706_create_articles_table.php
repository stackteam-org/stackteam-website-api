<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('author_id')->constrained('users');
            $table->string('title');
            $table->text('subtext')->nullable();
            $table->text('text');
            $table->foreignId('category_id')->constrained();
            $table->integer('visit')->default(0);
            $table->integer('read_time');
            $table->integer('like')->default(0);
            $table->enum('lang', ['en', 'fa']);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
