<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderService extends Controller
{
    public $model = Order::class;

    public function __construct()
    {
        $this->model = new Order();
    }

    public function model($id)
    {
        return Order::find($id);
    }

    public function data($filters, $sort_field, $sort_direction, $paginate = 10)
    {
        return Order::data()->with(['region', 'city', 'user'])
            ->filters($filters)
            ->reorder($sort_field, $sort_direction)
            ->paginate($paginate);
    }

    public function changeStatus($id)
    {
        return Order::changeStatus($id);
    }

    public function delete($id)
    {
        return Order::deleteModel($id);
    }

    public function store($data)
    {
        return Order::store($data);
    }

    public function update($data, $id)
    {
        return Order::updateModel($data, $id);
    }

    public function rules($id = "")
    {
        return Order::getRules($id);
    }

    public function messages()
    {
        return Order::getMessages();
    }

    public function inputs()
    {
        return Order::setFillable();
    }
}
