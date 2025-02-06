<?php

namespace App\Services;

use App\Models\Configs;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class SettingService extends BaseService
{
    function setModel()
    {
        $this->model = new Configs();
    }
    public function get_settings()
    {
        return [
            // base
            'base_name' => Configs::get_config('base_name'),
            'base_short_name' => Configs::get_config('base_short_name'),
            'base_description' => Configs::get_config('base_description'),
            'base_logo' => $this->get_image('base_logo'),
            'base_icon' => $this->get_image('base_icon'),
            'base_banner' => $this->get_image('base_banner'),
            // contact
            'contact_name' => Configs::get_config('contact_name'),
            'contact_short_name' => Configs::get_config('contact_short_name'),
            'contact_phone' => Configs::get_config('contact_phone'),
            'contact_email' => Configs::get_config('contact_email'),
            'contact_address' => Configs::get_config('contact_address'),
            // contact
            'social_fanpage' => Configs::get_config('social_fanpage'),
            'social_group' => Configs::get_config('social_group'),
            'social_messenger' => Configs::get_config('social_messenger'),
            'social_zalo' => Configs::get_config('social_zalo'),
            'social_tiktok' => Configs::get_config('social_tiktok'),
            'social_telegram' => Configs::get_config('social_telegram'),
           
        ];
    }
    private function get_image($key)
    {
        $path = Configs::get_config($key);
        if (empty($path)) {
            return '';
        }
        return asset($path);
    }
    public function update_settings(array $data)
    {
        try {
            unset($data['_token']);
            foreach ($data as $key => $value) {
              if ($value instanceof UploadedFile && $value->isValid()) {
                $path = parent::uploadImage($value);
                Configs::update_config($key, $path);
              } else {
                Configs::update_config($key, $value);
              }
            }
          return true;
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return false;
        }
    }
}