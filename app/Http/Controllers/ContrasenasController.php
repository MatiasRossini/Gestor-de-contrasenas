<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContrasenasController extends Controller
{
    // Muestra formulario para agregar contraseñas
    public function create()
    {
        return view('contrasenas.create',
        [
            'heading' => 'NUEVA CONTRASEÑA'
        ]);
    }
}
