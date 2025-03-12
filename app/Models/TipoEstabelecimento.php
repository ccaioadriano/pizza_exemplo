<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEstabelecimento extends Model
{
    use HasFactory;

    protected $table = 'tipos_estabelecimentos';

    // Define que esta model sempre usará a conexão do banco central
    protected $connection = 'sqlite';

    protected $fillable = ['descricao'];
}
