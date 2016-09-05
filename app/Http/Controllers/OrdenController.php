<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\OrdenRequest;
use App\Orden;
use App\Services\ReportGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use RobbieP\CloudConvertLaravel\Facades\CloudConvert;

class OrdenController extends Controller
{
    /**
     * Lista de servicios que incluye otro servicio
     * @var array
     */
    protected $incluye = [
        'Afinación Maoyr'       => '',
        'Afinación 4 Cilindros' => '-Cambio de AceitelineBreak-Cambio de filtros (aceite, aire y gasolina)lineBreak-Cambio de bujíaslineBreak-Un presurizado para lavado de inyectoreslineBreak-Un carbuclean para lavado del cuerpo de aceleraciónlineBreak-Revisión de sistema de frenoslineBreak-Revisión de suspensiónlineBreak-Revisión de todos los niveles de líquidos del vehículolineBreak-Revisión de luces',
        'Afinación 6 Cilindros' => '-Cambio de AceitelineBreak-Cambio de filtros (aceite, aire y gasolina)lineBreak-Cambio de bujíaslineBreak-Un presurizado para lavado de inyectoreslineBreak-Un carbuclean para lavado del cuerpo de aceleraciónlineBreak-Revisión de sistema de frenoslineBreak-Revisión de suspensiónlineBreak-Revisión de todos los niveles de líquidos del vehículolineBreak-Revisión de luces',
        'Cambio de Aceite'      => '-AceitelineBreak-Filtro de Aceite',
        'Frenos'                => '-Cambio de BalataslineBreak-Rectificación de Discos',
        'Acumulador'            => '-Cambio de batería',
        'Diagnóstico'           => '-Diagnóstico y Análisis por Computadora'
    ];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['reporte', 'sendEmail']]);
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
        CloudConvert::file('reportes/' . $request['archivo_cotizacion'] . '.docx')->to('pdf');
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
        File::delete('reportes/' .  $ordenes->archivo_cotizacion . '.docx');
        File::delete('reportes/' .  $ordenes->archivo_cotizacion . '.pdf');
        $report_generator = new ReportGenerator;
        $request['archivo_cotizacion'] = $report_generator->createReport($request, $this->incluye);
        $pdf = CloudConvert::file('reportes/' . $request['archivo_cotizacion'] . '.docx')->to('pdf');
        if ($request->adicional == null) {
            $request['adicional'] = '';
        }
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
    public function reporte($orden)
    {
        $orden = Orden::findOrFail($orden);
        return view('ordenes.reporte', compact('orden'));
    }

    /**
     * Download order report
     * @param  Orden $orden
     */
    public function descargaReporte($orden)
    {
        $orden = Orden::findOrFail($orden);
        return response()->download('reportes/' . $orden->archivo_cotizacion . '.pdf');
    }

    public function sendEmail($nombre, $email)
    {
        $user['nombre'] = $nombre;
        $user['email'] = $email;
        Mail::send('emails.nuevaPregunta', ['user' => $user], function ($m) use ($user) {
            $m->from('contacto@winu.mx', 'Winu');

            $m->to($user['email'], $user['nombre'])->subject('Nueva pregunta en Winu!');
        });
    }
}
