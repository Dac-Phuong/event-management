<?php

namespace App\Services;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NewsServices extends BaseService
{
  function setModel()
  {
    $this->model = new News();
  }
  public function create(array $data)
  {
    $data['author_id'] = auth()->user()->id;
    try {
      DB::beginTransaction();
      if (isset($data['thumbnail']) && $data['thumbnail']) {
        $path = parent::uploadImage($data['thumbnail']);
        $data['thumbnail'] = $path;
      }
      $tagsId = [];

      $data['is_pin'] = isset($data['is_pin']) ? true : false;
      $news = $this->model::create($data);
      if (!empty($data['tags'])) {
        $tagsArray = collect(json_decode($data['tags'], true))->pluck('value')->toArray();
        foreach ($tagsArray as $tagName) {
          $tag = Tag::firstOrCreate(
            ['name' => $tagName],
            ['slug' => Str::slug($tagName)]
          );
          $tagsId[] = $tag->id;
        }
        if (!empty($tagsId)) {
          $news->tags()->sync($tagsId);
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
    $news = $query->with('category', 'author', 'tags')->skip($skip)->take($pageLength)->get(['id', 'title', 'views', 'is_show', 'is_pin', 'is_gallery', 'is_certification', 'created_at', 'new_category_id', 'author_id', 'content']);
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
      $news = $this->model::find($id);
      if (is_null($news)) {
        return false;
      }
      DB::beginTransaction();
      if (!empty($data['thumbnail'])) {
        $path = parent::uploadImage($data['thumbnail']);
        if ($path) {
          $data['thumbnail'] = $path;
        }
      }
      if (!empty($data['tags'])) {
        $tagsArray = collect(json_decode($data['tags'], true))->pluck('value')->toArray();
        $tagsId = [];
        foreach ($tagsArray as $tagName) {
          $tag = Tag::firstOrCreate(
            ['name' => $tagName],
            ['slug' => Str::slug($tagName)]
          );
          $tagsId[] = $tag->id;
        }
        if (!empty($tagsId)) {
          $news->tags()->sync($tagsId);
        }
      }
      $data['is_pin'] = !empty($data['is_pin']);
      if (!$news->update($data)) {
        DB::rollBack();
        return false;
      }
      DB::commit();
      return true;
    } catch (\Exception $e) {
      DB::rollBack();
      Log::error('Lỗi cập nhật bài viết: ' . $e->getMessage());
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
      return $query->with('category:id,slug')->limit(10)->get(['id', 'title', 'slug', 'thumbnail', 'new_category_id']);
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
        ->select(['id', 'title', 'slug', 'thumbnail', 'views', 'created_at', 'new_category_id'])
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
  public function getTags()
  {
    try {
      $tags = Tag::all()->pluck('name')->toArray();
      return $tags;
    } catch (\Throwable $th) {
      $this->handleException($th);
      return [];
    }
  }
  public function getTag($slug)
  {
    try {
      $tags = Tag::where('slug', $slug)->first();
      return $tags;
    } catch (\Throwable $th) {
      $this->handleException($th);
      return [];
    }
  }
  public function getNewsByTag($slug)
  {
    try {
      $news = $this->getModel()->with('author', 'category','tags')->whereHas('tags', function ($query) use ($slug)
       { $query->where('slug', $slug);})->paginate(10);
      return $news;
    } catch (\Throwable $th) {
      $this->handleException($th);
      return null;
    }
  }
}