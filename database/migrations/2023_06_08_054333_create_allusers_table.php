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
        Schema::create('allusers', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('profile_image');
            $table->string('phonecode');
            $table->integer('phone');
            $table->string('password');
            $table->string('bloodgroup');
            $table->string('role');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allusers');
    }
};
