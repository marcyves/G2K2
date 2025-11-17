<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use \App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignId('group_grader_id')->references('id')->on('groups');
            $table->foreignId('group_graded_id')->references('id')->on('groups');
            $table->integer('clarity')->default(0);
            $table->integer('answers')->default(0);
            $table->integer('originality')->default(0);
            $table->integer('knowledge')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
