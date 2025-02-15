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
        Schema::create('request_connections', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('to_user_id')->constrained('users');
            $table->foreignUuid('from_user_id')->constrained('users');
            $table->enum('status', ['pending', 'accepted', 'rejected']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_connections');
    }
};
