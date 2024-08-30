<div>
    <ul class="flex space-x-4 items-center">
        <li class="px-4 py-2">
            <button
                wire:click.throttle.300ms="decrement"
                class="border px-8 py-3 text-3xl font-bold bg-red-400 text-red-800 hover:bg-red-500 rounded">
                -
            </button>
        </li>
        <li class="px-4 py-2">
            <p class="text-4xl">{{$count}}</p>
        </li>
        <li class="px-4 py-2">
            <button
                wire:click.throttle.300ms="increment"
                class="border px-8 py-3 text-3xl font-bold bg-green-400 text-green-800 hover:bg-green-500 rounded">
                +
            </button>
        </li>
    </ul>
</div>
