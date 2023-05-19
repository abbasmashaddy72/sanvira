<?php

use App\Models\StaticOption;
use Illuminate\Support\Facades\Route;

// Gets Route Action Names
if (!function_exists('getRouteAction')) {
    function getRouteAction()
    {
        return substr(strstr(Route::currentRouteAction(), '@'), 1);
    }
}

// Gets array of custom key & values from Model with Map
if (!function_exists('getKeyValuesWithMap')) {
    function getKeyValuesWithMap($model, $value, $key, $where_column = null, $where_id = null)
    {
        $model = "\\App\\Models\\" . $model;
        if ($where_column != null && $where_id != null) {
            $data1 = $model::where($where_column, $where_id)->pluck($value, $key);

            $data = collect($data1)->map(function ($data1, $key) {
                return ['name' => $data1, 'id' => $key];
            })->toArray();
        } else {
            $data = $model::all()->map->only($value, $key)->toArray();
        }

        return $data;
    }
}

// Gets array of custom key & values from Model
if (!function_exists('getKeyValues')) {
    function getKeyValues($model, $value, $key, $where_column = null, $where_id = null)
    {
        $model = "\\App\\Models\\" . $model;
        if ($where_column != null && $where_id != null) {
            $data = $model::where($where_column, $where_id)->pluck($value, $key);
        } else {
            $data = $model::all()->pluck($value, $key);
        }

        return $data;
    }
}

// Create or Update Static option value in DB
if (!function_exists('set_static_option')) {
    function set_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
            StaticOption::where('option_name', $key)->update([
                'option_name' => $key,
                'option_value' => $value
            ]);
            cache()->forget($key);
            return true;
        
        return false;
    }
}

// Get Static Value from DB
if (!function_exists('get_static_option')) {
    function get_static_option($key)
    {
        global $option_name;
        $option_name = $key;
        $value = StaticOption::where('option_name', $option_name)->first();
        cache()->remember($option_name, 86400, function () {
            global $option_name;
            return StaticOption::where('option_name', $option_name)->first();
        });

        return !empty($value) ? $value->option_value : null;
    }
}
