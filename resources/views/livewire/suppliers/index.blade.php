<div class="p-4">
    <h1 class="text-2xl font-bold mb-4">Suppliers</h1>

    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-2">
        <div>
            <input type="text" wire:model.debounce.300ms="search" placeholder="Search suppliers..."
                class="input input-bordered w-full md:w-64" />
        </div>
        <div>
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary">+ Add Supplier</a>
        </div>
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Phone</th>
                    <th class="px-4 py-2">Address</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($suppliers as $supplier)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">
                            {{ $loop->iteration + ($suppliers->currentPage() - 1) * $suppliers->perPage() }}</td>
                        <td class="px-4 py-2">{{ $supplier->name }}</td>
                        <td class="px-4 py-2">{{ $supplier->email }}</td>
                        <td class="px-4 py-2">{{ $supplier->phone }}</td>
                        <td class="px-4 py-2">{{ $supplier->address }}</td>
                        <td class="px-4 py-2">
                            @if ($supplier->status)
                                <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-800">Active</span>
                            @else
                                <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-800">Inactive</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 flex gap-2">
                            <a href="{{ route('suppliers.view', $supplier->id) }}" class="btn btn-xs btn-info">View</a>
                            <a href="{{ route('suppliers.edit', $supplier->id) }}"
                                class="btn btn-xs btn-warning">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">No suppliers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $suppliers->links() }}
    </div>
</div>
