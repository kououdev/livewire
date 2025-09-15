<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Supplier;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $suppliers = Supplier::query()
            ->when($this->search, function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            })
            ->orderByDesc('id')
            ->paginate($this->perPage);
        return view('livewire.suppliers.index', compact('suppliers'));
    }
}
