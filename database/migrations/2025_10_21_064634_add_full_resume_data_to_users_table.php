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
       Schema::table('users', function (Blueprint $table) {
        // Replaces 'personal' section
        $table->string('role')->nullable();
        $table->string('address')->nullable();
        $table->string('phone')->nullable();

        // Replaces 'summary' section (using a text field for longer content)
        $table->text('summary')->nullable();

        // Store complex, multi-item data as JSON
        $table->json('projects')->nullable();
        $table->json('skills')->nullable();
        $table->json('education')->nullable();
        $table->json('certificates')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
