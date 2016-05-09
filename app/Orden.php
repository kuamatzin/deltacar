<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = "ordenes";

    protected $fillable = [
        'nombre',
        'direccion',
        'celular',
        'telefono',
        'email',
        'marca',
        'modelo',
        'anio',
        'color',
        'vin',
        'servicio',
        'cotizacion',
        'adicional',
        'cotizacion2',
        'aceptado',
        'archivo_cotizacion',
        'total',
    ];


    public function setAdicionalAttribute($value)
    {
        $this->attributes['adicional'] = serialize($value);
    }

    public function getAdicionalAttribute($value)
    {
        return unserialize($value);
    }

}
