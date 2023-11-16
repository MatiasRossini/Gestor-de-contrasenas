<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

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
        ,'IDD_CREADOR'
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

    // El grupo pertenece a el ID actual de usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'IDD_CREADOR');
    }
}
