<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * up() est utilisée pour créer ou modifier la structure de la base de données
     */
    public function up(): void
    {
        Schema::create('sous_categories', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade'); // onDelete('cascade') signifie que si une catégorie est supprimée, toutes ses sous-catégories seront aussi supprimées automatiquement.
            $table->timestamps();
        });
    }

    /**
     * down() est utilisée pour annuler les changements.
     */
    public function down(): void
    {
        Schema::dropIfExists('sous_categories');
    }
};
