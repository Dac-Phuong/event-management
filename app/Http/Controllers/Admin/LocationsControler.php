<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Locations\store;
use App\Http\Requests\Admin\Locations\update;
use App\Models\News;
use App\Services\LocationService;
use Illuminate\Http\Request;

class LocationsControler extends Controller
{
    public function index()
    {
        $news = News::where('is_show', 1)->get();
        return view('admin.locations.index', compact('news'));
    }

    public function create(store $request)
    {
        $result = $this->locationService()->create($request->all());
        return jsonResponse($result ? 0 : 1);
    }
    public function update(update $request)
    {
        $id = $request->input('id');
        $result = $this->locationService()->update($id,$request->all());
        return jsonResponse($result ? 0 : 1);
    }
    public function filterDataTable(Request $request)
    {
        $result = $this->locationService()->filterDataTable($request->all());
        return response()->json($result);
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $news = $this->locationService()->delete($id);
        if ($news) {
            return jsonResponse(0);
        }
        return jsonResponse(1);
    }
    public function locationService()
    {
        return app(LocationService::class);
    }
}
