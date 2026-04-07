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
        Schema::create('want_to_read', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->ForeignId('user_id')->constrained('users')->onDelete('cascade');
            $table->ForeignId('book_id')->constrained('books')->onDelete('cascade');
            $table->primary(['user_id', 'book_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('want_to_read');
    }
};
