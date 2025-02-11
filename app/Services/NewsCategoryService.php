<?php

namespace App\Services;

use App\Models\News;
use App\Models\NewsCategory;

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
  public function getBySlug($slug, $perPage = 5)
  {
    try {
      $category = $this->getModel()->where('slug', $slug)->first();
      if (!$category) {
        return null;
      }
      $news = $category->news()
        ->select(['id', 'title', 'slug', 'content', 'thumbnail', 'views', 'is_show', 'is_pin', 'created_at'])
        ->orderBy('is_pin', 'desc')
        ->latest()
        ->paginate($perPage);

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
}