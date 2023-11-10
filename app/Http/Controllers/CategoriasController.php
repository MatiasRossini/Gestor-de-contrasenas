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
            'categorias' => Categorias::latest("DTE_ALTA")->filter(request(['search']))
            ->paginate(5) //Toma desde la fecha de creación
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
            'STR_NOMBRE' => ['required', 'max:100', Rule::unique('categorias', 'STR_NOMBRE')],
            'STR_DESCRIPCION' => 'required|max:512',
            'INT_NIVEL' => ['required', 'max:99', Rule::unique('categorias', 'INT_NIVEL')],
            'FLT_VALOR' => ['required', 'min:0', Rule::unique('categorias', 'FLT_VALOR')],   
        ]);
        
        $camposForm = array_merge($camposForm, array(
            'DTE_ALTA' => date("Y-m-d") 
            ,'DTE_MOD' => date("Y-m-d")
        ));

        Categorias::create($camposForm);

        return to_route('home');
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
        //dd($categoria->id);
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
