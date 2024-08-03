<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityService extends Controller
{
    public $model = City::class;

    public function __construct()
    {
        $this->model = new City();
    }

    public function model($id)
    {
        return City::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return City::data()->with(['region'])
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return City::changeStatus($id);
    }

    public function delete($id)
    {
        return City::deleteModel($id);
    }

    public function store($data)
    {
        return City::store($data);
    }

    public function update($data, $id)
    {
        return City::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return City::getRules($id);
    }

    public function messages()
    {
        return City::getMessages();
    }

    public function inputs()
    {
        return City::setFillable();
    }
}
