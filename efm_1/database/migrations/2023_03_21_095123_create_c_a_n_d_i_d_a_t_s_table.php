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
        Schema::create('c_a_n_d_i_d_a_t_s', function (Blueprint $table) {

            $table->increments("numero_dossier");
            $table->string("email")->unique();
            $table->text('idée');
            $table->boolean("status_idée")->unsigned()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_a_n_d_i_d_a_t_s');
    }
};
