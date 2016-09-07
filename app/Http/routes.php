<?php

use App\Services\ReportGenerator;
use Illuminate\Support\Facades\Mail;

Route::get('/', 'HomeController@index');

Route::resource('/ordenes', 'OrdenController');

Route::get('/reporte/{orden}', 'OrdenController@reporte');

Route::get('/reporte/descarga/{orden}', 'OrdenController@descargaReporte');

Route::get('/sendEmail/{nombre}/{email}', ['middleware' => 'cors', function($nombre, $email)
{
    $array = array("mensaje" => "Mensaje enviado"); //Por ejemplo
    if(isset($_GET['callback'])){ // Si es una petición cross-domain  
        $user['nombre'] = $nombre;
        $user['email'] = $email;
        Mail::send('emails.nuevaPregunta', ['user' => $user], function ($m) use ($user) {
            $m->from('contacto@winu.mx', 'Winu');

            $m->to($user['email'], $user['nombre'])->subject('Nueva pregunta en Winu!');
        });
        echo $_GET['callback'].'('.json_encode($array).')';
    }
    else // Si es una normal, respondemos de forma normal  
      echo json_encode($array);
}]);

Route::get('/sendEmailRespuesta/{nombre}/{email}/{mensaje}', ['middleware' => 'cors', function($nombre, $email, $mensaje)
{
    $array = array("mensaje" => "Mensaje enviado"); //Por ejemplo
    if(isset($_GET['callback'])){ // Si es una petición cross-domain  
        $user['nombre'] = $nombre;
        $user['email'] = $email;
        $user['mensaje'] = $mensaje;
        Mail::send('emails.nuevaPregunta', ['user' => $user], function ($m) use ($user) {
            $m->from('contacto@winu.mx', 'Winu');

            $m->to($user['email'], $user['nombre'])->subject($user['mensaje']);
        });
        echo $_GET['callback'].'('.json_encode($array).')';
    }
    else // Si es una normal, respondemos de forma normal  
      echo json_encode($array);
}]);

Route::auth();
