@props(['column', 'sortColumn', 'sortAsc'])
<button wire:click="setSortKey('{{ $column }}')" {{ $attributes->merge(['class' => 'flex items-center gap-2 group']) }}>
    {{$slot}}
    @if ($sortColumn === $column)
        <div class="text-gray-400">
            @if ($sortAsc)
                <x-icons.arrow-long-up/>
            @else
                <x-icons.arrow-long-down/>
            @endif
        </div>
    @else
        <div class="text-gray-400 opacity-0 group-hover:opacity-100">
            <x-icons.arrows-up-down/>
        </div>
    @endif
</button>
