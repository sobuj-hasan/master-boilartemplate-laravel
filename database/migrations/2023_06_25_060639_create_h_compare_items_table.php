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
        Schema::create('h_compare_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('h_compare_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->text('image');
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h_compare_items');
    }
};
