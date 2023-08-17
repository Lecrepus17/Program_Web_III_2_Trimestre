<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sinopse',
        'ano',
        'imagem',
        'link'
    ];
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'filcaters', 'filme_fk', 'categoria_fk');
    }
}
