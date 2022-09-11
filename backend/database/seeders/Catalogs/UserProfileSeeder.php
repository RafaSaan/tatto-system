<?php

namespace Database\Seeders\Catalogs;

use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['key'    => 'super_admin','name'   => 'Super Admin'],
            ['key'    => 'administrator','name'   => 'Administrador'],
            ['key'    => 'artist','name' => 'Artista'],
            ['key'    => 'client','name' => 'Cliente'],
            ['key'    => 'invoices','name' => 'Facturas'],
        ];        
        foreach($users as $user){
            $usuarios = UserProfile::where('key',$user['key'])->first();
            if(is_null($usuarios)){
                UserProfile::create($user);
            }else {
                $usuarios->update($user);
            }
        }
    }
}
