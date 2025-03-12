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

    public static function getCustomColumns(): array
    {
        return [
            'id',  // Sempre manter o "id"
            'tipo_estabelecimento_id' // Essa coluna estará separada, e não dentro de "data"
        ];
    }

    public function tipo(): BelongsTo
    {
        return $this->belongsTo(TipoEstabelecimento::class, 'tipo_estabelecimento_id', 'id');
    }

}
