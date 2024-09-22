<div x-data="{ menuOpen: false }" x-modelable="menuOpen" {{ $attributes }}>
    <div x-menu x-model="menuOpen" class="relative flex items-center">
        {{ $slot }}
    </div>
</div>
