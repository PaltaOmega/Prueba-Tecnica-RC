<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\User;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = auth()->id();
        $admin = User::where('id', $user_id)->first();
        if($admin->hasRole('Admin')){
            $datos['documents'] = Document::all();
            $datos['submenus'] = SubMenu::all();
        }
        else{
            $datos['documents'] = Document::where('user_id', $user_id)->get();
            $datos['submenus'] = SubMenu::where('rol_id', 2)->get();
        }
        foreach ($datos['documents'] as $dato){
            $user=User::findOrFail($dato->user_id);
            $dato->name_user = $user->name;
        }
        $datos['menus'] = Menu::all();
        return view('menus.files', $datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user_id = auth()->id();
        $admin = User::where('id', $user_id)->first();
        if($admin->hasRole('Admin')){
            $datos['submenus'] = SubMenu::all();
        }
        else{
            $datos['submenus'] = SubMenu::where('rol_id', 2)->get();
        }
        $datos['users'] = User::all();
        $datos['menus'] = Menu::all();
        return view('menus.createFile', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos = [
            'name' => 'required|string|max:100',
            'user_id' => 'required',
            'archivo' => 'required|max:10000|mimes:pdf,xml,doc,docx,png,jpg,jpeg,csv'
        ];
        $mensaje=[
            'name.required' => 'El nombre es requerido',
            'user_id.required' => 'El usuario asociado es requerido',
            'archivo.required' => 'Un archivo es requerido',
            'archivo.mimes' => 'El archivo debe ser un pdf, xml, doc, docx, png, jpg, jpeg o csv'
        ];

        $this->validate($request, $campos, $mensaje);

        $document = new Document;
        $document->name = $request->name;
        $document->user_id = $request->user_id;
        $document->archivo = $request->file('archivo')->store('public');
        $document->save();

        return redirect('documentos')->with('Documento subido con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */

    public function descarga($id)
    {
        $document=Document::findOrFail($id);
        return Storage::download($document->archivo);
    }

    public function destroy($id)
    {
        //
    }
}
