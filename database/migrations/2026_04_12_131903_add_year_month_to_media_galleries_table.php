<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('media_galleries', function (Blueprint $table) {
            $table->unsignedSmallInteger('year')->after('image_path')->default(0);
            $table->unsignedTinyInteger('month')->after('year')->default(0);
            $table->index(['year', 'month']);
        });

        // Back-fill existing rows using created_at — database agnostic (MySQL & PostgreSQL)
        \App\Models\MediaGallery::where('year', 0)
            ->orWhereNull('year')
            ->get(['id', 'created_at'])
            ->each(function ($gallery) {
                $gallery->update([
                    'year'  => (int) $gallery->created_at->format('Y'),
                    'month' => (int) $gallery->created_at->format('n'),
                ]);
            });
    }

    public function down(): void
    {
        Schema::table('media_galleries', function (Blueprint $table) {
            $table->dropIndex(['year', 'month']);
            $table->dropColumn(['year', 'month']);
        });
    }
};
