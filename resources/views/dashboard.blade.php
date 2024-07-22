<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Section des Groupes -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-lg font-bold mb-4">Groups List</h1>
                    <form action="{{ route('selectGroup') }}" method="POST" class="flex items-center">
                        @csrf
                        <select name="active_group_id" class="block w-full max-w-xs border-gray-300 text-black rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}" @if($user->active_group_id == $group->id) selected @endif>{{ $group->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="ml-4 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Select
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-lg font-bold mb-4">Todos List</h1>
                    @if(!$todos || $todos->isEmpty())
                        <p>No todos found for the selected group.</p>
                    @else
                        <ul class="list-disc pl-5">
                            @foreach($todos as $todo)
                                <li>{{ $todo->title }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
