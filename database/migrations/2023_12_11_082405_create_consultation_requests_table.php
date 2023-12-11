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
        Schema::create('consultation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('contact_method'); // می‌تواند شماره تلفن یا ایمیل باشد.
            $table->text('admin_notes')->nullable(); // نوت‌های ادمین پس از تماس.
            $table->boolean('contacted')->default(false); // آیا مشاوره انجام شده یا خیر.
            $table->enum('method_type', ['email', 'phone']);
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
        Schema::dropIfExists('consultation_requests');
    }
};
