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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle')->nullable(); // e.g. "Top performing"
            $table->string('title'); // e.g. "01. Web Design"
            $table->text('description')->nullable();
            $table->json('tools')->nullable(); // list of tools e.g. ["Figma", "Webflow"]
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
