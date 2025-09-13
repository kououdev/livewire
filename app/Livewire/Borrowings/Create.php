<?php

namespace App\Livewire\Borrowings;


use Livewire\Component;
use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Customer;

class Create extends Component
{
    public $book_id, $customer_id, $borrowed_at, $returned_at, $status = 'borrowed';
    public $books = [], $customers = [];

    protected $rules = [
        'book_id' => 'required|exists:books,id',
        'customer_id' => 'required|exists:customers,id',
        'borrowed_at' => 'required|date',
        'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
        'status' => 'required|in:borrowed,returned',
    ];

    public function mount()
    {
        $this->books = Book::orderBy('title')->get();
        $this->customers = Customer::orderBy('name')->get();
        $this->borrowed_at = now()->toDateString();
    }

    public function store()
    {
        $this->validate();
        Borrowing::create([
            'book_id' => $this->book_id,
            'customer_id' => $this->customer_id,
            'borrowed_at' => $this->borrowed_at,
            'returned_at' => $this->returned_at,
            'status' => $this->status,
        ]);
        session()->flash('message', 'Borrowing created successfully.');
        return redirect()->route('borrowings.index');
    }

    public function render()
    {
        return view('livewire.borrowings.create');
    }
}
