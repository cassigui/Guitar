<?php

namespace App\Modules\Banners;

use App\Modules\Banners\Banner;
use App\Modules\Base\Services\ApiService;
use App\Modules\Images\ImageService;
use Illuminate\Support\Facades\DB;

class BannerService
{
    public function __construct(Banner $model, ImageService $image_service)
    {
        $this->model = $model;
        $this->api = new ApiService($this->model, $this->getCustomFilters(), $this->getCustomSorts());
        $this->image_service = $image_service;

        $this->thumbs = [
            [
                'prefix' => 'thumb_',
                'width' => 400,
                'height' => 400,
            ],
        ];
        
    }

    protected function getCustomFilters()
    {
        return [
            // 'chave' => function($query, $key, $input) {}
        ];
    }

    protected function getCustomSorts()
    {
        return [
            // 'coluna' => function($query, $column, $order) {}
        ];
    }

    public function store(array $data)
    {
        try {
            info($data);

            DB::beginTransaction();

            $model = $this->model->create($data);

            if (isset($data['images']) && count($data['images']) > 0) {
                $this->store_images($data['images'], $model->id);
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return $model;
    }

    public function store_images(array $images, int $model_id)
    {
        foreach ($images as $image) {
            if ($image['base64']) {
                $image['imageable_id'] = $model_id;
                $image['imageable_type'] = 'banners';
                $image['order'] = 0;
                $image['thumbs'] = $this->thumbs;

                $this->image_service->store($image);
            }
        }
    }

    public function update(array $data, $id)
    {
        try {
            DB::beginTransaction();

            $model = $this->model->findOrFail($id);
            $model->update($data);

            if (isset($data['images']) && count($data['images']) > 0) {
                $this->store_images($data['images'], $model->id);
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return $model;
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $model = $this->model->findOrFail($id);

            $model->delete();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return true;
    }

    public function restore($id)
    {
        try {
            DB::beginTransaction();

            $this->model->onlyTrashed()->findOrFail($id)->restore();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return true;
    }
}
