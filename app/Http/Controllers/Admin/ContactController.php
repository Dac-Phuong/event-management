<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index');
    }
    public function filterDataTable(Request $request)
    {
        $data = $request->all();
        $result = $this->contactService()->filterDataTable($data);
        return response()->json($result);
    }
    public function contactService()
    {
        return app(ContactService::class);
    }
}
