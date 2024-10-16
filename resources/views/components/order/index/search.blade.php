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

