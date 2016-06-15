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
        var input = '<div id="quitar_' + contador + '" class="row"><div class="form-group col-md-4"><input type="text" name="adicional[]" class="form-control" placeholder="Servicio Adicional"></div><div class="form-group col-md-2"><input type="text" name="adicional_cantidad[]" class="form-control" placeholder="Cantidad"></div><div class="form-group col-md-2"><input type="text" name="adicional_costo[]" class="form-control" placeholder="Costo"></div><div class="form-group col-md-4"><button type="button" class="btn btn-danger" onclick="quitar(' + contador + ')">Quitar</button></div></div>';
        $('#servicios_adicionales').append(input)
    });
    function quitar(contador){
        $('#quitar_' + contador).hide('slow/400/fast').remove();
    }

    var servicio_contador = 0;
    $('#servicio_agregar').click(function(event) {
        servicio_contador = servicio_contador + 1;
        var input = '<div id="servicio_quitar_' + servicio_contador + '" class="row"><div class="form-group col-md-4"><select name="servicio_nombre[]" id="inputSer" class="form-control" required="required"><option value="Afinación Mayor">Afinación Mayor</option><option value="Cambio de Aceite">Cambio de Aceite</option><option value="Frenos">Frenos</option><option value="Acumulador">Acumulador</option><option value="Diagnóstico">Diagnóstico</option></select></div><div class="form-group col-md-2"><input type="text" name="servicio_cantidad[]" class="form-control" placeholder="Cantidad"></div><div class="form-group col-md-2"><input type="text" name="servicio_costo[]" class="form-control" placeholder="Costo"></div><div class="form-group col-md-4"><button type="button" class="btn btn-danger" onclick="servicio_quitar(' + servicio_contador + ')">Quitar</button></div></div>';
        $('#servicios').append(input)
    });
    function servicio_quitar(servicio_contador){
        $('#servicio_quitar_' + servicio_contador).hide('slow/400/fast').remove();
    }
</script>
@endsection