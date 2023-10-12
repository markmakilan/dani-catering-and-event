<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-xl">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.edit class="w-6 h-6" />
                    <span>Edit Package</span>
                </div>

                <div class="border-b"></div>

                @empty($id)
                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">Select Package</label>
                    <select class="flex-1 border-none w-full" wire:model.live="id">
                        <option value="" hidden></option>
                        @forelse ($packages as $package)
                        <option value="{{ $package->id }}">{{ $package->name }}</option>
                        @empty
                            
                        @endforelse
                    </select>
                </div>
                @endempty

                <label for="profile" class="flex items-center gap-3 p-3 border rounded-lg overflow-hidden cursor-pointer">
                    <img class="h-auto w-2/5" src="{{ asset('assets/img/logo.png') }}" alt="Your Company">
                    <input id="profile" type="file" class="flex-1">
                </label>

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">Category:</label>
                    <select class="flex-1 border-none w-full" wire:model="service_id">
                        @forelse ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @empty
                            
                        @endforelse
                    </select>
                </div>
    
                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">Package Name:</label>
                    <input type="text" class="flex-1 border-none" wire:model="name">
                </div>

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">No. of Pax:</label>
                    <input type="number" class="flex-1 border-none" wire:model="no_of_pax">
                </div>

                <div class="border rounded-lg px-3">
                    <p for="name" class="my-1.5">Package Inclusions:</p>
                    <textarea cols="30" rows="5" class="w-full border-none focus:ring-0 p-0" wire:model="inclusions"></textarea>
                </div>

                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">Status:</label>
                    <select class="flex-1 border-none w-full" wire:model="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex items-center justify-between">
                <button class="border rounded-lg px-3 py-1" x-on:click="{{ $modal }} = false">
                    <div class="flex items-center gap-3">
                        <span>Close</span>
                    </div>
                </button>
                <button class="border bg-blue-500 rounded-lg px-3 py-1" wire:click="update">
                    <div class="flex items-center gap-3">
                        <span class="text-white">Save</span>
                    </div>
                </button>
            </div>
        </x-slot>
    </x-modals.center>
</div>