<div class="bg-gray-100 rounded min-h-screen flex items-center justify-center">
    <div class="p-12 bg-white rounded-lg shadow-xl w-4/12">
        <h1 class="text-3xl mb-8 text-center font-bold">Login</h1>
        <form action="" method="post" class="space-y-6" wire:submit.prevent="submit()">
            <div>
                <label for="username" class="block text-sm font-medium mb-2">Username</label>
                <input type="text" id="username" name="username"
                       class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                       placeholder="Enter Username"
                       wire:model="username">
                @error('username')
                <em class="py-1 px-2 text-sm text-red-400 font-bold">{{ $message }}</em>
                @enderror
            </div>
            <div>
                <label for="password" class="block text-sm font-medium mb-2">Password</label>
                <input type="password" id="password" name="password"
                       class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                       placeholder="Enter Password"
                       wire:model="password">
                @error('password')
                <em class="py-1 px-2 text-sm text-red-400 font-bold">{{ $message }}</em>
                @enderror
            </div>
            <div>
                <button type="submit"
                        class="py-2 px-6 text-lg font-medium rounded-lg border w-full bg-indigo-500 border border-indigo-700 text-indigo-100 focus:outline-none">
                    Login
                </button>
                <p class="text-center mt-6 tracking-wide font-medium">Not a member? <a href="#" class="text-blue-500">Register now</a></p>
            </div>
        </form>
    </div>
</div>
