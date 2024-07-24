<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained()->onDelete('cascade');
            $table->string('mata_pelajaran');
            $table->integer('nilai');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('nilais');
    }
};
