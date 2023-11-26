<?php

namespace App\Http\Controllers;

use App\Models\Grupos;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GruposController extends Controller
{
    // Muestra todos los grupos del usuario
    public function index() 
    {
        return view('grupos.index', 
        [
            'heading' => 'GRUPOS',
            'grupos' => auth()->user()->grupos()->latest("DTE_ALTA")->filter(request(['search']))
            ->paginate(5) //Toma desde la fecha de creación
        ]);
    }

    // Pagina donde muestra todas las contraseñas del grupo
    public function show(Grupos $grupo)
    {
        if($grupo->IDD_USUARIO != auth()->id())
        {
            return to_route('index')->with('error', 'No se pudo acceder al grupo');
        }
        
        return view('grupos.show',
        [
            'grupo' => $grupo
            ,'heading' => 'Grupo: '. $grupo->STR_NOMBRE
            ,'contrasenas' => $grupo->Contrasenas()->latest('DTE_ALTA')
            ->filter(request(['search']))
            ->paginate(5)
        ]);
    }
    
    // Formulario para crear un nuevo grupo
    public function create()
    {
        return view('grupos.create',
        [
            'heading' => 'NUEVO GRUPO'
        ]);
    }

    // Almacenado en la BD de la categoria creada
    public function store(Request $request)
    {
        //dd($request->all());
        $camposForm = $request->validate(
        [
            'STR_NOMBRE' => ['required', 'max:100']
            ,'STR_DESCRIPCION' => ['max:512']
        ]);
        
        $camposForm['DTE_ALTA'] = date('Y-m-d');
        $camposForm['DTE_MOD'] = date('Y-m-d');
        $camposForm['IDD_USUARIO'] = auth()->id();

        Grupos::create($camposForm);

        return to_route('grupos.index')->with('success', 'Grupo creado correctamente');
    }

    //Mostrar formulario de edición
    public function edit(Grupos $grupo)
    {
        if($grupo->IDD_USUARIO != auth()->id())
        {
            return to_route('index')->with('error', 'No se pudo acceder al grupo');
        }

        return view('grupos.edit', ['grupo' => $grupo,
            'heading' => 'ACTUALIZAR GRUPO'
        ]);
    }

    public function update(Request $request, Grupos $grupo)
    {
        //dd($grupo->IDD_);
        if($grupo->IDD_USUARIO != auth()->id())
        {
            return to_route('index')->with('error', 'No se pudo acceder al grupo');
        }
        $camposForm = $request->validate(
        [
            'STR_NOMBRE' => ['required', 'max:100']
            ,'STR_DESCRIPCION' => ['max:512']
        ]);
        
        $camposForm['DTE_MOD'] = date('Y-m-d');

        $grupo->update($camposForm);

        return back()->with('success', 'Grupo actualizado correctamente');
    }

    //Función para elminar el grupo de un usuario
    public function destroy(Grupos $grupo)
    {
        if($grupo->IDD_USUARIO != auth()->id())
        {
            return to_route('index')->with('error', 'No se pudo acceder al grupo');
        }

        

        $grupo->delete();

        return to_route('grupos.index')->with('success', 'Grupo eliminado correctamente');
    }

}
