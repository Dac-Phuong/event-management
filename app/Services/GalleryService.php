<?php

namespace App\Services;

use App\Models\News;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GalleryService extends BaseService
{
    public function setModel()
    {
        $this->model = new Gallery();
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
        $studentProfiles = $query->skip($skip)->take($pageLength)->get();
        return [
            "draw" => $data['draw'],
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            'data' => $studentProfiles,
        ];
    }
    public function delete(int $id)
    {
        try {
            DB::beginTransaction();
            $category = $this->model::find($id);
            if (!$category) {
                DB::rollBack();
                return false;
            }
            $category->news()->delete();
            $category->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return false;
        }
    }
    public function getNews()
    {
        try {
            return News::where('is_show', 1)->select('id', 'title')->get();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return [];
        }
    }

}