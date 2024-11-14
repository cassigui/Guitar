<?php

namespace App\Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Products\Http\Requests\ProductRequest;
use App\Modules\Products\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(ProductService $product_service)
    {
        // $this->authorizeResource("App\Modules\Products\Product", "App\Modules\Products\Product");
        $this->product_service = $product_service;
    }

    public function store(ProductRequest $request)
    {
        return response()->json([
            'error' => false,
            'message' => __('wf.products::toasts.store'),
            'product' => $this->product_service->store($request->toArray()),
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        return response()->json([
            'error' => false,
            'message' => __('wf.products::toasts.update'),
            'product' => $this->product_service->update($request->toArray(), $id),
        ]);
    }

    public function destroy($id)
    {
        $this->product_service->destroy($id);

        return response()->json([
            'error' => false,
            'message' => __('wf.products::toasts.destroy'),
        ]);
    }

    public function restore($id)
    {
        $this->product_service->restore($id);

        return response()->json([
            'error' => false,
            'message' => __('wf.products::toasts.restore'),
        ]);
    }

    public function get(Request $request)
    {
        return response()->json([
            'error' => false,
            'products' => $this->product_service->api->get($request->toArray()),
        ]);
    }

    public function find(Request $request)
    {
        return response()->json([
            'error' => false,
            'product' => $this->product_service->api->find($request->toArray()),
        ]);
    }

    public function paginate(Request $request)
    {
        return response()->json(
            $this->product_service->api->paginate($request->toArray())
        );
    }

    protected function resourceAbilityMap()
    {
        return array_merge(parent::resourceAbilityMap(), [
            'ngTableGet' => 'view',
            'restore' => 'restore',
        ]);
    }
}
