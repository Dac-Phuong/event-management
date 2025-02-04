<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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
    Log::error("Error in " . $th->getFile() . " on line " . $th->getLine() . ": " . $th->getMessage());
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
    } catch (\Exception $e) {
      $this->handleException($e);
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
    } catch (\Exception $e) {
      $this->handleException($e);
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
    } catch (\Exception $e) {
      $this->handleException($e);
      return false;
    }
  }

  public function deleteByKey($key, $value)
  {
    try {
      return $this->getModel()->where($key, $value)->delete();
    } catch (\Exception $e) {
      $this->handleException($e);
      return false;
    }
  }

  public function findBy($key, $value)
  {
    try {
      return $this->getModel()->where($key, $value)->first();
    } catch (\Exception $e) {
      $this->handleException($e);
      return false;
    }
  }

  public function getAll()
  {
    try {
      return $this->getModel()->get();
    } catch (\Exception $e) {
      $this->handleException($e);
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
    } catch (\Exception $e) {
      $this->handleException($e);
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
        } catch (\Exception $e) {
            $this->handleException($e);
            return false;
        }
    }

  function camelToKebab($input)
  {
    $output = strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $input));
    return $output;
  }

  public function getClass()
  {

    return get_class($this->getModel());
  }
}