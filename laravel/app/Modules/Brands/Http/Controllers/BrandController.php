<?php

namespace App\Modules\Brands\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Brands\Http\Requests\BrandRequest;
use App\Modules\Brands\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct(BrandService $brand_service)
    {
        // $this->authorizeResource("App\Modules\Brands\Brand", "App\Modules\Brands\Brand");
        $this->brand_service = $brand_service;
    }

    public function store(BrandRequest $request)
    {
        return response()->json([
            'error' => false,
            'message' => __('wf.brands::toasts.store'),
            'brand' => $this->brand_service->store($request->toArray()),
        ]);
    }

    public function update(BrandRequest $request, $id)
    {
        return response()->json([
            'error' => false,
            'message' => __('wf.brands::toasts.update'),
            'brand' => $this->brand_service->update($request->toArray(), $id),
        ]);
    }

    public function destroy($id)
    {
        $this->brand_service->destroy($id);

        return response()->json([
            'error' => false,
            'message' => __('wf.brands::toasts.destroy'),
        ]);
    }

    public function restore($id)
    {
        $this->brand_service->restore($id);

        return response()->json([
            'error' => false,
            'message' => __('wf.brands::toasts.restore'),
        ]);
    }

    public function get(Request $request)
    {
        return response()->json([
            'error' => false,
            'brands' => $this->brand_service->api->get($request->toArray()),
        ]);
    }

    public function find(Request $request)
    {
        return response()->json([
            'error' => false,
            'brand' => $this->brand_service->api->find($request->toArray()),
        ]);
    }

    public function paginate(Request $request)
    {
        return response()->json(
            $this->brand_service->api->paginate($request->toArray())
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
