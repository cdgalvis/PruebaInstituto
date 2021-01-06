<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Curso;
use App\Subscriptions;
use App\Mail\CorreoEnviado;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::latest()->paginate(5);
    
        return view('cursos.index',compact('cursos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'        => 'required',
            'duracion'      => 'required',
            'fechainicio'   => 'required',
            'fechafin'      => 'required',
            'sede'          => 'required',
            'jornada'       => 'required',
            'descripcion'    => 'required',
            'imagen'        => 'required',
        ]);
    
        //Curso::create($request->all());

        $curso =new Curso;
        $curso->nombre        = $request->nombre;
        $curso->duracion      = $request->duracion;
        $curso->fechainicio   = $request->fechainicio;
        $curso->fechafin      = $request->fechafin;
        $curso->sede          = $request->sede;
        $curso->jornada       = $request->jornada;
        $curso->descripcion   = $request->descripcion;

        if ($request->hasFile('imagen')){
            $file           = $request->file("imagen");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("storage/"),$nombrearchivo);
            $curso->imagen        = $nombrearchivo;
        }

        $curso->save();

     
        return redirect()->route('cursos.index')
                        ->with('success','Curso credo correctamente.');
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
     * @param  \App\Curso  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        return view('cursos.edit',compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre'        => 'required',
            'duracion'      => 'required',
            'fechainicio'   => 'required',
            'fechafin'      => 'required',
            'sede'          => 'required',
            'jornada'       => 'required',
            'descripcion'    => 'required',
            'imagen'        => 'required',
        ]);

        if ($request->hasFile('imagen')){
            $file           = $request->file("imagen");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("storage/"),$nombrearchivo);
        }
    
        $curso->update($request->all());

        $curso->where('id',$curso->id)
                ->update(['imagen'=> $nombrearchivo]);
    
        return redirect()->route('cursos.index')
                        ->with('success','Curso actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
    
        return redirect()->route('cursos.index')
                        ->with('success','Curso eliminado correctamente');
    }

    public function listadocursos()
    {
        $cursos = Curso::latest()->paginate(5);
    
        return view('listadocursos',compact('cursos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function suscribir(Curso $curso)
    {
        return view('suscribir',compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $request->validate([
            'curso'          => 'required',
            'nombre'         => 'required',
            'email'          => 'required',
            'tipo'           => 'required',
            'identificacion' => 'required',
            'optradio'       => 'required',
            'pago'           => 'required',
        ]);

        $correo = $request->email;
        $cursoinscrito = $request->curso;
        $informacion = Curso::where("nombre","=",$request->curso)->get()->toArray();
    
        $suscribir =new Subscriptions;
        $suscribir->curso           = $request->curso;
        $suscribir->nombre          = $request->nombre;
        $suscribir->email           = $request->email;
        $suscribir->tipo            = $request->tipo;
        $suscribir->identificacion  = $request->identificacion;
        $suscribir->optradio        = $request->optradio;
        $suscribir->pago            = $request->pago;

        $suscribir->save();

        
        Mail::to($correo)->send(new CorreoEnviado($cursoinscrito,$informacion));

     
        return redirect()->route('listadocursos')
                        ->with('success','Se registro correctamente en el curso');
    }

    
}
