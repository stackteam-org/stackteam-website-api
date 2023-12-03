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
        Schema::create('working_processes', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('title',255);
            $table->string('sub_text',1024);
            $table->longText("text");
            $table->enum('lang',['en','ar','fa','fr','ru']);
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
        Schema::dropIfExists('working_processes');
    }
};
