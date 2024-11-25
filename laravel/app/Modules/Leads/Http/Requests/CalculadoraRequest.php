<?php

namespace App\Modules\Leads\Http\Requests;

use App\Modules\Base\BaseRequest;

class CalculadoraRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'    => 'required',
            'phone'   => 'required',
            'subject'   => 'required',
            'results'   => 'required',
        ];
    }

    public function attributeNames()
    {
        return [
            'name'    => 'Nome',
            'phone'   => 'Telefone',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
