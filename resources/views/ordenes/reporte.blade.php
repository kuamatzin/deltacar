@extends('reporte')

@section('content')
http://admin.deltacar.mx/reportes/{{$orden->archivo_cotizacion}}
<iframe 
    src="http://docs.google.com/viewer?url=<?=urlencode('http://admin.deltacar.mx/reportes/{{$orden->archivo_cotizacion}}')?>&embedded=true" 
    width="100%" 
    height="1000" 
    style="border: none;"
>
</iframe>
@endsection