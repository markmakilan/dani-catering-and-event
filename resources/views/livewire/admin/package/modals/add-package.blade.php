<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-5xl" style="display: none;">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.plus class="w-6 h-6" />
                    <span>Add Package</span>
                </div>

                <div class="border-b"></div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="col-span-2 md:col-span-1 border rounded-md p-3 space-y-3">
                        <div class="flex items-center border rounded-lg overflow-hidden py-1">
                            <label class="w-2/5 border-r ml-3">Photo:</label>
                            <input id="profile" type="file" class="flex-1" wire:model="file">
                        </div>

                        @error('file')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror
        
                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <label class="w-2/5 border-r ml-3">Category:</label>
                            <select class="flex-1 border-none w-full" wire:model="service_id">
                                <option value="" hidden></option>
                                @forelse ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                        </div>

                        @error('service_id')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror
            
                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <label class="w-2/5 border-r ml-3">Package Name:</label>
                            <input type="text" class="flex-1 border-none" wire:model="name">
                        </div>

                        @error('name')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror

                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <label class="w-2/5 border-r ml-3">Price:</label>
                            <div class="flex-1 relative">
                                <span class="absolute left-3 top-2">₱</span>
                                <input type="number" class="w-full border-none pl-7" wire:model="price">
                            </div>
                        </div>

                        @error('price')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror
        
                        <div class="flex items-center border rounded-lg overflow-hidden">
                            <label class="w-2/5 border-r ml-3">No. of Pax:</label>
                            <input type="number" class="flex-1 border-none" wire:model="no_of_pax">
                        </div>

                        @error('no_of_pax')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror
        
                        <div class="border rounded-lg px-3 pb-3">
                            <p class="my-1.5">Package Inclusions:</p>
                            <div wire:ignore>
                                <textarea id="add-inclusions" cols="30" rows="5" class="w-full border-none focus:ring-0 p-0" wire:model="inclusions"></textarea>
                            </div>
                        </div>

                        @error('inclusions')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-2 md:col-span-1 border rounded-md p-3 space-y-3">
                        <div class="border rounded-lg p-3">
                            <p class="font-semibold">Addons:</p>
                            <ul>
                                @foreach ($item_types->where('type', 'addons') as $key => $item)
                                <li>
                                    <label for="update-{{ $key }}" class="space-x-2">
                                        <input type="checkbox" id="update-{{ $key }}" wire:model.live="addon_types.{{ strtolower(str_replace(' ', '_', $item->name)) }}">
                                        <span>{{ $item->name }}</span>
                                    </label>
                                </li>
                                @endforeach
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
                                @foreach ($item_types->where('type', 'customize') as $key => $item)
                                <li>
                                    <label for="update-{{ $key }}" class="space-x-2">
                                        <input type="checkbox" id="update-{{ $key }}" wire:model.live="customize_types.{{ strtolower(str_replace(' ', '_', $item->name)) }}">
                                        <span>{{ $item->name }}</span>
                                    </label>
                                </li>
                                @endforeach
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
                <button class="border bg-blue-500 rounded-lg px-3 py-1" wire:click="save">
                    <div class="flex items-center gap-3">
                        <span class="text-white">Add</span>
                    </div>
                </button>
            </div>
        </x-slot>
    </x-modals.center>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
        .create( document.querySelector( '#add-inclusions' ) )
        .then( editor => {
            editor.model.document.on('change:data', () => {
                @this.set('inclusions', editor.getData());
            })
        })
        .catch( error => {
            console.error( error );
        })
</script>
</div>