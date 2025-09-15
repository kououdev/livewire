<?php


namespace App\Livewire\Suppliers;

use Livewire\Component;
use App\Models\Supplier;

class Edit extends Component
{
    public $supplierId;
    public $supplier = [
        'name' => '',
        'email' => '',
        'phone' => '',
        'address' => '',
        'status' => 'active',
    ];

    protected $rules = [
        'supplier.name' => 'required|string|max:255',
        'supplier.email' => 'required|email|max:255',
        'supplier.phone' => 'required|string|max:50',
        'supplier.address' => 'required|string',
        'supplier.status' => 'required|in:active,inactive',
    ];

    public function mount($supplierId)
    {
        $model = Supplier::findOrFail($supplierId);
        $this->supplierId = $supplierId;
        $this->supplier = $model->only(['name', 'email', 'phone', 'address', 'status']);
    }

    public function update()
    {
        $this->validate();
        $model = Supplier::findOrFail($this->supplierId);
        $model->update($this->supplier);
        session()->flash('success', 'Supplier updated successfully.');
        return redirect()->route('suppliers.index');
    }

    public function render()
    {
        return view('livewire.suppliers.edit');
    }
}
