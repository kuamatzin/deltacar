<?php

use App\Services\ReportGenerator;

Route::get('/', 'HomeController@index');

Route::resource('/ordenes', 'OrdenController');

Route::get('/reporte/{orden}', 'OrdenController@reporte');

Route::get('/reporte/descarga/{orden}', 'OrdenController@descargaReporte');

Route::auth();
