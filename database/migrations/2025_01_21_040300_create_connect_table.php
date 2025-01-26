<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('crs', function (Blueprint $table) {
        $table->id();
        $table->string('column_name');  // Ganti dengan kolom yang sesuai
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('crs');
}

};
