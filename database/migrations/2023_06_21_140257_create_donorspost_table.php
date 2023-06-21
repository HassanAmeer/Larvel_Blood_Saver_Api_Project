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
        Schema::create('donorspost', function (Blueprint $table) {
        $table->id();
        $table->integer('userid');
        $table->string('username');
        $table->string('userprofile');
        $table->string('phonecode');
        $table->string('phone');
        $table->string('bloodgroup');
        $table->integer('available');
        $table->integer('donorstatus');
        $table->string('country');
        $table->string('state');
        $table->string('city');
        $table->string('lasttimedonated');
        $table->string('description');
        $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donorspost');
    }
};
