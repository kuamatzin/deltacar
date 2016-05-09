@extends('reporte')

@section('content')
<iframe 
    src="http://docs.google.com/viewer?url=<?=urlencode('http://admin.deltacar.mx/reportes/{{$ordenes->archivo_cotizacion}}')?>&embedded=true" 
    width="100%" 
    height="1000" 
    style="border: none;"
>
</iframe>
@endsection