<div class="max-w-2xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Book CRUD</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="mb-6">
        <div class="mb-2">
            <input type="text" wire:model="title" placeholder="Title" class="border rounded px-3 py-2 w-full text-black">
            @error('title')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <input type="text" wire:model="author" placeholder="Author"
                class="border rounded px-3 py-2 w-full text-black">
            @error('author')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <input type="number" wire:model="year" placeholder="Year"
                class="border rounded px-3 py-2 w-full text-black">
            @error('year')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex gap-2">
            <a href="/" class="bg-gray-500 text-dark px-4 py-2 rounded flex items-center">Back</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                {{ $isEdit ? 'Update' : 'Add' }} Book
            </button>
            @if ($isEdit)
                <button type="button" wire:click="resetInput"
                    class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</button>
            @endif
        </div>
    </form>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Author</th>
                <th class="border px-4 py-2">Year</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
                <tr>
                    <td class="border px-4 py-2">{{ $book->id }}</td>
                    <td class="border px-4 py-2">{{ $book->title }}</td>
                    <td class="border px-4 py-2">{{ $book->author }}</td>
                    <td class="border px-4 py-2">{{ $book->year }}</td>
                    <td class="border px-4 py-2 flex gap-2">
                        <button wire:click="edit({{ $book->id }})"
                            class="bg-yellow-400 text-white px-2 py-1 rounded">Edit</button>
                        <button wire:click="delete({{ $book->id }})"
                            class="bg-red-600 text-white px-2 py-1 rounded"
                            onclick="return confirm('Delete this book?')">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">No books found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
