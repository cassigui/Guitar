<?php

namespace App\Modules\Leads;

use Illuminate\Support\Facades\DB;
use App\Modules\Base\Services\ApiService;
use Illuminate\Support\Facades\Storage;


class LeadService
{
    public function __construct(Lead $model)
    {
        $this->model = $model;
        $this->api = new ApiService($this->model, $this->getCustomFilters(), $this->getCustomSorts());
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

            $model = $this->model->create($data);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }


        return $model;
    }

    public function storeS3(string $folder, $file)
    {
        Storage::disk('s3')->put($folder, $file, 'public');
        return $folder;
    }

    public function update(array $data, $id)
    {
        try {
            DB::beginTransaction();

            $model = $this->model->findOrFail($id);

            $model->update($data);

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

            $this->model->findOrFail($id)->delete();

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
