<?php

namespace App\Http\Controllers;

use App\Models\Contrasenas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class ContrasenasController extends Controller
{

    // Desencripta la variable que se le entrega
    public function decrypt(Contrasenas $contrasena)
    {
        //dd($contrasena->STR_CONTRASENA);
        try 
        {
            $decrypted = Crypt::decryptString($contrasena->STR_CONTRASENA);

        } 
        catch (DecryptException $password) 
        {
            return to_route('usuarios.perfil')->with('error', 'La contraseña no se pudo desencriptar!');
        }

        return back()->with('decrypt', $decrypted);
    }

    // Muestra formulario para agregar contraseñas
    public function create()
    {
        return view('contrasenas.create',
        [
            'heading' => 'NUEVA CONTRASEÑA'
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $camposForm = $request->validate(
        [
            'STR_NOMBRE_USUARIO' => ['required', 'max:256']
            ,'STR_CONTRASENA' => ['required', 'max:256']
            ,'STR_DESCRIPCION' => ['max:512']
        ]);
            
        // Encripta la contraseña ingresada
        $camposForm['STR_CONTRASENA'] = Crypt::encryptString($camposForm['STR_CONTRASENA']);

        // Agrega la fecha de creación, modificación y el ID del usuario dueño
        $camposForm['DTE_ALTA'] = date('Y-m-d');
        $camposForm['DTE_MOD'] = date('Y-m-d');
        $camposForm['IDD_CREADOR'] = auth()->id();
    
        // Almacena en la BD
        Contrasenas::create($camposForm);
    
        return to_route('usuarios.perfil');
    }

    //Mostrar formulario de edición
    public function edit(Contrasenas $contrasena)
    {
        $contrasena['STR_CONTRASENA'] = $decrypted = Crypt::decryptString($contrasena->STR_CONTRASENA);
        //dd($contrasena);
        return view('contrasenas.edit', ['contrasena' => $contrasena,
            'heading' => 'ACTUALIZAR CONTRASEÑA'
        ]);
    }

    public function update(Request $request, Contrasenas $contrasena)
    {
        //dd($request->all());
        if($contrasena->IDD_CREADOR != auth()->id())
        {
            abort(403, 'Acción no autorizada');
        }
        $camposForm = $request->validate(
        [
            'STR_NOMBRE_USUARIO' => ['required', 'max:256']
            ,'STR_CONTRASENA' => ['required', 'max:256']
            ,'STR_DESCRIPCION' => ['max:512']
        ]);
            
        // Encripta la contraseña ingresada
        $camposForm['STR_CONTRASENA'] = Crypt::encryptString($camposForm['STR_CONTRASENA']);

        // Agrega la fecha de creación, modificación y el ID del usuario dueño
        $camposForm['DTE_MOD'] = date('Y-m-d');
        $camposForm['IDD_CREADOR'] = auth()->id();
    
        // Almacena en la BD
        $contrasena->update($camposForm);
    
        return back();
    }

        //Función para elminar la contraseña de un usuario
        public function destroy(Contrasenas $contrasena)
        {
            if($contrasena->IDD_CREADOR != auth()->id())
            {
                abort(403, 'Acción no autorizada');
            }
    
            $contrasena->delete();
    
            return to_route('usuarios.perfil');
        }    

}