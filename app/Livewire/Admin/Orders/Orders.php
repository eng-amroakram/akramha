<?php

namespace App\Livewire\Admin\Orders;

use App\Http\Controllers\Services\Services;
use App\Traits\LivewireHelper;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;
    use LivewireAlert;
    use LivewireHelper;

    protected $paginationTheme = 'bootstrap';
    protected $service = null;

    public $search = "";
    public $pagination = 10;
    public $sort_field = 'id';
    public $sort_direction = 'asc'; // desc

    public $filters = [];
    public $search_status = null;
    public $search_region_id = null;
    public $search_city_id = null;

    public $title = "";
    public $charity_id = "";
    public $user_id = "";
    public $region_id = "";
    public $city_id = "";
    public $address = "";
    public $time_receipt = "";
    public $phone = "";
    public $size = "large";
    public $type = "sacrifices";
    public $status = "pending";

    public $model = null;
    public $route = null;

    public function mount()
    {
        $this->user_id = auth()->id();
    }

    private function setService()
    {
        return Services::createInstance("OrderService") ?? new Services();
    }

    #[Title('لوحة التحكم - طلبات الفائض'), Layout('layouts.admin.app')]
    public function render()
    {
        $this->filters["search"] = $this->search;
        $this->filters["status"] = $this->search_status;
        $this->filters["region_id"] = $this->search_region_id;
        $this->filters["city_id"] = $this->search_city_id;

        $service = $this->setService();
        $orders = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.admin.orders.orders', [
            'orders' => $orders
        ]);
    }

    public function updated($input, $value)
    {
        if ($input == "region_id") {
            $this->dispatch('setSelectCities', region_cities($value));
        }
    }

    public function load($id)
    {
        $service = $this->setService();
        $model = $service->model($id);

        $this->model = $model;

        $this->title = $model->title;
        $this->user_id = $model->user_id;
        $this->charity_id = $model->charity_id;
        $this->region_id = $model->region_id;
        $this->city_id = $model->city_id;
        $this->address = $model->address;
        $this->time_receipt = $model->time_receipt->format("Y-m-d");
        $this->phone = $model->phone;
        $this->size = $model->size;
        $this->type = $model->type;
        $this->status = $model->status;

        $this->dispatch('set-single-selects', [
            "#model-region" => $model->region_id,
            "#model-charity_id" => $model->charity_id,
            "#model-city_id" => $model->city_id,
            "#model-size" => $model->size,
            "#model-type" => $model->type,
            "#model-status" => $model->status,
        ]);
    }
}
