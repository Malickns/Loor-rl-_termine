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
        //
        Schema::create('objets', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->unsignedBigInteger('categorie_id');
            $table->date('date_perte_trouvaille')->nullable();
            $table->string('lieu_perte_trouvaille')->nullable();
            $table->string('photo');
            $table->string('telephone');
            $table->string('proprietaire');
            $table->enum('statut', ['perdu', 'trouve', 'restitué'])->default('perdu');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
             });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('objets');
    }
};
