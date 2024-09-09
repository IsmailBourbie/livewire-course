<div class="bg-blue-100 rounded min-h-screen flex items-center justify-center flex-col">
    <div class="w-5/12 relative">
        <p
            x-cloak
            x-show="$wire.showSuccessIndicator"
            x-transition.out.opacity.duration.1000ms
            x-effect="if($wire.showSuccessIndicator) setTimeout(() => $wire.showSuccessIndicator = false, 3000)"
            class="absolute w-full text-center p-4 border-2 border-green-500 bg-green-200 text-green-600 font-medium -top-24 rounded-lg">
            Profile updated successfully.
        </p>
        <div class="p-16 bg-white rounded-lg shadow-xl">
            <h1 class="text-2xl mb-8 text-center font-bold">Update Your Profile..</h1>
            <form action="" method="post" class="space-y-6" wire:submit.prevent="update">
                <div>
                    <label for="username" class="block text-sm font-medium mb-2">Username</label>
                    <input type="text" id="username" name="title"
                           class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                           placeholder="Enter Username"
                           wire:model="username"
                    >
                    @error('username')
                    <em class="py-1 px-2 text-sm text-red-400 font-bold">{{ $message }}</em>
                    @enderror
                </div>
                <div>
                    <label for="bio" class="block text-sm font-medium mb-2">Bio</label>
                    <textarea id="bio"
                              class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                              name="Bio"
                              maxlength="100"
                              rows="4" placeholder="A little bit about yourself..."
                              wire:model="bio"
                    ></textarea>
                    @error('bio')
                    <em class="py-1 px-2 text-sm text-red-400 font-bold">{{ $message }}</em>
                    @enderror

                </div>
                <div class="w-full flex space-x-2">
                    <button type="submit"
                            class="relative w-full py-2 px-6 text-center text-sm font-medium rounded-lg border border-transparent bg-blue-400 text-blue-800 hover:bg-blue-300 focus:outline-none disabled:opacity-75 disabled:cursor-not-allowed">
                        Update
                        <div wire:loading.flex class="flex items-center absolute top-0 right-0 bottom-0">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </button>
                    <button type="reset"
                            class="w-full py-2 px-6 text-center text-sm font-medium rounded-lg border border-transparent bg-red-300 text-red-800 hover:bg-red-200 focus:outline-none focus:bg-red-200 disabled:opacity-50 disabled:pointer-events-none">
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
