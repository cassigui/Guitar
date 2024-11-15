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
            'title' => 'required',
            'description' => 'required',
            'button_cta' => 'required',
            'link' => 'required'
        ];
    }

    public function attributeNames()
    {
        return [
            'title' => 'Titulo',
            'description' => 'Descrição',
            'button_cta' => 'Botão de Ação',
            'link' => 'Link'
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
