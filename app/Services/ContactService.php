<?php

namespace App\Services;

use App\Models\Contact;

class ContactService extends BaseService
{
    function setModel()
    {
        $this->model = new Contact();
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
                $query->orWhere('fullname', 'like', "%" . $search . "%");
                $query->orWhere('email', 'like', "%" . $search . "%");
                $query->orWhere('phone', 'like', "%" . $search . "%");
            });
        }
        $orderByName = 'id';
        switch ($orderColumnIndex) {
            case '0':
                $orderByName = 'id';
                break;
            case '1':
                $orderByName = 'fullname';
                break;
        }
        $query = $query->orderBy($orderByName, $orderBy);
        $recordsFiltered = $recordsTotal = $query->count();
        $service = $query->skip($skip)->take($pageLength)->get(['id', 'fullname', 'service_email', 'email', 'created_at', 'phone', 'message']);

        return [
            "draw" => $data['draw'],
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            'data' => $service,
        ];
    }
    function sendContact($data)
    {
        try {
            $this->model::create($data);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}