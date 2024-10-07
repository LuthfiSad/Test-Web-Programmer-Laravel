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
        Schema::create('std_with_extras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_std');
            $table->foreign('id_std')->references('id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('id_extras');
            $table->foreign('id_extras')->references('id')->on('extracurriculars')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('std_with_extras');
    }
};
