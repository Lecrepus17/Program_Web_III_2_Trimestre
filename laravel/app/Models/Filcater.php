<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filcater extends Model
{
    use HasFactory;
    protected $fillable = [
        'filme_fk',
        'categoria_fk'
    ];
}
