<?php

use Illuminate\Support\Facades\Route;


use App\Livewire\BookCrud;
use App\Livewire\Dashboard;
use App\Livewire\CustomerCrud;
use App\Livewire\Borrowings\Index as BorrowingsIndex;
use App\Livewire\Borrowings\Create as BorrowingsCreate;
use App\Livewire\Borrowings\Edit as BorrowingsEdit;
use App\Livewire\Borrowings\View as BorrowingsView;

Route::get('/', Dashboard::class);
Route::get('/books', BookCrud::class);
Route::get('/customers', CustomerCrud::class);

Route::prefix('borrowings')->group(function () {
    Route::get('/', BorrowingsIndex::class)->name('borrowings.index');
    Route::get('/create', BorrowingsCreate::class)->name('borrowings.create');
    Route::get('/{borrowingId}/edit', BorrowingsEdit::class)->name('borrowings.edit');
    Route::get('/{borrowing}', BorrowingsView::class)->name('borrowings.view');
});
