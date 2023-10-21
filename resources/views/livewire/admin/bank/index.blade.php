<div x-data="bank">
    <div class="flex items-center justify-between mb-5">
        <h3 class="font-semibold text-xl">Account of Dani’s</h3>
        <button class="bg-black rounded-lg px-3 py-1.5"
            x-on:click="toggleAddBankModal">
            <div class="flex items-center gap-3">
                <x-icons.plus class="w-5 h-5" stroke="#FFF" />
                <span class="text-white">Add Account</span>
            </div>
        </button>
    </div>

    <div class="bg-white rounded-lg p-3">

        <table class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                    <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Name</th>
                    <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Account Name</th>
                    <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Account Number</th>
                    <th scope="col" class="py-3.5 bg-gray-200 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Status</th>
                    <th scope="col" class="px-3 py-3.5 bg-gray-200 text-left text-sm font-semibold text-gray-900">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($banks as $bank)
                <tr>
                    <td class="px-3 py-2 text-sm text-gray-500">{{ $bank->name }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">{{ $bank->account_name }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">{{ $bank->account_number }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">{{ $bank->status ? 'Active' : 'Inactive' }}</td>
                    <td class="px-3 py-2 text-sm text-gray-500">
                        <button wire:click="toggleEditBankModal({{ $bank->id }})">Edit</button>
                    </td>
                </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('admin.bank.modals.add-bank', ['modal' => 'add_bank_modal'])
    @livewire('admin.bank.modals.edit-bank', ['modal' => 'edit_bank_modal'])

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('bank', () => ({
                add_bank_modal: false,
                edit_bank_modal: @entangle('edit_bank_modal'),
     
                toggleAddBankModal() {
                    this.add_bank_modal = ! this.add_bank_modal
                },
            }))
        })
    </script>
</div>