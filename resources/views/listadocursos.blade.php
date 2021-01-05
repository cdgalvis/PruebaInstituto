@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">LISTO DE CURSOS</div>
                    <div class="card-body">
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
                                <th>Accion</th>
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
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('suscribir',$curso->id) }}"> Suscribir </a>  
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