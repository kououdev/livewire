
<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\BookCrud;
use App\Livewire\Dashboard;
use App\Livewire\CustomerCrud;
use App\Livewire\Borrowings\Index as BorrowingsIndex;
use App\Livewire\Borrowings\Create as BorrowingsCreate;
use App\Livewire\Borrowings\Edit as BorrowingsEdit;
use App\Livewire\Borrowings\View as BorrowingsView;
use App\Livewire\Suppliers\Index as SuppliersIndex;
use App\Livewire\Suppliers\Create as SuppliersCreate;
use App\Livewire\Suppliers\Edit as SuppliersEdit;
use App\Livewire\Suppliers\View as SuppliersView;

Route::get('/', Dashboard::class);
Route::get('/books', BookCrud::class);
Route::get('/customers', CustomerCrud::class);

Route::prefix('borrowings')->group(function () {
    Route::get('/', BorrowingsIndex::class)->name('borrowings.index');
    Route::get('/create', BorrowingsCreate::class)->name('borrowings.create');
    Route::get('/{borrowingId}/edit', BorrowingsEdit::class)->name('borrowings.edit');
    Route::get('/{borrowingId}', BorrowingsView::class)->name('borrowings.view');
});

Route::prefix('suppliers')->group(function () {
    Route::get('/', SuppliersIndex::class)->name('suppliers.index');
    Route::get('/create', SuppliersCreate::class)->name('suppliers.create');
    Route::get('/{supplierId}/edit', SuppliersEdit::class)->name('suppliers.edit');
    Route::get('/{supplierId}', SuppliersView::class)->name('suppliers.view');
});
