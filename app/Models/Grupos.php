<?php

namespace App\Models;

use App\Models\User;
use App\Models\Contrasenas;
use App\Models\ContrasenasGrupos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grupos extends Model
{
    public $timestamps = false; //Quita las timestamps del modelo base
    use HasFactory;

    //Datos que iran a la BD
    protected $fillable = 
    [
        'STR_NOMBRE'
        ,'STR_DESCRIPCION'
        ,'IDD_ICONOGRAFIA'
        ,'IDD_USUARIO'
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
            ->orWhere('STR_DESCRIPCION', 'like', '%' . request('search') . '%');
        }
    }

    // El grupo pertenece a el ID actual de usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'IDD_USUARIO');
    }

    // Relación con la tabla contraseñas
    public function Contrasenas()
    {
        return $this->hasMany(Contrasenas::class, 'IDD_GRUPO');
    }
}
