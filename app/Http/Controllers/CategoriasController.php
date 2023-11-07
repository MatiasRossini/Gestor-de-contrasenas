<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function show()
    {
        return view('categorias.show',
        [
        'heading' => 'CATEGORIAS'
        ]);
    }

    public function create()
    {
        return view('categorias.create',
        [
            'heading' => 'NUEVA CATEGORIA'
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $camposForm = $request->validate(
        [
            'STR_NOMBRE' => ['required', Rule::unique('categorias', 'STR_NOMBRE')],
            'STR_DESCRIPCION' => 'required',
            'INT_NIVEL' => ['required', Rule::unique('categorias', 'INT_NIVEL')],
            'INT_VALOR' => ['required', Rule::unique('categorias', 'INT_VALOR')],   
        ]);
        
        $camposForm = array_merge($camposForm, array(
            'DTE_ALTA' => date("Y-m-d") 
            ,'DTE_MOD' => date("Y-m-d")
        ));

        // $camposForm = (
        //     'DTE_ALTA' => date("Y-m-d") 
        //     ,'DTE_MOD' => date("Y-m-d")
        // );
        
        Categorias::create($camposForm);

        return to_route('home');
    }

}
