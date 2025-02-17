<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Services extends BaseService
{
    function setModel()
    {
        $this->model = new Service();
    }
    function create(array $data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['thumbnail']) && $data['thumbnail']) {
                $path = parent::uploadImage($data['thumbnail']);
                $data['thumbnail'] = $path;
            }
            parent::create($data);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return false;
        }
    }
    public function filterDataTable($data)
    {
        // Page Length
        $pageNumber = ($data['start'] / $data['length']) + 1;
        $pageLength = $data['length'];
        $skip = ($pageNumber - 1) * $pageLength;
        // Page Order
        $orderColumnIndex = $data['order'][0]['column'] ?? '0';
        $orderBy = $data['order'][0]['dir'] ?? 'desc';

        // $data['order'][0]['dir'] ??
        $query = $this->model::query();
        // Search
        $search = $data['search']['value'] ?? '';
        if (isset($search)) {
            $query = $query->where(function ($query) use ($search) {
                $query->orWhere('name', 'like', "%" . $search . "%");
            });
        }
        $orderByName = 'id';
        switch ($orderColumnIndex) {
            case '0':
                $orderByName = 'id';
                break;
            case '1':
                $orderByName = 'name';
                break;
        }
        $query = $query->orderBy($orderByName, $orderBy);
        $recordsFiltered = $recordsTotal = $query->count();
        $service = $query->skip($skip)->take($pageLength)->get(['id', 'name','status','description', 'content', 'created_at', 'thumbnail']);

        return [
            "draw" => $data['draw'],
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            'data' => $service,
        ];
    }
    public function update(int $id, array $data)
    {
        try {
            DB::beginTransaction();
            $service = $this->model::find($id);
            if (!$service) {
                DB::rollBack();
                return false;
            }
            if (isset($data['thumbnail']) && $data['thumbnail']) {
                $path = parent::uploadImage($data['thumbnail']);
                $data['thumbnail'] = $path;
            }
            $result = parent::update($id, $data);
            if ($result == false) {
                DB::rollBack();
                return false;
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return false;
        }
    }

    public function content(int $id, array $data)
    {
        try {
            DB::beginTransaction();
            $model = $this->model::find($id);
            if (!$model) {
                DB::rollBack();
                return false;
            }
            $model->description = $data['content'];
            $model->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return false;
        }
    }
    public function delete(int $id)
    {
        try {
            DB::beginTransaction();
            $model = $this->model::find($id);
            if (!$model) {
                DB::rollBack();
                return false;
            }
            $model->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return false;
        }
    }
}