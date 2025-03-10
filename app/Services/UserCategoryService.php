<?php

namespace App\Services;

use App\Models\Configs;
use App\Models\UserCategory;
use Illuminate\Support\Facades\DB;

class UserCategoryService extends BaseService
{
    function setModel()
    {
        $this->model = new UserCategory();
    }
    public function getUserCategory()
    {
        try {
            return $this->model->with('userProfile.user')->orderBy('is_pin', 'desc')->where('status', 1)->orderByDesc('updated_at')->get();
        } catch (\Throwable $th) {
            $this->handleException($th);
            return false;
        }
    }
    public function create(array $data)
    {
        try {
            $data['is_pin'] = isset($data['is_pin']) ? 1 : 0;
            parent::create($data);
            return true;
        } catch (\Throwable $th) {
            $this->handleException($th);
            return false;
        }
    }
    public function update(int $id, array $data)
    {
        try {
            DB::beginTransaction();
            $data['is_pin'] = isset($data['is_pin']) ? 1 : 0;
            parent::update($id, $data);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            $this->handleException($th);
            return false;
        }
    }
    public function delete(int $id)
    {
        try {
            return parent::delete($id);
        } catch (\Throwable $th) {
            $this->handleException($th);
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
        $orderByColumn = $data['columns'][$orderColumnIndex]['data'] ?? 'created_at';
        $orderType = $data['order'][0]['dir'] ?? 'desc';

        $query = $this->model->query();

        // Search
        $search = $data['search']['value'] ?? '';
        if (!empty($search)) {
            $query = $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Apply ordering only if valid
        if (!empty($orderByColumn)) {
            $query = $query->orderBy($orderByColumn, $orderType);
        }

        $recordsFiltered = $query->count();
        $result = $query->with('userProfile.user')->skip($skip)->take($pageLength)->get();
        $recordsTotal = $this->model->count();

        return [
            'draw' => $data['draw'],
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $result
        ];
    }
    function getConfig(){
        try {
            $settings = Configs::whereIn('key', ['introduce_image_2', 'introduce_content', 'introduce_youtube_id','introduce_pdf'])->pluck('value', 'key')->toArray();
            return $settings;
        } catch (\Throwable $th) {
           return null;
        }
    }

}