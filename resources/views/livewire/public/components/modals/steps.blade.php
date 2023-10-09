<div x-show="{{ $modal_id }}" style="display: none;">
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-black bg-opacity-80 transition-opacity"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-6xl">
                    <div x-show="step == 'confirmation'">
                        <div class="bg-white p-4 sm:p-6 sm:pb-4">
                            <div class="space-3 border border-black rounded-lg overflow-hidden">
                                <div class="relative isolate flex flex-col justify-end overflow-hidden bg-gray-900 h-56">
                                    <img src="{{ asset('assets/img/package-1.png') }}" class="absolute inset-0 -z-10 h-auto w-full">
                                </div>
                                <div class="p-3">
                                    <h3 class="text-xl font-semibold uppercase">Package Name</h3>
                                    <ul class="space-y-3">
                                        <li>
                                            <p class="text-lg font-semibold">Catering</p>
                                            <ul>
                                                <li>25 chairs</li>
                                                <li>10 tables</li>
                                            </ul>
                                        </li>
                                        <li>
                                            <p class="text-lg font-semibold">Food</p>
                                            <ul>
                                                <li>15 different menu’s</li>
                                                <li>30 dessert</li>
                                            </ul>
                                        </li>
                                    </ul>
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
                                    <li class="p-3">
                                        <span class="text-lg font-semibold">Flower</span>
                                        <ul class="space-y-2">
                                            <li class="flex items-center gap-2">
                                                <div class="flex items-center" x-data="{ count: 0 }">
                                                    <button class="border border-black rounded-l px-3 py-2" x-on:click="count--">
                                                        <x-icons.minus class="w-5 h-5" />
                                                    </button>
                                                    <input type="text" class="w-16 border border-black px-3 py-2 text-sm text-center"
                                                        x-model="count">
                                                    <button class="border border-black rounded-r px-3 py-2" x-on:click="count++">
                                                        <x-icons.plus class="w-5 h-5" />
                                                    </button>
                                                </div>
                                                <span class="text-lg">Bouquet</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="p-3">
                                        <span class="text-lg font-semibold">Chair</span>
                                        <ul class="space-y-2">
                                            <li class="flex items-center gap-2">
                                                <div class="flex items-center" x-data="{ count: 0 }">
                                                    <button class="border border-black rounded-l px-3 py-2" x-on:click="count--">
                                                        <x-icons.minus class="w-5 h-5" />
                                                    </button>
                                                    <input type="text" class="w-16 border border-black px-3 py-2 text-sm text-center"
                                                        x-model="count">
                                                    <button class="border border-black rounded-r px-3 py-2" x-on:click="count++">
                                                        <x-icons.plus class="w-5 h-5" />
                                                    </button>
                                                </div>
                                                <span class="text-lg">Monoblock</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="p-3">
                                        <span class="text-lg font-semibold">Table</span>
                                        <ul class="space-y-2">
                                            <li class="flex items-center gap-2">
                                                <div class="flex items-center" x-data="{ count: 0 }">
                                                    <button class="border border-black rounded-l px-3 py-2" x-on:click="count--">
                                                        <x-icons.minus class="w-5 h-5" />
                                                    </button>
                                                    <input type="text" class="w-16 border border-black px-3 py-2 text-sm text-center"
                                                        x-model="count">
                                                    <button class="border border-black rounded-r px-3 py-2" x-on:click="count++">
                                                        <x-icons.plus class="w-5 h-5" />
                                                    </button>
                                                </div>
                                                <span class="text-lg">Round</span>
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <div class="flex items-center" x-data="{ count: 0 }">
                                                    <button class="border border-black rounded-l px-3 py-2" x-on:click="count--">
                                                        <x-icons.minus class="w-5 h-5" />
                                                    </button>
                                                    <input type="text" class="w-16 border border-black px-3 py-2 text-sm text-center"
                                                        x-model="count">
                                                    <button class="border border-black rounded-r px-3 py-2" x-on:click="count++">
                                                        <x-icons.plus class="w-5 h-5" />
                                                    </button>
                                                </div>
                                                <span class="text-lg">Circle</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'summary'">
                                    <span class="text-white">Select</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div x-show="step == 'customize'">
                        <div class="bg-white p-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="space-3 border border-black rounded-lg overflow-hidden p-3">
                                <h3 class="text-xl font-bold text-center mb-10">Our Services</h3>
                                <span class="text-lg font-semibold">Customization</span>
                                <ul class="flex border rounded-md py-3 divide-x">
                                    <li class="p-3">
                                        <ul class="space-y-2">
                                            <li class="flex items-center gap-2">
                                                <div class="flex items-center" x-data="{ count: 0 }">
                                                    <button class="border border-black rounded-l px-3 py-2" x-on:click="count--">
                                                        <x-icons.minus class="w-5 h-5" />
                                                    </button>
                                                    <input type="text" class="w-16 border border-black px-3 py-2 text-sm text-center"
                                                        x-model="count">
                                                    <button class="border border-black rounded-r px-3 py-2" x-on:click="count++">
                                                        <x-icons.plus class="w-5 h-5" />
                                                    </button>
                                                </div>
                                                <span class="text-lg font-semibold">Flower</span>
                                            </li>
                                            <li>
                                                <select class="w-full border rounded-md px-3 py-2">
                                                    <option value="rose">Rose</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="p-3">
                                        <ul class="space-y-2">
                                            <li class="flex items-center gap-2">
                                                <div class="flex items-center" x-data="{ count: 0 }">
                                                    <button class="border border-black rounded-l px-3 py-2" x-on:click="count--">
                                                        <x-icons.minus class="w-5 h-5" />
                                                    </button>
                                                    <input type="text" class="w-16 border border-black px-3 py-2 text-sm text-center"
                                                        x-model="count">
                                                    <button class="border border-black rounded-r px-3 py-2" x-on:click="count++">
                                                        <x-icons.plus class="w-5 h-5" />
                                                    </button>
                                                </div>
                                                <span class="text-lg font-semibold">Chair</span>
                                            </li>
                                            <li>
                                                <select class="w-full border rounded-md px-3 py-2">
                                                    <option value="rose">Rose</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="p-3">
                                        <ul class="space-y-2">
                                            <li class="flex items-center gap-2">
                                                <div class="flex items-center" x-data="{ count: 0 }">
                                                    <button class="border border-black rounded-l px-3 py-2" x-on:click="count--">
                                                        <x-icons.minus class="w-5 h-5" />
                                                    </button>
                                                    <input type="text" class="w-16 border border-black px-3 py-2 text-sm text-center"
                                                        x-model="count">
                                                    <button class="border border-black rounded-r px-3 py-2" x-on:click="count++">
                                                        <x-icons.plus class="w-5 h-5" />
                                                    </button>
                                                </div>
                                                <span class="text-lg font-semibold">Table</span>
                                            </li>
                                            <li>
                                                <select class="w-full border rounded-md px-3 py-2">
                                                    <option value="rose">Rose</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'summary'">
                                    <span class="text-white">Select</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div x-show="step == 'summary'">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="space-y-3 border border-black rounded-lg overflow-hidden p-3">
                                <h3 class="text-xl font-bold text-center mb-10">Creating Package</h3>
                                <p class="text-lg font-semibold">Package Name</p>
                                <div class="border border-gray-300 rounded-md overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <th colspan="4" class="px-3 py-1.5 bg-black text-sm font-semibold text-gray-900 text-center">
                                                    <span class="font-semibold text-white">Add ons</span>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="col"
                                                    class="py-1.5 bg-gray-300 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Type
                                                </th>
                                                <th scope="col" class="px-3 py-1.5 bg-gray-300 text-left text-sm font-semibold text-gray-900">Quantity</th>
                                                <th scope="col" class="px-3 py-1.5 bg-gray-300 text-left text-sm font-semibold text-gray-900">Price</th>
                                                <th scope="col" class="relative whitespace-nowrap py-1.5 bg-gray-300 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td class="whitespace-nowrap py-1.5 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Chairs</td>
                                                <td class="whitespace-nowrap px-3 py-1.5 text-sm text-gray-500">qty</td>
                                                <td class="whitespace-nowrap px-3 py-1.5 text-sm text-gray-500">price</td>
                                                <td class="relative whitespace-nowrap py-1.5 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">total</td>
                                            </tr>
                                            <tr>
                                                <td class="whitespace-nowrap py-1.5 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">Table</td>
                                                <td class="whitespace-nowrap px-3 py-1.5 text-sm text-gray-500">qty</td>
                                                <td class="whitespace-nowrap px-3 py-1.5 text-sm text-gray-500">price</td>
                                                <td class="relative whitespace-nowrap py-1.5 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">total</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="border rounded-md p-3">
                                    <p class="text-lg font-semibold">Package Name = <span>{{ number_format(149000, 2) }}</span></p>
                                    <p class="text-lg font-semibold">Add ons = <span>{{ number_format(700, 2) }}</span></p>
                                </div>
                                <div class="border rounded-md p-3 text-right">
                                    <p class="text-lg font-semibold">Total = <span>{{ number_format(149000 + 700, 2) }}</span></p>
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
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Contact Info:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Date of Use:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Location (Venue):</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Email:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'dp'">
                                    <span class="text-white">Confirm</span>
                                </button>
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
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Amount:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Reference No.:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Receipt:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Email:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="step = 'confirm'">
                                    <span class="text-white">Confirm</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div x-show="step == 'confirm'">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="space-y-3 border border-black rounded-lg overflow-hidden p-3">
                                <h3 class="text-xl font-bold text-center mb-10">Confirm Reservation</h3>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Name:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Contact Info:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Date of Use:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Location (Venue):</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                                <div class="flex items-center bg-yellow-300 rounded-md">
                                    <span class="w-1/5 ml-3">Down Payment:</span>
                                    <input type="text" class="flex-1 bg-transparent rounded-md px-3 py-1">
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6">
                            <div class="flex items-center justify-between gap-3">
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="location.reload()">
                                    <span class="text-white">Cancel</span>
                                </button>
                                <button class="bg-black rounded-md px-3 py-1" x-on:click="{{ $modal_id }} = false">
                                    <span class="text-white">Confirm</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
