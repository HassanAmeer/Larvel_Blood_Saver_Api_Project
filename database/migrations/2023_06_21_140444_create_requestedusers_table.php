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
        Schema::create('requestedusers', function (Blueprint $table) {
        $table->id();
        $table->integer('requserid');
        $table->string('requsername');
        $table->string('requserprofile');
        $table->string('requserloc');
        $table->string('requserphone');
        $table->integer('donoruserid');
        $table->string('donorusername');
        $table->string('donoruserprofile');
        $table->string('donoruserphone');
        $table->string('donoruserloc');
        $table->string('donorbloodgroup');
        $table->integer('donatedstatus');
        $table->string('lasttimedonated');
        $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requestedusers');
    }
};
