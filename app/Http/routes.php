<?php

use App\Services\ReportGenerator;
use Illuminate\Support\Facades\Mail;

Route::get('/', 'HomeController@index');

Route::resource('/ordenes', 'OrdenController');

Route::get('/reporte/{orden}', 'OrdenController@reporte');

Route::get('/reporte/descarga/{orden}', 'OrdenController@descargaReporte');

Route::get('/sendEmail/{nombre}/{email}', ['middleware' => 'cors', function($nombre, $email)
{
    $array = array("mensaje" => "Hola desde otro punto de la red"); //Por ejemplo
    if(isset($_GET['callback'])){ // Si es una petición cross-domain  
      echo $_GET['callback'].'('.json_encode($array).')';
    }
    else // Si es una normal, respondemos de forma normal  
      echo json_encode($array);
}]);

Route::auth();
