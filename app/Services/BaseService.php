<?php

namespace App\Services;

use App\Helpers\AdminLogHelper;
use App\Models\UserLog;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;

abstract class BaseService
{
  protected $model;

  abstract protected function setModel();
  public function __construct()
  {
    $this->setModel();
  }
  protected function getModel()
  {
    return $this->model;
  }

  /**
   * Xử lý lỗi và ghi log lỗi
   *
   * @param \Exception $exception
   * @return void
   */
  protected function handleException(\Throwable $th)
  {
    Log::error(date('Y-m-d H:i:s') . ' -Error in ' . $th->getFile() . ' on line ' . $th->getLine() . ': ' . $th->getMessage());
    throw $th;
  }

  public function create(array $data)
  {
    try {
      return $this->getModel()->create($data);
    } catch (\Throwable $th) {
      $this->handleException($th);
      return false;
    }
  }

  public function findById(int $id)
  {
    try {
      $model = $this->getModel()->find($id);

      if (!$model) {
        return false;
      }

      return $model;
    } catch (\Throwable $th) {
      $this->handleException($th);
      return false;
    }
  }

  public function update(int $id, array $data)
  {
    try {
      $model = $this->getModel()->find($id);
      if (!$model) {
        return false;
      }
      return $model->update($data);
    } catch (\Throwable $th) {
      $this->handleException($th);
      return false;
    }
  }

  public function delete(int $id)
  {
    try {
      $model = $this->getModel()->find($id);
      if (!$model) {
        throw new \Exception('Record not found');
      }
      return $model->delete();
    } catch (\Throwable $th) {
      $this->handleException($th);
      return false;
    }
  }

  public function deleteByKey($key, $value)
  {
    try {
      return $this->getModel()
        ->where($key, $value)
        ->delete();
    } catch (\Throwable $th) {
      $this->handleException($th);
      return false;
    }
  }

  public function findBy($key, $value)
  {
    try {
      return $this->getModel()
        ->where($key, $value)
        ->first();
    } catch (\Throwable $th) {
      $this->handleException($th);
      return false;
    }
  }

  public function getAll()
  {
    try {
      return $this->getModel()->get();
    } catch (\Throwable $th) {
      $this->handleException($th);
      return false;
    }
  }

  public function getByFilter(array $filter)
  {
    try {
      $query = $this->getModel();
      foreach ($filter as $key => $value) {
        $query->where($key, $value);
      }
      return $query->get();
    } catch (\Throwable $th) {
      $this->handleException($th);
      return false;
    }
  }
  public function getBySlug(string $slug)
  {
    try {
      return $this->getModel()->where('slug', $slug)->first();
    } catch (\Throwable $th) {
      $this->handleException($th);
      return false;
    }
  }

  public function uploadImage(UploadedFile $file)
  {
    try {
      $filename = 'image-' . uniqid() . '.' . $file->getClientOriginalExtension();
      $destinationPath = public_path('/assets/files');
      $file->move($destinationPath, $filename);
      $path = '/assets/files/' . $filename;
      return $path;
    } catch (\Throwable $th) {
      $this->handleException($th);
      return false;
    }
  }

  public function getClass()
  {

    return get_class($this->getModel());
  }
  function getAllActive()
  {
    try {
      $status = $this->model::STATUS_ACTIVE;
      return $this->model::where('status', $status)->get();
    } catch (\Throwable $th) {
      $this->handleException($th);
      return [];
    }
  }
  function formatImagesBeforeSave($images)
  {
    $images = collect(explode(',', $images))->map(function ($image) {
      return str_replace(config('app.url'), '', $image);
    })->implode(',');
    return $images;
  }
  function formatImagesWhenGet($images)
  {
    $images = collect(explode(',', $images))->map(function ($image) {
      return config('app.url') . $image;
    });
    return $images;
  }
}

