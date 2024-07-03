<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Booking Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-4">Booking Details</h1>
                    <div class="mb-4">
                        <p class="mb-2"><strong class="font-bold">Hall:</strong> {{ $mybooking->hall->name  ?? 'N/A'}}</p>
                        <p class="mb-2"><strong class="font-bold">Customer:</strong> {{ $mybooking->customer->name ?? 'N/A'}}</p>
                        <p class="mb-2"><strong class="font-bold">Booking Start Time:</strong> {{ $mybooking->booking_start_time }}</p>
                        <p class="mb-2"><strong class="font-bold">Booking End Time:</strong> {{ $mybooking->booking_end_time }}</p>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('mybookings.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                        <!-- <a href="{{ route('mybookings.edit', $mybooking->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </a>
                        <form action="{{ route('mybookings.destroy', $mybooking->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete Booking
                            </button>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
