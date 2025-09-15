<div class="p-4 max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Add Supplier</h1>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Name</label>
            <input type="text" wire:model.defer="supplier.name" class="input input-bordered w-full" required />
            @error('supplier.name')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Email</label>
            <input type="email" wire:model.defer="supplier.email" class="input input-bordered w-full" required />
            @error('supplier.email')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Phone</label>
            <input type="text" wire:model.defer="supplier.phone" class="input input-bordered w-full" required />
            @error('supplier.phone')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Address</label>
            <textarea wire:model.defer="supplier.address" class="input input-bordered w-full" required></textarea>
            @error('supplier.address')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Status</label>
            <select wire:model.defer="supplier.status" class="input input-bordered w-full">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            @error('supplier.status')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex gap-2">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
