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
    <nav class="w-2/12 bg-purple-100 px-4 py-8 flex flex-col justify-between">
        <div>
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
        </div>
        <footer class="flex space-x-2">
            @auth
                <form action="{{route('logout')}}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="text-lg px-4 py-2 bg-red-500 border border-red-600 text-red-100 w-full rounded text-center">Logout</button>
                </form>
            @endauth
            @guest
                <a wire:navigate href="/login"
                   class="text-lg px-4 py-2 bg-indigo-500 border  border-indigo-700 text-indigo-100 inline-block w-1/2 rounded text-center">Login</a>
                <a href="#"
                   class="text-lg px-4 py-2 bg-gray-200  border border-gray-300 text-gray-800 inline-block  w-1/2 rounded text-center">Sing
                    up</a>
            @endguest

        </footer>
    </nav>
    <div class="flex-1">
        <div class="min-h-screen">
            {{ $slot }}
        </div>
    </div>
</div>
</body>
</html>
