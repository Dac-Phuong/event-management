<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserService extends BaseService
{
    function setModel()
    {
        $this->model = new User();
    }

    public function create(array $data)
    {
        try {
            parent::create($data);
            return true;
        } catch (\Throwable $th) {
            $this->handleException($th);
            return false;
        }
    }
    public function update(int $id, array $data)
    {
        try {
            DB::beginTransaction();
            if (!isset($data['password'])) {
                unset($data['password']);
            }
            parent::update($id, $data);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            $this->handleException($th);
            return false;
        }
    }
    public function updateProfile(int $id, array $data)
    {
        try {
            DB::beginTransaction();
            if(isset($data['avatar']) && $data['avatar']){
                $path = parent::uploadImage($data['avatar']);
                $data['avatar'] = $path;
            }
            $user_profile = UserProfile::where('user_id', $id)->first();
            if ($user_profile) {
                $user_profile->update($data);
            } else {
                $user_profile = new UserProfile();
                $user_profile->user_id = $id;
                $user_profile->fill($data);
                $user_profile->save();
            }
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            $this->handleException($th);
            return false;
        }
    }
    public function delete(int $id)
    {
        try {
            $user = $this->findById($id);
            if($user->role == 100){
                return false;
            }
            return parent::delete($id);
        } catch (\Throwable $th) {
            $this->handleException($th);
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
        $orderByColumn = $data['columns'][$orderColumnIndex]['data'] ?? 'created_at';
        $orderType = $data['order'][0]['dir'] ?? 'desc';

        // Validate column existence
        if (!Schema::hasColumn($this->model->getTable(), $orderByColumn)) {
            $orderByColumn = 'created_at'; // Fallback column
        }

        $query = $this->model->query();

        // Search
        $search = $data['search']['value'] ?? '';
        if (!empty($search)) {
            $query = $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        // Apply ordering only if valid
        if (!empty($orderByColumn)) {
            $query = $query->orderBy($orderByColumn, $orderType);
        }

        $recordsFiltered = $query->count();

        $result = $query->with('userProfile')->where('email', '!=', 'admin@gmail.com')
            ->skip($skip)
            ->take($pageLength)
            ->get();

        $recordsTotal = $this->model->count();

        return [
            'draw' => $data['draw'],
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $result
        ];
    }


}