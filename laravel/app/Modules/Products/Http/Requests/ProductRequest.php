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
            'name' => 'required',
            'price' => 'required',
            'promo_price' => 'nullable',
            'brand_id' => 'required',
            'description' => 'required',
            'categories' => 'required'
        ];
    }

    public function attributeNames()
    {
        return [
            'name' => 'Nome',
            'price' => 'Preço',
            'promo_price' => 'Preço Promocional',
            'description' => 'Descrição',
            'brand_id' => 'Marca',
            'categories' => 'Categorias'
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
