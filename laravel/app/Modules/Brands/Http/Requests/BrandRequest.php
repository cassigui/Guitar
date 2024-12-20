<?php

namespace App\Modules\Brands\Http\Requests;

use App\Modules\Base\BaseRequest;

class BrandRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           'name' => 'required'
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
