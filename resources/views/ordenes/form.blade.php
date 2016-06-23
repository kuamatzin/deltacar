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
    <div class="form-group col-md-6{{ $errors->has('cotizacion') ? ' has-error' : '' }}">
        {!! Form::label('cotizacion', 'Cotización') !!}
        {!! Form::text('cotizacion', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('cotizacion') }}</small>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6 {{ $errors->has('aceptado') ? ' has-error' : '' }}">
        {!! Form::label('aceptado', 'Status') !!}
        {!! Form::select('aceptado', ['' => 'Status', '0' => 'Cotización', '1' => 'Venta'], null, ['id' => 'aceptado', 'class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('aceptado') }}</small>
    </div>
    <div class="form-group col-md-6{{ $errors->has('total') ? ' has-error' : '' }}">
        {!! Form::label('total', 'Total Pagado') !!}
        {!! Form::text('total', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('total') }}</small>
    </div>
</div>
<hr>
<h3>Servicios</h3>
<div id="servicios">
    @if($edit)
        @foreach($ordenes->servicio_nombre as $key => $ad)
            <div id="servicio_quitar_{{$key+2}}" class="row"><div class="form-group col-md-4"><select name="servicio_nombre[]" id="inputSer" class="form-control" required="required">
                <option value="Afinación Mayor" @if($ad == 'Afinación Mayor') selected @endif>Afinación Mayor</option>
                <option value="Afinación 4 Cilindros" @if($ad == 'Afinación 4 Cilindros') selected @endif>Afinación 4 Cilindros</option>
                <option value="Afinación 6 Cilindros" @if($ad == 'Afinación 6 Cilindros') selected @endif>Afinación 6 Cilindros</option>
                <option value="Cambio de Aceite" @if($ad == 'Cambio de Aceite') selected @endif>Cambio de Aceite</option>
                <option value="Frenos" @if($ad == 'Frenos') selected @endif>Frenos</option>
                <option value="Acumulador" @if($ad == 'Acumulador') selected @endif>Acumulador</option>
                <option value="Diagnóstico" @if($ad == 'Diagnóstico') selected @endif>Diagnóstico</option>
            </select></div><div class="form-group col-md-2"><input type="text" name="servicio_cantidad[]" class="form-control" placeholder="Costo" value="{{$ordenes->servicio_cantidad[$key]}}"></div><div class="form-group col-md-2"><input type="text" name="servicio_costo[]" class="form-control" placeholder="Costo" value="{{$ordenes->servicio_costo[$key]}}"></div><div class="form-group col-md-4"><button type="button" class="btn btn-danger" onclick="quitar({{$key+1}})">Quitar</button></div></div>
        @endforeach
    @else
    <div class="row">
        <div class="form-group col-md-4 {{ $errors->has('servicio_nombre.0') ? ' has-error' : '' }}">
            <select name="servicio_nombre[]" id="inputSer" class="form-control" required="required">
                <option value="Afinación Mayor">Afinación Mayor</option>
                <option value="Afinación 4 Cilindros">Afinación 4 Cilindros</option>
                <option value="Afinación 6 Cilindros">Afinación 6 Cilindros</option>
                <option value="Cambio de Aceite">Cambio de Aceite</option>
                <option value="Frenos">Frenos</option>
                <option value="Acumulador">Acumulador</option>
                <option value="Diagnóstico">Diagnóstico</option>
            </select>
            @if($errors->has('servicio_nombre.0'))
                <span class="help-block">El campo servicio es obligatorio</span>
            @endif
        </div>
        <div class="form-group col-md-2 {{ $errors->has('servicio_cantidad.0') ? ' has-error' : '' }}">
            <input type="text" name="servicio_cantidad[]" class="form-control" placeholder="Cantidad" value="{{old('servicio_cantidad.0')}}">
            @if($errors->has('servicio_cantidad.0'))
                <span class="help-block">El campo cantidad del servicio es obligatorio</span>
            @endif
        </div>
        <div class="form-group col-md-2 {{ $errors->has('servicio_costo.0') ? ' has-error' : '' }}">
            <input type="text" name="servicio_costo[]" class="form-control" placeholder="Costo" value="{{old('servicio_costo.0')}}">
            @if($errors->has('servicio_costo.0'))
                <span class="help-block">El campo costo del servicio es obligatorio</span>
            @endif
        </div>
        <div class="form-group col-md-4">

        </div>
    </div>
    @endif
</div>
<div class="form-group">
    <button type="button" class="btn btn-primary" id="servicio_agregar">Agregar servicio</button>
</div>
<hr>
<h3>Servicios Adicionales</h3>
<div id="servicios_adicionales">
@if($edit)
    @if($ordenes->adicional)
        @foreach($ordenes->adicional as $key => $ad)
            <div id="quitar_{{$key+1}}" class="row"><div class="form-group col-md-4"><input type="text" name="adicional[]" value="{{$ad}}" class="form-control" placeholder="Servicio Adicional"></div><div class="form-group col-md-2"><input type="text" name="adicional_cantidad[]" value="{{$ordenes->adicional_cantidad[$key]}}" class="form-control" placeholder="Cantidad"></div><div class="form-group col-md-2"><input type="text" name="adicional_costo[]" value="{{$ordenes->adicional_costo[$key]}}" class="form-control" placeholder="Costo"></div><div class="form-group col-md-4"><button type="button" class="btn btn-danger" onclick="quitar({{$key+1}})">Quitar</button></div></div>
        @endforeach
    @endif
@endif
</div>
<div class="form-group">
    <button type="button" class="btn btn-primary" id="agregar">Agregar servicio adicional</button>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-success">{{$submitButtonText}}</button>
</div>
<br><br>