<?php

namespace App\Http\Controllers;

use App\Models\Grupos;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    // Muestra todos los grupos del usuario
    public function index() 
    {
        return view('grupos.index', 
        [
            'heading' => 'GRUPOS',
            'grupos' => Grupos::latest("DTE_ALTA")->filter(request(['search']))
            ->paginate(5) //Toma desde la fecha de creación
        ]);
    }
}
