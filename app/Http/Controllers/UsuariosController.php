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
            'STR_USUARIO' => ['required', 'min:10' , 'max:255', Rule::unique('users', 'STR_NOMBRE')]
            ,'STR_CORREO' => ['required', 'email' , Rule::unique('users', 'STR_CORREO')]
            ,'password' =>  [ 'required', 'min:10', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 'confirmed'] //Revisa que tenga al menos 1 de cada caracter y que este confirmada
            ,'PRIVACY_POLITICS' => ['required']
        ]);

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

        return to_route('usuarios.perfil');
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
            ]);

            if(auth()->attempt($camposForm))
            {
                $request->session()->regenerate();

                return to_route('usuarios.perfil');
            }
        
            return back()->withErrors(['STR_CORREO' => 'Credenciales no validas'])->onlyInput('STR_CORREO');
    }
}
