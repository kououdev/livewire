<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Customer;

class CustomerCrud extends Component
{
    public $customers, $name, $email, $phone, $customer_id;
    public $isEdit = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'nullable',
    ];

    public function render()
    {
        $this->customers = Customer::orderBy('id', 'desc')->get();
        return view('livewire.customer-crud');
    }

    public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->customer_id = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate();
        Customer::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);
        $this->resetInput();
        session()->flash('message', 'Customer created successfully.');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $this->customer_id = $customer->id;
        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->phone = $customer->phone;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate();
        if ($this->customer_id) {
            $customer = Customer::find($this->customer_id);
            $customer->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);
            $this->resetInput();
            session()->flash('message', 'Customer updated successfully.');
        }
    }

    public function delete($id)
    {
        Customer::find($id)->delete();
        session()->flash('message', 'Customer deleted successfully.');
    }
}
