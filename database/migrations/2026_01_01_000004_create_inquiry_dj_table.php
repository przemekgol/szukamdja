<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inquiry_dj', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('inquiry_id')->constrained('inquiries')->cascadeOnDelete();
            $table->foreignId('dj_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['inquiry_id', 'dj_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiry_dj');
    }
};
