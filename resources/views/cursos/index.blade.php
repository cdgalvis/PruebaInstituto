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

                        <div style="overflow-x:auto;">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Nombre</th>
                                <th>Duracion</th>
                                <th nowrap>Fecha Inicio</th>
                                <th nowrap>Fecha Fin</th>
                                <th nowrap>Sede</th>
                                <th>Jornada</th>
                                <th>Descripcion</th>
                                <th>Imagen</th>
                                <th colspan='2'>Herramientas</th>
                            </tr>
                            @foreach ($cursos as $curso)
                            <tr>
                                <td>{{ $curso->id }}</td>
                                <td>{{ $curso->nombre }}</td>
                                <td>{{ $curso->duracion }}</td>
                                <td nowrap>{{ $curso->fechainicio }}</td>
                                <td nowrap>{{ $curso->fechafin }}</td>
                                <td nowrap>{{ $curso->sede }}</td>
                                <td>{{ $curso->jornada }}</td>
                                <td>{{ $curso->descripcion }}</td>
                                <td>
                                    <img class="img-rounded" width="70" height="90" src="storage/{{ $curso->imagen }}" alt="image">
                                <td>    
                                    <a class="btn btn-primary" href="{{ route('cursos.edit',$curso->id) }}">Actualizar</a>  
                                </td> 
                                <td> 
                                    <form action="{{ route('cursos.destroy',$curso->id) }}" method="POST">                        
                                        @csrf
                                        @method('DELETE')
                        
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        </div>
                        {!! $cursos->links() !!}
                    </div>
                </div>
            </div>
        </div>  
    </div>      
@endsection