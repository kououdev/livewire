<?php

namespace App\Livewire\Borrowings;


use Livewire\Component;
use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

class Edit extends Component
{
    public $borrowing, $book_id, $customer_id, $borrowed_at, $returned_at, $status;
    public $books = [], $customers = [];

    protected $rules = [
        'book_id' => 'required|exists:books,id',
        'customer_id' => 'required|exists:customers,id',
        'borrowed_at' => 'required|date',
        'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
        'status' => 'required|in:borrowed,returned',
    ];

    public function mount($borrowingId)
    {
        $this->borrowing = Borrowing::findOrFail($borrowingId);
        $this->book_id = $this->borrowing->book_id;
        $this->customer_id = $this->borrowing->customer_id;
        $this->borrowed_at = $this->borrowing->borrowed_at;
        $this->returned_at = $this->borrowing->returned_at;
        $this->status = $this->borrowing->status;

        $this->books = Book::orderBy('title')->get();
        $this->customers = Customer::orderBy('name')->get();
    }

    public function update()
    {
        $this->validate();
        $this->borrowing->update([
            'book_id' => $this->book_id,
            'customer_id' => $this->customer_id,
            'borrowed_at' => $this->borrowed_at,
            'returned_at' => $this->returned_at,
            'status' => $this->status,
        ]);
        session()->flash('message', 'Borrowing updated successfully.');
        return redirect()->route('borrowings.index');
    }

    public function render()
    {
        return view('livewire.borrowings.edit');
    }
}
