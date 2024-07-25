<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Groups') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Bouton de création de groupe -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('groups.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create Group
                    </a>
                </div>
            </div>

            <!-- Liste des groupes -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-lg font-bold mb-4">Groups List</h1>
                    @if(!$groups || $groups->isEmpty())
                        <p>No groups found.</p>
                    @else
                        <ul class="list-disc pl-5">
                            @foreach ($groups as $group)
                                <li class="flex items-center justify-between">
                                    <span>
                                        <a href="{{ route('groups.show', $group->id) }}" class="text-blue-500 hover:text-blue-700">{{ $group->name }}</a>
                                    </span>
                                    <span class="flex items-center">
                                        <a href="{{ route('groups.edit', $group->id) }}" class="text-blue-500 hover:text-blue-700 mr-4">Edit</a>
                                        <form action="{{ route('groups.destroy', $group->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                        <a href="{{ route('groups.addUsers', $group->id) }}" class="text-green-500 hover:text-green-700 ml-4">Add Users</a>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
