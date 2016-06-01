@extends('master')

@section('content')
<h1>Ordenes</h1>
<hr>
<a href="/ordenes/create">
    <button type="button" class="btn btn-primary">Nueva orden de venta</button>
</a>
<br><br>
<input type="text" name="" id="search" class="form-control" value="" required="required" pattern="" title=""><br>
<hr>
<div class="table-responsive">
    <table class="table table-hover" id="table">
        <thead>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Cotización</th>
                <th>Reporte</th>
                <th>Descargar reporte</th>
                <th>Ver detalle</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordenes as $key => $orden)
            <tr id="orden_tabla{{$orden->id}}" class="searchable">
                <td>{{$orden->id}}</td>
                <td>{{$orden->nombre}}</td>
                <td>{{$orden->celular}}</td>
                <td>{{$orden->email}}</td>
                <td>{{$orden->marca}}</td>
                <td>{{$orden->modelo}}</td>
                <td>${{$orden->cotizacion}}</td>
                <td>
                    <a href="/reporte/{{$orden->id}}">
                        <button type="button" class="btn btn-info">Reporte</button>
                    </a>
                </td>
                <td>
                    <a href="/reporte/descarga/{{$orden->id}}">
                        <button type="button" class="btn btn-success">Descargar</button>
                    </a>
                </td>
                <td>
                    <a href="/ordenes/{{$orden->id}}">
                        <button type="button" class="btn btn-primary">Ver</button>
                    </a>
                </td>
                <td>
                    <a href="/ordenes/{{$orden->id}}/edit">
                        <button type="button" class="btn btn-warning">Editar</button>
                    </a>
                </td>
                <td>
                    <button type="button" class="btn btn-danger eliminar_orden" id="{{$orden->id}}">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="modal-eliminar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center">¿Está seguro que quiere eliminar la orden no. <strong id="no_orden"></strong></h1>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-default" data-dismiss="modal">No estoy seguro</button>
                <button type="button" class="btn btn-danger seguridad">Estoy seguro</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var $rows = $('#table .searchable');
    $('#search').keyup(function() {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
        
        $rows.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
</script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('#token').val() }
        });
    });
    $('.eliminar_orden').click(function(event) {
        $('#no_orden').html(this.id);
        $('#modal-eliminar').modal('show');
        $('.seguridad').attr('id', this.id);
    });
    $('.seguridad').click(function(event) {
        var that = this;
        $.ajax({
            url: '/ordenes/' + this.id,
            type: 'DELETE'
        })
        .done(function(response) {
            $('#modal-eliminar').modal('hide');
            $('#orden_tabla' + that.id).remove();
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            
        });
        
    });
</script>
@endsection