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
        //f. Add a column to students table as a foreign key that references the tracks table.
        Schema::table('students', function(Blueprint $table){
            $table->unsignedBigInteger('track_id');
            $table->foreign('track_id')->references('id')->on('tracks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function(Blueprint $table){
            $table->dropForeign('students_track_id_foreign');
            // $table->dropForeign(['track_id']);
            $table->dropColumn('track_id');
        });
    }
};
