@extends('master')
@section('content')
<h1>Nueva orden de compra</h1>
<hr>
{!! Form::open(['url' => 'ordenes']) !!}
    @include('ordenes.form', ['submitButtonText' => 'Guardar'])
{!! Form::close() !!}
<!--
<iframe src="http://docs.google.com/viewer?url=<?=urlencode('http://www.inovuz.com/reporte_cliente.docx')?>&embedded=true" width="100%" height="1000" style="border: none;"></iframe>
-->
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