<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsuariosController extends Controller
{

    // Muestra la pestaña principal del usuario
    public function perfil()
    {
        return view('usuarios.index', [
            'heading' => 'Perfil de ' . auth()->user()->STR_USUARIO
            ,'contrasenas' => auth()->user()->contrasenas()->latest("DTE_MOD")->filter(request(['search']))
            ->paginate(5)
            ,'grupos' => auth()->user()->grupos()->latest("DTE_MOD")->filter(request(['search']))
            ->paginate(4)
        ]);
    }

    // Muestra formulario para crear usuario
    public function create()
    {
        return view('usuarios.register',
        [
            'heading' => 'Registro'
        ]);
    }

    // Crear nuevo usuario
    public function store(Request $request)
    {
        //dd($request->all());
        $camposForm = $request->validate(
        [
            'STR_USUARIO' => ['required', 'min:10' , 'max:255', Rule::unique('users', 'STR_USUARIO')]
            ,'STR_CORREO' => ['required', 'email' , Rule::unique('users', 'STR_CORREO')]
            ,'password' =>  [ 'required', 'min:10', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 'confirmed'] //Revisa que tenga al menos 1 de cada caracter y que este confirmada
            ,'PRIVACY_POLITICS' => ['required']
        ]);

        //Convierte el correo en lowercase
        $camposForm['STR_CORREO'] =  strtolower($camposForm['STR_CORREO']);

        // Hash contraseña
        $camposForm['password'] = bcrypt($camposForm['password']); //Hashea
        
        // Agrega las fechas de alta y modificación
        $camposForm = array_merge($camposForm, array(
            'DTE_ALTA' => date("Y-m-d") 
            ,'DTE_MOD' => date("Y-m-d")
        ));

        //Crear usuario en la BD
        $usuario = User::create($camposForm);

        //Inicia sesión automaricamente
        auth()->login($usuario);

        return to_route('usuarios.perfil')->with('success', 'Cuenta creada correctamente');
    }

    // Cerrar sesion del usuairo
    public function logout(Request $request)
    {
        //Cierra la sesion
        auth()->logout();

        //Invalida y reinicia la sesion
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('index');    
    }

    // Mostrar formulario de login
    public function login()
    {
        return view('usuarios.login',
        [
            'heading' => 'Iniciar sesión'
        ]);
    }

    // Autenticar el usuario
    public function authenticate(Request $request)
    {
        //dd($request->all());
        $camposForm = $request->validate(
            [
                'STR_CORREO' => ['required', 'email']
                ,'password' => ['required'] 
            ]
        );

        // Convierte el correo en lowercase
        $camposForm['STR_CORREO'] =  strtolower($camposForm['STR_CORREO']);

        if(auth()->attempt($camposForm))
        {
            $request->session()->regenerate();
            return to_route('usuarios.perfil');
        }
        
        return back()->withErrors(['STR_CORREO' => 'Credenciales no validas'])->onlyInput('STR_CORREO');
    }

    //Muestra pagina ajustes del usuario
    public function ajustes()
    {
        return view('system/ajustes', [
            'heading' => 'AJUSTES'
            ,'user' => auth()->user()
        ]);
    }

    //Mostrar formulario de edición
    public function edit(User $usuario)
    {
        //dd($usuario->id);
        if($usuario->id != auth()->id())
        {
            return to_route('index')->with('error', 'No se pudo acceder a la pagina');
        }
    
        return view('usuarios.edit', 
        [
            'usuario' => $usuario
            ,'heading' => 'ACTUALIZAR DATOS'
        ]);
    }

    // Actualiza el usuario
    public function update(Request $request, User $usuario)
    {
        //dd($request->all());
        $camposForm = $request->validate(
        [
            'STR_USUARIO' => ['required', 'min:10' , 'max:255', Rule::unique('users', 'STR_USUARIO', $usuario)->ignore($usuario)]
        ]);

        // Agrega las fechas de alta y modificación
        $camposForm = array_merge($camposForm, array(
            'DTE_MOD' => date("Y-m-d")
        ));

        //Crear usuario en la BD
        $usuario->update($camposForm);

        //Inicia sesión automaricamente
        auth()->login($usuario);

        return to_route('usuarios.perfil')->with('success', 'Cuenta actualizada correctamente');
    }
    
    //Función para elminar usuario
    public function destroy(Request $request, User $usuario)
    {
        if($usuario->id != auth()->id())
        {
            return to_route('index')->with('error', 'No se pudo acceder a la pagina');
        }

        $contrasenas = auth()->user()->contrasenas();

        $grupos = auth()->user()->grupos();

        $contrasenas->delete();
        $grupos->delete();

        $usuario->delete();

        //Cierra la sesion
        auth()->logout();

        //Invalida y reinicia la sesion
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('index');  
    }
}
