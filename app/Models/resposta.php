<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resposta extends Model
{
    use HasFactory;
    protected $fillable = [	'id_mat','ano','unidade','resp_1','resp_2' ,'resp_3' ,'resp_4','resp_5' ];
}
