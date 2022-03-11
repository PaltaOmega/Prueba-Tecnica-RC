<?php

namespace Database\Seeders;

use App\Models\SubMenu;
use Illuminate\Database\Seeder;

class SubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubMenu::create([
            'name' => 'Lista de usuarios',
            'url' => 'usuario',
            'menus_id' => '1',
            'rol_id' => '2'
        ]);

        SubMenu::create([
            'name' => 'Crear usuario',
            'url' => 'usuario/create',
            'menus_id' => '1',
            'rol_id' => '1'
        ]);

        SubMenu::create([
            'name' => 'Mostrar archivos',
            'url' => 'documentos',
            'menus_id' => '2',
            'rol_id' => '2'
        ]);

        SubMenu::create([
            'name' => 'Subir un archivo',
            'url' => 'documentos/create',
            'menus_id' => '2',
            'rol_id' => '1'
        ]);
    }
}
