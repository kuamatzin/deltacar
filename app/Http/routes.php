<?php

use App\Services\ReportGenerator;
use Illuminate\Support\Facades\Mail;

Route::get('/', 'HomeController@index');

Route::resource('/ordenes', 'OrdenController');

Route::get('/reporte/{orden}', 'OrdenController@reporte');

Route::get('/reporte/descarga/{orden}', 'OrdenController@descargaReporte');

Route::get('/sendEmail/{nombre}/{email}', ['middleware' => 'cors', function($nombre, $email)
{
    $user['nombre'] = $nombre;
    $user['email'] = $email;
    Mail::send('emails.nuevaPregunta', ['user' => $user], function ($m) use ($user) {
        $m->from('contacto@winu.mx', 'Winu');

        $m->to($user['email'], $user['nombre'])->subject('Nueva pregunta en Winu!');
    });
}]);

Route::auth();
