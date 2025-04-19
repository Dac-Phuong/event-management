<?php

namespace App\Services;

use App\Models\LocationMap;
use App\Models\LocationNews;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LocationService extends BaseService
{
    function setModel()
    {
        $this->model = new LocationMap();
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
        $service = $query->with(['locationNews.news:id,title'])->skip($skip)->take($pageLength)->get(['id', 'name', 'created_at']);

        return [
            "draw" => $data['draw'],
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            'data' => $service,
        ];
    }

    public function create(array $data)
    {
        try {
            DB::beginTransaction();
            $locationMap = LocationMap::create([
                'name' => $data['name']
            ]);
            if (!$locationMap) {
                DB::rollBack();
                return null;
            }
            foreach ($data['news_id'] as $id) {
                $news = News::find($id);
                if (!$news) {
                    DB::rollBack();
                    return null;
                }
                $locationNews = new LocationNews();
                $locationNews->location_map_id = $locationMap->id;
                $locationNews->news_id = $news->id;
                $locationNews->save();
            }
            DB::commit();
            return $locationMap;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return null;
        }
    }
    public function update(int $id, array $data)
    {
        try {
            DB::beginTransaction();
            $locationMap = LocationMap::find($id);
            if (!$locationMap) {
                DB::rollBack();
                return null;
            }
            $locationMap->name = $data['name'];
            $locationMap->save();
            if (isset($data['news_id']) && count($data['news_id']) > 0) {
                LocationNews::where('location_map_id', $locationMap->id)->delete();
                foreach ($data['news_id'] as $id) {
                    $news = News::find($id);
                    if (!$news) {
                        DB::rollBack();
                        return null;
                    }

                    $locationNews = new LocationNews();
                    $locationNews->location_map_id = $locationMap->id;
                    $locationNews->news_id = $news->id;
                    $locationNews->save();
                }
            }

            DB::commit();
            return $locationMap;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return null;
        }
    }
    function getlocations()
    {
        return $this->model::with([
            'locationNews.news' => function ($query) {
                $query->select('id', 'title', 'slug', 'new_category_id', 'thumbnail', 'content', 'created_at')
                    ->with('category:id,name,slug');
            }
        ])->get(['id', 'name']);
    }
}