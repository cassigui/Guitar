<?php

namespace App\Modules\Comments\Http\Requests;

use App\Modules\Base\BaseRequest;

class CommentRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'profession' => 'required',
            'message' => 'required',
        ];
    }

    public function attributeNames()
    {
        return [
            'name' => 'Nome',
            'profession' => 'Profissão',
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
