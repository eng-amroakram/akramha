<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionService extends Controller
{
    public $model = Region::class;

    public function __construct()
    {
        $this->model = new Region();
    }

    public function model($id)
    {
        return Region::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return Region::data()
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return Region::changeStatus($id);
    }

    public function delete($id)
    {
        return Region::deleteModel($id);
    }

    public function store($data)
    {
        return Region::store($data);
    }

    public function update($data, $id)
    {
        return Region::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return Region::getRules($id);
    }

    public function messages()
    {
        return Region::getMessages();
    }

    public function inputs()
    {
        return Region::setFillable();
    }
}
