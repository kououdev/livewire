<?php

namespace App\Livewire\Borrowings;


use Livewire\Component;
use App\Models\Borrowing;

class View extends Component
{
    public $borrowing;

    public function mount($borrowing)
    {
        $this->borrowing = Borrowing::with(['book', 'customer'])->findOrFail($borrowing);
    }

    public function render()
    {
        return view('livewire.borrowings.view', [
            'borrowing' => $this->borrowing
        ]);
    }
}
