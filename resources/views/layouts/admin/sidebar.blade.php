<div class="lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col" x-show="sidebar">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex grow flex-col gap-y-5 overflow-x-hidden overflow-y-auto bg-black pb-4">
        <div class="flex h-16 shrink-0 items-center justify-between px-6 gap-2">
            <img class="h-10 w-auto" src="{{ asset('assets/img/logo.png') }}" alt="Your Company">
            <span class="text-white text-center">Dani’s Catering and Events</span>
        </div>
        <nav class="flex flex-1 flex-col pl-6">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                <li>
                    <ul role="list" class="-mx-2 space-y-1">
                        <li @class([ 'relative flex rounded-l-full text-gray-400 items-center justify-between'
                            , 'bg-yellow-300 text-black'=> request()->routeIs('dashboard')
                            ])>
                            <a wire:navigate href="/admin/dashboard"
                                class="group flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                <x-icons.home class="w-6 h-6"
                                    fill="{{ request()->routeIs('dashboard') ? '#000' : '#9ba3ae' }}" />
                                Dashboard
                            </a>
                            @if (request()->routeIs('dashboard'))
                            <span class="absolute right-0 rounded-l-full bg-yellow-300 w-5 h-16"></span>
                            @endif
                        </li>
                        <li @class([ 'relative flex rounded-l-full text-gray-400 items-center justify-between'
                            , 'bg-yellow-300 text-black'=> request()->routeIs('transaction-record')
                            ])>
                            <a wire:navigate href="/admin/transaction-record"
                                class="group flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                <x-icons.museum class="w-6 h-6"
                                    fill="{{ request()->routeIs('transaction-record') ? '#000' : '#9ba3ae' }}" />
                                Transaction Records
                            </a>
                            @if (request()->routeIs('transaction-record'))
                            <span class="absolute right-0 rounded-l-full bg-yellow-300 w-5 h-16"></span>
                            @endif
                        </li>
                    </ul>
                </li>

                <li class="mt-auto">
                    <ul role="list" class="-mx-2 space-y-1">
                        <li class="relative flex rounded-l-full text-gray-400 items-center justify-between">
                            <a href="#"
                                class="group flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                <x-icons.logout class="w-5 h-5" fill="#9ba3ae" />
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>