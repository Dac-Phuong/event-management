<?php

namespace App\Services;
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
    $query = NewsCategory::query();

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

}