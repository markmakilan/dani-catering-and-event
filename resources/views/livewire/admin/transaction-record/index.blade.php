<div>
    <div class="bg-white rounded-lg p-3">
        <h3 class="font-semibold mb-5">Transaction Records</h3>
        <div class="w-full border-b-2 mb-3">
            <label class="border rounded-t px-3 py-0.5">All Transaction</label>
        </div>
        <table class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                    <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Transaction ID</th>
                    <th scope="col"
                        class="hidden px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900 lg:table-cell">Name
                    </th>
                    <th scope="col"
                        class="hidden px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900 sm:table-cell">Amount
                    </th>
                    <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Date</th>
                    <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                <tr>
                    <td
                        class="w-full max-w-0 py-2 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none">
                        TRN00000001
                        <dl class="font-normal lg:hidden">
                            <dt class="sr-only">TRN00000001</dt>
                            <dd class="mt-1 truncate text-gray-700">Juan Dela Cruz</dd>
                            <dt class="sr-only sm:hidden">{{ number_format(1000, 2) }}</dt>
                            <dd class="mt-1 truncate text-gray-500 sm:hidden">YYYY-MM-DD</dd>
                        </dl>
                    </td>
                    <td class="hidden px-3 py-2 text-sm text-gray-500 lg:table-cell">Juan Dela Cruz</td>
                    <td class="hidden px-3 py-2 text-sm text-gray-500 sm:table-cell">{{ number_format(1000, 2) }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">YYYY-MM-DD</td>
                    <td class="px-3 py-2 text-sm text-gray-500">
                        <button>View</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>