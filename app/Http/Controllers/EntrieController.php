<?php

namespace App\Http\Controllers;

use App\Models\Entrie;
use Illuminate\Http\Request;

class EntrieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosentries['entries']=Entrie::paginate();
        return view ('entries.index',$datosentries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('entries.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosentries = request()->except(['_token','_method']); //Eliminamos el campo "token" al insertar
        Entrie::insert($datosentries);  //Insertamos Datos

         return redirect('entries');//Retornar al indexs
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entri=Entrie::findOrFail($id); //Buscamos la info con id
        Entrie::destroy($id); // Ejecuta destroy con el id  
        return redirect('entries');// retorna al index
    }
}
