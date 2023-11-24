<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    public $timestamps = false; //Quita las timestamps del modelo base
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'STR_USUARIO'
        ,'STR_CORREO'
        ,'password'
        ,'DTE_ALTA'
        ,'DTE_MOD'
        ,'DTE_BAJA'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relación con la tabla grupos
    public function grupos()
    {
        return $this->hasMany(Grupos::class, 'IDD_USUARIO');
    }

    // Relación con la tabla contraseñas
    public function contrasenas()
    {
        return $this->hasMany(Contrasenas::class, 'IDD_USUARIO');
    }
}
