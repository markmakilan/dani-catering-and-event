<div x-data="service">
    <div class="flex items-center justify-between mb-5">
        <h3 class="font-semibold text-xl">Services</h3>
        <button class="bg-black rounded-lg px-3 py-1.5"
            x-on:click="toggleAddServiceModal">
            <div class="flex items-center gap-3">
                <x-icons.plus class="w-5 h-5" stroke="#FFF" />
                <span class="text-white">Add Service</span>
            </div>
        </button>
    </div>

    <div class="bg-white rounded-lg p-3">

        <table class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                    <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Photo</th>
                    <th scope="col"
                        class="hidden px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900 lg:table-cell">Name
                    </th>
                    <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Status</th>
                    <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($services as $service)
                <tr>
                    <td
                        class="w-full max-w-0 py-2 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none">
                        <img src="{{ asset('assets/img/catering.png') }}" class="w-auto h-14">
                        <dl class="font-normal lg:hidden">
                            <dt class="sr-only">
                                <img src="{{ asset('assets/img/catering.png') }}" class="w-auto h-20">
                            </dt>
                            <dd class="mt-1 truncate text-gray-700">{{ $service->name }}</dd>
                            <dd class="mt-1 truncate text-gray-500 sm:hidden">{{ $service->status ? 'Active' : 'Inactive' }}</dd>
                        </dl>
                    </td>
                    <td class="hidden px-3 py-2 text-sm text-gray-500 lg:table-cell">{{ $service->name }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">{{ $service->status ? 'Active' : 'Inactive' }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">
                        <button wire:click="toggleEditServiceModal({{ $service->id }})">Edit</button>
                    </td>
                </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('admin.service.modals.add-service', ['modal' => 'add_service_modal'])
    @livewire('admin.service.modals.edit-service', ['modal' => 'edit_service_modal', 'service' => $service])

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('service', () => ({
                add_service_modal: false,
                edit_service_modal: @entangle('edit_service_modal'),
     
                toggleAddServiceModal() {
                    this.add_service_modal = ! this.add_service_modal
                },
            }))
        })
    </script>
</div>