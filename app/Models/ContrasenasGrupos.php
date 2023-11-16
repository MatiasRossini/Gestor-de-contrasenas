<?php

namespace App\Models;

use App\Models\Grupos;
use App\Models\Contrasenas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContrasenasGrupos extends Model
{
    use HasFactory;



    // El el conector pertenece la contraseña actual
    public function contrasena()
    {
        return $this->belongsTo(Contrasenas::class, 'IDD_CONTRASENA');
    }

    // El el conector pertenece al grupo actual
    public function grupos()
    {
        return $this->belongsTo(Grupos::class, 'IDD_GRUPO');
    }
}
