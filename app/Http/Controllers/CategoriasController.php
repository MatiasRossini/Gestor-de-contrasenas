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
            'heading' => 'ESTADOS PREMIUM',
            'categorias' => Categorias::latest("DTE_ALTA")->filter(request(['search']))
            ->paginate(5) //Toma desde la fecha de creación
        ]);
    }

    // Muestra una sola categoria - realizar
    public function show()
    {
        return view('categorias.show',
        [
        'heading' => 'CATEGORIAS'
        ]);
    }

    // Formulario para crear nueva categoria
    public function create()
    {
        return view('categorias.create',
        [
            'heading' => 'NUEVA CATEGORIA'
        ]);
    }

    // Almacenado en la BD de la categoria creada
    public function store(Request $request)
    {
        //dd($request->all());
        $camposForm = $request->validate(
        [
            'STR_NOMBRE' => ['required', 'max:100', Rule::unique('categorias', 'STR_NOMBRE')],
            'STR_DESCRIPCION' => 'required|max:512',
            'INT_NIVEL' => ['required', 'max:99', Rule::unique('categorias', 'INT_NIVEL')],
            'FLT_VALOR' => ['required', 'min:0', Rule::unique('categorias', 'FLT_VALOR')],   
        ]);
        
        $camposForm['DTE_ALTA'] = date('Y-m-d');
        $camposForm['DTE_MOD'] = date('Y-m-d');

        Categorias::create($camposForm);

        return to_route('categorias.index');
    }

    //Mostrar formulario de edición
    public function edit(Categorias $categoria)
    {
        return view('categorias.edit', ['categoria' => $categoria,
            'heading' => 'ACTUALIZAR CATEGORIA'
        ]);
    }

    public function update(Request $request, Categorias $categoria)
    {
        //dd($categoria);
        $camposForm = $request->validate(
        [
            'STR_NOMBRE' => ['required', 'max:100', Rule::unique('categorias', 'STR_NOMBRE', $categoria)->ignore($categoria)]
            ,'STR_DESCRIPCION' => 'required|max:512'
            ,'INT_NIVEL' => ['required', 'max:99', Rule::unique('categorias', 'INT_NIVEL', $categoria)->ignore($categoria)]
            ,'FLT_VALOR' => ['required', 'min:0', Rule::unique('categorias', 'FLT_VALOR', $categoria)->ignore($categoria)]
        ]);
        
        $camposForm = array_merge($camposForm, array(
            'DTE_MOD' => date("Y-m-d")
        ));

        $categoria->update($camposForm);

        return back();
    }

}
