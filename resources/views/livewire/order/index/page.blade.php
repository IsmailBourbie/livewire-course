<div class="bg-emerald-50 rounded min-h-screen flex justify-center px-2 py-8">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto bg-white p-8">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-start font-bold text-gray-500">
                                Order #
                            </th>
                            <th scope="col" class="px-6 py-3 text-start font-bold text-gray-500">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-start font-bold text-gray-500">
                                Customer
                            </th>
                            <th scope="col" class="px-6 py-3 text-start font-bold text-gray-500">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-start font-bold text-gray-500">
                                Amount
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        @foreach($orders as $order)
                            <tr wire:key="{{$order->id}}">
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
                                <td class="px-6 py-4 whitespace-nowrap text-gray-800 font-medium">{{$order->amountForHumans()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="pt-4 flex items-center justify-between">
                        <div class="text-slate-600 text-sm">
                            Results: {{Number::format($orders->total())}}
                        </div>
                        {{$orders->links('livewire.order.index.pagination')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
