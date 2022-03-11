<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function index()
    {
        $user_id = auth()->id();
        $admin = User::where('id', $user_id)->first();
        if($admin->hasRole('Admin')){
            $datos['submenus'] = SubMenu::all();
        }
        else{
            $datos['submenus'] = SubMenu::where('rol_id', 2)->get();
        }
        $datos['users']=User::all();
        $datos['menus'] = Menu::all();
        return view('menus.index', $datos);
    }

    public function create()
    {
        $user_id = auth()->id();
        $admin = User::where('id', $user_id)->first();
        if($admin->hasRole('Admin')){
            $datos['submenus'] = SubMenu::all();
        }
        else{
            $datos['submenus'] = SubMenu::where('rol_id', 2)->get();
        }
        $datos['menus'] = Menu::all();
        return view('menus.create', $datos);
    }

    public function store(request $request)
    {
        $campos = [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'password' => 'required|string|max:100'
        ];
        $mensaje=[
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El correo es requerido',
            'password.required' => 'La contraseña es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->assignRole('User');
        $user->save();

        return redirect('usuario')->with('mensaje', 'Usuario agregado con exito');
    }

    public function show(User $user)
    {

    }

    public function edit($id)
    {
        $user_id = auth()->id();
        $admin = User::where('id', $user_id)->first();
        if($admin->hasRole('Admin')){
            $datos['submenus'] = SubMenu::all();
        }
        else{
            $datos['submenus'] = SubMenu::where('rol_id', 2)->get();
        }
        $datos['user']=User::findOrFail($id);
        $datos['menus'] = Menu::all();
        return view('menus.edit', $datos);
    }

    public function update(Request $request, $id)
    {
        $campos = [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'password' => 'required|string|max:100'
        ];
        $mensaje=[
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El correo es requerido',
            'password.required' => 'La contraseña es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        $user=User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('usuario')->with('mensaje', 'Usuario editado');
    }

    public function destroy($id){
        $user=User::findOrFail($id);

        $user->delete();

        return redirect('usuario')->with('mensaje', 'Usuario borrado');
    }
}
