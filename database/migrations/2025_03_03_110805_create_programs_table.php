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
        Schema::create('programs', function (Blueprint $table) {
            $table->id('program_id');
            $table->foreignId('admin_id')->constrained(
                table: 'admins',
                indexName:'programs_admin_id'
            )->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->foreignId('address_id')->constrained();
            $table->date('startdate');
            $table->date('enddate');
            $table->date('deadline');
            $table->json('type');
            $table->string('status');
            $table->integer('max_vol');
            $table->string('poster')->nullable();
            $table->string('linkgroup');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
