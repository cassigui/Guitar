<?php

namespace App\Modules\Banners;

use App\Modules\Banners\Banner;
use App\Modules\Base\Services\ApiService;
use App\Modules\Images\ImageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            DB::beginTransaction();

            $data['slug'] = Str::slug($data['title'], '-');
            $model = $this->model->create($data);

            if (isset($data['image'])) {
                $this->store_image($data['image'], $model->id);
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return $model;
    }

    public function update(array $data, $id)
    {
        try {
            DB::beginTransaction();

            $data['slug'] = Str::slug($data['title'], '-');
            $model = $this->model->findOrFail($id);

            $model->update($data);

            if (isset($data['image'])) {
                $this->store_image($data['image'], $model->id);
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return $model;
    }

    public function store_image(array $data, int $model_id)
    {
        if ($data['base64']) {
            $data['imageable_id'] = $model_id;
            $data['imageable_type'] = 'banners';
            $data['order'] = 0;
            $data['thumbs'] = $this->thumbs;

            $this->image_service->store($data);
        }
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
