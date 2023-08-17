<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function filmes()
    {
        return $this->belongsToMany(Filme::class, 'filcaters', 'categoria_fk', 'filme_fk');
    }
}
