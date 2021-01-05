@extends('layouts.app')
   
@section('content')
    <div class="container"> 
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">EDITAR CURSOS</div>
                    <div class="card-body">                     
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    
                        <form enctype="multipart/form-data" action="{{ route('cursos.update',$curso->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                    
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nombre:</strong>
                                        <input type="text" name="nombre" value="{{ $curso->nombre }}" class="form-control" placeholder="Nombre">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Duracion:</strong>
                                        <input type="text" name="duracion" value="{{ $curso->duracion }}" class="form-control" placeholder="Duracion">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Fecha inicio:</strong>
                                        <input type="date" name="fechainicio" value="{{ $curso->fechainicio }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Fecha fin:</strong>
                                        <input type="date" name="fechafin" value="{{ $curso->fechafin }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Sede:</strong>
                                        <select name="sede" class="form-control">
                                            <option></option>
                                            
                                            <option value="Sede Principal" @if ($curso->sede == "Sede Principal") selected @endif > Sede Principal</option>
                                            <option value="Sede Sur" @if ($curso->sede == "Sede Sur") selected @endif > Sede Sur</option>
                                            <option value="Sede Norte" @if ($curso->sede == "Sede Norte") selected @endif > Sede Norte</option>
                                            
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Jornada:</strong>
                                        <select name="jornada" class="form-control">
                                            <option></option>
                                            <option value="Diurno" @if ($curso->jornada == "Diurno") selected @endif > Diurno</option>
                                            <option value="Nocturno" @if ($curso->jornada == "Nocturno") selected @endif > Nocturno</option>
                                            <option value="Sabatino" @if ($curso->jornada == "Sabatino") selected @endif > Sabatino</option>                                          
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Descripcion:</strong>
                                        <input type="text" name="descripcion" value="{{ $curso->descripcion }}" class="form-control" placeholder="Descripcion">
                                    </div>
                                </div>
                                
                               
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Imagen:</strong>
                                        <input type="text" value="{{ $curso->imagen }}" class="form-control" readonly><br>
                                        <input type="file" name="imagen">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a class="btn btn-primary" href="{{ route('cursos.index') }}"> Regresar</a>
                                </div>
                            </div>
                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection