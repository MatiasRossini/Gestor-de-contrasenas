<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    public $timestamps = false; //Quita las timestamps del modelo base
    use HasFactory;

    //Datos que iran a la BD
    protected $fillable = 
    [
        'STR_NOMBRE'
        ,'STR_DESCRIPCION'
        ,'INT_NIVEL'
        ,'FLT_VALOR'
        ,'DTE_ALTA'
        ,'DTE_MOD'
        ,'DTE_BAJA'
    ];

    public function scopeFilter($query, array $filtros)
    {
        //dd($filtros);
        if ($filtros['search'] ?? false) //Si el filtro no es nulo
        {
            $query->where('STR_NOMBRE', 'like', '%' . request('search') . '%')
            ->orWhere('STR_DESCRIPCION', 'like', '%' . request('search') . '%')
            ->orWhere('FLT_VALOR', '<=', request('search'));
        }
        // if ($filtros['estado'] ?? false)
        // {
        //     switch ($filtros['estado'])
        //     {
        //         case 0:
        //             $query->orWhere('DTE_BAJA', '=', 'null');
        //             break;

        //         case 1:
        //             $query->orWhere('DTE_BAJA', '!=', 'null');
        //             break;

        //         case 2:
        //             break;
        //     }
        // }
    }
}
