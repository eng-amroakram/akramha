<?php

namespace App\Livewire\Admin\Users;

use App\Http\Controllers\Services\Services;
use App\Traits\LivewireHelper;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    use LivewireAlert;
    use WithFileUploads;
    use LivewireHelper;

    protected $paginationTheme = 'bootstrap';
    protected $service = null;

    public $search = "";
    public $pagination = 10;
    public $sort_field = 'id';
    public $sort_direction = 'asc'; // desc

    public $filters = [];
    public $search_type = null;
    public $search_status = null;

    public $name = "";
    public $phone = "";
    public $photo = "";
    public $email = "";
    public $address = "";
    public $password = "";
    public $region_id = "";
    public $city_id = "";
    public $type = "charity";
    public $status = "active";

    public $service_name = "UserService";

    private function setService()
    {
        return Services::createInstance("UserService") ?? new Services();
    }

    #[Title('لوحة التحكم - المستخدمين'), Layout('layouts.admin.app')]
    public function render()
    {
        $this->filters["search"] = $this->search;
        $this->filters["type"] = $this->search_type;
        $this->filters["status"] = $this->search_status;

        $service = $this->setService();
        $users = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.admin.users.users', [
            'users_models' => $users
        ]);
    }

    public function updated($input, $value)
    {
        if ($input == "region_id") {
            $this->dispatch('setSelectCities', region_cities($value));
        }
    }
}
