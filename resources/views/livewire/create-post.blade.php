<div class="bg-blue-100 rounded min-h-screen flex items-center justify-center p-4 {{$classes}}">
    <div class="p-16 bg-white rounded-lg shadow-xl w-10/12">
        <h1 class="text-2xl mb-8 text-center font-bold">New Post</h1>
        <form action="" method="post" class="space-y-6" wire:submit.prevent="save()">
            <div>
                <label for="input-label" class="block text-sm font-medium mb-2">Title</label>
                <input autofocus type="text" id="input-label" name="form.title"
                       class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 read-only:opacity-50 read-only:cursor-not-allowed"
                       placeholder="Enter Title"
                       wire:model="form.title">
                @error('form.title')
                <em class="py-1 px-2 text-sm text-red-400 font-bold">{{ $message }}</em>
                @enderror
            </div>
            <div>
                <label for="textarea-label" class="block text-sm font-medium mb-2">Content</label>
                <textarea id="textarea-label"
                          class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 read-only:opacity-50 read-only:cursor-not-allowed"
                          name="content"
                          maxlength="100"
                          rows="3" placeholder="Say hi..."
                          wire:model="form.content"></textarea>
                <div class="flex">
                    @error('form.content')
                    <em class="py-1 px-2 text-sm text-red-400 font-bold">{{ $message }}</em>
                    @enderror
                    <small class="ml-auto text-gray-600 py-1 px-2">Characters: <span
                            x-text="$wire.content.length"></span>/100</small>
                </div>

            </div>
            <div>
                <button type="submit"
                        class="py-2 px-6 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-100 text-teal-800 hover:bg-teal-200 focus:outline-none focus:bg-teal-200 disabled:opacity-50 disabled:pointer-events-none">
                    Save
                </button>
                <button type="reset"
                        class="py-2 px-6 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-100 text-red-800 hover:bg-red-200 focus:outline-none focus:bg-red-200 disabled:opacity-50 disabled:pointer-events-none">
                    Reset
                </button>
            </div>
        </form>
    </div>
</div>
