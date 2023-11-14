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
        Schema::create('trusted_client_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->nullable();
            $table->string('photo')->nullable();
            $table->foreignUuid('trusted_client_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trusted_client_items');
    }
};
