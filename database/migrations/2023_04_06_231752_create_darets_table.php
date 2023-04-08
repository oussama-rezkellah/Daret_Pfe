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
               $table->string('name');
            $table->string('type_ordre');
            $table->string('type_periode');
            $table->double('montant');
            $table->integer('nbr_tour');
            $table->integer('nbr_membre');
            $table->integer('etat')->default(0);
            $table->date('type_ordre');
            $table->date('type_ordre');
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
