<?php

namespace App\Modules\Categories\Http\Requests;

use App\Modules\Base\BaseRequest;

class CategoryRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => "required"
        ];
    }

    public function attributeNames()
    {
        return [
            'name' => 'Nome'
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
