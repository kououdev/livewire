<?php

namespace App\Livewire\Borrowings;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Borrowing;

class Index extends Component
{
    use WithPagination;


    public $searchBook = '';
    public $searchCustomer = '';
    public $searchBorrowedAt;
    public $searchReturnedAt = '';
    public $searchStatus = '';
    public $perPage = 10;

    public function mount()
    {
        $this->searchBorrowedAt = now()->format('Y-m-d');
    }

    public function updatingSearchBook()
    {
        $this->resetPage();
    }
    public function updatingSearchCustomer()
    {
        $this->resetPage();
    }
    public function updatingSearchBorrowedAt()
    {
        $this->resetPage();
    }
    public function updatingSearchReturnedAt()
    {
        $this->resetPage();
    }
    public function updatingSearchStatus()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->searchBook = '';
        $this->searchCustomer = '';
        $this->searchBorrowedAt = '';
        $this->searchReturnedAt = '';
        $this->searchStatus = '';
        $this->resetPage();
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
            ->paginate($this->perPage);
        return view('livewire.borrowings.index', compact('borrowings'));
    }
}
