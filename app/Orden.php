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
        'adicional_cantidad',
        'adicional_costo',
        'servicio_nombre',
        'servicio_cantidad',
        'servicio_costo'
    ];

    public function setServicioNombreAttribute($value)
    {
        $this->attributes['servicio_nombre'] = serialize($value);
    }

    public function getServicioNombreAttribute($value)
    {
        return unserialize($value);
    }

    public function setServicioCantidadAttribute($value)
    {
        $this->attributes['servicio_cantidad'] = serialize($value);
    }

    public function getServicioCantidadAttribute($value)
    {
        return unserialize($value);
    }

    public function setServicioCostoAttribute($value)
    {
        $this->attributes['servicio_costo'] = serialize($value);
    }

    public function getServicioCostoAttribute($value)
    {
        return unserialize($value);
    }


    public function setAdicionalAttribute($value)
    {
        $this->attributes['adicional'] = serialize($value);
    }

    public function getAdicionalAttribute($value)
    {
        return unserialize($value);
    }

    public function setAdicionalCantidadAttribute($value)
    {
        $this->attributes['adicional_cantidad'] = serialize($value);
    }

    public function getAdicionalCantidadAttribute($value)
    {
        return unserialize($value);
    }

    public function setAdicionalCostoAttribute($value)
    {
        $this->attributes['adicional_costo'] = serialize($value);
    }

    public function getAdicionalCostoAttribute($value)
    {
        return unserialize($value);
    }

}
