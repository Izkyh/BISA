<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('board_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position'); // Ketua Harian, Sekretaris, Bendahara, etc
            $table->enum('type', ['founder', 'board', 'member'])->default('board');
            // founder = Pembina/Founder
            // board = Kepengurusan
            // member = Anggota biasa

            $table->date('birth_date')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->string('occupation')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('social_media')->nullable(); // Instagram, Twitter, etc
            $table->string('photo_path')->nullable();
            $table->integer('order')->default(0); // Untuk sorting urutan tampil
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('board_members');
    }
};
