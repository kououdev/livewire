<?php


namespace App\Livewire\Suppliers;

use Livewire\Component;
use App\Models\Supplier;

class Create extends Component
{
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

    public function save()
    {
        $this->validate();
        Supplier::create($this->supplier);
        session()->flash('success', 'Supplier created successfully.');
        return redirect()->route('suppliers.index');
    }

    public function render()
    {
        return view('livewire.suppliers.create');
    }
}
