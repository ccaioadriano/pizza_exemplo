<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    //colunas especificadas nesta função ficaram definidas na tabela tenants
    public static function getCustomColumns(): array
    {
        return [
            'id',
            'tipo_estabelecimento_id' ,
            'razao_social'
        ];
    }

    public function tipoEstabelecimento(): BelongsTo
    {
        return $this->belongsTo(TipoEstabelecimento::class, 'tipo_estabelecimento_id', 'id');
    }

}
