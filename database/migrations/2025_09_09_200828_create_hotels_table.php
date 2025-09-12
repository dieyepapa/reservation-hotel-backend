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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de l'hôtel
            $table->string('email'); // E-mail
            $table->decimal('price_per_night', 10, 2); // Prix par nuit
            $table->string('address'); // Adresse
            $table->string('phone'); // Numéro de téléphone
            $table->string('currency')->default('F XOF'); // Devise
            $table->string('image_url')->nullable(); // URL de l'image
            $table->boolean('is_active')->default(true); // ✅ ajout
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
