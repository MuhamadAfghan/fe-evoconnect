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
            $table->uuid('group_connections_id')->nullable(); // Make this column nullable
            $table->json('image')->nullable();
            $table->enum('type', ['article', 'story']);
            $table->text('content');
            // $table->json('likes')->nullable();
            $table->foreignUuid('user_id')->constrained('users');
            $table->enum('visibility', ['public', 'private', 'only_connection']);
            $table->timestamps();

            $table->foreign('group_connections_id')->references('id')->on('group_connections');
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