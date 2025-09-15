<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Borrowings</h2>
    <div class="mb-4 flex flex-col gap-2">
        <div class="flex flex-wrap gap-2 mb-2">
            <input type="text" wire:model.defer="searchBook" placeholder="Book Title"
                class="border rounded px-3 py-2 text-black" />
            <input type="text" wire:model.defer="searchCustomer" placeholder="Customer Name"
                class="border rounded px-3 py-2 text-black" />
            <input type="date" wire:model.defer="searchBorrowedAt" placeholder="Borrowed At"
                class="border rounded px-3 py-2 text-black" />
            <input type="date" wire:model.defer="searchReturnedAt" placeholder="Returned At"
                class="border rounded px-3 py-2 text-black" />
            <select wire:model.defer="searchStatus" class="border rounded px-3 py-2 text-black">
                <option value="">-- Status --</option>
                <option value="borrowed">Borrowed</option>
                <option value="returned">Returned</option>
            </select>
            <button wire:click="$refresh" class="bg-blue-600 text-white px-4 py-2 rounded">Search</button>
            <button wire:click="resetFilters" type="button"
                class="bg-gray-400 text-white px-4 py-2 rounded">Reset</button>
        </div>
        <div class="flex flex-wrap items-center justify-between mb-2">
            <div>
                <label class="mr-2 font-semibold">Show</label>
                <select wire:model.live="perPage" class="border rounded px-3 py-2 text-black">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                </select>
                <span class="ml-1">entries</span>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('borrowings.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add
                    Borrowing</a>
                <a href="/" class="bg-white-600 text-dark px-4 py-2 rounded">Back</a>
            </div>
        </div>
    </div>
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Book</th>
                <th class="border px-4 py-2">Customer</th>
                <th class="border px-4 py-2">Borrowed At</th>
                <th class="border px-4 py-2">Returned At</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($borrowings as $borrowing)
                <tr>
                    <td class="border px-4 py-2">{{ $borrowing->id }}</td>
                    <td class="border px-4 py-2">{{ $borrowing->book->title ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $borrowing->customer->name ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $borrowing->borrowed_at }}</td>
                    <td class="border px-4 py-2">{{ $borrowing->returned_at ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ ucfirst($borrowing->status) }}</td>
                    <td class="border px-4 py-2 flex gap-2">
                        <a href="{{ route('borrowings.view', $borrowing->id) }}"
                            class="bg-green-600 text-dark px-2 py-1 rounded">View</a>
                        <a href="{{ route('borrowings.edit', $borrowing->id) }}"
                            class="bg-yellow-400 text-dark px-2 py-1 rounded">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4">No borrowings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">
        {{ $borrowings->links() }}
    </div>
</div>
