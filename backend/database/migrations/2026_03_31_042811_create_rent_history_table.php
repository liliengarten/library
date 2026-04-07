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
        Schema::create('rent_history', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->ForeignId('user_id')->constrained('users')->onDelete('cascade');
            $table->ForeignId('book_id')->constrained('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_history');
    }
};
