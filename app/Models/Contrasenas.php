<?php

namespace App\Models;

use App\Models\Grupos;
use App\Models\ContrasenasGrupos;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contrasenas extends Model
{
    public $timestamps = false; //Quita las timestamps del modelo base
    use HasFactory;

    //Datos que iran a la BD
    protected $fillable = 
    [
        'STR_NOMBRE_USUARIO'
        ,'STR_CONTRASENA'
        ,'STR_DESCRIPCION'
        ,'IDD_ICONOGRAFIA'
        ,'IDD_GRUPO'
        ,'IDD_USUARIO'
        ,'DTE_ALTA'
        ,'DTE_MOD'
    ];

    public function scopeFilter($query, array $filtros)
    {
        //dd($filtros);
        if ($filtros['search'] ?? false) //Si el filtro no es nulo
        {
            $query->where('STR_DESCRIPCION', 'like', '%' . request('search') . '%')
            ->orWhere('STR_NOMBRE_USUARIO', 'like', '%' . request('search') . '%');
        }
    }

    // La contraseña pertenece a el ID actual de usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'IDD_USUARIO');
    }

    // Relación con la tabla contraseñas
    public function Grupos()
    {
        return $this->belongsTo(Grupos::class, 'IDD_GRUPO');
    }
}
