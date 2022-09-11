<?php

namespace Database\Seeders\Catalogs;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //===================== Dashboard ===============================
        Module::updateOrCreate([
            'name'     =>'Modulos generales',
            'code'     => 'module_general'
        ]);
        //===================== USER (admin) ============================
        Module::updateOrCreate([
            'name'     =>'Módulo Usuarios',
            'code'     =>'module_users'
        ]);
        //===================== ROLES (user profile)  ===================
        Module::updateOrCreate([
            'name'     =>'Módulo roles',
            'code'     =>'module_roles'
        ]);
        //===================== CATALOGS ================================
        Module::updateOrCreate([
            'name'     =>'Módulo catalogos',
            'code'     => 'module_admin'
        ]);
        
         //===================== System Settings ========================
        Module::updateOrCreate([
            'name'     => 'Módulo de ajustes del sistema',
            'code'     => 'module_settings'
        ]);
    }
}
