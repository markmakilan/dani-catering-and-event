<div>
    <div class="flex items-center justify-between mb-5">
        <h3 class="font-semibold text-xl">Transaction Records</h3>
        <button class="py-1.5" wire:click="refresh"
            x-on:click="toggleAddServiceModal">
            <x-icons.refresh class="w-6 h-6" stroke="#000" wire:target="refresh" wire:loading.class="animate-spin" />
        </button>
    </div>
    <div class="bg-white rounded-lg p-3">
        <div class="flex py-4 relative">
            <label for="search-field" class="sr-only">Search</label>
            <x-icons.search class="w-4 h-4 absolute top-6 left-3.5" />
            <input 
                id="search-field"
                class="block bg-white rounded-full h-full w-full border py-1.5 pl-10 pr-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                placeholder="Search here"
                wire:model.live="search">
        </div>
        
        <div class="w-full border-b mb-3">
            <label class="border rounded-t px-3 py-0.5">All Transaction</label>
        </div>
        <table class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                    <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Transaction ID</th>
                    <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Name</th>
                    <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Package Name</th>
                    <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Amount</th>
                    <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Date</th>
                    <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Remarks</th>
                    <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($transactions as $transaction)
                <tr>
                    <td class="px-3 py-2 text-sm text-gray-500">{{ $transaction->transactionNumber() }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">{{ $transaction->user->name }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">{{ $transaction->package->name }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">₱ {{ number_format($transaction->total_amount, 2) }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">{{ date('m/d/Y', strtotime($transaction->reservation->date_of_use)) }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500 capitalize">{{ $transaction->remarks }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">
                        <a href="/admin/transactions/manage/{{ $transaction->id }}">View</a>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>