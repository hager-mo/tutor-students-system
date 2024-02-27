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
    	// b. Rename people table to students table.
        Schema::rename('people', 'students');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('students', 'people');

    }
};
