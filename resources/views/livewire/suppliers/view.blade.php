<div class="p-4 max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Supplier Details</h1>
    <div class="mb-4">
        <label class="block font-semibold">Name</label>
        <div class="p-2 bg-gray-100 rounded">{{ $supplier->name }}</div>
    </div>
    <div class="mb-4">
        <label class="block font-semibold">Email</label>
        <div class="p-2 bg-gray-100 rounded">{{ $supplier->email }}</div>
    </div>
    <div class="mb-4">
        <label class="block font-semibold">Phone</label>
        <div class="p-2 bg-gray-100 rounded">{{ $supplier->phone }}</div>
    </div>
    <div class="mb-4">
        <label class="block font-semibold">Address</label>
        <div class="p-2 bg-gray-100 rounded">{{ $supplier->address }}</div>
    </div>
    <div class="mb-4">
        <label class="block font-semibold">Status</label>
        <div class="p-2 bg-gray-100 rounded">
            @if ($supplier->status)
                <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-800">Active</span>
            @else
                <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-800">Inactive</span>
            @endif
        </div>
    </div>
    <div class="flex gap-2">
        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
