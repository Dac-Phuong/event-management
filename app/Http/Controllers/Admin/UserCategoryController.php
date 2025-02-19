<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserCategory\Store;
use App\Http\Requests\Admin\UserCategory\Update;
use App\Models\UserCategory;
use App\Services\UserCategoryService;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    public $userCategoryService;
    public function __construct()
    {
        $this->userCategoryService = new UserCategory();
    }
    public function index()
    {
        return view('admin.user-category.index');
    }
    function filterDataTable(Request $request)
    {
        $data = $request->all();
        $result = $this->userCategoryService()->filterDataTable($data);
        return response()->json($result);
    }
    public function store(Store $request)
    {
        $data = $request->validated();
        $result = $this->userCategoryService()->create($data);
        return jsonResponse($result ? 0 : 1);
    }
    public function update(Update $request)
    {
        $data = $request->validated();
        $result = $this->userCategoryService()->update($data['id'], $data);
        return jsonResponse($result ? 0 : 1);
    }
    public function destroy(Request $request)
    {
        $data = $request->all();
        $result = $this->userCategoryService()->delete($data['id']);
        return jsonResponse($result ? 0 : 1);
    }

    public function userCategoryService()
    {
        return app(UserCategoryService::class);
    }
}
