<div class="bg-emerald-50 rounded min-h-screen flex justify-center px-2 py-8">
    <div class="flex flex-col">
        <div class="overflow-x-auto space-y-4 bg-white p-8">

            {{-- Filters --}}
            <div class="flex justify-between items-center">
                <div class="flex flex-col gap-1">
                    <h1 class="font-semibold text-3xl text-gray-800">Orders</h1>

                    <p class="text-sm text-gray-500">{{$store->name}}</p>
                </div>

                <x-order.index.filter-products :filters="$filters"/>

            </div>

            {{-- Filters --}}

            <livewire:order.index.chart :store="$store" :filters="$filters" lazy/>

            <livewire:order.index.table :store="$store" :filters="$filters" lazy/>
        </div>
    </div>
</div>
