<?php

namespace App\Modules\Products\Http\Requests;

use App\Modules\Base\BaseRequest;

class ProductRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
        ];
    }

    public function attributeNames()
    {
        return [
            //
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
