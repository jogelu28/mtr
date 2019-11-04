<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//le añadi

use App\Http\Controllers\Controller;
use App\Persona;
use Barryvdh\DomPDF\Facade as PDF;
class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personas=Persona::all();
        return view( 'index',compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path( ).'/images/',$name);

            $persona= new Persona();
            $persona->nombre=$request->input('nombre');
            $persona->apellido=$request->input('apellido');
            $persona->cantidad_sol=$request->input('cantidad_sol');
            $persona->may_cant_ahorros=$request->input('may_cant_ahorros');
            $persona->referencias=$request->input('referencias');
            $persona->garantia=$request->input('garantia');
            $persona->email=$request->input('email');
            //imagen
            $persona->avatar=$name;
            $persona->save();
            return  redirect('personas/');
        }
        //return $request->all();
        //
        //return $request->input('name');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**public function show($id)**/
    public function show(Persona $persona)
    {
 
        return view ('show',compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        return view('edit',compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        /**return $persona;**/
        //return $request;
        $persona->fill($request->except('avatar'));
        if ($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $name=time().$file->getClientOriginalName();
            $persona->avatar=$name;
            //imagen
            $file->move(public_path().'/images/',$name);
        }
        $persona->save();
        return  redirect('personas/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       /** $trainer=Trainer::find($id);
        if ($trainer->delete($id)) {

          return redirect('trainers/');
        }
        else return 'El '.$id."No se pudo borrar";**/
         $data=Persona::FindOrFail($id);
            if(file_exists('images/'.$data->avatar) AND !empty($data->avatar)){
                unlink('images/'.$data->avatar);
            }
            try{
                $data->delete();
                $bug=0;
            }
            catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
            if($bug==0){
                echo "succes";
                return redirect('personas/');
            }
            else{
                echo "error";
            }

    }
    public function pdf(){
        $personas=Persona::all();
        $pdf=PDF::loadView('pdf.listado',compact('personas'));
        return $pdf->download('listado.pdf');
    }
    public function pdfin(Persona $id){
        $pdf=PDF::loadView('pdf.listadoindividual',['persona'=>$id]);
        return $pdf->download('listadoindividual.pdf');
    }
}
