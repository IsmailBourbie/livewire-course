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
