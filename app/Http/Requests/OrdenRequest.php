<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrdenRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
 
            'servicio_nombre.*'   => 'required',
            'servicio_cantidad.*' => 'required|numeric',
            'servicio_costo.*'    => 'required|numeric',
            'aceptado'            => 'required'
        ];
    }
}
