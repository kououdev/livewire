<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Borrowings</h2>
    <div class="mb-4 flex justify-end">
        <a href="{{ route('borrowings.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Borrowing</a>
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
                            class="bg-green-600 text-white px-2 py-1 rounded">View</a>
                        <a href="{{ route('borrowings.edit', $borrowing->id) }}"
                            class="bg-yellow-400 text-white px-2 py-1 rounded">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4">No borrowings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
