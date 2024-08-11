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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 60);
            $table->enum('division', ['marketing', 'it', 'human capital', 'product', 'redaksi'])->default('marketing');
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('slug', 60)->unique();
            $table->foreignId('created_by')->constrained('users', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
