<?php

namespace App\Livewire\Admin\Partials;

use Livewire\Component;

class PageTableHeader extends Component
{
    public $title = '';
    public $label = '';
    public $model = '';
    public $perm = '';

    public function mount($title, $label, $model, $perm)
    {
        $this->title = $title;
        $this->label = $label;
        $this->model = $model;
        $this->perm = $perm;
    }

    public function render()
    {
        return view('livewire.admin.partials.page-table-header');
    }
}
