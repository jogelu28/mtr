<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//le añadi

use App\Http\Controllers\Controller;
use App\Trainer;
use Barryvdh\DomPDF\Facade as PDF;
class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trainers=Trainer::all();
        return view( 'indexx',compact('trainers'));
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
        /**
        $trainer = new Trainer();
        $trainer->name=$request->input('name');
        $trainer->save();
        return 'Guardado';*/
        if($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path( ).'/images/',$name);

            $trainer= new Trainer();
            $trainer->name=$request->input('name');
            $trainer->apellido=$request->input('apellido');
            //imagen
            $trainer->avatar=$name;
            $trainer->save();
            return 'Guardado';
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
    public function show(Trainer $trainer)
    {
        /**return 'tengo que regresar el id';
        return view("show");
        $trainer = Trainer::find($id);
        return $trainer;**/
        return view ('show',compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        return view('edit',compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        /**return $trainer;**/
        //return $request;
        $trainer->fill($request->except('avatar'));
        if ($request->hasFile('avatar')){
        	$file=$request->file('avatar');
        	$name=time().$file->getClientOriginalName();
        	$trainer->avatar=$name;
        	//imagen
        	$file->move(public_path().'/images/',$name);
        }
        $trainer->save();
        return  redirect('trainers/');
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
         $data=Trainer::FindOrFail($id);
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
                return redirect('trainers/');
            }
            else{
                echo "error";
            }

    }
    public function pdf(){
        $trainers=Trainer::all();
        $pdf=PDF::loadView('pdf.listado',compact('trainers'));
        return $pdf->download('listado.pdf');
    }
    public function pdfin(Trainer $id){
        $pdf=PDF::loadView('pdf.listadoindividual',['trainer'=>$id]);
        return $pdf->download('listadoindividual.pdf');
    }
}
