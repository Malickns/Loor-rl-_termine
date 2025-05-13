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
        Schema::create('historique', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('objet_id');
            $table->enum('ancien_statut', ['perdu', 'trouve', 'restitué']);
            $table->enum('nouveau_statut', ['perdu', 'trouve', 'restitué']);
            $table->timestamp('date_changement')->useCurrent();
            $table->unsignedBigInteger('utilisateurs_id');
            $table->foreign('objet_id')->references('id')->on('objets')->onDelete('cascade');
            $table->foreign('utilisateurs_id')->references('id')->on('utilisateurs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historique');
    }
};
