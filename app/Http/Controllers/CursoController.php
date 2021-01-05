<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;

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
        //
    }
}
