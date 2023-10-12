<div x-data="package">
    <div class="flex items-center justify-between mb-5">
        <h3 class="font-semibold text-xl">Packages</h3>
        <button class="bg-black rounded-lg px-3 py-1.5"
            x-on:click="toggleAddPackageModal">
            <div class="flex items-center gap-3">
                <x-icons.plus class="w-5 h-5" stroke="#FFF" />
                <span class="text-white">Add Package</span>
            </div>
        </button>
    </div>

    <div class="bg-white rounded-lg p-3">

        <table class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                    <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Photo</th>
                    <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Name</th>
                    <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Service</th>
                    <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">No. of Pax</th>
                    <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Status</th>
                    <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($packages as $package)
                <tr>
                    <td
                        class="w-full max-w-0 py-2 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none">
                        <img src="{{ asset('assets/img/package-1.png') }}" class="w-auto h-14">
                    </td>
                    <td class="px-3 py-2 text-sm text-gray-500">{{ $package->name }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">{{ $package->service->name }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">{{ $package->no_of_pax }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">{{ $package->status ? 'Active' : 'Inactive' }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">
                        <button wire:click="toggleEditPackageModal({{ $package->id }})">Edit</button>
                    </td>
                </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('admin.package.modals.add-package', ['modal' => 'add_package_modal'])
    @livewire('admin.package.modals.edit-package', ['modal' => 'edit_package_modal', 'package' => $package])

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('package', () => ({
                add_package_modal: false,
                edit_package_modal: @entangle('edit_package_modal'),
     
                toggleAddPackageModal() {
                    this.add_package_modal = ! this.add_package_modal
                },
            }))
        })
    </script>
</div>