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
        Schema::create('inpound_lot', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('Make');
            $table->string('reg_nr');
            $table->string('owner')->nullable();
            $table->integer('fine');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inpound_lot');
    }
};
