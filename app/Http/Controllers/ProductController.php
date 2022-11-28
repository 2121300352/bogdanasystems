<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosproducts['products']=Product::paginate();
        return view ('products.index',$datosproducts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::all();
        return view ('products.create')-> with('brands',$brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosproducts = request()->except(['_token','_method']); //Eliminamos el campo "token" al insertar

        if($request->hasfile('image')){ //Le quitamos el formato ".tem" para asignarle la extencion corespondiente
            
            $datosproducts['image'] =$request->file('image')->store('products','public'); //Cambiamos el nombre de la imagen y la guardamos en la carpeta uploads
                
        }
        Product::insert($datosproducts);  //Insertamos Datos

         return redirect('products');//Retornar al indexs
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
        $brands=Brand::all();
        $product=Product::findOrFail($id); //Buscamos la info con id
        

        return view('products/edit', compact('product','brands'))-> with('brands',$brands);
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
        $brands=Brand::all();
        $datosproducts = request()->except(['_token','_method']); //Eliminamos el campo "token" al insertar

        if($request->hasfile('image')){ //Le quitamos el formato ".tem" para asignarle la extencion corespondiente
            $product=Product::findOrFail($id); //Buscamos la info con id
            Storage::delete('public/'.$product->image);

            $datosproducts['image'] =$request->file('image')->store('products','public'); //Cambiamos el nombre de la imagen y la guardamos en la carpeta uploads 
        }

        Product::where('id','=',$id)->update($datosproducts);

        $product=Product::findOrFail($id); //Buscamos la info con id

        return view('products/edit', compact('product','brands'))-> with('brands',$brands);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id); //Buscamos la info con id
        
        if(Storage::delete('public/'.$product->image)){
            Product::destroy($id); // Ejecuta destroy con el id  
            return redirect('products');// retorna al index
        }
    }
}
