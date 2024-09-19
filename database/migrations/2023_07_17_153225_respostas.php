<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('respostas', function (Blueprint $table) {
            $table->id('id_resp');
            $table->unsignedBigInteger('id_mat');
            $table->unsignedBigIntege('unidade');
            $table->unsignedBigIntege('ano');
            $table->decimal('resp_1');
            $table->decimal('resp_2');
            $table->decimal('resp_3');
            $table->decimal('resp_4');
            $table->decimal('resp_5');
            $table->timestamps();

            $table->foreign('id_mat')->references('id_mat')->on('matriculas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('respostas');
    }
};
