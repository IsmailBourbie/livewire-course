<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ $title ?? 'Page Title' }}</title>
</head>
<body>
<div class="min-h-screen flex">
    <nav class="w-2/12 bg-purple-100 px-4 py-8">
        <h2 class="text-3xl font-bold text-purple-600 mb-8">
            <a href="/">Livewire Course</a>
        </h2>
        <ul class="mt-10">
            <li>
            <h5 class="text-lg font-bold text-purple-700 mb-1">Getting Started</h5>
                <ul class="mx-2">
                    <li>
                        <a wire:navigate href="/counter"
                           class="{{request()->is('counter') ? "bg-purple-300 text-purple-700 font-bold" : "" }} text-blue-700 hover:bg-purple-300 inline-block w-full px-2 py-1 rounded">
                            Counter
                        </a>
                    </li>
                    <li>
                        <a wire:navigate href="/todo-list"
                           class="{{request()->is('todo-list') ? "bg-purple-300 text-purple-700 font-bold": "" }} text-blue-700 hover:bg-purple-300 inline-block w-full px-2 py-1 rounded ">
                            Todo-list
                        </a>
                    </li>
                    <li>
                        <a wire:navigate href="/show-posts"
                           class="{{request()->is('show-posts') ? "bg-purple-300 text-purple-700 font-bold": "" }} text-blue-700 hover:bg-purple-300 inline-block w-full px-2 py-1 rounded ">
                            Show Posts
                        </a>
                    </li>
                    <li>
                        <a wire:navigate href="/create-post"
                           class="{{request()->is('create-post') ? "bg-purple-300 text-purple-700 font-bold": "" }} text-blue-700 hover:bg-purple-300 inline-block w-full px-2 py-1 rounded ">
                            Create Post
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>
    <div class="flex-1">
        <div class="min-h-screen">
            {{ $slot }}
        </div>
    </div>
</div>

</body>
</html>
