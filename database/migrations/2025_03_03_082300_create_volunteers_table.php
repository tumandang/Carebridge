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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');// untuk kalau data parent xde sume data child akan terdelete
            $table->string('Fullname')->nullable();
            $table->string('Notel')->nullable();
            $table->integer('Age')->nullable();
            $table->enum('Gender',['Male','Female'])->nullable();
            $table->string('Profile')->nullable();;
            $table->string('Skill')->nullable();;
            $table->string('cgpa_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
