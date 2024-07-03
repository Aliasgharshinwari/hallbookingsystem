<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-4">My Bookings</h1>
                    <ul class="space-y-4">
                        @foreach ($mybookings as $mybooking)
                            @if(Auth::user()->id === $mybooking->customer_id)
                                <li class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md flex justify-between items-center">
                                    <div>
                                        <a href="{{ route('mybookings.show', $mybooking->id) }}" class="text-lg font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                                            {{ $mybooking->id }}
                                        </a>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
