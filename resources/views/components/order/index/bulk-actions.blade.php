<div class="flex gap-2" x-cloak x-show="$wire.selectedOrdersIds.length > 0">
    <div class="flex items-center gap-1 text-sm text-gray-600">
        <span x-text="$wire.selectedOrdersIds.length"></span>

        <span>selected</span>
    </div>

    <div class="flex items-center px-3">
        <div class="h-[75%] w-[1px] bg-gray-300"></div>
    </div>

    <form wire:submit="archiveSelected">
        <button type="submit"
                class="flex items-center gap-2 rounded-lg border px-3 py-1.5 bg-white font-medium text-sm text-gray-700 hover:bg-gray-200 disabled:cursor-not-allowed disabled:opacity-75">
            <x-icons.archive-box wire:loading.remove wire:target="archiveSelected"/>

            <x-icons.spinner wire:loading wire:target="archiveSelected" class="text-gray-700"/>

            Archive
        </button>
    </form>

    <form wire:submit="refundSelected">
        <button type="submit"
                class="flex items-center gap-2 rounded-lg border border-blue-600 px-3 py-1.5 bg-blue-500 font-medium text-sm text-white hover:bg-blue-600 disabled:cursor-not-allowed disabled:opacity-75">
            <x-icons.receipt-refund wire:loading.remove wire:target="refundSelected"/>

            <x-icons.spinner wire:loading wire:target="refundSelected" class="text-white"/>

            Refund
        </button>
    </form>
</div>
