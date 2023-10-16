<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-5xl" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.edit class="w-6 h-6" />
                    <span>Edit Package</span>
                </div>

                <div class="border-b"></div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="border rounded-md p-3 space-y-3">
                        <label for="profile" class="flex items-center gap-3 p-3 border rounded-lg overflow-hidden cursor-pointer">
                            <img class="h-auto w-2/5" src="{{ asset('assets/img/logo.png') }}" alt="Your Company">
                            <input id="profile" type="file" class="flex-1">
                        </label>

                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <label class="w-2/5 border-r ml-3">Category:</label>
                            <select class="flex-1 border-none w-full" wire:model="service_id">
                                @forelse ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                        </div>
            
                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <label class="w-2/5 border-r ml-3">Package Name:</label>
                            <input type="text" class="flex-1 border-none" wire:model="name">
                        </div>

                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <label class="w-2/5 border-r ml-3">Price:</label>
                            <input type="number" class="flex-1 border-none" wire:model="price">
                        </div>

                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <label class="w-2/5 border-r ml-3">No. of Pax:</label>
                            <input type="number" class="flex-1 border-none" wire:model="no_of_pax">
                        </div>

                        <div class="border rounded-lg px-3">
                            <p class="my-1.5">Package Inclusions:</p>
                            <textarea cols="30" rows="5" class="w-full border-none focus:ring-0 p-0" wire:model="inclusions"></textarea>
                        </div>

                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <label class="w-2/5 border-r ml-3">Status:</label>
                            <select class="flex-1 border-none w-full" wire:model="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="border rounded-md p-3 space-y-3">
                        <div class="border rounded-lg p-3">
                            <p class="font-semibold">Addons:</p>
                            <ul>
                                <li>
                                    <label for="update-addons-flower" class="space-x-2">
                                        <input type="checkbox" id="update-addons-flower" wire:model.live="flowers.addons">
                                        <span>Flower</span>
                                    </label>
                                </li>
                                <li>
                                    <label for="update-addons-chair" class="space-x-2">
                                        <input type="checkbox" id="update-addons-chair" wire:model.live="chairs.addons">
                                        <span>Chair</span>
                                    </label>
                                </li>
                                <li>
                                    <label for="update-addons-table" class="space-x-2">
                                        <input type="checkbox" id="update-addons-table" wire:model.live="tables.addons">
                                        <span>Table</span>
                                    </label>
                                </li>
                            </ul>

                            <ul>
                                @forelse ($addons as $type => $addon)
                                <li class="space-y-1">
                                    <div class="border-t my-2"></div>
                                    <span class="font-semibold capitalize">{{ $type }}</span>
                                    <div class="space-y-1">
                                        @foreach ($addon as $key => $value)
                                        <div class="flex items-center gap-3">
                                            <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-0.5" placeholder="Name" wire:model="addons.{{ $type }}.{{ $key }}.name">
                                            <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-0.5" placeholder="Price" wire:model="addons.{{ $type }}.{{ $key }}.price">
                                            <div class="flex items-center gap-3">
                                                <button  wire:click="removeAddonItemType('{{ $type }}', {{ $key }})">
                                                    <x-icons.trash class="w-5 h-5" />
                                                </button>
                                                <button @class(['invisible' => ! $loop->last]) wire:click="addAddonItemType('{{ $type }}')">
                                                    <x-icons.plus class="w-5 h-5" />
                                                </button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                        <div class="border rounded-lg p-3">
                            <p class="font-semibold">Customize:</p>
                            <ul>
                                <li>
                                    <label for="update-custom-flower" class="space-x-2">
                                        <input type="checkbox" id="update-custom-flower" wire:model.live="flowers.customize">
                                        <span>Flower</span>
                                    </label>
                                </li>
                                <li>
                                    <label for="update-custom-chair" class="space-x-2">
                                        <input type="checkbox" id="update-custom-chair" wire:model.live="chairs.customize">
                                        <span>Chair</span>
                                    </label>
                                </li>
                                <li>
                                    <label for="update-custom-table" class="space-x-2">
                                        <input type="checkbox" id="update-custom-table" wire:model.live="tables.customize">
                                        <span>Table</span>
                                    </label>
                                </li>
                            </ul>
                            <ul>
                                @forelse ($customize as $type => $custom)
                                <li class="space-y-1">
                                    <div class="border-t my-2"></div>
                                    <span class="font-semibold capitalize">{{ $type }}</span>
                                    <div class="space-y-1">
                                        @foreach ($custom as $key => $value)
                                        <div class="flex items-center gap-3">
                                            <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-0.5" placeholder="Name" wire:model="customize.{{ $type }}.{{ $key }}.name">
                                            <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-0.5" placeholder="Price" wire:model="customize.{{ $type }}.{{ $key }}.price">
                                            <div class="flex items-center gap-3">
                                                <button  wire:click="removeCustomizeItemType('{{ $type }}', {{ $key }})">
                                                    <x-icons.trash class="w-5 h-5" />
                                                </button>
                                                <button @class(['invisible' => ! $loop->last]) wire:click="addCustomizeItemType('{{ $type }}')">
                                                    <x-icons.plus class="w-5 h-5" />
                                                </button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
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