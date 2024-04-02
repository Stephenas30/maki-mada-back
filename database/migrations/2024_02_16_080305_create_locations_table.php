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
        Schema::create('locations', function (Blueprint $table) {
            $table->id('location_id');
            $table->foreignId('voiture_id')->constrained('voitures', 'voiture_id')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('clients', 'client_id')->onDelete('cascade');
            $table->datetime('date_depart');
            $table->datetime('date_retour');
            $table->string('lieu_depart');
            $table->string('lieu_depart_detaille')->nullable();
            $table->string('lieu_retour');
            $table->string('lieu_retour_detaille')->nullable();
            $table->string('hotel')->nullable();
            $table->string('souhait')->nullable();
            $table->string('assurance');
            $table->string('payement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
