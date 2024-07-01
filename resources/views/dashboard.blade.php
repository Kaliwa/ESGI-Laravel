<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>Welcome on the Wall</h3>
                    <br>

                    <!-- Form to publish a message -->
                    <form action='{{ route('publishMessage') }}' method="POST">
                        @csrf
                        <input class="bg-black text-white rounded px-2 py-1" type="text" name="message" placeholder="Enter your message">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Post on the Wall</button>
                    </form>
                    <br>

                    <!-- Link to export users as CSV -->
                    <a href="{{ route('exportUsers') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Export Users (CSV)</a>
                    <br><br>
                    <a href="{{ route('exportPost') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Export Posts (CSV)</a>
                    <br><br>

                    <!-- List of messages -->
                    <ul>
                        @foreach($messages as $message)
                        <li>
                            {{ $message->message }}

                            <!-- Edit and Delete links for the author -->
                            @if($message->user_id == Auth::id())
                            <a href="{{ route('deleteMessage', $message->id) }}" class="text-red-600 hover:text-red-800">[Delete]</a>
                            <a href="{{ route('editMessageForm', $message->id) }}" class="text-blue-600 hover:text-blue-800">[Edit]</a>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    <br>

                    <!-- Pagination links -->
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
