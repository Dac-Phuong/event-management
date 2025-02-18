<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Recruitment\Store;
use App\Http\Requests\Admin\Recruitment\Update;
use App\Models\Recruitment;
use App\Services\RecruitmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RecruitmentController extends Controller
{
    public function index()
    {
        return view('admin.recruitment.index');
    }
    public function recruitment()
    {
        return app(RecruitmentService::class);
    }
    public function filterDataTable(Request $request)
    {
        $data = $request->all();
        $result = $this->recruitment()->filterDataTable($data);
        return response()->json($result);
    }

    public function store(Store $request)
    {
        $data = $request->validated();
        $news = $this->recruitment()->create($data);
        if ($news) {
            return jsonResponse(0);
        }
        return jsonResponse(1);
    }
    public function update(Update $request)
    {
        $data = $request->validated();
        $news = $this->recruitment()->update($data['id'], $data);
        if ($news) {
            return jsonResponse(0);
        }
        return jsonResponse(1);
    }
    public function getContent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:recruitments,id',
        ]);
        if ($validator->fails())
            return jsonResponse(1);
        try {
            $result = Recruitment::findOrFail($request->id);
            return jsonResponse(0, $result->content);

        } catch (\Exception $e) {
            return jsonResponse(1);
        }

    }
    public function content(Request $request)
    {
        $id = $request->id;
        $content = $this->recruitment()->content($id, $request->all());
        return jsonResponse($content ? 0 : 1);
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $news = $this->recruitment()->delete($id);
        if ($news) {
            return jsonResponse(0);
        }
        return jsonResponse(1);
    }
}
