<div x-data="dashboard">
    <div class="grid grid-cols-12 gap-5">
        <div class="col-span-6 bg-white rounded-lg space-y-3 p-5">
            @livewire('admin.dashboard.calendar')
        </div>
        <div class="col-span-6 flex items-end bg-white rounded-lg p-5">
            <div class="w-full space-y-5">
                <div class="flex items-center justify-center gap-5">
                    <img class="h-40 w-auto" src="{{ asset('assets/img/logo.png') }}" alt="Your Company">
                    <div>
                        <h3 for="admin">Administrator:</h3>
                        <label for="name">Juan Dela Cruz</label>
                    </div>
                </div>
                <div class="space-y-1">
                    <button 
                        class="w-full border rounded-lg px-3 py-1.5">
                        <div class="flex items-center gap-3">
                            <x-icons.eye class="w-6 h-6" />
                            <span>View Profile</span>
                        </div>
                    </button>
                    <button 
                        class="w-full border rounded-lg px-3 py-1.5"
                        x-on:click="toggleEditProfileModal">
                        <div class="flex items-center gap-3">
                            <x-icons.edit class="w-6 h-6" />
                            <span>Edit Profile</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-span-6 bg-white rounded-lg space-y-3 p-5">
            <h3 class="font-semibold">Service Offers</h3>
            
            <div class="space-y-1">
                <button class="w-full border rounded-lg px-3 py-1.5"
                    x-on:click="toggleViewPackagesModal">
                    <div class="flex items-center gap-3">
                        <x-icons.eye class="w-6 h-6" />
                        <span>View Package</span>
                    </div>
                </button>
                <button class="w-full border rounded-lg px-3 py-1.5"
                    x-on:click="toggleAddPackageModal">
                    <div class="flex items-center gap-3">
                        <x-icons.plus class="w-6 h-6" />
                        <span>Add Package</span>
                    </div>
                </button>
                <button class="w-full border rounded-lg px-3 py-1.5"
                    x-on:click="toggleEditPackageModal">
                    <div class="flex items-center gap-3">
                        <x-icons.edit class="w-6 h-6" />
                        <span>Edit Package</span>
                    </div>
                </button>
                <button class="w-full border rounded-lg px-3 py-1.5"
                    x-on:click="toggleDeletePackageModal">
                    <div class="flex items-center gap-3">
                        <x-icons.trash class="w-6 h-6" />
                        <span>Delete Package</span>
                    </div>
                </button>
            </div>
        </div>
        <div class="col-span-6 bg-white rounded-lg space-y-3 p-5">
            <h3 class="font-semibold">Sales Report</h3>
            <div class="space-y-1">
                <button class="w-full border rounded-lg px-3 py-1.5">
                    <div class="flex items-center gap-3">
                        <x-icons.eye class="w-6 h-6" />
                        <span>Monthly Sales</span>
                    </div>
                </button>
                <button class="w-full border rounded-lg px-3 py-1.5">
                    <div class="flex items-center gap-3">
                        <x-icons.plus class="w-6 h-6" />
                        <span>Most Purchase Package</span>
                    </div>
                </button>
            </div>
        </div>
    </div>

    @livewire('admin.dashboard.modals.edit-profile', ['modal' => 'edit_profile_modal'])
    @livewire('admin.dashboard.modals.view-packages', ['modal' => 'view_packages_modal'])
    @livewire('admin.package.modals.add-package', ['modal' => 'add_package_modal'])
    @livewire('admin.dashboard.modals.edit-package', ['modal' => 'edit_package_modal'])
    @livewire('admin.dashboard.modals.delete-package', ['modal' => 'delete_package_modal'])

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dashboard', () => ({
                edit_profile_modal: false,
                view_packages_modal: false,
                add_package_modal: false,
                edit_package_modal: false,
                delete_package_modal: false,
     
                toggleEditProfileModal() {
                    this.edit_profile_modal = ! this.edit_profile_modal
                },

                toggleViewPackagesModal() {
                    this.view_packages_modal = ! this.view_packages_modal
                },

                toggleAddPackageModal() {
                    this.add_package_modal = ! this.add_package_modal
                },

                toggleEditPackageModal() {
                    this.edit_package_modal = ! this.edit_package_modal
                },

                toggleDeletePackageModal() {
                    this.delete_package_modal = ! this.delete_package_modal
                },
            }))
        })
    </script>
</div>