<?php

namespace App\Livewire\Borrowings;

use Livewire\Component;
use App\Models\Borrowing;

class Index extends Component
{
    public $searchBook = '';
    public $searchCustomer = '';
    public $searchBorrowedAt = '';
    public $searchReturnedAt = '';
    public $searchStatus = '';

    public function resetFilters()
    {
        $this->searchBook = '';
        $this->searchCustomer = '';
        $this->searchBorrowedAt = '';
        $this->searchReturnedAt = '';
        $this->searchStatus = '';
    }

    public function render()
    {
        $borrowings = Borrowing::with(['book', 'customer'])
            ->when($this->searchBook, function ($q) {
                $q->whereHas('book', function ($q2) {
                    $q2->where('title', 'like', '%' . $this->searchBook . '%');
                });
            })
            ->when($this->searchCustomer, function ($q) {
                $q->whereHas('customer', function ($q2) {
                    $q2->where('name', 'like', '%' . $this->searchCustomer . '%');
                });
            })
            ->when($this->searchBorrowedAt, function ($q) {
                $q->whereDate('borrowed_at', $this->searchBorrowedAt);
            })
            ->when($this->searchReturnedAt, function ($q) {
                $q->whereDate('returned_at', $this->searchReturnedAt);
            })
            ->when($this->searchStatus, function ($q) {
                $q->where('status', $this->searchStatus);
            })
            ->orderByDesc('id')
            ->get();
        return view('livewire.borrowings.index', compact('borrowings'));
    }
}
