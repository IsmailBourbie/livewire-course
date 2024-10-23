<div class="bg-slate-100 rounded min-h-screen flex justify-center py-8">
    <div class="md:p-16 p-8 md:w-4/5">
        <form action="" wire:submit="add" class="text-center">
            <input type="text" name="item" aria-label="todo-item"
                   class="px-6 py-3 border border-gray-200 shadow rounded-full w-5/12"
                   placeholder="Today I'm gonna..."
                   wire:model="draft">
        </form>

        <ul class="mt-4">
            @foreach($this->todos as $todo)
                <li class="mx-auto my-2 capitalize px-6 py-3 border border-gray-200 bg-white shadow rounded-full w-5/12">
                    <div class="text-slate-600">{{$todo->name}}</div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
