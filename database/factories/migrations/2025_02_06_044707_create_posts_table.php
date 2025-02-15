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
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->json('image')->nullable();
            $table->enum('type', ['article', 'story']);
            $table->text('content');
            // $table->json('likes')->nullable();
            $table->foreignUuid('user_id')->constrained('users');
            $table->enum('visibility', ['public', 'private', 'only_connection']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
