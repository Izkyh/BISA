<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // enum untuk kategori (Umum, Kelas, Seminar)
            $table->enum('category', ['umum', 'kelas', 'seminar']);
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->date('event_date');
            $table->string('location');
            $table->string('link')->nullable();// link eksternal (Google Form/dll)
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
