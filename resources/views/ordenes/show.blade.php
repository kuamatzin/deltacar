@extends('master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>No. orden: {{$ordenes->id}}</h1>
        <br>
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td>Nombre:</td>
                        <td>{{$ordenes->nombre}}</td>
                    </tr>
                    <tr>
                        <td>Direccion:</td>
                        <td>{{$ordenes->direccion}}</td>
                    </tr>
                    <tr>
                        <td>Celular:</td>
                        <td>{{$ordenes->celular}}</td>
                    </tr>
                    <tr>
                        <td>Teléfono:</td>
                        <td>{{$ordenes->telefono}}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{$ordenes->email}}</td>
                    </tr>
                    <tr>
                        <td>Marca:</td>
                        <td>{{$ordenes->marca}}</td>
                    </tr>
                    <tr>
                        <td>Modelo:</td>
                        <td>{{$ordenes->modelo}}</td>
                    </tr>
                    <tr>
                        <td>Año:</td>
                        <td>{{$ordenes->anio}}</td>
                    </tr>
                    <tr>
                        <td>Color:</td>
                        <td>{{$ordenes->color}}</td>
                    </tr>
                    <tr>
                        <td>Vin:</td>
                        <td>{{$ordenes->vin}}</td>
                    </tr>
                    <tr>
                        <td>Servicio:</td>
                        <td>{{$ordenes->servicio}}</td>
                    </tr>
                    <tr>
                        <td>Cotización:</td>
                        <td>{{$ordenes->cotizacion}}</td>
                    </tr>
                    <tr>
                        <td>Total:</td>
                        <td>{{$ordenes->total}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @if($ordenes->adicional)
        <h2>Servicios Adicionales</h2>
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                     @foreach($ordenes->adicional as $key => $ad)
                    <tr>
                        <td>{{$key + 1 }}</td>
                        <td>{{$ad}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <h2>Sin servicios adicionales</h2>
        @endif
    </div>
</div>
@endsection
@section('scripts')
@endsection