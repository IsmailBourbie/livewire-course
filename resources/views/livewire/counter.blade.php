<div class="bg-red-100 rounded min-h-screen flex items-center justify-center w-full">
    <div class="md:px-16 py-24 bg-white rounded-lg shadow-xl md:w-2/4">
        <h1 class="text-3xl font-bold mb-12 text-center">Simple Counter</h1>
        <ul class="px-8 flex space-x-8 items-center justify-center">
            <li>
                <button
                    wire:click.throttle.300ms="decrement"
                    class="border px-8 py-3 text-3xl font-bold bg-red-400 text-red-800 hover:bg-red-500 rounded">
                    -
                </button>
            </li>
            <li>
                <p class="text-4xl">{{$count}}</p>
            </li>
            <li>
                <button
                    wire:click.throttle.300ms="increment"
                    class="border px-8 py-3 text-3xl font-bold bg-green-400 text-green-800 hover:bg-green-500 rounded">
                    +
                </button>
            </li>
        </ul>
    </div>
</div>
