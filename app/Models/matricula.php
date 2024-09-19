<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matricula extends Model
{
    use HasFactory;
    protected $fillable = ['ano','id_turma','id_prof', 'id_disciplina'];
}
