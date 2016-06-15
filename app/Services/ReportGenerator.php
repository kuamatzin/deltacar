<?php namespace App\Services;

use Carbon\Carbon;

/**
* Clase que se encarga de todo Word
*/

class ReportGenerator
{

    /**
     * Descarga el archivo en el cliente
     * @param  \PhpOffice\PhpWord\TemplateProcessor $document
     * @param  String $filename Nombre del archivo
     */
    private function download($document, $filename = "reporte_cliente.docx")
    {
        $document->saveAs("reportes/$filename");
        /*header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        flush();
        readfile($filename);
        unlink($filename);*/
    }

    /**
     * Crea el reporte de la orden
     */
    public function createReport($datos, $incluye)
    {
        $now = Carbon::now();
        if (count($datos->adicional) > 0) {
            $document = new \PhpOffice\PhpWord\TemplateProcessor('templates/reporte.docx');
        }
        else {
            $document = new \PhpOffice\PhpWord\TemplateProcessor('templates/sinAdicional.docx');
        }
        $document->setValue('nombre_cliente', htmlspecialchars($datos->nombre));
        $document->setValue('fecha', htmlspecialchars("$now->day/$now->month/$now->year"));
        $document->setValue('total', htmlspecialchars($datos->total));

        $document->cloneRow('servicio', count($datos->servicio_nombre));
        $i = 0;
        foreach ($datos->servicio_nombre as $key => $servicio_nombre) { 
            $value = $i + 1;
            $document->setValue("servicio#$value", htmlspecialchars($servicio_nombre));
            $document->setValue("cantidad#$value", htmlspecialchars($datos->servicio_cantidad[$key]));
            $document->setValue("costo#$value", htmlspecialchars($datos->servicio_costo[$key]));
            $listado = '';
            foreach ($incluye[$servicio_nombre] as $key => $adicional) {
                $listado = $listado . '* ' . $adicional;
            }
            $document->setValue("incluye#$value", htmlspecialchars($listado));
            $i++;
        }
        if (count($datos->adicional) > 0) {
            $document->cloneRow('servicioA', count($datos->adicional));
            $f = 0;
            foreach ($datos->adicional as $key => $adicional) {
                $value = $f + 1;
                $document->setValue("servicioA#$value", htmlspecialchars($adicional));
                $document->setValue("cantidadA#$value", htmlspecialchars($datos->adicional_cantidad[$key]));
                $document->setValue("costoA#$value", htmlspecialchars($datos->adicional_costo[$key]));
                $f++;
            }

        }
        $uniqueId = time().'-'.mt_rand();
        $document->saveAs("reportes/$uniqueId-cotizacion.docx");
        return "$uniqueId-cotizacion";
    }
}