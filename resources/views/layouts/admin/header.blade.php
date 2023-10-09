<div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 bg-yellow-300 px-4 sm:gap-x-6 sm:px-6 lg:px-8">
    <button type="button" class="-m-2.5 p-2.5 text-gray-700" x-on:click="toggleSidebar">
        <span class="sr-only">Open sidebar</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </button>

    <!-- Separator -->
    <div class="h-6 w-px bg-gray-900/10 lg:hidden" aria-hidden="true"></div>

    <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
        <form class="relative flex flex-1 py-4" action="#" method="GET">
            <label for="search-field" class="sr-only">Search</label>
            <svg class="pointer-events-none absolute inset-y-0 left-3 h-full w-5 text-gray-400" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                    clip-rule="evenodd" />
            </svg>
            <input id="search-field"
                class="block bg-white rounded-full h-full w-full border-0 py-0 pl-10 pr-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                placeholder="Search here" type="search" name="search">
        </form>
        <div class="flex items-center gap-x-4 lg:gap-x-6">
            <!-- Profile dropdown -->
            <div class="relative">
                <button type="button" class="-m-1.5 flex items-center p-1.5" id="user-menu-button" aria-expanded="false"
                    aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <x-icons.user-circle class="w-7 h-7" fill="#FFF" />
                </button>
            </div>
        </div>
    </div>
</div>