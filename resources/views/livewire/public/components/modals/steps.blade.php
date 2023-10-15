<div x-show="{{ $modal_id }}" style="display: none;">
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black bg-opacity-80 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-6xl">
                    @if($package)
                    <div x-show="step == 'confirmation'">
                        <div class="bg-white p-4 sm:p-6 sm:pb-4">
                            <div class="space-3 border border-black rounded-lg overflow-hidden">
                                <div class="relative isolate flex flex-col justify-end overflow-hidden bg-gray-900 h-56">
                                    <img src="{{ asset('assets/img/package-1.png') }}" class="absolute inset-0 -z-10 h-auto w-full">
                                </div>
                                <div class="p-3">
                                    <h3 class="text-xl font-semibold uppercase">{{ $package['name'] }}</h3>
                                    <div>
                                        {{ $package['inclusions'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <div class="flex items-center justify-end gap-3">
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'addons'">
                                        <span class="text-white">Select</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="step == 'addons'">
                        <div class="bg-white p-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="space-3 border border-black rounded-lg overflow-hidden p-3">
                                <h3 class="text-xl font-bold text-center mb-10">Our Services</h3>
                    
                                <ul class="flex border rounded-md divide-x py-3">
                                    @forelse ($addons as $type => $addon)
                                    <li class="p-3">
                                        <span class="text-lg font-semibold capitalize">{{ $type }}</span>
                                        <ul class="space-y-2">
                                            @foreach ($addon as $key => $item)
                                            <li class="flex items-center gap-2">
                                                <div class="flex items-center">
                                                    <button class="border border-black rounded-l px-3 py-2" wire:click="decrement('addons', '{{ $type }}.{{ $key }}.quantity')">
                                                        <x-icons.minus class="w-5 h-5" />
                                                    </button>
                                                    <input type="text" class="w-16 border border-black px-3 py-2 text-sm text-center" min="0" disabled wire:model.live="addons.{{ $type }}.{{ $key }}.quantity">
                                                    <button class="border border-black rounded-r px-3 py-2" wire:click="increment('addons', '{{ $type }}.{{ $key }}.quantity')">
                                                        <x-icons.plus class="w-5 h-5" />
                                                    </button>
                                                </div>
                                                <span class="text-lg">{{ $item['name'] }}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <div class="flex items-center gap-2">
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'confirmation'">
                                        <span class="text-white">Back</span>
                                    </button>
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'summary'">
                                        <span class="text-white">Select</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="step == 'customize'">
                        <div class="bg-white p-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="space-3 border border-black rounded-lg overflow-hidden p-3">
                                <h3 class="text-xl font-bold text-center mb-10">Our Services</h3>
                                <span class="text-lg font-semibold">Customization</span>
                                <ul class="flex border rounded-md divide-x py-3">
                                    @forelse ($customize as $type => $custom)
                                    <li class="p-3">
                                        <span class="text-lg font-semibold capitalize">{{ $type }}</span>
                                        <ul class="space-y-2">
                                            @foreach ($custom as $key => $item)
                                            <li class="flex items-center gap-2">
                                                <div class="flex items-center">
                                                    <button class="border border-black rounded-l px-3 py-2" wire:click="decrement('customize', '{{ $type }}.{{ $key }}.quantity')">
                                                        <x-icons.minus class="w-5 h-5" />
                                                    </button>
                                                    <input type="text" class="w-16 border border-black px-3 py-2 text-sm text-center" disabled wire:model.live="customize.{{ $type }}.{{ $key }}.quantity">
                                                    <button class="border border-black rounded-r px-3 py-2" wire:click="increment('customize', '{{ $type }}.{{ $key }}.quantity')">
                                                        <x-icons.plus class="w-5 h-5" />
                                                    </button>
                                                </div>
                                                <span class="text-lg">{{ $item['name'] }}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <div class="flex items-center gap-2">
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'confirmation'">
                                        <span class="text-white">Back</span>
                                    </button>
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'summary'">
                                        <span class="text-white">Select</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div x-show="step == 'summary'">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="space-y-3 border border-black rounded-lg overflow-hidden p-3">
                                <h3 class="text-xl font-bold text-center mb-10">Creating Package</h3>
                                <p class="text-lg font-semibold">{{ $package['name'] }}</p>
                                <div class="border border-gray-300 rounded-md overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <th colspan="5" class="px-3 py-1.5 bg-black text-sm font-semibold text-gray-900 text-center">
                                                    <span class="font-semibold text-white">Add ons</span>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="col"
                                                    class="py-1.5 bg-gray-300 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Name
                                                </th>
                                                <th scope="col" class="px-3 py-1.5 bg-gray-300 text-left text-sm font-semibold text-gray-900">Type</th>
                                                <th scope="col" class="px-3 py-1.5 bg-gray-300 text-left text-sm font-semibold text-gray-900">Quantity</th>
                                                <th scope="col" class="px-3 py-1.5 bg-gray-300 text-left text-sm font-semibold text-gray-900">Price</th>
                                                <th scope="col" class="relative whitespace-nowrap py-1.5 bg-gray-300 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            @forelse ($addons as $type => $addon)
                                                @foreach ($addon as $item)
                                                    @if ($item['quantity'] > 0)
                                                    <tr>
                                                        <td class="whitespace-nowrap py-1.5 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8 capitalize">{{ $item['name'] }}</td>
                                                        <td class="whitespace-nowrap px-3 py-1.5 text-sm text-gray-500 capitalize">{{ $type }}</td>
                                                        <td class="whitespace-nowrap px-3 py-1.5 text-sm text-gray-500">{{ $item['quantity'] }}</td>
                                                        <td class="whitespace-nowrap px-3 py-1.5 text-sm text-gray-500">₱ {{ number_format($item['price'], 2) }}</td>
                                                        <td class="relative whitespace-nowrap py-1.5 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">₱ {{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="border rounded-md p-3">
                                    <p class="text-lg font-semibold">{{ $package['name'] }} = <span>{{ number_format($package['price'], 2) }}</span></p>
                                    <p class="text-lg font-semibold">Addons = <span>₱ {{ number_format(collect(data_get($addons, '*.*'))->sum('amount'), 2) }}</span></p>
                                </div>
                                <div class="border rounded-md p-3 text-right">
                                    <p class="text-lg font-semibold">Total = <span>₱ {{ number_format($package['price'] + collect(data_get($addons, '*.*'))->sum('amount'), 2) }}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'reservation'">
                                    <span class="text-white">Reservation Form</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div x-show="step == 'reservation'">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="space-y-3 border border-black rounded-lg overflow-hidden p-3">
                                <h3 class="text-xl font-bold text-center mb-10">Reservation Form</h3>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Name:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none" wire:model.live="reservation.name">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Contact Info:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none" wire:model.live="reservation.contact">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Date of Use:</span>
                                    <input type="date" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none" wire:model.live="reservation.date_of_use">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Location (Venue):</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none" wire:model.live="reservation.location">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Email:</span>
                                    <input type="email" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none" wire:model="reservation.email">
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <div class="flex items-center gap-2">
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'summary'">
                                        <span class="text-white">Back</span>
                                    </button>
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'dp'">
                                        <span class="text-white">Confirm</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="step == 'dp'">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="space-y-3 border border-black rounded-lg overflow-hidden p-3">
                                <h3 class="text-xl font-bold text-center mb-10">Down Payment Form</h3>
                                <p class="text-lg font-semibold">Account of Dani’s</p>
                                <ul>
                                    <li>
                                        <p>Wallet: <span class="font-medium">Paymaya</span></p>
                                        <p>Name: <span class="font-medium">Dani’s Catering and Events</span></p>
                                        <p>Account No. <span class="font-medium">09xxxxxxxxx</span></p>
                                    </li>
                                </ul>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Name:</span>
                                    <div class="relative">
                                        <input type="text" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none" wire:model="payment.name">
                                    </div>
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Amount:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none" wire:model.live="payment.amount">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Reference No.:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none" wire:model="payment.ref_no">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Receipt:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Email:</span>
                                    <input type="email" class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none" wire:model="payment.email">
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <div class="flex items-center gap-2">
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'reservation'">
                                        <span class="text-white">Back</span>
                                    </button>
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'confirm'">
                                        <span class="text-white">Confirm</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="step == 'confirm'">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="space-y-3 border border-black rounded-lg overflow-hidden p-3">
                                <h3 class="text-xl font-bold text-center mb-10">Confirm Reservation</h3>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Name:</span>
                                    <span class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $reservation['name'] ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Contact Info:</span>
                                    <span class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $reservation['contact'] ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Date of Use:</span>
                                    <span class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $reservation['date_of_use'] ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Location (Venue):</span>
                                    <span class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $reservation['location'] ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Down Payment:</span>
                                    <span class="flex-1 bg-transparent rounded-r-md px-3 py-1 border-none">{{ $payment['amount'] ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <div class="flex items-center gap-2">
                                    <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'dp'">
                                        <span class="text-white">Back</span>
                                    </button>
                                    <button class="bg-black rounded-md px-3 py-1" wire:click="test">
                                        <span class="text-white">Confirm</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
