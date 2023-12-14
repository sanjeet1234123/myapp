<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique;
            $table->string('email')->unique;
            $table->string('contact_number')->unique;
            $table->string('role');
            $table->string('password');
            $table->unsignedBigInteger('lib_id');
            $table->foreign('lib_id')->references('id')->on('library1');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
