<div class="bg-emerald-50 rounded min-h-screen flex justify-center px-2 py-8">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto space-y-4 bg-white p-8">
            {{-- Search Input --}}
            <div class="flex justify-between items-center">
                <div class="relative w-1/2 mt-2 rounded-md">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <x-icons.magnifying-glass/>
                    </div>
                    <input type="text" name="search" id="search"
                           class="block w-full rounded-md border-0 py-1.5 pl-10 pr-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           placeholder="Search email or order #"
                           wire:model.live.debounce.500ms="query"
                    >
                </div>


                <div class="flex space-x-2">
                    <x-order.index.bulk-actions />
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
                            <th></th>
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
                                        <input wire:model="selectedOrdersIds" value="{{$order->id}}" type="checkbox" class="rounded border-gray-300 shadow">
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
                                    <x-menu>
                                        <x-menu.button class="rounded hover:bg-slate-100">
                                            <x-icons.ellipsis-horizontal/>
                                        </x-menu.button>
                                        <x-menu.items>
                                            <x-menu.close>
                                                <x-menu.item wire:confirm="Are you sure you want to refund this?"
                                                             wire:click="refund({{$order->id}})">
                                                    <x-icons.arrow-uturn-left/>
                                                    Refund
                                                </x-menu.item>
                                            </x-menu.close>
                                            <x-menu.close>
                                                <x-menu.item wire:confirm="Are you sure you want to archive this?"
                                                             wire:click="archive({{$order->id}})">
                                                    <x-icons.archive-box/>
                                                    Archive
                                                </x-menu.item>
                                            </x-menu.close>
                                        </x-menu.items>
                                    </x-menu>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="absolute inset-0 bg-white opacity-80" wire:loading wire:target.except="export"></div>
                    <div class="flex items-center justify-center absolute inset-0" wire:loading.flex wire:target.except="export">
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
    </div>
</div>
