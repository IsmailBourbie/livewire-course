<div class="bg-blue-100 rounded min-h-screen flex items-center justify-center">
    <div class="p-16 bg-white rounded-lg shadow-xl w-8/12">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-xl divide-blue-200 divide-y">
                <thead>
                <tr class="bg-blue-gray-100 text-gray-700">
                    <th class="py-3 px-4 text-left">Title</th>
                    <th class="py-3 px-4 text-left">Content</th>
                    <th class="py-3 px-4 text-left"></th>

                </tr>
                </thead>
                <tbody class="divide-y divide-blue-200 text-blue-gray-900">
                @foreach($posts as $post)
                    <livewire:post-row :key="$post->id" :post="$post"/>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
