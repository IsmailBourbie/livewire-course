<div class="bg-green-100 rounded min-h-screen flex items-center justify-center">
    <div class="p-16 bg-white rounded-lg shadow-xl w-2/5">
        <h1 class="text-3xl font-bold mb-6">To Do list</h1>
        <form action="" wire:submit.prevent="add">
            <input type="text" name="item" aria-label="todo-item"
                   class="px-4 py-2 border border-gray-200 rounded w-3/4"
                   wire:model="todoItem">
            <button type="submit"
                    class="px-4 py-2 border border-blue-600 bg-blue-500 hover:bg-blue-600 text-blue-100 rounded">
                Add
            </button>
        </form>

        <ul class="px-5 mt-6">
            @foreach($todos as $todo)
                <li class="my-2 capitalize list-decimal">{{$todo}}</li>
            @endforeach
        </ul>
    </div>
</div>
