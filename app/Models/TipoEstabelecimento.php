<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEstabelecimento extends Model
{
    use HasFactory;

    protected $table = 'tipos_estabelecimentos';

    protected $fillable = ['descricao'];
}
