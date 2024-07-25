<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Users to Group: ' . $group->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-lg font-bold mb-4">Add Users to Group</h1>

                    <!-- Affichage des messages de succès -->
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('groups.addUsers.submit', $group->id) }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="users" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select Users</label>
                            <select id="users" name="user_ids[]" multiple class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-300">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_ids')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Add Users
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
