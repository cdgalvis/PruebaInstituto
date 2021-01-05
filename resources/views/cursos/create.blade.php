@extends('layouts.app')
  
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">NUEVO CURSO</div>
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
                        
                        <form enctype="multipart/form-data" action="{{ route('cursos.store') }}" method="POST">
                            @csrf
                        
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nombre:</strong>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Duracion:</strong>
                                        <input type="text" name="duracion" class="form-control" placeholder="Duracion">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Fecha inicio:</strong>
                                        <input type="date" name="fechainicio" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Fecha fin:</strong>
                                        <input type="date" name="fechafin" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Sede:</strong>
                                        <select name="sede" class="form-control">
                                            <option></option>
                                            <option value="Sede Principal" > Sede Principal</option>
                                            <option value="Sede Sur" > Sede Sur</option>
                                            <option value="Sede Norte" > Sede Norte</option>
                                            
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Jornada:</strong>
                                        <select name="jornada" class="form-control">
                                            <option></option>
                                            <option value="Diurno"> Diurno</option>
                                            <option value="Nocturno"> Nocturno</option>
                                            <option value="Sabatino"> Sabatino</option>                                          
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Descripcion:</strong>
                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Descripcion...."></textarea>
                                    </div>
                                </div>                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Imagen:</strong>
                                        <input type="file" name="imagen">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Crear</button>
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

