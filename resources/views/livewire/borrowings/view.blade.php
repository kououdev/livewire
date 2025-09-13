<div class="max-w-xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Borrowing Detail</h2>
    <div class="mb-4">
        <a href="{{ route('borrowings.index') }}" class="bg-gray-500 text-dark px-4 py-2 rounded">Back</a>
    </div>
    <div class="space-y-2">
        <div><strong>Book:</strong> {{ $borrowing->book->title ?? '-' }}</div>
        <div><strong>Customer:</strong> {{ $borrowing->customer->name ?? '-' }}</div>
        <div><strong>Borrowed At:</strong> {{ $borrowing->borrowed_at }}</div>
        <div><strong>Returned At:</strong> {{ $borrowing->returned_at ?? '-' }}</div>
        <div><strong>Status:</strong> {{ ucfirst($borrowing->status) }}</div>
        <div><strong>Created At:</strong> {{ $borrowing->created_at }}</div>
        <div><strong>Updated At:</strong> {{ $borrowing->updated_at }}</div>
    </div>
</div>
