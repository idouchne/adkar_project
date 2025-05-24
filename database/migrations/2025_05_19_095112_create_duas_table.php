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
    public function up()
{
    Schema::create('duas', function (Blueprint $table) {
        $table->id();
        $table->string('title')->nullable();
        $table->text('dua');
        $table->string('source')->nullable();
        $table->text('translation')->nullable();
        $table->string('category')->nullable(); // يمكنك جعلها غير nullable إذا كانت مطلوبة
        $table->timestamps();

          Schema::table('duas', function (Blueprint $table) {
        $table->string('category')->after('title')->nullable();
    });
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duas');
        
         Schema::table('duas', function (Blueprint $table) {
        $table->dropColumn('category');
    });
    }
};
