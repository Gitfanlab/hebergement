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
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id')->constrained('profils');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->boolean('chef_de_poste')->nullable();
            $table->foreignId('poste_id')->constrained('postes');
            $table->foreignId('personnel_id')->constrained('personnels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations');
    }
};
