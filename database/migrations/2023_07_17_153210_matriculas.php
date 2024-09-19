<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id('id_mat');
            $table->year('ano');
            $table->unsignedBigInteger('id_turma');
            $table->unsignedBigInteger('id_prof')->nullable();
            $table->unsignedBigInteger('id_disciplina');
            $table->timestamps();

            $table->foreign('id_turma')->references('id_turma')->on('turmas');
            $table->foreign('id_prof')->references('id_prof')->on('professores');
            $table->foreign('id_disciplina')->references('id_disciplina')->on('disciplinas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
};
