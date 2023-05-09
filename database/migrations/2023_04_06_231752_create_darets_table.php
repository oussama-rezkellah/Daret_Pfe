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
        Schema::create('darets', function (Blueprint $table) {
            $table->id();
            $table->string('type_ordre');
            $table->string('type_periode');
            $table->integer('periode_ac');
            $table->string('name');
            $table->date('date_start')->nullable();
            $table->date('date_last')->nullable();
            $table->date('date_final')->nullable();
            $table->double('montant');
            $table->integer('nbr_tour');
            $table->integer('curent_tour')->default(0);
            $table->integer('nbr_membre');
            $table->integer('etat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('darets');
    }
};