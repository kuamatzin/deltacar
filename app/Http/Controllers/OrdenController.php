<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\OrdenRequest;
use App\Orden;
use App\Services\ReportGenerator;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    /**
     * Lista de servicios que incluye otro servicio
     * @var array
     */
    protected $incluye = [
        'Afinación Mayor' => ['Cambio de Aceite', 'Filtro de Aceite', 'Filtro de Aire', 'Filtro de Gasolina', 'Cambio de Bujías', 'Lavado de Inyectores', 'Lavado del Cuerpo de Aceleración'],
        'Cambio de Aceite' => ['Aceite', 'Filtro de Aceite'],
        'Frenos' => ['Cambio de Balatas', 'Rectificación de Discos'],
        'Acumulador' => ['Cambio de batería'],
        'Diagnóstico' => ['Diagnóstico y Análisis por Computadora']
    ];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'reporte']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes = Orden::all();
        return view('ordenes.index', compact('ordenes'));
    }

    /**
     * Show a specific orden
     * @param  Orden  $ordenes 
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $ordenes)
    {
        return view('ordenes.show', compact('ordenes'));
    }

    /**
     * Show the form to create a Orden
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('ordenes.create', compact('edit'));
    }

    /**
     * Persist the orden in the database
     * @param  OrdenRequest $request 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(OrdenRequest $request)
    {
        $report_generator = new ReportGenerator;
        $request['archivo_cotizacion'] = $report_generator->createReport($request, $this->incluye);
        Orden::create($request->all());

        return redirect('ordenes');
    }

    /**
     * Show the form to update a orden
     * @param  Orden  $ordenes 
     * @return \Illuminate\Http\Response     
     */
    public function edit(Orden $ordenes)
    {
        $edit = true;
        return view('ordenes.edit', compact('ordenes', 'edit'));
    }

    /**
     * Update the orden in the database
     * @param  Orden        $ordenes 
     * @param  OrdenRequest $request 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse            
     */
    public function update(Orden $ordenes, OrdenRequest $request)
    {
        $ordenes->update($request->all());
        return redirect('ordenes');
    }

    public function destroy(Orden $ordenes)
    {
        $ordenes->delete();

        return "Success";
    }

    /**
     * Show the report in google docs view
     * @param  Orden $orden 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function reporte(Orden $ordenes)
    {
        dd($ordenes->archivo_cotizacion);
        return view('ordenes.reporte', compact('ordenes'));
    }
}
