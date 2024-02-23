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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id('voiture_id');
            $table->string('nom_voiture');
            $table->string('boite');
            $table->string('puissance');
            $table->decimal('tarif', 12, 2);
            $table->decimal('frais_livraison', 12, 2);
            $table->string('place');
            $table->integer('coffre');
            $table->integer('porte');
            $table->boolean('clim');
            $table->string('radio');
            $table->boolean('gps');
            $table->boolean('rehausseur');
            $table->boolean('bebe');
            $table->boolean('traction');
            $table->boolean('decapotable');
            $table->boolean('utilitaire');
            $table->boolean('dispo');
            $table->string('lieu_dispo');
            $table->string('motorisation');
            $table->string('symbole');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
