<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::create('adkar', function (Blueprint $table) {
        $table->id();
        $table->string('text');
        $table->string('source')->nullable();
        $table->string('category')->nullable();
        $table->integer('repeat')->default(1);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adkar');
    }
};
