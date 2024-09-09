<div class="bg-blue-100 rounded min-h-screen flex items-center justify-center">
    <div class="p-16 bg-white rounded-lg shadow-xl w-5/12">
        <h1 class="text-2xl mb-8 text-center font-bold">Update Your Profile..</h1>
        <form action="" method="post" class="space-y-6">
            <div>
                <label for="username" class="block text-sm font-medium mb-2">Username</label>
                <input type="text" id="username" name="title"
                       class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                       placeholder="Enter Username">
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
                ></textarea>
                @error('bio')
                <em class="py-1 px-2 text-sm text-red-400 font-bold">{{ $message }}</em>
                @enderror

            </div>
            <div class="w-full flex space-x-2">
                <button type="submit"
                        class="w-full py-2 px-6 text-center text-sm font-medium rounded-lg border border-transparent bg-teal-400 text-teal-800 hover:bg-teal-300 focus:outline-none focus:bg-teal-200 disabled:opacity-50 disabled:pointer-events-none">
                    Save
                </button>
                <button type="reset"
                        class="w-full py-2 px-6 text-center text-sm font-medium rounded-lg border border-transparent bg-red-300 text-red-800 hover:bg-red-200 focus:outline-none focus:bg-red-200 disabled:opacity-50 disabled:pointer-events-none">
                    Reset
                </button>
            </div>
        </form>
    </div>
</div>
