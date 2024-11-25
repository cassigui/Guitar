<?php

namespace App\Modules\Leads\Http\Requests;

use App\Modules\Base\BaseRequest;

class LeadRequest extends BaseRequest
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
            'email'   => 'required',
            'msg_subject' => 'required',
            'message' => 'required',
        ];
    }

    public function attributeNames()
    {
        return [
            'name'    => 'Nome',
            'phone'   => 'Telefone',
            'email'   => 'E-mail',
            'msg_subject' => 'Assunto',
            'message' => 'Mensagem',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
