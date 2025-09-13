<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Book;

class BookCrud extends Component
{
    public $books, $title, $author, $year, $book_id;
    public $isEdit = false;

    protected $rules = [
        'title' => 'required',
        'author' => 'required',
        'year' => 'required|integer',
    ];

    public function render()
    {
        $this->books = Book::orderBy('id', 'desc')->get();
        return view('livewire.book-crud');
    }
    public static string $layout = 'components.layouts.app';

    public function resetInput()
    {
        $this->title = '';
        $this->author = '';
        $this->year = '';
        $this->book_id = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate();
        Book::create([
            'title' => $this->title,
            'author' => $this->author,
            'year' => $this->year,
        ]);
        $this->resetInput();
        session()->flash('message', 'Book created successfully.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $this->book_id = $book->id;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->year = $book->year;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate();
        if ($this->book_id) {
            $book = Book::find($this->book_id);
            $book->update([
                'title' => $this->title,
                'author' => $this->author,
                'year' => $this->year,
            ]);
            $this->resetInput();
            session()->flash('message', 'Book updated successfully.');
        }
    }

    public function delete($id)
    {
        Book::find($id)->delete();
        session()->flash('message', 'Book deleted successfully.');
    }
}
