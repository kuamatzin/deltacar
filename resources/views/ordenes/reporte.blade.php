@extends('reporte')

@section('content')
<iframe 
    src="http://docs.google.com/gview?url=http://admin.deltacar.mx/reportes/{{$orden->archivo_cotizacion}}.pdf&embedded=true"
    width="100%" 
    height="800" 
    style="border: none;"
>
</iframe>
@endsection