<?php

namespace App\Services;
use App\Models\News;
use Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsServices extends BaseService
{
  function setModel()
  {
    $this->model = new News();
  }
  function create(array $data)
  {
    $data['author_id'] = auth()->user()->id;
    try {
      DB::beginTransaction();
      if (isset($data['thumbnail']) && $data['thumbnail']) {
        $path = parent::uploadImage($data['thumbnail']);
        $data['thumbnail'] = $path;
      }
      $data['is_pin'] = isset($data['is_pin']) ? true : false;
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
        $query->orWhere('title', 'like', "%" . $search . "%");
      });
    }
    $orderByName = 'id';
    switch ($orderColumnIndex) {
      case '0':
        $orderByName = 'id';
        break;
      case '1':
        $orderByName = 'title';
        break;
    }
    $query = $query->orderBy($orderByName, $orderBy);
    $recordsFiltered = $recordsTotal = $query->count();
    $news = $query->with('category', 'author')->skip($skip)->take($pageLength)->get(['id', 'title', 'views', 'is_show', 'is_pin', 'content', 'created_at', 'new_category_id', 'author_id']);
    return [
      "draw" => $data['draw'],
      "recordsTotal" => $recordsTotal,
      "recordsFiltered" => $recordsFiltered,
      'data' => $news,
    ];
  }
  public function update(int $id, array $data)
  {
    try {
      DB::beginTransaction();
      $news = $this->model::find($id);
      if (!$news) {
        DB::rollBack();
        return false;
      }
      if (isset($data['thumbnail']) && $data['thumbnail']) {
        $path = parent::uploadImage($data['thumbnail']);
        $data['thumbnail'] = $path;
      }
      $data['is_pin'] = isset($data['is_pin']) ? true : false;
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
      $news = $this->model::find($id);
      if (!$news) {
        DB::rollBack();
        return false;
      }
      $news->description = $data['content'];
      $news->save();

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
      $news = $this->model::find($id);
      if (!$news) {
        DB::rollBack();
        return false;
      }
      $news->delete();
      DB::commit();
      return true;
    } catch (\Exception $e) {
      DB::rollBack();
      Log::error($e->getMessage());
      return false;
    }
  }
  public function searchNews($data)
  {
    try {
      $search = trim($data['keyword'] ?? '');
      if (empty($search)) {
        return [];
      }
      $query = $this->model::query();
      $query->where('title', 'LIKE', "%{$search}%");
      return $query->with('category:id,slug')->limit(10)->get(['id', 'title', 'slug','thumbnail', 'new_category_id']);
    } catch (\Throwable $th) {
      Log::error('Search News Error: ' . $th->getMessage());
      return [];
    }
  }
    public function getFeature()
  {
    try {
      $feature = $this->getModel()
        ->with('category:id,slug')
        ->select(['id', 'title', 'slug', 'thumbnail', 'views', 'created_at','new_category_id'])
        ->where('is_pin', 1)
        ->latest()
        ->limit(5)
        ->get();
      return $feature;
    } catch (\Throwable $th) {
      $this->handleException($th);
      return null;
    }
  }
}