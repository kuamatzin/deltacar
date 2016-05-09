<div class="row">
    <div class="form-group col-md-6{{ $errors->has('nombre') ? ' has-error' : '' }}">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('nombre') }}</small>
    </div>
    <div class="form-group col-md-6{{ $errors->has('direccion') ? ' has-error' : '' }}">
        {!! Form::label('direccion', 'Dirección') !!}
        {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('direccion') }}</small>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6{{ $errors->has('celular') ? ' has-error' : '' }}">
        {!! Form::label('celular', 'Celular') !!}
        {!! Form::text('celular', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('celular') }}</small>
    </div>
    <div class="form-group col-md-6{{ $errors->has('telefono') ? ' has-error' : '' }}">
        {!! Form::label('telefono', 'Teléfono') !!}
        {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('telefono') }}</small>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com']) !!}
        <small class="text-danger">{{ $errors->first('email') }}</small>
    </div>
    <div class="form-group col-md-6{{ $errors->has('marca') ? ' has-error' : '' }}">
        {!! Form::label('marca', 'Marca') !!}
        {!! Form::text('marca', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('marca') }}</small>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6{{ $errors->has('modelo') ? ' has-error' : '' }}">
        {!! Form::label('modelo', 'Modelo') !!}
        {!! Form::text('modelo', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('modelo') }}</small>
    </div>
    <div class="form-group col-md-6{{ $errors->has('anio') ? ' has-error' : '' }}">
        {!! Form::label('anio', 'Año') !!}
        {!! Form::text('anio', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('anio') }}</small>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6{{ $errors->has('color') ? ' has-error' : '' }}">
        {!! Form::label('color', 'Color') !!}
        {!! Form::text('color', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('color') }}</small>
    </div>
    <div class="form-group col-md-6{{ $errors->has('vin') ? ' has-error' : '' }}">
        {!! Form::label('vin', 'VIN') !!}
        {!! Form::text('vin', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('vin') }}</small>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6{{ $errors->has('servicio') ? ' has-error' : '' }}">
        {!! Form::label('servicio', 'Servicio') !!}
        {!! Form::select('servicio',['' => 'Selecciona Servicio', 'Afinación Mayor' => 'Afinación Mayor', 'Cambio de Aceite' => 'Cambio de Aceite', 'Frenos' => 'Frenos', 'Acumulador' => 'Acumulador', 'Diagnóstico' => 'Diagnóstico'], null, ['id' => 'servicio', 'class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('servicio') }}</small>
    </div>
    <div class="form-group col-md-6{{ $errors->has('cotizacion') ? ' has-error' : '' }}">
        {!! Form::label('cotizacion', 'Cotización') !!}
        {!! Form::text('cotizacion', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('cotizacion') }}</small>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <div class="checkbox{{ $errors->has('aceptado') ? ' has-error' : '' }}">
            <label for="aceptado">
                {!! Form::checkbox('aceptado', '1', null, ['id' => 'aceptado']) !!} Aceptado
            </label>
        </div>
        <small class="text-danger">{{ $errors->first('aceptado') }}</small>
    </div>
    <div class="form-group col-md-6{{ $errors->has('total') ? ' has-error' : '' }}">
        {!! Form::label('total', 'Total Pagado') !!}
        {!! Form::text('total', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('total') }}</small>
    </div>
</div>
<hr>
<h3>Servicios Adicionales</h3>
<div id="servicios_adicionales">
@if($ordenes)
    @if($ordenes->adicional)
        @foreach($ordenes->adicional as $key => $ad)
            <div id="quitar_{{$key+1}}"><div class="form-group col-md-6"><input type="text" name="adicional[]" value="{{$ad}}" class="form-control" placeholder="Servicio Adicional"></div><div class="form-group col-md-6"><button type="button" class="btn btn-danger" onclick="quitar({{$key+1}})">Quitar</button></div></div>
        @endforeach
    @endif
@endif
</div>
<div class="form-group">
    <button type="button" class="btn btn-primary" id="agregar">Agregar servicio</button>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-success">{{$submitButtonText}}</button>
</div>
<br><br>