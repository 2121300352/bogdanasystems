<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosbrands['brands']=Brand::paginate();
        return view ('brands.index',$datosbrands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view ('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosbrands = request()->except(['_token','_method']); //Eliminamos el campo "token" al insertar

        if($request->hasfile('logo')){ //Le quitamos el formato ".tem" para asignarle la extencion corespondiente
            
            $datosbrands['logo'] =$request->file('logo')->store('brands','public'); //Cambiamos el nombre de la imagen y la guardamos en la carpeta uploads
                
        }

        Brand::insert($datosbrands);  //Insertamos Datos

         return redirect('brands');//Retornar al indexs
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
        $brand=Brand::findOrFail($id); //Buscamos la info con id

        return view('brands/edit', compact('brand'));
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
        $datosbrands = request()->except(['_token','_method']); //Eliminamos el campo "token" al insertar

        if($request->hasfile('logo')){ //Le quitamos el formato ".tem" para asignarle la extencion corespondiente
            $brand=Brand::findOrFail($id); //Buscamos la info con id
            Storage::delete('public/'.$brand->logo);

            $datosbrands['logo'] =$request->file('logo')->store('brands','public'); //Cambiamos el nombre de la imagen y la guardamos en la carpeta uploads 
        }

        Brand::where('id','=',$id)->update($datosbrands);

        $brand=Brand::findOrFail($id); //Buscamos la info con id
        
        return view('brands/edit', compact('brand'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand=Brand::findOrFail($id); //Buscamos la info con id
        
        if(Storage::delete('public/'.$brand->logo)){
            Brand::destroy($id); // Ejecuta destroy con el id  
            return redirect('brands');// retorna al index
        }
    }
}
