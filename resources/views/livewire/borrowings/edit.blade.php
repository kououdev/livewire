<div class="max-w-xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Edit Borrowing</h2>
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="update" class="space-y-4">
        <div>
            <label class="block mb-1">Book</label>
            <select wire:model="book_id" class="border rounded px-3 py-2 w-full text-black">
                <option value="">-- Select Book --</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
            @error('book_id')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block mb-1">Customer</label>
            <select wire:model="customer_id" class="border rounded px-3 py-2 w-full text-black">
                <option value="">-- Select Customer --</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
            @error('customer_id')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block mb-1">Borrowed At</label>
            <input type="date" wire:model="borrowed_at" class="border rounded px-3 py-2 w-full text-black">
            @error('borrowed_at')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block mb-1">Returned At</label>
            <input type="date" wire:model="returned_at" class="border rounded px-3 py-2 w-full text-black">
            @error('returned_at')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block mb-1">Status</label>
            <select wire:model="status" class="border rounded px-3 py-2 w-full text-black">
                <option value="borrowed">Borrowed</option>
                <option value="returned">Returned</option>
            </select>
            @error('status')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex gap-2">
            <a href="{{ route('borrowings.index') }}" class="bg-gray-500 text-dark px-4 py-2 rounded">Back</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
