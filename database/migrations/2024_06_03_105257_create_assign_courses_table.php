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
        Schema::create('assign_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('programmeid')->nullable();
            $table->integer('courseid')->nullable();
            $table->integer('semesterid')->nullable();
            $table->integer('userid')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_cources');
    }
};
