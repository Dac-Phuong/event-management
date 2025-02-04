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
      // $data['thumbnail'] = $this->formatImagesBeforeSave($data['thumbnail']);
      $news = parent::create($data);
      $data['model_id'] = $news->id;
      $data['model_type'] = $this->getClass();
      DB::rollBack();
      return false;
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
    $query = News::query();

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
    $news = $query->with('category', 'author')->skip($skip)->take($pageLength)->get(['id', 'title', 'views', 'is_show', 'is_pin', 'created_at', 'new_category_id', 'author_id']);
   
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
      // $data['thumbnail'] = $this->formatImagesBeforeSave($data['thumbnail']);
      $result = parent::update($id, $data);
      if ($result == false) {
        DB::rollBack();
        return false;
      }
      $news = News::find($id);
      $data['model_id'] = $news->id;
      $data['model_type'] = $this->getClass();
    
      DB::rollBack();
      return false;
    } catch (\Exception $e) {
      DB::rollBack();
      Log::error($e->getMessage());
      return false;
    }
  }
  public function delete(int $id) {
    try {
      DB::beginTransaction();
      $news = News::find($id);
      $result = parent::delete($id);
      if ($result == false) {
        DB::rollBack();
        return false;
      }
      DB::rollBack();
      return false;
    } catch (\Exception $e) {
      DB::rollBack();
      Log::error($e->getMessage());
      return false;
    }
  }
}