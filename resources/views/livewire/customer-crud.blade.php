<div class="max-w-2xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Customer CRUD</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="mb-6">
        <div class="mb-2">
            <input type="text" wire:model="name" placeholder="Name" class="border rounded px-3 py-2 w-full text-black">
            @error('name')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <input type="email" wire:model="email" placeholder="Email"
                class="border rounded px-3 py-2 w-full text-black">
            @error('email')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <input type="text" wire:model="phone" placeholder="Phone"
                class="border rounded px-3 py-2 w-full text-black">
            @error('phone')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex gap-2">
            <a href="/" class="bg-gray-500 text-white px-4 py-2 rounded flex items-center">Back</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                {{ $isEdit ? 'Update' : 'Add' }} Customer
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
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Phone</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $customer)
                <tr>
                    <td class="border px-4 py-2">{{ $customer->id }}</td>
                    <td class="border px-4 py-2">{{ $customer->name }}</td>
                    <td class="border px-4 py-2">{{ $customer->email }}</td>
                    <td class="border px-4 py-2">{{ $customer->phone }}</td>
                    <td class="border px-4 py-2 flex gap-2">
                        <button wire:click="edit({{ $customer->id }})"
                            class="bg-yellow-400 text-white px-2 py-1 rounded">Edit</button>
                        <button wire:click="delete({{ $customer->id }})"
                            class="bg-red-600 text-white px-2 py-1 rounded"
                            onclick="return confirm('Delete this customer?')">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">No customers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
