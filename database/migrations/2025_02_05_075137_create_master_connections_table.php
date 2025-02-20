<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_connections', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('to_user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('from_user_id')->constrained('users')->cascadeOnDelete(); // Perbaiki di sini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_connections');
    }
};
