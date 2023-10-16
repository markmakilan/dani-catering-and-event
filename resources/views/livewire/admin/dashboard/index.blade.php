<div x-data="dashboard">
    <div class="grid grid-cols-12 gap-5">
        <div class="col-span-6 bg-white rounded-lg space-y-3 p-5">
            @livewire('admin.dashboard.calendar')
        </div>
        <div class="col-span-6 flex items-end bg-white rounded-lg p-5">
            <div class="w-full space-y-5">
                <div class="flex items-center justify-center gap-5">
                    @if (auth()->user()->getFirstMediaUrl('users'))
                        <img class="h-auto w-2/5" src="{{ asset(auth()->user()->getFirstMediaUrl('users')) }}">
                    @else
                        <img class="h-auto w-2/5" src="{{ asset('assets/img/logo.png') }}" alt="Your Company">
                    @endif
                    <div>
                        <h3 for="admin" class="capitalize">{{ auth()->user()->role }}:</h3>
                        <label for="name">{{ auth()->user()->name }}</label>
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
                    x-on:click="redirect('/admin/packages')">
                    <div class="flex items-center gap-3">
                        <x-icons.edit class="w-6 h-6" />
                        <span>Edit Package</span>
                    </div>
                </button>
                <button class="w-full border rounded-lg px-3 py-1.5"
                    x-on:click="redirect('/admin/packages')">
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

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dashboard', () => ({
                edit_profile_modal: false,
                view_packages_modal: false,
                add_package_modal: false,

                toggleEditProfileModal() {
                    this.edit_profile_modal = ! this.edit_profile_modal
                },

                toggleViewPackagesModal() {
                    this.view_packages_modal = ! this.view_packages_modal
                },

                toggleAddPackageModal() {
                    this.add_package_modal = ! this.add_package_modal
                },

                redirect(url) {
                    window.location.href = url
                },
            }))
        })
    </script>
</div>