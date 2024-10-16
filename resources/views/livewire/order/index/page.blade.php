<div class="bg-emerald-50 rounded min-h-screen flex justify-center px-2 py-8">
    <div class="flex flex-col">
        <div class="overflow-x-auto space-y-4 bg-white p-8">
            <livewire:order.index.chart :store="$store"/>

            <livewire:order.index.table :store="$store" lazy="lazy"/>
        </div>
    </div>
</div>
