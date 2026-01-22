<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articoli', function (Blueprint $table) {
            $table->foreignId('categoria_id')->nullable()->constrained('categorie')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('articoli', function (Blueprint $table) {
            $table->dropForeignIdFor('categorie');
        });
    }
};
