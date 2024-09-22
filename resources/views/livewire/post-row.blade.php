<tr @class(['bg-gray-200' => $post->is_archived])>
    <td class="py-3 px-4 capitalize">{{$post->title}}</td>
    <td class="py-3 px-4">{{str($post->content)->words(8)}}</td>
    <td>
        <div class="flex items-center gap-1">
            @unless($post->is_archived)
                <button
                    wire:click="archive"
                    wire:confirm="Are You Sure You Want To Archive This Post?"
                    type="button"
                    class="py-1 px-2 border border-blue-600 bg-blue-500 hover:bg-blue-600 text-blue-100 rounded-lg text-sm">
                    Archive
                </button>
            @endunless
            <x-dialog wire:model="showEditDialog">
                <x-dialog.open>
                    <button
                        type="button"
                        class="py-1 px-2 border border-sky-600 bg-sky-500 hover:bg-sky-600 text-sky-100 rounded-lg text-sm">
                        Edit
                    </button>
                </x-dialog.open>
                <x-dialog.panel>
                    <div class="flex flex-col gap-6">
                        <h1 class="text-3xl mb-8 font-bold">Edit Post</h1>
                        <form action="" method="post" class="space-y-6" wire:submit.prevent="save()">
                            <div>
                                <label for="input-label" class="block text-sm font-medium mb-2">Title</label>
                                <input autofocus type="text" id="input-label" name="title"
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
                                            x-text="$wire.form.content.length"></span>/100</small>
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
                </x-dialog.panel>
            </x-dialog>
            <x-dialog>
                <x-dialog.open>
                    <button
                        type="button"
                        class="py-1 px-2 border border-red-600 bg-red-500 hover:bg-red-600 text-red-100 rounded-lg text-sm">
                        Delete
                    </button>
                </x-dialog.open>
                <x-dialog.panel>
                    <div class="flex flex-col gap-6" x-data="{confirmation: ''}">
                        <h2 class="text-3xl font-bold">Delete Post</h2>
                        <p class="text-lg font-medium">
                            Are you sure you want to delete this post? This action cannot be undone.
                        </p>

                        <label class="flex flex-col gap-3">
                            Type "CONFIRM"
                            <input x-model="confirmation" type="text"
                                   class="px-3 py-2 border border-slate-300 rounded-lg"
                                   placeholder="CONFIRM">
                        </label>
                        <x-dialog.footer>
                            <x-dialog.close>
                                <button class="py-2 px-4 border border-gray-300 bg-gray-200 rounded min-w-28">
                                    Cancel
                                </button>
                            </x-dialog.close>
                            <x-dialog.close>
                                <button :disabled="confirmation !== 'CONFIRM'"
                                        class="py-2 px-4 border border-red-600 bg-red-500 text-red-100 rounded min-w-28 disabled:cursor-not-allowed disabled:opacity-75"
                                        wire:click="dispatch('deleted')"
                                >
                                    Confirm
                                </button>
                            </x-dialog.close>
                        </x-dialog.footer>
                    </div>
                </x-dialog.panel>
            </x-dialog>
        </div>
    </td>
</tr>
