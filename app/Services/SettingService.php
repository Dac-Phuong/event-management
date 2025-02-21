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
        $keys = [
            // Base
            'base_name',
            'base_map_id',
            'base_logo',
            'base_banner',
            // Contact
            'contact_name',
            'contact_short_name',
            'contact_phone',
            'contact_email',
            'contact_address',
            'contact_services',
            // Social
            'social_fanpage',
            'social_group',
            'social_messenger',
            'social_zalo',
            'social_tiktok',
            'social_telegram',
            'social_youtube',
            // introduce
            'introduce_youtube_id',
            'introduce_image',
            'introduce_image_2',
            'introduce_pdf',
            'introduce_content',
        ];

        $settings = [];

        foreach ($keys as $key) {
            $settings[$key] = ($key === 'base_logo') ? $this->get_image($key) : (($key === 'base_banner') ? json_decode(Configs::get_config($key), true) : Configs::get_config($key));
        }
        return $settings;
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
    public function create(array $data)
    {
        try {
            unset($data['_token']);
            if (isset($data['thumbnail']) && $data['thumbnail']) {
                $path = parent::uploadImage($data['thumbnail']);
                $data['thumbnail'] = $path;
            }
            $data['id'] = rand(1, 9999);
            $config = Configs::where('key', 'base_banner')->first();

            if (isset($config) && $config) {
                $existingData = json_decode($config->value, true);
                if (!is_array($existingData)) {
                    $existingData = [];
                }
                $existingData[] = $data;
                $config->update([
                    'value' => json_encode($existingData)
                ]);
            } else {
                Configs::create([
                    'key' => 'base_banner',
                    'value' => json_encode([$data])
                ]);
            }

            return true;
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return false;
        }
    }
    public function update(int $id, array $data)
    {
        try {
            unset($data['_token']);
            if (!empty($data['thumbnail']) && is_object($data['thumbnail'])) {
                $path = parent::uploadImage($data['thumbnail']);
                $data['thumbnail'] = $path;
            } else {
                unset($data['thumbnail']);
            }
            $config = Configs::where('key', 'base_banner')->first();

            if ($config && !empty($config->value)) {
                $existingData = json_decode($config->value, true);
                if (!is_array($existingData)) {
                    $existingData = [];
                }
                $newData = array_map(function ($item) use ($id, $data) {
                    if (isset($item['id']) && $item['id'] == $id) {
                        return array_merge($item, $data);
                    }
                    return $item;
                }, $existingData);

                $config->update([
                    'value' => json_encode($newData)
                ]);
            }

            return true;
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return false;
        }

    }
    public function delete(int $id)
    {
        try {
            $config = Configs::where('key', 'base_banner')->first();

            if ($config && !empty($config->value)) {
                $existingData = json_decode($config->value, true);
                if (!is_array($existingData)) {
                    $existingData = [];
                }

                $newData = array_filter($existingData, function ($item) use ($id) {
                    return isset($item['id']) && $item['id'] != $id;
                });
                if (empty($newData)) {
                    $config->update(['value' => json_encode([])]);
                } else {
                    $config->update(['value' => json_encode(array_values($newData))]);
                }
            }
            return true;
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return false;
        }

    }
}