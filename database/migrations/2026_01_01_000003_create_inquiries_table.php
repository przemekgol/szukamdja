<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inquiries', function (Blueprint $table): void {
            $table->id();
            $table->string('client_email');
            $table->enum('event_type', ['urodziny', 'wesele', 'event', 'inne']);
            $table->string('event_type_other')->nullable();
            $table->date('event_date');
            $table->string('postal_code', 6);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
