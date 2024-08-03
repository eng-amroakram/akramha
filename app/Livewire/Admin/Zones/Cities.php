<?php

namespace App\Livewire\Admin\Zones;

use App\Http\Controllers\Services\Services;
use App\Traits\LivewireHelper;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Cities extends Component
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

    public $name = '';
    public $region_id = '';
    public $status = "active";

    public $model = null;
    public $route = null;

    private function setService()
    {
        return Services::createInstance("CityService") ?? new Services();
    }

    #[Title('لوحة التحكم - المدن'), Layout('layouts.admin.app')]
    public function render()
    {
        $this->filters["search"] = $this->search;
        $this->filters["status"] = $this->search_status;
        $this->filters["region_id"] = $this->search_region_id;

        $service = $this->setService();
        $cities = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.admin.zones.cities', [
            'cities' => $cities
        ]);
    }

    public function load($id)
    {
        $service = $this->setService();
        $model = $service->model($id);

        $this->model = $model;

        $this->name = $model->name;
        $this->region_id = $model->region_id;
        $this->status = $model->status;

        $this->dispatch('set-single-select', [
            "region_id" => $model->region_id,
            "id" => "#model-region"
        ]);
    }
}
