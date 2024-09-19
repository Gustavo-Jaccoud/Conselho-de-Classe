<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('professores', function (Blueprint $table) {
            $table->id('id_prof');
            $table->string('nome_prof');
            $table->string('SIAP');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('professores');
    }
};
