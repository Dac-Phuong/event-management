<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\Store;
use App\Http\Requests\Admin\User\Update;
use App\Http\Requests\Admin\User\UpdateProfile;
use App\Models\UserCategory;
use App\Services\UserService;
use Illuminate\Http\Request;

class userController extends Controller
{
    public $userService;
    public function __construct()
    {
        $this->userService = new UserService();
    }
    public function index()
    {
        $category = UserCategory::where('status', 1)->get();
        return view('admin.user.index',compact('category'));
    }
    function filterDataTable(Request $request)
    {
        $data = $request->all();
        $result = $this->userService()->filterDataTable($data);
        return response()->json($result);
    }
    public function store(Store $request)
    {
        $data = $request->validated();
        $result = $this->userService()->create($data);
        return jsonResponse($result ? 0 : 1);
    }
    public function update(Update $request)
    {
        $data = $request->validated();
        $result = $this->userService()->update($data['id'], $data);
        return jsonResponse($result ? 0 : 1);
    }
    public function updateProfile(UpdateProfile $request)
    {
        $data = $request->validated();
        $result = $this->userService()->updateProfile($data['user_id'], $data);
        return jsonResponse($result ? 0 : 1);
    }
    public function destroy(Request $request)
    {
        $data = $request->all();
        $result = $this->userService()->delete($data['id']);
        return jsonResponse($result ? 0 : 1);
    }

    public function userService()
    {
        return app(UserService::class);
    }
}
