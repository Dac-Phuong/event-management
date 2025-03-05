<?php

namespace App\Services;

use App\Models\Service;
use App\Models\ServiceNews;
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
    function createImage(string $id, array $data)
    {
        try {
            DB::beginTransaction();
            $service = $this->model::find($id);
            if (!$service) {
                DB::rollBack();
                return false;
            }
            if (!empty($data['images'])) {
                foreach ($data['images'] as $image) {
                    $path = parent::uploadImage($image);
                    $service->images()->create([
                        'service_id' => $id,
                        'image' => $path
                    ]);
                }
            }

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
        $service = $query->with(['newsMany:id,title'])->skip($skip)->take($pageLength)->get(['id', 'url', 'name', 'status', 'description', 'content', 'created_at', 'thumbnail']);

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

    public function getBySlug(string $slug)
    {
        try {
            return $this->getModel()
                ->with([
                    'newsMany:id,title,thumbnail,new_category_id,slug',
                    'newsMany.category:id,slug', 
                ])
                ->where('slug', $slug)
                ->first();
        } catch (\Throwable $th) {
            $this->handleException($th);
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

    public function addNews(string $id, array $data)
    {
        try {
            $service = $this->model::find($id);
            if (!$service) {
                return [];
            }
            $existingNewsIds = ServiceNews::where('service_id', $service->id)->pluck('news_id')->toArray();
            $newNewsIds = $data['news_id'];

            $newsToDelete = array_diff($existingNewsIds, $newNewsIds);
            if (!empty($newsToDelete)) {
                ServiceNews::where('service_id', $service->id)
                    ->whereIn('news_id', $newsToDelete)
                    ->delete();
            }
            $newsToAdd = array_diff($newNewsIds, $existingNewsIds);
            foreach ($newsToAdd as $newsId) {
                ServiceNews::create(['service_id' => $service->id, 'news_id' => $newsId]);
            }

            return $service;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return [];
        }
    }

}
