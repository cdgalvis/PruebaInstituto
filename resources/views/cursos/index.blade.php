@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">LISTO DE CURSOS</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    <a class="btn btn-success" href="{{ route('cursos.create') }}"> Crear nuevo curso</a>
                                </div>
                            </div>
                        </div>

                        <br>
                    
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Nombre</th>
                                <th>Duracion</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Sede</th>
                                <th>Jornada</th>
                                <th>Descripcion</th>
                                <th>Imagen</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($cursos as $curso)
                            <tr>
                                <td>{{ $curso->id }}</td>
                                <td>{{ $curso->nombre }}</td>
                                <td>{{ $curso->duracion }}</td>
                                <td>{{ $curso->fechainicio }}</td>
                                <td>{{ $curso->fechafin }}</td>
                                <td>{{ $curso->sede }}</td>
                                <td>{{ $curso->jornada }}</td>
                                <td>{{ $curso->descripcion }}</td>
                                <td>
                                    <img class="img-rounded" width="120" height="150" src="storage/{{ $curso->imagen }}" alt="image">
                                <td>
                                    <form action="{{ route('cursos.destroy',$curso->id) }}" method="POST">
                        
                                        <a class="btn btn-primary" href="{{ route('cursos.edit',$curso->id) }}">Edit</a>
                    
                                        @csrf
                                        @method('DELETE')
                        
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    
                        {!! $cursos->links() !!}
                    </div>
                </div>
            </div>
        </div>  
    </div>      
@endsection