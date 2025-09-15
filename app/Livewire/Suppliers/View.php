<?php


namespace App\Livewire\Suppliers;

use Livewire\Component;
use App\Models\Supplier;

class View extends Component
{
    public $supplierId;
    public $supplier;

    public function mount($supplierId)
    {
        $this->supplierId = $supplierId;
        $this->supplier = Supplier::findOrFail($supplierId);
    }

    public function render()
    {
        return view('livewire.suppliers.view', [
            'supplier' => $this->supplier
        ]);
    }
}
