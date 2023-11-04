<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filtros)
    {
        if ($filtros['search'] ?? false) //Si el filtro no es nulo
        {
            $query->where('STR_NOMBRE', 'like', '%' . request('search') . '%')
            ->orWhere('STR_DESCRIPCION', 'like', '%' . request('search') . '%')
            ->orWhere('INT_VALOR', '<=',  request('search'));
        }
    }
}
