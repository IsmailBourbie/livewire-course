<div class="-m-1.5 overflow-x-auto space-y-4 bg-white p-8">
    {{-- Search Input --}}
    <div class="flex justify-between items-center">
        <x-order.index.search/>
        <div class="flex space-x-2">
            <x-order.index.bulk-actions/>
            <form wire:submit="export">
                <button type="submit"
                        class="flex items-center gap-2 rounded-lg border px-3 py-1.5 bg-white font-medium text-sm text-gray-700 hover:bg-gray-200">
                    <div class="mr-1">
                        <x-icons.arrow-down-tray wire:loading.remove wire:target="export"/>
                        <x-icons.spinner wire:loading wire:target="export"/>
                    </div>
                    Export
                </button>
            </form>
        </div>
    </div>
    {{-- Search Input --}}

    {{-- Orders Table --}}
    <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="relative overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th class="whitespace-nowrap p-3 text-sm">
                        <div class="flex items-center">
                            <x-order.index.check-all/>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-start font-bold text-gray-500">
                        <x-order.index.sortable column="number" :sort-column="$sortColumn" :sort-asc="$sortAsc">
                            <div>Order #</div>
                        </x-order.index.sortable>
                    </th>
                    <th scope="col" class="px-6 py-3 text-start font-bold text-gray-500">
                        <x-order.index.sortable column="status" :sort-column="$sortColumn" :sort-asc="$sortAsc">
                            <div>Status</div>
                        </x-order.index.sortable>
                    </th>
                    <th scope="col" class="px-6 py-3 text-start font-bold text-gray-500">
                        Customer
                    </th>
                    <th scope="col" class="px-6 py-3 text-start font-bold text-gray-500">
                        <x-order.index.sortable column="date" :sort-column="$sortColumn" :sort-asc="$sortAsc">
                            <div>Date</div>
                        </x-order.index.sortable>
                    </th>
                    <th scope="col" class="px-6 py-3 text-end font-bold text-gray-500">
                        <x-order.index.sortable class="flex-row-reverse" column="amount"
                                                :sort-column="$sortColumn" :sort-asc="$sortAsc">
                            <div>Amount</div>
                        </x-order.index.sortable>
                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($orders as $order)
                    <tr wire:key="{{$order->id}}">
                        <td class="whitespace-nowrap p-3 text-sm">
                            <div class="flex items-center">
                                <input wire:model="selectedOrdersIds" value="{{$order->id}}" type="checkbox"
                                       class="rounded border-gray-300 shadow">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-800 font-medium"><span
                                class="text-slate-300">#</span> {{$order->number}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-800">
                            <div
                                class="px-2 py-px text-sm bg-{{$order->status->color()}}-100 text-{{$order->status->color()}}-500 font-medium rounded-full space-x-1 inline-flex items-center">
                                <div>{{$order->status->label()}}</div>
                                <x-dynamic-component :component="$order->status->icon()"/>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-800">
                            <div class="flex items-center space-x-1">
                                <img src="{{$order->avatar}}" alt="avatar" class="size-6 rounded-full">
                                <span>{{$order->email}}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{$order->dateForHumans()}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-gray-800 font-medium">{{$order->amountForHumans()}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-order.index.row-dropdown :order="$order"/>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="absolute inset-0 bg-white opacity-80" wire:loading wire:target.except="export"></div>
            <div class="flex items-center justify-center absolute inset-0" wire:loading.flex
                 wire:target.except="export">
                <x-icons.spinner size="10"/>
            </div>
        </div>
        <div class="pt-4 flex items-center justify-between">
            <div class="text-slate-600 text-sm">
                Results: {{Number::format($orders->total())}}
            </div>
            {{$orders->links('livewire.order.index.pagination')}}
        </div>
    </div>
    {{-- Orders Table --}}
</div>
