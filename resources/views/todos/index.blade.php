<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('todos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create Todo
                    </a>
                    <ul class="mt-4">
                        @foreach ($todos as $todo)
                            <li class="mb-2">
                                <a href="{{ route('todos.show', $todo->id) }}" class="text-lg font-semibold text-blue-500 hover:text-blue-700">{{ $todo->title }}</a>
                                <a href="{{ route('todos.edit', $todo->id) }}" class="text-blue-500 hover:text-blue-700 ml-4">Edit</a>
                                
                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="inline-block ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
