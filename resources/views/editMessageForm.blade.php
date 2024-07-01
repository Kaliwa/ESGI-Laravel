<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Message #{{ $message->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>Editing message #{{ $message->id }}</h3>
                    <br>

                    <!-- Form to update a message -->
                    <form action='{{ route('updateMessage') }}' method="POST">
                        @csrf
                        <input type="hidden" name="id" value='{{ $message->id }}'>
                        <input class="bg-black text-white rounded px-2 py-1" type="text" name="message" value='{{ $message->message }}'>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit Message</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
