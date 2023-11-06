<?php

use Illuminate\Support\Str;
use App\Models\StaticOption;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// Gets ENUM values Data from DB in array format
if (!function_exists('getEnum')) {
    function getEnum($table_name, $column_name)
    {
        $values = DB::select("SHOW COLUMNS FROM $table_name WHERE Field = '$column_name'");

        preg_match('/^enum\((.*)\)$/', $values[0]->Type, $matches);

        $enum = [];
        foreach (explode(',', $matches[1]) as $value) {
            $enum[trim($value, "'")] = trim($value, "'");
        }

        return $enum;
    }
}


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
        $model = '\\App\\Models\\' . $model;
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
        $model = '\\App\\Models\\' . $model;
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
        if (!StaticOption::where('name', $key)->first()) {
            StaticOption::create([
                'name' => $key,
                'value' => $value,
            ]);

            return true;
        }
        StaticOption::where('name', $key)->update([
            'name' => $key,
            'value' => $value,
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
        global $name;
        $name = $key;
        $value = StaticOption::where('name', $name)->first();
        cache()->remember($name, 86400, function () {
            global $name;

            return StaticOption::where('name', $name)->first();
        });

        return !empty($value) ? $value->value : null;
    }
}

// Check if string contains word from array
if (!function_exists('array_contains')) {
    function array_contains($str, $arr)
    {
        foreach ($arr as $a) {
            if (stripos($str, $a) !== false) {
                return true;
            }
        }

        return false;
    }
}

// Console Log
if (!function_exists('console_log')) {
    function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
            ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }
}

// Generate Number
if (!function_exists(('generateTableNumber'))) {
    function generateTableNumber($tableName, $column)
    {
        $latestRecord = DB::table($tableName)->latest($column)->first();
        $currentYear = date('Y');
        $currentMonth = date('m');

        $tablePrefix = strtoupper(substr($tableName, 0, 3));

        if ($latestRecord && strpos($latestRecord->{$column}, '-') !== false) {
            [$prefix, $yearMonth, $lastNumber] = explode('-', $latestRecord->{$column});
        } else {
            $prefix = $tablePrefix;
            $yearMonth = $currentYear . $currentMonth;
            $lastNumber = '0000';
        }

        if ($yearMonth !== $currentYear . $currentMonth) {
            $yearMonth = $currentYear . $currentMonth;
            $lastNumber = '0000';
        }

        $nextNumber = str_pad((int)$lastNumber + 1, 4, '0', STR_PAD_LEFT);

        $newTableNo = $prefix . '-' . $yearMonth . '-' . $nextNumber;

        return $newTableNo;
    }
}
