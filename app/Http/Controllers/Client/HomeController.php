<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\MailRecover;
use App\Mail\SendMail;
use App\Models\Configs;
use Illuminate\Support\Facades\Mail;
use App\Models\News;
use App\Models\Service;
use App\Services\ContactService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public $contactService;
    public function __construct()
    {
        $this->contactService = new ContactService();
    }
    public function index()
    {
        $banner = json_decode(Configs::get_config('base_banner'), true);
        $services = Service::where('status', 1)->limit(6)->get();
        $introduce = Configs::whereIn('key', ['introduce_image', 'introduce_content', 'introduce_youtube_id'])->pluck('value', 'key')->toArray();
        $certification = News::where('is_certification', 1)->select('id', 'title', 'thumbnail', 'new_category_id', 'slug')->with('category:id,slug')->get();
        $gallery = News::where('is_gallery', 1)->select('id', 'title', 'thumbnail', 'new_category_id', 'slug')->with('category:id,slug')->get();
        return view('client.home.index', compact('banner', 'services', 'introduce', 'gallery', 'certification'));
    }
    public function sendContact(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "fullname" => "required|max:40",
            "phone" => "required|numeric|digits_between:10,11",
            "email" => "required|email",
            "service_email" => "required",
            "message" => "required",
        ], [
            "fullname.required" => "Vui lòng nhập họ tên",
            "fullname.max" => "Họ tên quá dài",
            "phone.required" => "Vui lòng nhập điện thoại",
            "phone.numeric" => "Điện thoại phải là số",
            "phone.digits_between" => "Điện thoại phải có 10 hoặc 11 số",
            "email.required" => "Vui lòng nhập email",
            "email.email" => "Email không đúng định dạng",
            "service_email.required" => "Vui lòng chọn dịch vụ",
            "message.required" => "Vui lòng nhập nội dung",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error_code' => -1,
                'data' => $validator->messages(),
            ], 200);
        }
        $result = $this->contactService->sendContact($request->all());
        Mail::to($request->service_email)->send(new SendMail($request->all()));
        return jsonResponse($result ? 0 : 1);
    }
}

