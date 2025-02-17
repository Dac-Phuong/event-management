<?php

namespace App\Services;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsCategoryService extends BaseService
{
  public function setModel()
  {
    $this->model = new NewsCategory();
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

    $studentProfiles = $query->skip($skip)->take($pageLength)->get(['id', 'name', 'slug', 'created_at', 'status']);

    return [
      "draw" => $data['draw'],
      "recordsTotal" => $recordsTotal,
      "recordsFiltered" => $recordsFiltered,
      'data' => $studentProfiles,
    ];
  }
  public function getBySlug($slug)
  {
    try {
      $category = $this->getModel()->where('slug', $slug)->first();
      if (!$category) {
        return null;
      }
      $news = $category->news()
        ->with(['author:id,name,email'])
        ->select(['id', 'title', 'slug', 'content', 'thumbnail', 'views', 'is_show', 'is_pin', 'created_at', 'author_id'])
        ->orderBy('is_pin', 'desc')
        ->latest()
        ->paginate(8);
      return [
        'category' => $category,
        'news' => $news
      ];
    } catch (\Throwable $th) {
      $this->handleException($th);
      return null;
    }
  }

  public function getBySlugWithFeature($slug)
  {
    try {
      $category = $this->getModel()->where('slug', $slug)->first();
      if (!$category)
        return null;
      $feature = $category->news()
        ->select(['id', 'title', 'slug', 'content', 'thumbnail', 'views', 'is_show', 'is_pin', 'created_at'])
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

  public function getBySlugDetail($slug, $newsSlug)
  {
    try {
      $category = $this->getModel()->where('slug', $slug)->first();
      if (!$category) {
        return null;
      }
      $news = $category->news()
        ->with(['author:id,name,email'])
        ->where('slug', $newsSlug)
        ->orderBy('is_pin', 'desc')
        ->latest()
        ->firstOrFail();
      $news->views += 1;
      $news->save();
      return [
        'category' => $category,
        'news' => $news
      ];
    } catch (\Throwable $th) {
      $this->handleException($th);
      return null;
    }
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
}