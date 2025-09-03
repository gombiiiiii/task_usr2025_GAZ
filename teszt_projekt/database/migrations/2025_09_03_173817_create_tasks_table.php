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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("title")->unique();
            $table->longText('description');
            $table->date("end_date")->nullable();
            $table->foreignId('user_id')->constrained('users'); // $table->foreignId('user_id')->references('user_id')->on('users'); //ez azért nem kell mert sima id-nak neveztük el
            $table->boolean('status'); // lehetne tinyInteger is // szótár tábla -> a 0 az legyen hamis stb // ->default(false); mehetne ide a végére
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
