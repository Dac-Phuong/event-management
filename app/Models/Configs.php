<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configs extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'value',
    ];

    protected $collection = 'configs';

    public static function update_config($key, $value)
    {
        $option = static::updateOrCreate(
            ['key' => $key],
            ['key' => $key],
        );
        if (is_array($value)) {
            $value = serialize($value);
        }
        $option->key = $key;
        $option->value = $value;
        $option->save();
    }

    public static function get_config($key, $default = '')
    {

        if (empty($key)) {
            return '';
        }
        $option = Configs::where('key', $key)->first();
        $value = $option ? $option->value : $default;
        return $value;

    }
}
