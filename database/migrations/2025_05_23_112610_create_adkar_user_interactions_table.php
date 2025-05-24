<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('adkar_user_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('adkar_id')->constrained('adkar')->onDelete('cascade'); // ✅ تم التعديل هنا
            $table->boolean('liked')->default(false);
            $table->integer('repeat_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adkar_user_interactions');
    }
};
