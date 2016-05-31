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
        $document = new \PhpOffice\PhpWord\TemplateProcessor('templates/reporte.docx');
        $document->setValue('nombre_cliente', htmlspecialchars($datos->nombre));
        $document->setValue('fecha', htmlspecialchars("$now->day/$now->month/$now->year"));
        $document->setValue('servicio', htmlspecialchars($datos->servicio));
        $document->setValue('cantidad', htmlspecialchars('1'));
        $document->setValue('costo', htmlspecialchars($datos->cotizacion));
        $document->setValue('total', htmlspecialchars($datos->total));

        $document->cloneRow('incluye', count($incluye[$datos->servicio]));

        $i = 0;
        foreach ($incluye[$datos->servicio] as $key => $incluye) {    
            $value = $i + 1;
            $document->setValue("incluye#$value", htmlspecialchars($incluye));
            $i++;
        }
        $uniqueId = time().'-'.mt_rand();
        $document->saveAs("reportes/$uniqueId-cotizacion.docx");
        return "$uniqueId-cotizacion";
    }
}