<?php

namespace App\Modules\Banners\Http\Requests;

use App\Modules\Base\BaseRequest;

class BannerRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tagline' => 'required',
            'title' => 'required',
            'description' => 'required',
            'button_cta' => 'required',
            'link' => 'required',
        ];
    }

    public function attributeNames()
    {
        return [
            'tagline' => 'Palavra-Chave',
            'title' => 'Titulo',
            'description' => 'Descrição',
            'button_cta' => 'Nome do botão',
            'link' => 'Link do botão',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
