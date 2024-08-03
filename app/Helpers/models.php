<?php

use App\Http\Controllers\Services\Services;
use App\Models\City;
use App\Models\Region;
use App\Models\User;

if (!function_exists('regions')) {
    function regions($search = null)
    {
        if ($search) {
            return Region::data()->pluck("id", 'name')->mapWithKeys(function ($id, $name) {
                return [$id => $name];
            })->toArray();
        }

        return Region::data()->get();
    }
}

if (!function_exists('cities')) {
    function cities($search = null)
    {
        if ($search) {
            return City::data()->pluck("id", 'name')->mapWithKeys(function ($id, $name) {
                return [$id => $name];
            })->toArray();
        }

        return City::data()->get();
    }
}

if (!function_exists('order_size_options')) {
    function order_size_options($search = null)
    {
        return [
            "large" => "كبير",
            "medium" => "وسط",
            "small" => "صغير",
        ];
    }
}

if (!function_exists('order_type_options')) {
    function order_type_options($search = null)
    {
        return [
            "sacrifices" => "ذبائح",
            "buffet" => "بوفيه",
        ];
    }
}

if (!function_exists('order_status_options')) {
    function order_status_options($search = null)
    {
        return [
            "pending" => "معلق",
            "progress" => "قيد التنفيذ",
            "completed" => "تم التسليم",
            "canceled" => "مرجع",
        ];
    }
}


if (!function_exists('charities')) {
    function charities($search = null)
    {
        $filters = [
            "status" => ["active"],
            "type" => ["charity"]
        ];
        if ($search) {
            return User::data()->filters($filters)->pluck("id", 'name')->mapWithKeys(function ($id, $name) {
                return [$id => $name];
            })->toArray();
        }

        return User::data()->get();
    }
}

if (!function_exists('select_regions')) {
    function select_regions($search = null)
    {
        if ($search) {
            return Region::data()->active()->pluck("id", 'name')->mapWithKeys(function ($id, $name) {
                return [$id => $name];
            })->toArray();
        }

        return Region::data()->get();
    }
}

if (!function_exists('select_cities')) {
    function select_cities($search = null)
    {
        if ($search) {
            return City::data()->active()->pluck("id", 'name')->mapWithKeys(function ($id, $name) {
                return [$id => $name];
            })->toArray();
        }

        return City::data()->get();
    }
}

if (!function_exists('region_cities')) {
    function region_cities($sector_id = 1)
    {
        return City::data()->active()->where('region_id', $sector_id)->pluck("id", 'name')->mapWithKeys(function ($id, $name) {
            return [$id => $name];
        })->toArray();
    }
}

if (!function_exists('models_count')) {
    function models_count($model)
    {
        $model =  Services::modelInstance($model);
        return $model::count();
    }
}
