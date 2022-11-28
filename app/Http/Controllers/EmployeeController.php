<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosemployees['employees']=Employee::paginate();
        return view ('employees.index',$datosemployees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosemployees = request()->except(['_token','_method']); //Eliminamos el campo "token" al insertar

        if($request->hasfile('image')){ //Le quitamos el formato ".tem" para asignarle la extencion corespondiente
            
            $datosemployees['image'] =$request->file('image')->store('employees','public'); //Cambiamos el nombre de la imagen y la guardamos en la carpeta uploads
                
        }
        Employee::insert($datosemployees);  //Insertamos Datos

         return redirect('employees');//Retornar al indexs
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
        $employe=Employee::findOrFail($id); //Buscamos la info con id
        return view('employees/edit', compact('employe'));
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
        $datosemployees = request()->except(['_token','_method']); //Eliminamos el campo "token" al insertar

        if($request->hasfile('image')){ //Le quitamos el formato ".tem" para asignarle la extencion corespondiente
            
            $employe=Employee::findOrFail($id); //Buscamos la info con id
            Storage::delete('public/'.$employe->image);


            $datosemployees['image'] =$request->file('image')->store('employees','public'); //Cambiamos el nombre de la imagen y la guardamos en la carpeta uploads
                
        }
        Employee::where('id','=',$id)->update($datosemployees);
        $employe=Employee::findOrFail($id); //Buscamos la info con id
        return view('employees/edit', compact('employe'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe=Employee::findOrFail($id); //Buscamos la info con id


        if(Storage::delete('public/'.$employe->image)){
            Employee::destroy($id); // Ejecuta destroy con el id  
            return redirect('employees');// retorna al index
        }
    }
}
