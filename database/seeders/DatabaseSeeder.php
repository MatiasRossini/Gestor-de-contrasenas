<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\categorias;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();

        categorias::create([
                        'STR_NOMBRE' => 'Básico',
                        'STR_DESCRIPCION' => 'Estado básico de la cuenta, limitado',
                        'INT_NIVEL' => 0,                        
                        'STR_VALOR' => 'Gratis',
                        'DTE_ALTA' => 'SYSDATE()',
                        'DTE_MOD' => 'SYSDATE()',
                    ]
        );

        //categorias::create([
        //                'STR_NOMBRE' => 'Premium',
        //                'STR_DESCRIPCION' => 'Estado avanzado, más funciones',
        //                'INT_NIVEL' => 1,                        
        //                'STR_VALOR' => '$100',
        //                'DTE_ALTA' => 'SYSDATE()',
        //                'DTE_MOD' => 'SYSDATE()',
        //            ]
        //);
//
        //categorias::create([
        //                'STR_NOMBRE' => 'Empresa',
        //                'STR_DESCRIPCION' => 'Estado definitivo, paquete completo',
        //                'INT_NIVEL' => 2,                        
        //                'STR_VALOR' => '$400',
        //                'DTE_ALTA' => 'SYSDATE()',
        //                'DTE_MOD' => 'SYSDATE()',
        //            ]
        //);
    }
}
