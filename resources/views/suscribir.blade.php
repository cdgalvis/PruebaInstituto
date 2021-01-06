@extends('layouts.app')
  
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">SUSCRIPCIÓN AL CURSO</div>
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
                        
                        <form enctype="multipart/form-data" action="{{ route('guardar') }}" method="POST">
                            @csrf
                        
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nombre del curso:</strong>
                                        <input type="text" name="curso" value="{{ $curso->nombre }}" class="form-control" placeholder="Nombre" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nombres y Apellidos:</strong>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombres y Apellidos">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Tipo de Identificacion:</strong>
                                        <select name="tipo" class="form-control">
                                            <option></option>
                                            <option value="CC" > Cedula</option>
                                            <option value="TI" > Tarjeta de identidad</option>
                                            <option value="PE" > Pasaporte</option>
                                            
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Identificacion:</strong>
                                        <input type="text" name="identificacion" class="form-control" placeholder="Identificacion">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Seleccione metodo de pago:</strong>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" value="TC"> Tarjeta de Credito</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" value="TD"> Tarjeta Debito</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" value="PSE"> PSE</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Valor a Pagar:</strong>
                                        <input type="text" name="pago" value="400000" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Suscribir</button>
                                        <a class="btn btn-primary" href="{{ route('listadocursos') }}"> Regresar</a>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

