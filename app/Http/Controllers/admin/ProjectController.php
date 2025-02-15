<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\Update;
use App\Http\Requests\Admin\Project\Store;
use App\Models\Project;
use App\Services\ProjectCategoryService;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        $catgegories = $this->categoryService()->getAllActive();
        return view('admin.project.index', compact('catgegories'));
    }
    public function projectService()
    {
        return app(ProjectService::class);
    }
    public function categoryService()
    {
        return app(ProjectCategoryService::class);
    }
    public function filterDataTable(Request $request)
    {
        $data = $request->all();
        $result = $this->projectService()->filterDataTable($data);
        return response()->json($result);
    }

    public function store(Store $request)
    {
        $data = $request->validated();
        $news = $this->projectService()->create($data);
        if ($news) {
            return jsonResponse(0);
        }
        return jsonResponse(1);
    }
    public function update(Update $request)
    {
        $data = $request->validated();
        $news = $this->projectService()->update($data['id'], $data);
        if ($news) {
            return jsonResponse(0);
        }
        return jsonResponse(1);
    }
    public function getContent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:projects,id',
        ]);
        if ($validator->fails())
            return jsonResponse(1);
        try {
            $id = $request->id;
            $content = Project::findOrFail($id);
            return jsonResponse(0, $content->description);

        } catch (\Exception $e) {
            return jsonResponse(1);
        }

    }
    public function content(Request $request)
    {
        $id = $request->id;
        $content = $this->projectService()->content($id, $request->all());
        return jsonResponse($content ? 0 : 1);
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $news = $this->projectService()->delete($id);
        if ($news) {
            return jsonResponse(0);
        }
        return jsonResponse(1);
    }
}
