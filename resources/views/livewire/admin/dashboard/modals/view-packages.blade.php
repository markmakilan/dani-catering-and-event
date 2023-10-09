<div>
    <x-modals.center modal="{{ $modal }}" width="sm:max-w-4xl">
        <x-slot name="content">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <x-icons.eye class="w-6 h-6" />
                    <span>View Packages</span>
                </div>
                
                <div class="border-b"></div>

                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Name</th>
                            <th scope="col"
                                class="hidden px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900 lg:table-cell">Category
                            </th>
                            <th scope="col"
                                class="hidden px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900 sm:table-cell">No. of Pax
                            </th>
                            <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Amount</th>
                            <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr>
                            <td
                                class="w-full max-w-0 py-2 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none">
                                Package Name
                                <dl class="font-normal lg:hidden">
                                    <dt class="sr-only">Package Name</dt>
                                    <dd class="mt-1 truncate text-gray-700">Wedding Planning Services</dd>
                                    <dt class="sr-only sm:hidden">{{ number_format(1000, 2) }}</dt>
                                    <dd class="mt-1 truncate text-gray-500 sm:hidden">YYYY-MM-DD</dd>
                                </dl>
                            </td>
                            <td class="hidden px-3 py-2 text-sm text-gray-500 lg:table-cell">Wedding Planning Services</td>
                            <td class="px-3 py-2 text-sm text-gray-500">50</td>
                            <td class="hidden px-3 py-2 text-sm text-gray-500 sm:table-cell">{{ number_format(1000, 2) }}</td>
                            <td class="px-3 py-2 text-sm text-gray-500">
                                <button>Edit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex items-center justify-between">
                <button class="border rounded-lg px-3 py-1" x-on:click="{{ $modal }} = false">
                    <div class="flex items-center gap-3">
                        <span>Close</span>
                    </div>
                </button>
            </div>
        </x-slot>
    </x-modals.center>
</div>