<div class="bg-green-100 py-8 h-full">
    <h1 class="text-3xl underline px-4 py-2">To Do list:</h1>
    <div class="p-4">
        <form action="" wire:submit.prevent="add">
            <input type="text" name="item" aria-label="todo-item" class="px-4 py-2 border border-gray-200 rounded"
                   wire:model="todoItem">
            <button type="submit"
                    class="px-4 py-2 border border-blue-600 bg-blue-500 hover:bg-blue-600 text-blue-100 rounded">Add
            </button>
        </form>

        <ul class="px-5 mt-6">
            @foreach($todos as $todo)
                <li class="my-2 capitalize list-disc">{{$todo}}</li>
            @endforeach
        </ul>

    </div>
</div>
