<tr @class(['bg-gray-200' => $post->is_archived])>
    <td class="py-3 px-4 capitalize">{{$post->title}}</td>
    <td class="py-3 px-4">{{str($post->content)->words(8)}}</td>
    <td>
        @unless($post->is_archived)
            <button
                wire:click="archive"
                wire:confirm="Are You Sure You Want To Archive This Post?"
                type="button"
                class="py-1 px-2 border border-blue-600 bg-blue-500 hover:bg-blue-600 text-blue-100 rounded-lg text-sm">
                Archive
            </button>
        @endunless
        <button
            wire:click="delete({{$post->id}})"
            wire:confirm="Are You Sure You Want To Delete This Post?"
            type="button"
            class="py-1 px-2 border border-red-600 bg-red-500 hover:bg-red-600 text-red-100 rounded-lg text-sm">
            Delete
        </button>
    </td>
</tr>
