<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    // Mostrar todas las categorías
    public function index() 
    {
        return view('categorias.index', 
        [
            'heading' => 'CATEGORIAS',
            'categorias' => Categorias::latest("DTE_ALTA")->filter(request(['search']))->get() //Toma desde la fecha de creación
        ]);
    }

}
