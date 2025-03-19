<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'tipo_menu',
        'is_principal'
    ];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'items_menus', 'menu_id', 'item_id');
    }
}