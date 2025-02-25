<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_connections', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('to_user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('from_user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('request_id')->constrained('request_connections')->cascadeOnDelete();
            $table->timestamp('connected_at')->nullable();
            $table->enum('status', ['active', 'blocked', 'removed'])->default('active');
            $table->timestamps();

            // Prevent duplicate connections
            $table->unique(['from_user_id', 'to_user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_connections');
    }
};
