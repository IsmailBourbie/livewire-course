<div class="bg-blue-100 rounded min-h-screen flex items-center justify-center">
    <div class="p-16 bg-white rounded-lg shadow-xl w-8/12">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">All Posts</h1>
            <x-dialog>
                <x-dialog.open>
                    <button
                        type="button"
                        class="py-2 px-4 border border-blue-600 bg-blue-500 hover:bg-blue-600 text-blue-100 font-medium rounded">
                        New Post
                    </button>
                </x-dialog.open>

                <x-dialog.panel>
                    <livewire:create-post classes="min-h-full"/>
                </x-dialog.panel>
            </x-dialog>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-xl divide-blue-200 divide-y">
                <thead>
                <tr class="bg-blue-gray-100 text-gray-700">
                    <th class="py-3 px-4 text-left">Title</th>
                    <th class="py-3 px-4 text-left">Content</th>
                    <th class="py-3 px-4 text-left"></th>

                </tr>
                </thead>
                <tbody class="divide-y divide-blue-200 text-blue-gray-900" wire:loading.class="opacity-50">
                @foreach($posts as $post)
                    <livewire:post-row :key="$post->id" :post="$post" @deleted="delete({{$post->id}})"/>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
