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
        //e. Add a unique index to the IDno column in the students table.
        schema::table('students', function(Blueprint $table){
            $table->unique('IDno');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::table('students', function(Blueprint $table){
            $table->dropIndex('students_IDno_unique');
        });
    }
};
