<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosclients['clients']=Client::paginate();
        return view ('clients.index',$datosclients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosclients = request()->except(['_token','_method']); //Eliminamos el campo "token" al insertar

        if($request->hasfile('image')){ //Le quitamos el formato ".tem" para asignarle la extencion corespondiente
            
            $datosclients['image'] =$request->file('image')->store('clients','public'); //Cambiamos el nombre de la imagen y la guardamos en la carpeta uploads
                
        }
        Client::insert($datosclients);  //Insertamos Datos

         return redirect('clients');//Retornar al indexs
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client=Client::findOrFail($id); //Buscamos la info con id
        return view('clients/edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosclients = request()->except(['_token','_method']); //Eliminamos el campo "token" al insertar

        if($request->hasfile('image')){ //Le quitamos el formato ".tem" para asignarle la extencion corespondiente
            
            $client=Client::findOrFail($id); //Buscamos la info con id
            Storage::delete('public/'.$client->image);


            $datosclients['image'] =$request->file('image')->store('clients','public'); //Cambiamos el nombre de la imagen y la guardamos en la carpeta uploads
                
        }
        Client::where('id','=',$id)->update($datosclients);
        $client=Client::findOrFail($id); //Buscamos la info con id
        return view('clients/edit', compact('client'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client=Client::findOrFail($id); //Buscamos la info con id


        if(Storage::delete('public/'.$client->image)){
            Client::destroy($id); // Ejecuta destroy con el id  
            return redirect('clients');// retorna al index
        }
    }
}
