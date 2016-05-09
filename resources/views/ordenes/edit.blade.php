@extends('master')

@section('content')
<h1>Editar orden No: {{$ordenes->id}}</h1>
{!! Form::model($ordenes, ['route' => ['ordenes.update', $ordenes->id], 'method' => 'PUT']) !!}
    @include('ordenes.form', ['submitButtonText' => 'Guardar'])
{!! Form::close() !!}
@endsection


@section('scripts')
<script>
    var contador = 0;
    $('#agregar').click(function(event) {
        contador = contador + 1;
        var input = '<div id="quitar_' + contador + '"><div class="form-group col-md-6"><input type="text" name="adicional[]" class="form-control" placeholder="Servicio Adicional"></div><div class="form-group col-md-6"><button type="button" class="btn btn-danger" onclick="quitar(' + contador + ')">Quitar</button></div></div>';
        $('#servicios_adicionales').append(input)
    });
    function quitar(contador){
        $('#quitar_' + contador).hide('slow/400/fast').remove();
    }
</script>
@endsection