<?php

namespace App\Livewire\Borrowings;


use Livewire\Component;
use App\Models\Borrowing;

class Index extends Component
{
    public function render()
    {
        $borrowings = Borrowing::with(['book', 'customer'])->orderByDesc('id')->get();
        return view('livewire.borrowings.index', compact('borrowings'));
    }
}
