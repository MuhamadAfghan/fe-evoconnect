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
        Schema::create('education', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('institution');
            $table->string('description');
            $table->string('degree');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->foreignUuid('users_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
