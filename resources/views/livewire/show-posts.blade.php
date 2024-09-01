<div class="bg-blue-100 rounded min-h-screen flex items-center justify-center">
    <div class="p-16 bg-white rounded-lg shadow-xl w-7/12">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-xl divide-gray-200 divide-y">
                <thead>
                <tr class="bg-blue-gray-100 text-gray-700">
                    <th class="py-3 px-4 text-left">Title</th>
                    <th class="py-3 px-4 text-left">Content</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-blue-gray-900">
                @foreach($posts as $post)
                    <tr wire:key="{{$post->id}}">
                        <td class="py-3 px-4 capitalize">{{$post->title}}</td>
                        <td class="py-3 px-4">{{str($post->content)->words(8)}}</td>
                        <td>
                            <button
                                wire:click="delete({{$post->id}})"
                                wire:confirm="Are You Sure You Want To Delete This Post?"
                                type="button"
                                class="py-1 px-2 border border-red-600 bg-red-500 text-red-100 rounded-lg text-sm">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
