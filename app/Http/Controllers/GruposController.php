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
        public function show()
        {
            return view('grupos.show',
            [
            'heading' => 'CATEGORIAS'
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

        return to_route('grupos.index');
    }

    //Mostrar formulario de edición
    public function edit(Grupos $grupo)
    {
        return view('grupos.edit', ['grupo' => $grupo,
            'heading' => 'ACTUALIZAR GRUPO'
        ]);
    }

    public function update(Request $request, Grupos $grupo)
    {
        //dd($grupo->IDD_);

        if($grupo->IDD_USUARIO != auth()->id())
        {
            abort(403, 'Acción no autorizada');
        }
        $camposForm = $request->validate(
        [
            'STR_NOMBRE' => ['required', 'max:100']
            ,'STR_DESCRIPCION' => ['max:512']
        ]);
        
        $camposForm['DTE_MOD'] = date('Y-m-d');

        $grupo->update($camposForm);

        return back();
    }

    //Función para elminar el grupo de un usuario
    public function destroy(Grupos $grupo)
    {
        if($grupo->IDD_USUARIO != auth()->id())
        {
            abort(403, 'Acción no autorizada');
        }

        $grupo->delete();

        return to_route('grupos.index');
    }

}
