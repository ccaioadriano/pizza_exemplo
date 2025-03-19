<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'titulo',
        'descricao',
        'image_path',
        'preco',
    ];

    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class, 'items_menus', 'item_id', 'menu_id');
    }
}