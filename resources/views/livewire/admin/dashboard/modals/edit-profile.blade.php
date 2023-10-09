<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-lg">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.edit class="w-6 h-6" />
                    <span>Edit Profile</span>
                </div>
                
                <div class="border-b"></div>

                <label for="profile" class="flex items-center gap-3 p-3 border rounded-lg overflow-hidden cursor-pointer">
                    <img class="h-auto w-2/5" src="{{ asset('assets/img/logo.png') }}" alt="Your Company">
                    <input id="profile" type="file" class="flex-1">
                </label>
    
                <div class="flex items-center border rounded-lg overflow-hidden">
                    <label for="name" class="w-2/5 border-r ml-3">Name:</label>
                    <input type="text" class="flex-1 border-none">
                </div>
                <div 
                    class="flex items-center border rounded-lg overflow-hidden"
                    x-data="{ type: 'password', toggleViewPassword() { this.type = this.type == 'password' ? 'text' : 'password' } }">
                    <label for="new-password" class="w-2/5 border-r ml-3">New Password:</label>
                    <input x-bind:type="type" class="flex-1 border-none">
                    <x-icons.eye class="w-4 h-4 cursor-pointer mx-3" x-on:click="toggleViewPassword" />
                </div>
                <div 
                    class="flex items-center border rounded-lg overflow-hidden"
                    x-data="{ type: 'password', toggleViewPassword() { this.type = this.type == 'password' ? 'text' : 'password' } }">
                    <label for="confirm-password" class="w-2/5 border-r ml-3">Confirm Password:</label>
                    <input x-bind:type="type" class="flex-1 border-none">
                    <x-icons.eye class="w-4 h-4 cursor-pointer mx-3" x-on:click="toggleViewPassword" />
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
                <button class="border bg-blue-500 rounded-lg px-3 py-1">
                    <div class="flex items-center gap-3">
                        <span class="text-white">Save</span>
                    </div>
                </button>
            </div>
        </x-slot>
    </x-modals.center>
</div>